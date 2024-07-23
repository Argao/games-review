<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Produtora;
use Illuminate\Http\Request;

class ProdutoraController extends Controller
{

    public function __construct()
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
        $paises = Pais::orderBy('nome')->get();
        return view('app.produtora.create', ['paises' => $paises]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras =[
            'produtora' => 'required|max:50|unique:produtoras,produtora',
            'pais_id' => 'required|exists:paises,id',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'produtora.max' => 'O campo produtora deve ter no máximo 50 caracteres',
            'produtora.unique' => 'Essa produtora já está cadastrada',
            'pais_id.exists' => 'O país informado não existe',
        ];

        $request->validate($regras, $feedback);

        Produtora::create($request->all());

        return redirect()->back()->with('success', 'Produtora cadastrada com sucesso');
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
