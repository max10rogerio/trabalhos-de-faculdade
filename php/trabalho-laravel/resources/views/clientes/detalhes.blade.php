<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Clientes</title>
</head>
<body>
	@foreach ($cliente as $c)
		<h1>{{ $c->nome }}</h1>
		<p>Código: {{ $c->codigo }}</p>
		<p>Email: {{ $c->email }}</p>
		<p>Data Nasc.: {{ $c->data_nascimento }}</p>
		<p>C.P.F: {{ $c->cpf }}</p>
		<p>Telefone: {{ $c->telefone }}</p>
		<p>
			<a href="/clientes">Voltar</a>
		</p>
	@endforeach
</body>
</html>