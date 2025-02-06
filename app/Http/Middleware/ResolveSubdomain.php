<?php


namespace App\Http\Middleware;

use App\Models\DomainModel;
use App\Models\PageModel;
use App\Models\PlanModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResolveSubdomain
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        if (str_starts_with($host, 'www.')) {
          $host = substr($host, 4);
        }
        // Extrai subdomínio do host
        $subdomainParts = explode('.', $host);
        $subdomain = count($subdomainParts) > 1 ? $subdomainParts[0] : null;


        // Ignora o domínio principal
        if ($host === 'copywave.io') {
            return $next($request);
        }

        // Verifica se o subdomínio segue o formato nomepagina-uuid
        if ($subdomain && preg_match('/^(.+)-([a-f0-9\-]{36})$/', $subdomain, $matches)) {
            $pageName = $matches[1];
            $pageId = $matches[2];

            // Busca a página correspondente
            $page = PageModel::where('name', $pageName)->where('id', $pageId)->first();

            if ($page) {
                $request->attributes->set('page', $page);
                return response()->view('pages.show', ['content' => $page['content']]);
            }
        }

        // Verifica se o domínio existe
        $domain = DomainModel::where('domain', $host)->first();

        if ($domain) {
            $page = PageModel::where('domain_id', $domain->id)->first();

            if ($page) {
                $request->attributes->set('page', $page);
                return response()->view('pages.show', ['content' => $page['content']]);
            }
        }

        // Fallback: Exibe os planos ativos caso nenhuma correspondência seja encontrada
        $plans = PlanModel::where('status', 1)->get();
        return response()->view('welcome', compact('plans'));
    }
}
