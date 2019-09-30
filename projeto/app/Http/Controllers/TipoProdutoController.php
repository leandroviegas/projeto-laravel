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
        $title = "Tipo de produto";
        $tiposProdutos = TipoProduto::latest()->paginate(5);
  
        return view('TipoProduto.index',compact('tiposProdutos'),compact("title"))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tipo de produto";
        return view('TipoProduto.create',compact("title"));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = "Tipo de produto";
        $request->validate([
            'nome' => 'required',
        ]);
  
        TipoProduto::create($request->all());
   
        return redirect()->route('TipoProduto.index',compact("title"))
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
        $title = "Tipo de produto";
        return view('TipoProduto.show',compact('TipoProduto'),compact("title"));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoProduto $TipoProduto)
    {
        $title = "Tipo de produto";
        return view('TipoProduto.edit',compact('TipoProduto'),compact("title"));
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
        $title = "Tipo de produto";
        $request->validate([
            'nome' => 'required',
        ]);
  
        $TipoProduto->update($request->all());
  
        return redirect()->route('TipoProduto.index',compact("title"))
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
        $title = "Tipo de produto";
        $TipoProduto->delete();
  
        return redirect()->route('TipoProduto.index',compact("title"))
                        ->with('success','Tipo de produto apagado com sucesso');
    }
}