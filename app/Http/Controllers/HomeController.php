<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $jogos = Jogo::paginate(10);
        return view('index', ['jogos' => $jogos,'request' => $request]);
    }
}
