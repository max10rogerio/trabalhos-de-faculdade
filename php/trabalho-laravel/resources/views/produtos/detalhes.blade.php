<!DOCTYPE html>
<html>
<head>
	<title>Listagem de Produtos</title>
</head>
<body>
@foreach ($produto as $p)
	<h1>{{ $p->descricao }}</h1>
	<p>Código: {{ $p->codigo }}</p>
	<p>Preço: {{ $p->preco }}</p>
	<p>Quantidade: {{ $p->quantidade }}</p>
	<p><a href="/produtos">Voltar</a></p>
@endforeach
</body>
</html>