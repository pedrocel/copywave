<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use App\Models\DomainModel;
use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\PageModification;
use App\Models\SubscriptionModel;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    public function index()
    {
        $pages = PageModel::where('user_id', Auth::user()->id)->get();
        return view('cliente.pages.index', compact('pages'));
    }

    public function plan()
    {
        $pages = PageModel::where('user_id', Auth::user()->id)->get();
        return view('cliente.pages.index', compact('pages'));
    }

    public function create()
    {
        $user = Auth::user();

        // Verifica se o usuário tem uma assinatura válida
        $subscription = SubscriptionModel::where('user_id', $user->id)
            ->where('status', 'active')  // Verifica se a assinatura está ativa
            ->first();

        // Se não houver assinatura ou a assinatura tiver mais de 30 dias de pagamento
        if (!$subscription || $subscription->paid_at->diffInDays(now()) > 30) {
            // Redireciona o usuário para a tela de compra de assinatura
            return redirect()->route('subscription.purchase')->with('message', 'Sua assinatura expirou ou você ainda não possui uma assinatura.');
        }

        // Caso a assinatura seja válida, retorna a página de criação normalmente
        return view('cliente.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pages',
            'url_page' => 'required|url',
            'modifications' => 'array',
            'modifications.*.type' => 'required|string|in:link,image,script',
            'modifications.*.old_value' => 'nullable|string',
            'modifications.*.new_value' => 'nullable|string',
        ]);

        // Fazer a requisição HTTP para obter o conteúdo do site
        $client = new Client();
        $response = $client->get($request->url_page);
        $content = $response->getBody()->getContents();

        // Criar um DOMDocument para manipular o HTML
        $dom = new \DOMDocument();
        @$dom->loadHTML($content);

        // Aplicar modificações
        foreach ($request->modifications as $modification) {
            if ($modification['type'] === 'link') {
                $this->modifyLinks($dom, $modification['old_value'], $modification['new_value']);
            } elseif ($modification['type'] === 'image') {
                $this->modifyImages($dom, $modification['old_value'], $modification['new_value']);
            } elseif ($modification['type'] === 'script') {
                $this->addScript($dom, $modification['new_value']);
            }
        }

        // Salvar o conteúdo clonado no banco de dados
        $clonedContent = $dom->saveHTML();

        // Criar a página com a URL clonada
        $page = PageModel::create([
            'name' => $request->name,
            'url_page' => $request->url_page,
            'url_checkout' => $request->url_checkout,
            'external_id' => $request->external_id,
            'user_id' => $request->user()->id,
            'visits' => 0,
            'is_public' => $request->is_public,
            'status' => 1,
            'content' => $clonedContent,
        ]);

        // Salvar as modificações
        foreach ($request->modifications as $modification) {
            PageModification::create([
                'page_id' => $page->id,
                'type' => $modification['type'],
                'old_value' => $modification['old_value'],
                'new_value' => $modification['new_value'],
            ]);
        }

        return redirect()->route('cliente.pages.index')->with('success', 'Page created successfully.');
    }

    private function modifyLinks($dom, $oldValue, $newValue)
    {
        $links = $dom->getElementsByTagName('a');
        foreach ($links as $link) {
            $href = $link->getAttribute('href');
            if ($href && strpos($href, $oldValue) !== false) {
                $link->setAttribute('href', str_replace($oldValue, $newValue, $href));
            }
        }
    }

    public function detail($name)
    {
        $page = PageModel::where('name', $name)->firstOrFail();
        $modifications = PageModification::where('page_id', $page->id)->get();

        $linkedDomainIds = PageModel::pluck('domain_id')->toArray();

        $domains = DomainModel::where('user_id', Auth::user()->id)
                            ->whereNotIn('id', $linkedDomainIds) 
                            ->get();

        $hasCname = false;
        if ($page->domain) {
            $hasCname = $this->checkCname($page->domain->domain);
        }

        return view('cliente.pages.detail', compact('page', 'modifications', 'domains', 'hasCname'));
    }

    
    public function attachDomain(Request $request, $id)
    {
        $page = PageModel::findOrFail($id);
        $page->domain_id = $request->domain_id;
        $page->save();

        return redirect()->route('cliente.pages.detail', $page->name)->with('success', 'Domínio vinculado com sucesso.');
    }

    public function detachDomain($id)
    {
        $page = PageModel::findOrFail($id);
        $page->domain_id = null;
        $page->save();

        return redirect()->route('cliente.pages.detail', $page->name)->with('success', 'Domínio desvinculado com sucesso.');
    }

    function checkCname($domain) {
        $records = dns_get_record($domain, DNS_CNAME);
        
        if (!$records) {
            return false; // Nenhum registro CNAME encontrado
        }
    
        foreach ($records as $record) {
            if (isset($record['target'])) {
                if (strpos($record['target'], 'copywave.io') !== false) {
                    return true; // O CNAME aponta para copywave.io ou um subdomínio
                }
            }
        }
    
        return false; // Nenhum CNAME válido encontrado
    }
    private function modifyImages($dom, $oldValue, $newValue)
    {
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if ($src && strpos($src, $oldValue) !== false) {
                $img->setAttribute('src', str_replace($oldValue, $newValue, $src));
            }
        }
    }

    private function addScript($dom, $scriptContent)
    {
        $script = $dom->createElement('script', $scriptContent);
        $dom->getElementsByTagName('body')->item(0)->appendChild($script);
    }

    public function show(Request $request)
    {
        return view('welcome');
    }

    public function showSubdomain(Request $request, $subdomain)
    {
        if ($subdomain && $subdomain !== 'www' && $subdomain !== 'copywave') {
            $page = PageModel::where('name', $subdomain)->first();

            if ($page) {
                if (!$page->status) {
                    abort(500);
                }

                // Incrementar o número de visitas
                $page->increment('visits');

                // Renderizar o conteúdo clonado
                return view('pages.show', ['content' => $page->content]);
            }
        }

        return redirect('/');
    }

    public function showByName($name)
    {
        $page = PageModel::where('name', $name)->firstOrFail();

        if (!$page->status) {
            abort(500);
        }

        // Incrementar o número de visitas
        $page->increment('visits');

        // Renderizar o conteúdo clonado
        return view('cliente.pages.show', ['content' => $page->content]);
    }

    public function destroy($id)
    {
        $page = PageModel::findOrFail($id);
        $page->delete();

        return redirect()->route('cliente.pages.index')->with('success', 'Page deleted successfully.');
    }

    public function toggleStatus($id)
    {
        $page = PageModel::findOrFail($id);
        $page->status = !$page->status;
        $page->save();

        return redirect()->route('cliente.pages.index')->with('success', 'Page status updated successfully.');
    }
    public function cloneTest(Request $request)
    {
        // Fazer a requisição HTTP para obter o conteúdo do site
        $client = new Client();
        $response = $client->get($request->url_page);
        $content = $response->getBody()->getContents();

        // Criar um DOMDocument para manipular o HTML
        $dom = new \DOMDocument();
        @$dom->loadHTML($content);

        // Ajustar URLs de imagens
        $images = $dom->getElementsByTagName('img');
        foreach ($images as $img) {
            $src = $img->getAttribute('src');
            if ($src) {
                // Resolver URLs relativas
                if (!filter_var($src, FILTER_VALIDATE_URL)) {
                    $src = $this->resolveUrl($request->url_page, $src);
                }
                $img->setAttribute('src', $src);
            }
        }

        // Retornar o conteúdo clonado
        return response($dom->saveHTML());
    }

    private function resolveUrl($base, $relative)
    {
        // Se a URL já for absoluta, retorne-a
        if (parse_url($relative, PHP_URL_SCHEME) != '') return $relative;

        // URLs relativas que começam com '//' são tratadas como absolutas
        if (substr($relative, 0, 2) == '//') return 'http:' . $relative;

        // URLs relativas que começam com '/' são tratadas como relativas à raiz do host
        if ($relative[0] == '/') return parse_url($base, PHP_URL_SCHEME) . '://' . parse_url($base, PHP_URL_HOST) . $relative;

        // URLs relativas que começam com './' ou '../' são tratadas como relativas ao diretório base
        $path = parse_url($base, PHP_URL_PATH);
        $path = preg_replace('#/[^/]*$#', '', $path);
        $abs = parse_url($base, PHP_URL_SCHEME) . '://' . parse_url($base, PHP_URL_HOST) . $path . '/' . $relative;

        // Normalizar a URL
        $abs = preg_replace('/(\/\.?\/)/', '/', $abs);
        $abs = preg_replace('/\/(?!\.\.)[^\/]+\/\.\.\//', '/', $abs);

        return $abs;
    }
}