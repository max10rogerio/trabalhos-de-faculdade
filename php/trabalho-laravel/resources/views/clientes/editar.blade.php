<!DOCTYPE html>
<html>
<head>
	<title>Editar Cliente</title>
</head>
<body>
	<h1>Editar Cliente</h1>
	@if ($errors->any())
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif

	@foreach ($clientes as $c)
	<form action="/clientes/gravar/{{ $c->codigo }}" method="post">
		@csrf
		<p>Nome: <input type="text" name="nome" value="{{ $c->nome }}"></p>
		<p>Email: <input type="text" name="email" value="{{ $c->email }}"></p>
		<p>Data Nasc.: <input type="date" name="data_nascimento" value="{{ $c->data_nascimento }}"></p>
		<p>C.P.F.: <input type="text" name="cpf" value="{{ $c->cpf }}"></p>
		<p>Telefone: <input type="text" name="telefone" value="{{ $c->telefone }}"></p>
		<p><input type="submit" value="Salvar"></p>
	@endforeach
	</form>
</body>
</html>