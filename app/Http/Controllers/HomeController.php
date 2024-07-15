<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        session_start();
//        $filtro = $request->input('filtro');//filtro de busca
//        $busca = $request->input('busca');//string a ser buscada
//
//
//
//        $query = Jogo::join('generos', 'jogos.genero_id', '=', 'generos.id')
//            ->join('produtoras', 'jogos.produtora_id', '=', 'produtoras.id');
//
//
//        // Conditional search
//        if (!empty($busca)) {
//            $query->where(function($query) use ($busca) {
//                $query->where('jogos.nome', 'like', "%$busca%")
//                    ->orWhere('produtoras.produtora', 'like', "%$busca%")
//                    ->orWhere('generos.genero', 'like', "%$busca%");
//            });
//        }
//
//        switch ($filtro) {
//            case "p":
//                $query->orderBy('produtoras.produtora');
//                break;
//            case "n1":
//                $query->orderByDesc('jogos.nota');
//                break;
//            case "n2":
//                $query->orderBy('jogos.nota');
//                break;
//            default:
//                $query->orderBy('jogos.nome');
//                break;
//        }

        // Execute the query
        $jogos = Jogo::paginate(10);

        return view('index', ['jogos' => $jogos,'request' => $request]);
    }

    public function detalhes(Jogo $jogo)
    {
        //verifica se a imagem da capa existe
        session_start();
        $imagem =  JogoController::verificaCapa($jogo);
        return view('jogo_detalhes',['jogo' => $jogo,'capa' => $imagem]);
    }

}
