@extends('shared.adminLayout')
<?php
use App\Produto;
use App\TipoProduto;
?>

@section('content')
    <div class="row">
        <div class="col-lg-12 py-4 margin-tb">
            <div class="pull-left">
                <h2>Produto - @if(Produto::Find($Destaque->produtoId) != null){{ Produto::Find($Destaque->produtoId)->nome ?? "?" }}@else ? @endif</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('Destaque.index') }}"> Voltar</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                @if(Produto::Find($Destaque->produtoId) != null){{ Produto::Find($Destaque->produtoId)->nome ?? "?" }}@else ? @endif
            </div>
            <hr />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                @if(Produto::Find($Destaque->produtoId) != null){{ mb_strimwidth(Produto::Find($Destaque->produtoId)->descricao, 0, 40, '...' ?? "?") }}@else ? @endif
            </div>
            <hr />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço:</strong>
                @if(Produto::Find($Destaque->produtoId) != null)R$ {{ str_replace('.',',',Produto::Find($Destaque->produtoId)->preco) ?? "?" }}@else ? @endif
            </div>
            <hr />
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo de produto:</strong>
                @if(Produto::Find($Destaque->produtoId) != null){{ TipoProduto::Find(Produto::Find($Destaque->produtoId)->tipoProdutoId)->nome ?? "?" }}@else ? @endif
            </div>
            <hr />
        </div>
    </div>
@endsection