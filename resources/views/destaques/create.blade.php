<?php
use App\Produto;
?>

@extends('shared.adminLayout')


@section('content')
<div class="row">
    <div class="col-lg-12 py-4 margin-tb">
        <div class="pull-left">
            <h3>Criar Novo Produto</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('produtos.index') }}"> Voltar</a>
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
   
<form action="{{ route('Destaque.store') }}" method="POST">
    @csrf
    @method('POST')
     <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Produto:</strong><br />
                <select class="form-control" name="produtoId" style="width: 150px">
                    @foreach(Produto::All() as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <hr />
                <button type="submit" class="btn btn-primary">Adicionar aos destaques</button>
        </div>
    </div>
   
</form>

@endsection