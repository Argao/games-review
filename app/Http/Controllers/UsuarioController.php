<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

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
        return view('usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:100',
            'usuario' => 'required',
            'senha' => ['required', 'min:6', 'max:20', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/'],
        ];

        $feedback = [

            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres',
            'senha.max' => 'A senha deve ter no máximo 20 caracteres',
            'senha.regex' => 'A senha deve conter pelo menos uma letra maiúscula, uma minúscula, um número e um caractere especial',
        ];

        $request->validate($regras, $feedback);

        $senha = UsuarioController::gerarHash($request->get('senha')) ;

        echo $senha;

        Usuario::create([
            'nome' => $request->get('nome'),
            'usuario' => $request->get('usuario'),
            'senha' => $senha
        ]);

        return redirect()->route('jogo.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
