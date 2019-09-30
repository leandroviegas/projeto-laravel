@extends('shared.adminLayout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 py-4 margin-tb">
            <div class="pull-left">
                <h2>Editar Tipo Produto - {{ $TipoProduto->nome }}</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('TipoProduto.index') }}"> Voltar</a>
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
  
    <form action="{{ route('TipoProduto.update',$TipoProduto->id) }}" method="post">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" value="{{ $TipoProduto->nome }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <hr />
              <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </div>
   
    </form>
@endsection