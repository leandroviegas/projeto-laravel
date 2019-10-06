<?php
  
namespace App\Http\Controllers;
  
use App\Destaque;
use Illuminate\Http\Request;
  
class DestaqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Destaque";
        $Destaque = destaque::latest()->paginate(6);
        return view('destaques.index',compact('Destaque'),compact('title'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Destaque";
        return view('destaques.create',compact('title'));
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = "Destaque";
        $request->validate([
            'produtoId' => 'required',
        ]);

        Destaque::create($request->all());
   
        return redirect()->route('Destaque.index')
                        ->with('success','Produto criado com sucesso.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Destaque $Destaque)
    {
        $title = "Destaque";
        return view('destaques.show',compact('Destaque'),compact('title'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Destaque $Destaque)
    {
        $title = "Destaque";
        return view('destaques.edit',compact('Destaque'),compact('title'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destaque $Destaque)
    {
        $title = "Destaque";
        $request->validate([
            'produtoId' => 'required'
        ]);

        $Destaque->update($request->all());
  
        return redirect()->route('Destaque.index')
                        ->with('success','Alterações realizadas com sucesso');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Destaque $Destaque)
    {
        $title = "Destaque";
        $produto->delete();
  
        return redirect()->route('Destaque.index')
                        ->with('success','Produto apagado com sucesso');
    }
}