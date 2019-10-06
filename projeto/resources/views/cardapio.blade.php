<!DOCTYPE html>
<html lang="pt-br">
<?php
use App\Destaque;
use App\Produto;
use App\TipoProduto;

$Destaque = destaque::latest()->paginate(6);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cardápio - Milani</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/cardapio.css" rel="stylesheet">
</head>

<body>
    <img src="img/paginaInicial.png" class="bakcground">
    <div class="container">
        <nav class="my-navbar">
            <ul>
                <li><a href="{{ route('index') }}">Página Inicial</a></li>
                <li><a href="{{ route('cardapio') }}">Cardápio</a></li>
                <li><a>Sobre</a></li>
                <li><a>Contato</a></li>
            </ul>
        </nav>
        <div class="slogan-box">
            <h1 class="slogan">Cardápio</h1>
            <div class="line verde">
            </div>
        </div>
    </div>
    <div class="pos-banner">
        <div class="container border">
            <div class="row">
                @foreach(tipoProduto::All() as $tipoProduto)
                <div class="col-md-6 p-4">
                    <div class="border rounded">
                        <div class="border border-warning rounded">
                            <div class="text-center py-1 text-light bg-danger border border-warning rounded">
                                <h2>{{ $tipoProduto->nome }}</h2>
                            </div>
                        </div>
                        <div class="product-box">
                            @foreach(produto::All() as $produto)
                            @if($produto->tipoProdutoId == $tipoProduto->id)
                            <div class="px-4 py-2 border-bottom">
                                <h5>{{$produto->nome}} - R$ {{ str_replace('.',',',$produto->preco) }}</h5>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>