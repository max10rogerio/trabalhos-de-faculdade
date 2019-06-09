<?php

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
Route::get('/', function(){
  return view('home');
});

// Produtos
Route::get('/produtos', 'ProdutosController@index');
Route::get('/produtos/novo', 'ProdutosController@create');
Route::post('/produtos/salvar', 'ProdutosController@store');
Route::post('/produtos/gravar/{codigo}', 'ProdutosController@update');
Route::get('/produtos/{codigo}', 'ProdutosController@show');
Route::get('/produtos/editar/{codigo}', 'ProdutosController@edit');
Route::get('/produtos/excluir/{codigo}', 'ProdutosController@destroy');

// Produtos
Route::get('/clientes', 'ClientesController@index');
Route::get('/clientes/novo', 'ClientesController@create');
Route::post('/clientes/salvar', 'ClientesController@store');
Route::post('/clientes/gravar/{codigo}', 'ClientesController@update');
Route::get('/clientes/{codigo}', 'ClientesController@show');
Route::get('/clientes/editar/{codigo}', 'ClientesController@edit');
Route::get('/clientes/excluir/{codigo}', 'ClientesController@destroy');

// Route 404
Route::fallback(function() {
  return redirect('/');
});

