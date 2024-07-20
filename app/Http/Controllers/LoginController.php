<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        switch ($request->get('erro'))
        {
            case 1:
                $erro = 'Usuário e ou senha não existe';
                break;
            case 2:
                $erro = 'Necessário realizar login para ter acesso a página';
                break;
            case 3:
                $erro = 'Usuário não tem permissão para acessar a página';
                break;
        }


        return view('login',['erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        session_start();
        //regras de validação
        $regras = [
            'usuario' => 'required',
            'senha' => 'required'
        ];

        //mensagens de feedback de validação
        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
        ];

        $request->validate($regras,$feedback);

        //recuperamos os parâmetros do formulário
        $usuario = $request->get('usuario');
        $senha =$request->get('senha');



        //iniciar Model User
        $user = new Usuario();

        $usuario = $user->where('usuario', $usuario)->get()->first();

        if (!$usuario || !UsuarioController::testarHash($senha, $usuario->senha)) {
            return redirect()->route('login')->withErrors(['login_error' => 'Usuário ou senha inválidos.']);
        }

        $_SESSION['nome'] = $usuario->nome;
        $_SESSION['usuario'] = $usuario->id;
        $_SESSION['tipo'] = $usuario->tipo;

        return redirect()->route('jogo.index');
    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('home');
    }
}
