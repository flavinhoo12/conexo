@extends('base')

@section('titulo', 'Jogo - Conexo')
    <head>
        {{-- <link rel="stylesheet" href="../css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> --}}
    </head>
@section('conteudo')
<body>
    <div class="container">
        <h1>Jogo Conexo</h1>
        <button id="sortear" class="btn-primary">Sortear Palavras</button>
        <div class="card-grid" id="card-grid"></div>
        <div id="mensagem"></div>
        <div id="tentativas"></div>
        <div id="resultado"></div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>

@endsection

