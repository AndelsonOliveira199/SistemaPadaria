<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProdutoController extends Controller {
    public function nossos_produtos(){
        $produtos = Produto::all();
        return view('nossos_produtos', compact('produtos'));
    }
}
