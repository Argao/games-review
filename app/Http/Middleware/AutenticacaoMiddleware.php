<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    public function handle($request, Closure $next,string $permissao)
    {
        session_start();

        if(!isset($_SESSION['usuario']) && $_SESSION['usuario']){
            return redirect()->route('site.login',['erro'=>2]);
        }

        if ($permissao == 'admin') {
            if ($_SESSION['perfil'] != 'admin') {
                return redirect()->route('site.login',['erro'=>3]);
            }
        }


        return $next($request);
    }
}
