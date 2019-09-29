@extends('TipoProduto.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 py-4 margin-tb">
        <div class="pull-left">
            <h3>Criar novo tipo de produto</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('TipoProduto.index') }}"> Voltar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Dados inválidos.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('TipoProduto.store') }}" method="POST">
    @csrf
    @method('POST')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
        </div>        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <hr />
                <button type="submit" class="btn btn-primary">Novo Tipo de Produto</button>
        </div>
    </div>
   
</form>

@endsection