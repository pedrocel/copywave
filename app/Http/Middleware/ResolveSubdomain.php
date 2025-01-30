<?php

namespace App\Http\Middleware;

use App\Models\DomainModel;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Page;
use App\Models\PageModel;

class ResolveSubdomain
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0];


        // Verifica se o subdomínio é válido;
        if ($subdomain && $subdomain !== 'www' && $subdomain !== 'copywave') {
 
            $domain = DomainModel::where('domain', $host)->first();
            $page = PageModel::where('domain_id', $domain->id)->first();

            if ($page) {
                $request->attributes->set('page', $page);
            } else {
                return redirect('/');
            }
        }

        return $next($request);
    }
}