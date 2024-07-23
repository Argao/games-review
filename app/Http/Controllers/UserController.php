<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
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
        if (auth()->user()->permission !== 'admin') return redirect()->route('home');
        return view('app.usuario.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        if (auth()->user()->permission !== 'admin') return redirect()->route('home');
        $regras = [
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'senha' => 'required|min:6|max:20|confirmed',
            'tipo' => [
                'required',
                Rule::in(['admin', 'editor'])
            ]
        ];

        $feedback = [
            'string' => 'O campo :attribute deve ser uma string',
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres',
            'senha.max' => 'A senha deve ter no máximo 20 caracteres',
            'senha_confirmation.same' => 'As senhas não são iguais',
            'tipo.in' => 'O tipo de usuário deve ser admin ou editor',
            'email.unique' => 'O email informado já está cadastrado',
            'email.email' => 'O email informado não é válido',
            'email.max' => 'O email informado deve ter no máximo 255 caracteres',
        ];

        $request->validate($regras, $feedback);


        User::create([
            'name' => $request->input('nome'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('senha')),
            'permission' => $request->input('tipo')
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
        $usuario = User::find($id);
        return view('app.usuario.edit', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {


        $regras = [
            'nome' => 'required|string|max:255',
        ];

        $senha = $user->password;
        if ($request->input('senha') != '') {
            $regras['senha'] = 'required|string|min:8|confirmed';
            $senha = Hash::make($request->input('senha')) ;
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
        $user->name = $request->input('nome');
        $user->password = $senha;

        $user->save();


        return redirect()->back()->with('success', 'Usuario editado com sucesso')->with('usuario', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
