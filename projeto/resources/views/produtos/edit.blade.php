<?php
use App\TipoProduto;
?>

@extends('shared.adminLayout')


@section('content')
<div class="row">
    <div class="col-lg-12 py-4 margin-tb">
        <div class="pull-left">
            <h2>Editar Produto</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
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

<form action="{{ route('produtos.update',$produto->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong>
                <input type="text" name="nome" value="{{ $produto->nome }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descrição:</strong>
                <textarea class="form-control" style="height:150px" name="descricao"
                    placeholder="Descrição">{{ $produto->descricao }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Preço:</strong>
                <input style="width: 150px" value="{{ $produto->preco }}" max="1000" min="0" class="form-control"
                    type='currency' name="preco" placeholder="Preço">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tipo de Produto:</strong><br />
                <select class="form-control" name="tipoProdutoId" style="width: 150px">
                    @foreach(TipoProduto::All() as $tiposProdutos)
                    @if($tiposProdutos->id == $produto->tipoProdutoId)
                    <option value="{{ $tiposProdutos->id }}" selected>{{ $tiposProdutos->nome }}</option>
                    @else
                    <option value="{{ $tiposProdutos->id }}">{{ $tiposProdutos->nome }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <input type="file" accept="image/*" onchange=" previewFile()" name="image" class="form-control file-image">
                <img src="{{ $produto->image }}" class="img" height="200" alt="Prévia da imagem...">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <hr />
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </div>

</form>

<script>
    function previewFile() {
        var preview = document.querySelector('.img');
        var file = document.querySelector('.file-image').files[0];
        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    }
    var currencyInput = document.querySelector('input[type="currency"]');
    var currency = 'BRL'; // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

    currencyInput.addEventListener('focus', onFocus);
    currencyInput.addEventListener('blur', onBlur);

    function localStringToNumber(s) {
        return Number(String(s).replace(/[^0-9.-]+/g, ""));
    }

    function onFocus(e) {
        var value = (e.target.value).replace(',', '.');
        e.target.value = value ? localStringToNumber(value) : ''
    }

    function onBlur(e) {
        var value = (e.target.value).replace(',', '.');

        const options = {
            maximumFractionDigits: 2,
            currency: currency,
            style: "currency",
            currencyDisplay: "symbol"
        }

        e.target.value = value
            ? localStringToNumber(value).toLocaleString(undefined, options)
            : ''
    }
</script>
@endsection