<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Produtos</title>
</head>
<body>
	<h1>Listagem de Produtos</h1>
	@if (session('mensagem'))
		<h2>{{ session('mensagem') }}</h2>
	@endif
	<a href="/produtos/novo">Novo Produto</a>
	<table>
	    <thead>
	        <th>Código</th>
	        <th>Descrição</th>
	        <th>Opções</th>
	    </thead>
	    <tbody>
	        @foreach ($produtos as $produto)
	        <tr>
	            <td>{{ $produto->codigo }}</td>
	            <td>{{ $produto->descricao }}</td>
	            <td>
	            	<a href="/produtos/{{ $produto->codigo }}">Visualizar</a>
	            	<a href="/produtos/editar/{{ $produto->codigo }}">Editar</a>
	            	<a href="/produtos/excluir/{{ $produto->codigo }}">Excluir</a>
            	</td>
	        </tr>
	        @endforeach
	    </tbody>
	</table>

</body>
</html>