<!DOCTYPE html>
<html>
<head>
	<title>Editar Produto</title>
</head>
<body>
	<h1>Editar Produto</h1>
	@if ($errors->any())
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	@endif

	@foreach ($produtos as $p)
	<form action="/produtos/gravar/{{ $p->codigo }}" method="post">
		@csrf
		<p>Descrição: <input type="text" name="descricao" value="{{ $p->descricao }}"></p>
		<p>Valor: <input type="text" name="valor" value="{{ $p->preco }}"></p>
		<p>Quantidade: <input type="text" name="quantidade" value="{{ $p->quantidade }}"></p>
		<p><input type="submit" value="Salvar"></p>
		@endforeach
	</form>
</body>
</html>