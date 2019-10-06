<?php
use App\Destaque;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/cardapio', function () {
    return view('cardapio');
})->name('cardapio');

Route::resource('produtos','ProdutoController');

Route::resource('TipoProduto','TipoProdutoController');

Route::resource('Destaque','DestaqueController');

