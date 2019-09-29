@extends('TipoProduto.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 py-4 margin-tb">
            <div class="pull-left">
                <h2>Tipo de Produto - {{ $TipoProduto->nome }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('TipoProduto.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $TipoProduto->nome }}
            </div>
            <hr />
        </div>
    </div>
@endsection