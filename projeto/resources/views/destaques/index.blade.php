@extends('shared.adminLayout')

<?php
use App\TipoProduto;
use App\Produto;
?>
@section('content')
    
    <div class="row">
        <div class="col-lg-12 margin-tb py-4">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <!--<a class="btn btn-success" href="{{ route('Destaque.create') }}"> Novo Produto</a>-->
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
            <th class="text-center">nome</th>
            <th class="text-center">Descrição</th>
            <th width="150px" class="text-center">Preço</th>
            <th class="text-center">Tipo de produto</th>
            <th class="text-center" width="280px">Ações</th>
        </tr>
        </thead>
        @foreach ($Destaque as $destaques)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td class="text-center">@if(Produto::Find($destaques->produtoId) != null){{ Produto::Find($destaques->produtoId)->nome ?? "?" }}@else ? @endif</td>
            <td class="text-center">@if(Produto::Find($destaques->produtoId) != null){{ mb_strimwidth(Produto::Find($destaques->produtoId)->descricao, 0, 40, '...' ?? "?") }}@else ? @endif</td>
            <td class="text-center">@if(Produto::Find($destaques->produtoId) != null)R$ {{ str_replace('.',',',Produto::Find($destaques->produtoId)->preco) ?? "?" }}@else ? @endif</td>
            <td class="text-center">@if(Produto::Find($destaques->produtoId) != null){{ TipoProduto::Find(Produto::Find($destaques->produtoId)->tipoProdutoId)->nome ?? "?" }}@else ? @endif</td>
            
            <td class="text-center">
                <!--<form action="{{ route('Destaque.destroy',$destaques->id) }}" method="POST">-->
   
                    <a class="btn btn-success" href="{{ route('Destaque.show',$destaques->id) }}">Visualizar</a>
    
                    <a class="btn btn-warning" href="{{ route('Destaque.edit',$destaques->id) }}">Editar</a>
                    <!--
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>-->
            </td>
        </tr>
        @endforeach
    </table>
  </div>
    {!! $Destaque->links() !!}
      
@endsection