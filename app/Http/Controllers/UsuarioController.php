<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('app.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|string|max:100',
            'usuario' => 'required|unique:usuarios,usuario',
            'senha' => 'required|min:6|max:20',
            'senha_confirmation' => 'required|same:senha',
            'tipo' => [
                'required',
                Rule::in(['admin', 'editor'])
            ]

        ];

        $feedback = [

        ];

        $request->validate($regras, $feedback);

        $senha = UsuarioController::gerarHash($request->get('senha')) ;

        Usuario::create([
            'nome' => $request->input('nome'),
            'usuario' => $request->input('usuario'),
            'senha' => $senha,
            'tipo' => $request->input('tipo')
        ]);

        return redirect()->back()->with('success', 'Usuario cadastrado com sucesso');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = Usuario::find($id);
        return view('app.usuario.edit',['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {

        $regras = [
            'nome' => 'required|min:3|max:100',
        ];

        $senha = $usuario->senha;
        if ($request->input('senha') != '') {
            $regras['senha'] = 'min:6|max:20';
            $regras['senha_confirmation'] = 'same:senha';
            $senha = UsuarioController::gerarHash($request->input('senha')) ;
        }

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres',
            'senha.max' => 'A senha deve ter no máximo 20 caracteres',
            'senha_confirmation.same' => 'As senhas não são iguais',
        ];

        $request->validate($regras, $feedback);
        $usuario->nome = $request->input('nome');
        $usuario->senha = $senha;

        $usuario->save();


        return redirect()->back()->with('success', 'Usuario cadastrado com sucesso')->with('usuario', $usuario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public static function gerarHash($senha){
        return password_hash(self::cripto($senha),PASSWORD_DEFAULT);
    }
    public static function testarHash($senha, $hash){

        return password_verify(self::cripto($senha),$hash);
    }

    public static function cripto($senha){
        $c = '';
        for ($i=0; $i < strlen($senha); $i++) {
            $letra = ord($senha[$i]) + 1;
            $c .= chr($letra);
        }
        return $c;
    }
}
