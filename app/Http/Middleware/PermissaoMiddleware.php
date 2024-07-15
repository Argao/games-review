<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PermissaoMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin') {
            return $next($request);
        }
        return redirect()->route('login',['erro'=>3]);
    }
}
