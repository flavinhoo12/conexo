{{-- resources/views/animais/cadastrar.blade.php --}}

@extends('base')

@section('titulo', 'Cadastrar')

@section('conteudo')
<p>Preencha o formulário</p>

@if($errors->any())
<div>
    <h2>Deu Ruim</h2>
    @foreach($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
</div>
@endif

<form method="post" action="{{ route('palavras.gravar') }}">
    @csrf
    <input type="text" name="nome" placeholder="Palavra" value="{{ old('nome') }}">
    <br>
    <input type="submit" value="Gravar">
</form>
@endsection