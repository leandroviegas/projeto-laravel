<!DOCTYPE html>
<html>
<head>
    <title>{{ $title." - " ?? "" }}Lanchonete Milani</title>
    <link src="/img/resized_logo_millani.jpg" rel="icon" type="imagem/jpeg"  />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
</header>
<!-- Image and text -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #790000;">
<div class="container">
  <a class="navbar-brand" href="{{ route('index') }}"><img width="40px" src="/img/resized_logo_millani.jpg" /></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      @if($title == "Produto")
      <li class="nav-item active">
      @else
      <li class="nav-item">
      @endif
        <a class="nav-link" href="{{ route('produtos.index') }}">Produto</a>
      </li>
      @if($title == "Tipo de produto")
      <li class="nav-item active">
      @else
      <li class="nav-item">
      @endif
        <a class="nav-link" href="{{ route('TipoProduto.index') }}">Tipos de produtos</a>
      </li>
      @if($title == "Destaque")
      <li class="nav-item active">
      @else
      <li class="nav-item">
      @endif
        <a class="nav-link" href="{{ route('Destaque.index') }}">Destaques</a>
      </li>
    </ul>
  </div>
  </div>
</nav>
</header>
<div class="container">
    @yield('content')
</div>
   
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>