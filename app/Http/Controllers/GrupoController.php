<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Palavra;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    public function index()
    {
        $grupos = Grupo::all();
        return view('grupos.index', compact('grupos'));
    }

    public function gravar(Request $form){
        $dados = $form->validate([
            'nome' => 'required|min:3'
        ]);

        Grupo::create($dados);
        
        return redirect()->route('index');
    }

    public function cadastrar(){
        return view('grupos.cadastrar');
    }
}
