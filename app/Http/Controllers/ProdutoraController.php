<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Produtora;
use Illuminate\Http\Request;

class ProdutoraController extends Controller
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
        $paises = Pais::all();
        return view('app.produtora.create', ['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras =[
            'nome' => 'required|max:50',
            'pais_id' => 'required|exists:paises,id',
        ];

        $feedback = [
            'nome.required' => 'O campo nome é obrigatório',
            'nome.max' => 'O campo nome deve ter no máximo 50 caracteres',
            'pais_id.required' => 'O campo país é obrigatório',
            'pais_id.exists' => 'O país informado não existe',
        ];

        $request->validate($regras, $feedback);
        return redirect()->route('produtora.create');
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
        Produtora::destroy($id);
    }
}
