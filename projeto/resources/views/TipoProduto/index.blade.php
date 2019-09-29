@extends('TipoProduto.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb py-4">
            <div class="pull-left">
                <h2></h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('TipoProduto.create') }}"> Novo tipo de produto</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>nome</th>
            <th width="280px">Ações</th>
        </tr>
        </thead>
        @foreach ($tiposProdutos as $tipo)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tipo->nome }}</td>
            <td>
                <form action="{{ route('TipoProduto.destroy',$tipo->id) }}" method="POST">
   
                    <a class="btn btn-success" href="{{ route('TipoProduto.show',$tipo->id) }}">Visualizar</a>
    
                    <a class="btn btn-warning" href="{{ route('TipoProduto.edit',$tipo->id) }}">Editar</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Apagar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $tiposProdutos->links() !!}
      
@endsection