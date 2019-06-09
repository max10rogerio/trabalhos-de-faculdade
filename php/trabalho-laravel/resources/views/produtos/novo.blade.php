<!DOCTYPE html>
<html>
<head>
	<title>Novo Produto</title>
</head>
<body>
	<h1>Novo Produto</h1>
	@if ($errors->any())
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif

	<form action="/produtos/salvar" method="post">
		@csrf
		<p>Descrição: <input type="text" name="descricao" value="{{ old('descricao') }}"></p>
		<p>Valor: <input type="text" name="valor" value="{{ old('valor') }}"></p>
		<p>Quantidade: <input type="text" name="quantidade" value="{{ old('quantidade') }}"></p>
		<p><input type="submit" value="Salvar"></p>
	</form>
</body>
</html>