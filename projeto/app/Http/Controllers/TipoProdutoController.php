<?php
  
namespace App\Http\Controllers;
  
use App\TipoProduto;
use Illuminate\Http\Request;
  
class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposProdutos = TipoProduto::latest()->paginate(5);
  
        return view('TipoProduto.index',compact('tiposProdutos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TipoProduto.create');
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
        ]);
  
        TipoProduto::create($request->all());
   
        return redirect()->route('TipoProduto.index')
                        ->with('success','Tipo de produto criado com sucesso.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(TipoProduto $TipoProduto)
    {
        return view('TipoProduto.show',compact('TipoProduto'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoProduto $TipoProduto)
    {
        return view('TipoProduto.edit',compact('TipoProduto'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoProduto $TipoProduto)
    {
        $request->validate([
            'nome' => 'required',
        ]);
  
        $TipoProduto->update($request->all());
  
        return redirect()->route('TipoProduto.index')
                        ->with('success','Alterações realizadas com sucesso');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoProduto $TipoProduto)
    {
        $TipoProduto->delete();
  
        return redirect()->route('TipoProduto.index')
                        ->with('success','Tipo de produto apagado com sucesso');
    }
}