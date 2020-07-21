<!DOCTYPE html>
<html>
<head>
	<title>Gestão de Área</title>
</head>
<body>
	<h1>Cadastro Área</h1>
	<form action="area.submit.php" method="POST">
		<label>Nome Área:</label><br><br>
		<input type="text" name="nome_area" required="required"><br><br>
		<label>Descrição Área:</label><br><br>
		<input type="text" name="descricao_area" required="required"><br><br>
		<input type="submit" value="Cadastrar">
	</form>
</body>
</html>