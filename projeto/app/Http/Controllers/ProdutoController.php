<?php
  
namespace App\Http\Controllers;
  
use App\Produto;
use App\TipoProduto;
use Illuminate\Http\Request;
  
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Produto = produto::latest()->paginate(5);
  
        return view('produtos.index',compact('Produto'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required'
        ]);

        $preco = substr(trim(str_replace(",",".", $request->input('preco')),"R$"), 1);
        $request->merge(['preco' => $preco]);
        produto::create($request->all());
   
        return redirect()->route('produtos.index')
                        ->with('success','Produto criado com sucesso.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $product
     * @return \Illuminate\Http\Response
     */
    public function show(produto $produto)
    {
        return view('produtos.show',compact('produto'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(produto $produto)
    {
        return view('produtos.edit',compact('produto'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
            'tipoProdutoId' => 'required'
        ]);
        
        $preco = substr(trim(str_replace(",",".", $request->input('preco')),"R$"), 1);
        $request->merge(['preco' => $preco]);

        $produto->update($request->all());
  
        return redirect()->route('produtos.index')
                        ->with('success','Alterações realizadas com sucesso');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
  
        return redirect()->route('produtos.index')
                        ->with('success','Produto apagado com sucesso');
    }
}