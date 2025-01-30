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
 
            $page = PageModel::where('name', $subdomain)->first();

            if ($page) {
                return view('cliente.pages.show', compact(['content' => $page->content]));
            } else {
                return redirect('/');
            }
        }

        return $next($request);
    }
}