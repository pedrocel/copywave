<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Page;
use App\Models\PageModel;

class ResolveSubdomain
{
    namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\PageModel;

class ResolveSubdomain
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();
        $subdomain = explode('.', $host)[0];

        // Verifica se o subdomínio é válido
        if ($subdomain && $subdomain !== 'www' && $subdomain !== 'copywave') {
            $page = PageModel::where('name', $subdomain)->first();

            if ($page) {
                $request->attributes->set('page', $page);
            } else {
                return redirect('/');
            }
        } else {
            // Se não houver subdomínio, continue normalmente
            return $next($request);
        }

        return $next($request);
    }
}
}
