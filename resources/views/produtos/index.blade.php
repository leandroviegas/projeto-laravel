@extends('shared.adminLayout')

<?php
use App\TipoProduto;
?>
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb py-4">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('produtos.create') }}"> Novo Produto</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div style="width:100%;overflow-x: auto">
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nome</th>
            <th class="text-center">Descrição</th>
            <th width="150px" class="text-center">Preço</th>
            <th class="text-center">Tipo de produto</th>
            <th class="text-center" width="280px">Ações</th>
        </tr>
        </thead>
        @foreach ($Produto as $product)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td class="text-center">{{ $product->nome ?? "?" }}</td>
            <td class="text-center">{{ mb_strimwidth($product->descricao, 0, 40, '...' ?? "?") }}</td>
            <td class="text-center">R$ {{ str_replace('.',',',$product->preco) ?? "?" }}</td>
            <td class="text-center">{{ TipoProduto::Find($product->tipoProdutoId)->nome ?? "?" }}</td>
            <td>
                <form action="{{ route('produtos.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-success" href="{{ route('produtos.show',$product->id) }}">Visualizar</a>
    
                    <a class="btn btn-warning" href="{{ route('produtos.edit',$product->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  </div>
    {!! $Produto->links() !!}
      
@endsection