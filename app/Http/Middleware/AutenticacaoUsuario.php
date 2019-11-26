<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /* 
        * Verifica se o usuário está logada, retirando o chave 'id' do objeto session através do session helper
        * Case não esteja logado, retorna o usuario para a página de login
        */
        if(session('id') != null){
            return $next($request);
        }else{
            return redirect()->route('usuarios.registrar');
        }
    }
}
