<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Jogo;
use App\Models\Produtora;
use Illuminate\Http\Request;

class JogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $jogos = Jogo::paginate(10);
        return view('jogo.index',['jogos' => $jogos,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $generos = Genero::all();
        $produtoras = Produtora::all();
        return view('jogo.create',['generos' => $generos, 'produtoras' => $produtoras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:100',
            'capa' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genero_id' => 'required|exists:generos,id',
            'produtora_id' => 'required|exists:produtoras,id',
            'descricao' => 'required|min:3|max:1000',
            'nota' => 'required|numeric|min:0|max:10',

        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 100 caracteres',
            'capa.required' => 'O campo capa deve ser preenchido',
            'capa.image' => 'O campo capa deve ser uma imagem',
            'capa.mimes' => 'O campo capa deve ser uma imagem do tipo jpeg, png, jpg, gif ou svg',
            'capa.max' => 'O campo capa deve ter no máximo 2048 bytes',
            'genero_id.required' => 'O campo genero deve ser preenchido',
            'genero_id.exists' => 'O genero informado não existe',
            'produtora_id.required' => 'O campo produtora deve ser preenchido',
            'produtora_id.exists' => 'A produtora informada não existe',
            'descricao.required' => 'O campo descricao deve ser preenchido',
            'descricao.min' => 'O campo descricao deve ter no mínimo 3 caracteres',
            'descricao.max' => 'O campo descricao deve ter no máximo 1000 caracteres',
            'nota.required' => 'O campo nota deve ser preenchido',
            'nota.numeric' => 'O campo nota deve ser um número',
            'nota.min' => 'O campo nota deve ser no mínimo 0',
            'nota.max' => 'O campo nota deve ser no máximo 10',
        ];

        $request->validate($regras, $feedback);

        $jogo = new Jogo();
        $jogo->nome = $request->nome;
        $jogo->genero_id = $request->genero_id;
        $jogo->produtora_id = $request->produtora_id;
        $jogo->descricao = $request->descricao;
        $jogo->nota = $request->nota;

        if ($request->hasFile('capa')) {
            $imageName = time().'.'.$request->capa->extension();
            $request->capa->move(public_path('img'), $imageName);
            $jogo->capa = $imageName;
        }

        $jogo->save();

        return redirect()->route('jogo.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jogo $jogo)
    {
        //verifica se a imagem da capa existe
        $imagem = $this->verificaCapa($jogo);

        return view('jogo.show',['jogo' => $jogo,'capa' => $imagem]);
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

    }

    public static function verificaCapa(Jogo $jogo)
    {
        $caminhoImagem = 'img/' . $jogo->capa;
        $imagemPadrao = 'img/indisponivel.png';
        return file_exists(public_path($caminhoImagem)) ? asset($caminhoImagem) : asset($imagemPadrao);
    }
}
