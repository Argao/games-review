<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;

class GeneroController extends Controller
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
        return view('app.genero.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'genero' => 'required|max:30|unique:generos,genero',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'genero.max' => 'O campo nome deve ter no máximo 30 caracteres',
        ];

        $request->validate($regras, $feedback);

        Genero::create($request->all());

        return redirect()->back()->with('success', 'Gênero cadastrado com sucesso');
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
       Genero::find($id)->delete();
       return redirect()->route('genero.create');
    }
}
