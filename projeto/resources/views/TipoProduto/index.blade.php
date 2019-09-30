@extends('shared.adminLayout')

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
            <th class="text-center">nome</th>
            <th class="text-center" width="280px">Ações</th>
        </tr>
        </thead>
        @foreach ($tiposProdutos as $tipoProduto)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td class="text-center">{{ $tipoProduto->nome ?? "?" }}</td>
            <td>
                <form action="{{ route('TipoProduto.destroy',$tipoProduto->id) }}" method="POST">
   
                    <a class="btn btn-success" href="{{ route('TipoProduto.show',$tipoProduto->id) }}">Visualizar</a>
    
                    <a class="btn btn-warning" href="{{ route('TipoProduto.edit',$tipoProduto->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  </div>
    {!! $tiposProdutos->links() !!}
      
@endsection