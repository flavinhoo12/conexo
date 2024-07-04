<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\GrupoPalavra;
use App\Models\Jogo;
use App\Models\Palavra;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
 

class JogosController extends Controller
{
    public function __construct(
        protected Jogo $repository,
        protected Grupo $grupos,
        protected Palavra $palavra,
        protected GrupoPalavra $grupoPalavra
    ) {}

    public function jogar() {
        $grupos = Grupo::all('id');
        $gruposIds = $grupos->toArray();

        foreach ($gruposIds as $grupoId) {
            $colunaJogo = DB::table('grupo_palavra')
            ->join('grupos', 'grupos.id', '=', 'grupo_id')
            ->join('palavras', 'palavras.id', '=', 'palavra_id')
            ->select('grupos.nome', 'palavras.nome')
            ->get();
            dd($colunaJogo);
        }
    }
}