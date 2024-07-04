<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Palavra;

class IndexController extends Controller
{
    public function index()
    {
        $grupos = Grupo::with('palavras')->get();
        $palavras = Palavra::with('grupos')->get();
        return view('index.index', compact('grupos', 'palavras'));
    }
}
