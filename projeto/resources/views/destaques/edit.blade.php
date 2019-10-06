<?php
use App\Produto;
?>

@extends('shared.adminLayout')


@section('content')
<div class="row">
    <div class="col-lg-12 py-4 margin-tb">
        <div class="pull-left">
            <h3>Editar Produto</h3>
        </div>
        <div class="pull-right">
            <a class="btn btn-info" href="{{ route('Destaque.index') }}"> Voltar</a>
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
   
    <form action="{{ route('Destaque.update',$Destaque->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Produto:</strong><br/>
                    <select class="form-control" name="produtoId" style="width: 150px">
                    <option value="0" selected>Vazio</option>
                        @foreach(Produto::All() as $produto)
                            @if(Produto::Find($Destaque->produtoId)->id != null)
                                @if(Produto::Find($Destaque->produtoId)->id == $produto->id)
                                <option value="{{ $produto->id }}" selected>{{ $produto->nome }}</option>
                                @else
                                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                @endif
                            @else
                                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <hr />
                    <button type="submit" class="btn btn-primary">Editar nos destaques</button>
            </div>
        </div>
    
    </form>

@endsection