<?php

namespace App\Http\Middleware;

use App\Models\DomainModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Page;
use App\Models\PageModel;
use App\Models\PlanModel;

class ResolveSubdomain
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $parts = explode('.', $host);
        $subdomain = count($parts) > 2 ? $parts[0] : null;

        $plans = PlanModel::where('status', 1)->get();

        // Ignora lógica para o domínio específico "copywave.io"
        if ($host === 'copywave.io') {
            return $next($request);
        }

        // Se subdomínio estiver definido, verifica nome e ID de página
        if ($subdomain) {
            
            $pageInfo = explode('-', $subdomain); // Exemplo esperado: "nomepagina-123"

            dd($pageInfo);  
            if (count($pageInfo) === 2) {
                [$pageName, $pageId] = $pageInfo;

                // Verificar se a página existe com o nome e ID
                $page = PageModel::where('id', $pageId)
                    ->where('name', $pageName)
                    ->first();

                if ($page) {
                    $request->attributes->set('page', $page);
                    return $next($request);
                }
            }

            return response()->view('welcome', compact('plans'));
        }

        // Verificação do domínio registrado
        $domain = DomainModel::where('domain', $host)->first();

        if ($domain) {
            $page = PageModel::where('domain_id', $domain->id)->first();

            if ($page) {
                $request->attributes->set('page', $page);
                return $next($request);
            }
        }

        return response()->view('welcome', compact('plans'));
    }
    
}