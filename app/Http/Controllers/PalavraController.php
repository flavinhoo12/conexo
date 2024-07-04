<?php

namespace App\Http\Controllers;

use App\Models\Palavra;
use App\Models\Grupo;
use Illuminate\Http\Request;

class PalavraController extends Controller
{
    public function index()
    {
        $palavras = Palavra::all();
        return view('palavras.index', compact('palavras'));
    }

    public function gravar(Request $form){
        $dados = $form->validate([
            'nome' => 'required|min:3'
        ]);

        Palavra::create($dados);
        
        return redirect()->route('index');
    }

    public function cadastrar(){
        return view('palavras.cadastrar');
    }
}
