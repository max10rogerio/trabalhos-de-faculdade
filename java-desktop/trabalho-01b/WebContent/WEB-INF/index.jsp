<%@ page language="java" contentType="text/html; charset=UTF-8"
	pageEncoding="UTF-8"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c"%>
<%@ page import="java.util.ArrayList"%>
<%@ page import="bean.Cidade"%>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Trabahlo douglas</title>
</head>
<body>
	<h4>Insira os dados no formulário:</h4>
	<form action='InserirCidade' method="POST">
		<input type='text' name='codigo' placeholder='codigo' required>
		<input type='text' name='cidade' placeholder='nome cidade' required>
		<input type='text' name='uf' placeholder='nome cidade' maxlength='2'
			size='2' required> <input type='submit' value='enviar'
			onclick='submit'>
	</form>
	<p>
		<strong>
			Listagem:
		</strong>
	</p>
	<table border=1>
		<tr>
			<th>ID</th>
			<th>Nome</th>
			<th>UF</th>
			<%
				ArrayList<Cidade> cidades = crud.Crud.listar();
				pageContext.setAttribute("cidades", cidades);
				System.out.println(cidades);
			%>
		</tr>
		<c:forEach items="${cidades}" var="cidade">
			<tr>
				<td><c:out value="${cidade.getId()}" /></td>
				<td><c:out value="${cidade.getCidade()}" /></td>
				<td><c:out value="${cidade.getUf()}" /></td>
			</tr>
		</c:forEach>
	</table>
	<form action="DeletarCidade" method="POST">
	<label for="codigo">Código da cidade para deletar</label>
		<select name="codigo">
			<c:forEach items="${cidades}" var="cidade">
				<option value="${cidade.getId()}"><c:out value="${cidade.getId()}" /></option>
			</c:forEach>
		</select>
		<input type="submit" value="enviar">
	</form>
</body>
</html>



