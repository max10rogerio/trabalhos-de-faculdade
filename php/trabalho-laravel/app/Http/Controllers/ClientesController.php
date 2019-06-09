<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
  public function index() {
  	$clientes = DB::table('clientes')
      ->select()
      ->orderBy('codigo', 'asc')
      ->get();

		return view('clientes.listar', ['clientes' => $clientes]);		
  }

  public function show($codigo) {
  	$cliente = DB::table('clientes')->where('codigo', $codigo)->get();

  	return view('clientes.detalhes', ['cliente' => $cliente]);
  }

  public function create() {
  	return view('clientes.novo');
  }

  public function store(Request $request) {
    $request->validate([
      'nome'  => 'required',
      'email'      => 'required|email',
      'data_nascimento' => 'required'
    ]);

    $cliente = [
    	'nome'  => $request->input('nome'),
    	'email' => $request->input('email'),
        'data_nascimento' => $request->input('data_nascimento'),
        'cpf' => $request->input('cpf'),
        'telefone' => $request->input('telefone')
    ];

    DB::table('clientes')->insert($cliente);

    return redirect('/clientes')->with('mensagem', 'Cliente cadastrado com Sucesso!');
  }

  public function edit($codigo) {
    $cliente = DB::table('clientes')->where('codigo', $codigo)->get();

    return view('clientes.editar', ['clientes' => $cliente]);
  }

  public function update(Request $request, $codigo) {
    $request->validate([
        'nome'  => 'required',
        'email'      => 'required|email',
        'data_nascimento' => 'required'
    ]);

    $cliente = [
    	'nome'  => $request->input('nome'),
    	'email' => $request->input('email'),
      'data_nascimento' => $request->input('data_nascimento'),
      'cpf' => $request->input('cpf'),
      'telefone' => $request->input('telefone')
    ];

    DB::table('clientes')->where('codigo', $codigo)->update($cliente);

    return redirect('/clientes')->with('mensagem', 'Cliente Alterado!');
  }

 public function destroy($codigo) {
    DB::table('clientes')->where('codigo', $codigo)->delete();
    
    return redirect('/clientes')->with('mensagem', 'Cliente '. $codigo .' Excluído!');
  }
}
