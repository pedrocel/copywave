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

        // Redireciona de "copywave.com.br" para "www.copywave.com.br"
        if ($host === 'copywave.com.br') {
            $newUrl = 'https://www.copywave.com.br' . $request->getRequestUri(); // URL completa
            return redirect()->away($newUrl, 301);
        }

        // Remove "www." caso exista
        if (str_starts_with($host, 'www.')) {
            $host = substr($host, 4);
        }

        // Extrai subdomínio do host
        $subdomainParts = explode('.', $host);
        $subdomain = count($subdomainParts) > 2 ? $subdomainParts[0] : null;

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

        if ($subdomain) {
            $page = PageModel::where('name', $subdomain)->first();

            if ($page) {
                $request->attributes->set('page', $page);
                return response()->view('pages.show', ['content' => $page['content']]);
            }
        }

        $domain = DomainModel::where('domain', $host)->first();

        if ($domain) {
            $page = PageModel::where('domain_id', $domain->id)->first();

            if ($page) {
                $request->attributes->set('page', $page);
                return response()->view('pages.show', ['content' => $page['content']]);
            }
        }

        $plans = PlanModel::where('status', 1)->get();
    return response()->view('welcome', compact('plans'));
    }
}