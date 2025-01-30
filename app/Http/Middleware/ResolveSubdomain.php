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
 
            $content = PageModel::where('name', $subdomain)->first();

            if ($content) {
                return view('pages.show', compact(['content' => $content['content']]));
            } else {
                return redirect('/');
            }
        }

        return $next($request);
    }
}