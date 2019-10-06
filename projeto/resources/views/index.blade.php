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
    <title>Página Inicial - Milani</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet">
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
            <h1 class="slogan">Lanchonete Milani há mais de 10 anos servindo com carinho e qualidade!</h1>
            <div class="line verde">
            </div>
        </div>
    </div>
    <div class="pos-banner">
        <div class="container border">
            <div class="pb-4 pt-3">
                <h1 class="text-center">Os mais pedidos</h1>
                <div class="line vermelho">
                </div>
            </div>
            <div class="imagens border px-2">
                <div class="row px-3 pt-2">
                    <div class="col-md nopadding">

                        <h3 class="text-align-center">@if($Destaque[0] !=
                            null){{ Produto::Find($Destaque[0]->produtoId)->nome ?? ""}}@endif</h3>
                        <div class="sobre-pos-vermelha">
                        </div>
                        <img class="mais-pedidos-img"
                            src="@if($Destaque[0] != null){{ Produto::Find($Destaque[0]->produtoId)->image ?? '' }}@endif"
                            width="100%" />
                    </div>
                    <div class="col-md nopadding">
                        <h3 class="text-align-center">@if($Destaque[1] !=
                            null){{ Produto::Find($Destaque[1]->produtoId)->nome ?? ""}}@endif</h3>
                        <div class="sobre-pos-verde">
                        </div>
                        <img class="mais-pedidos-img"
                            src="@if($Destaque[1] != null){{ Produto::Find($Destaque[1]->produtoId)->image ?? '' }}@endif"
                            width="100%" />
                    </div>
                    <div class="col-md nopadding">
                        <h3 class="text-align-center">@if($Destaque[2] !=
                            null){{ Produto::Find($Destaque[2]->produtoId)->nome ?? ""}}@endif</h3>
                        <div class="sobre-pos-vermelha">
                        </div>
                        <img class="mais-pedidos-img"
                            src="@if($Destaque[2] != null){{ Produto::Find($Destaque[2]->produtoId)->image ?? '' }}@endif"
                            width="100%" />
                    </div>
                </div>
                <div class="row px-3 pb-2">
                    <div class="col-md nopadding">
                        <h3 class="text-align-center">@if($Destaque[3] !=
                            null){{ Produto::Find($Destaque[3]->produtoId)->nome ?? ""}}@endif</h3>
                        <div class="sobre-pos-verde">
                        </div>
                        <img class="mais-pedidos-img"
                            src="@if($Destaque[3] != null){{ Produto::Find($Destaque[3]->produtoId)->image ?? '' }}@endif"
                            width="100%" />
                    </div>
                    <div class="col-md nopadding">
                        <h3 class="text-align-center">@if($Destaque[4] !=
                            null){{ Produto::Find($Destaque[4]->produtoId)->nome ?? ""}}@endif</h3>
                        <div class="sobre-pos-vermelha">
                        </div>
                        <img class="mais-pedidos-img"
                            src="@if($Destaque[4] != null){{ Produto::Find($Destaque[4]->produtoId)->image ?? '' }}@endif"
                            width="100%" />
                    </div>
                    <div class="col-md nopadding">
                        <h3 class="text-align-center">@if($Destaque[5] !=
                            null){{ Produto::Find($Destaque[5]->produtoId)->nome ?? ""}}@endif</h3>
                        <div class="sobre-pos-verde">
                        </div>
                        <img class="mais-pedidos-img"
                            src="@if($Destaque[5] != null){{ Produto::Find($Destaque[5]->produtoId)->image ?? '' }}@endif"
                            width="100%" />
                    </div>
                </div>
            </div>
            <div class="text-center my-4">
                <a class="btn btn-success font-weight-bold text-light">Cardápio</a>
            </div>
            <hr />
            <div class="pt-2 pb-4">
                <h1 class="text-center">Opções</h1>
                <div class="line vermelho">
                </div>
            </div>
            <div class="imagens border my-4">
                <div class="row py-2 px-4">
                    <div class="col-md nopadding">
                        <h2 class="text-align-center">Porções</h2>
                        <div class="sobre-pos-amarelo">
                        </div>
                        <img src="img/cardeiras.png" width="100%" />
                    </div>
                    <div class="col-md nopadding">
                        <h2 class="text-align-center">Lanches</h2>
                        <div class="sobre-pos-verde">
                        </div>
                        <img src="img/cardeiras.png" width="100%" />
                    </div>
                </div>
            </div>
            <hr class="my-5" />
        </div>
        <div class="banner-convite">
            <h2 class="text-align-center">Venha conhecer nosso ambiente aconchegante</h2>
            <img src="img/cardeiras.png" />
        </div>
        <div class="greenClothe align-middle">
            <h4 class="text-align-center">10 Anos de mercado</h4>
            <div class="greenTexture">
            </div>
        </div>
        <div class="greenTexture last">
        </div>
        <div class="py-4">

        </div>
    </div>
</body>

</html>