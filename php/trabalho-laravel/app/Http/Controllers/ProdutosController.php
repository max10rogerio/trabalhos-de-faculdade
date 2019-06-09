<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
  // Método inicial do Controller Produtos
  public function index() {
  	$produtos = DB::table('produtos')
      ->select('codigo', 'descricao')
      ->orderBy('descricao', 'asc')
      ->get();

		return view('produtos.listar', ['produtos' => $produtos]);		
  }

  // Método utilizado para detalhar um determinado item
  public function show($codigo) {
  	$produto = DB::table('produtos')->where('codigo', $codigo)->get();

  	return view('detalhes', ['produto' => $produto]);
  }

  // Mostra a view de cadastro de um novo produto.
  public function create() {
  	return view('produtos.novo');
  }

  // Valida e grava as informações do cadastro do novo produto.
  public function store(Request $request) {
    $request->validate([
      'descricao'  => 'required',
      'valor'      => 'required|numeric',
      'quantidade' => 'required'
    ]);

    $produto = [
    	'descricao'  => $request->input('descricao'),
    	'preco' => $request->input('valor'),
    	'quantidade' => $request->input('quantidade')
    ];

    DB::table('produtos')->insert($produto);

    return redirect('/produtos')->with('mensagem', 'Produto Cadastrado com Sucesso!');
  }

  public function edit($codigo) {
    $produto = DB::table('produtos')->where('codigo', $codigo)->get();

    return view('produtos.editar', ['produtos' => $produto]);
  }

  public function update(Request $request, $codigo) {
    $request->validate([
      'descricao'  => 'required',
      'valor'      => 'required|numeric',
      'quantidade' => 'required'
    ]);

    $produto = [
    	'codigo'     => $codigo,
    	'descricao'  => $request->input('descricao'),
    	'preco'      => $request->input('valor'),
    	'quantidade' => $request->input('quantidade')
    ];

    DB::table('produtos')->where('codigo', $codigo)->update($produto);

    return redirect('/produtos')->with('mensagem', 'Produto Alterado!');
  }

  // Exclusão de um produto cadastrado.
  public function destroy($codigo) {
    DB::table('produtos')->where('codigo', $codigo)->delete();
    
    return redirect('/produtos')->with('mensagem', 'Produto '. $codigo .' Excluído!');
  }
}
