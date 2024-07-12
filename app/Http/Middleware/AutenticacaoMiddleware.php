<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    public function handle($request, Closure $next,  )
    {
        session_start();

        if(isset($_SESSION['usuario']) && $_SESSION['usuario'] != ''){
            return $next($request);
        }

        return redirect()->route('site.login',['erro'=>2]);
    }
}
