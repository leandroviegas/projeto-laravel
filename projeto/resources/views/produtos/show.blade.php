@extends('shared.adminLayout')

@section('content')
    <div class="row">
        <div class="col-lg-12 py-4 margin-tb">
            <div class="pull-left">
                <h2>Produto - {{ $produto->nome }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                {{ $produto->nome }}
            </div>
            <hr />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                {{ $produto->descricao }}
            </div>
            <hr />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço:</strong>
                R$ {{ str_replace('.',',',$produto->preco) }}
            </div>
            <hr />
        </div>
    </div>
@endsection