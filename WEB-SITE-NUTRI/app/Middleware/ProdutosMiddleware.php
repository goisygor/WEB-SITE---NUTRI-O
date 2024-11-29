<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ProdutosMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check() && Auth::user()->tipo_usuario ==='administrador'){ //faz o checking se foi feito o login, e o tipo de usuario
            return $next($request);
        }
        
        //se não for uma empresa, redireciona com a mensagem de erro
        return redirect()->route('')->
        withErrors(['access' => 'Você não tem permissão para acessar essa área']);
        
    }
}