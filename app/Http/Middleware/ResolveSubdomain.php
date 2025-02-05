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
        $$host = $request->getHost();

        // Verifica se o domínio é copywave.io
        if (strpos($host, 'copywave.io') !== false) {
            return $next($request);
        }
    
        // Extrai subdomínio
        $subdomainParts = explode('.', $host);
        $subdomain = count($subdomainParts) > 1 ? $subdomainParts[0] : null;
    
        // Formato esperado: nomepagina-uuid
        if ($subdomain && preg_match('/^(.+)-([a-f0-9\-]{36})$/', $subdomain, $matches)) {
            $pageName = $matches[1];
            $pageId = $matches[2];
    
            // Busca pela página correspondente ao nome e UUID
            $page = PageModel::where('name', $pageName)->where('uuid', $pageId)->first();
    
            if ($page) {
                $request->attributes->set('page', $page);
                return response()->view('page_view', compact('page'));
            }
        }
    
        // Verificação para domínios adicionais
        $domain = DomainModel::where('domain', $host)->first();
    
        if ($domain) {
            $page = PageModel::where('domain_id', $domain->id)->first();
    
            if ($page) {
                $request->attributes->set('page', $page);
                return response()->view('page_view', compact('page'));
            }
        }
    
        // View padrão com planos caso nenhuma correspondência seja encontrada
        $plans = PlanModel::where('status', 1)->get();
        return response()->view('welcome', compact('plans'));
    }
    
}