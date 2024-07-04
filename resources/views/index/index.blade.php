@extends('base')

@section('titulo', 'Palavras Implementadas')

@section('conteudo')

<h1>Grupos</h1>
<ul>
    @foreach ($grupos as $grupo)
        <li>{{ $grupo->nome }}
            <ul>
                @foreach ($grupo->palavras as $palavra)
                    <li>{{ $palavra->nome }}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>

<h1>Palavras</h1>
<ul>
    @foreach ($palavras as $palavra)
        <li>{{ $palavra->nome }}
            <ul>
                @foreach ($palavra->grupos as $grupo)
                    <li>{{ $grupo->nome }}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
<a href="{{ route('grupos.cadastrar') }}"><button>Adicionar Grupo</button></a>
<a href="{{ route('palavras.cadastrar') }}"><button>Adicionar Palavra</button></a>
<a href="{{ route('jogo.jogo') }}"><button>Entrar No Jogo</button></a>

@endsection