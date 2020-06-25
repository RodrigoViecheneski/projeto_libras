
<!DOCTYPE html>
<html>
<head>
	<title>Gestão de usuários</title>
	<meta charset="utf-8">
</head>
<body>
	<h1>Adicionar usuários</h1>
	<form action="usuario.submit.php" method="POST">
		<label>Nome:</label><br><br>
		<input type="text" name="nome" required="required"><br><br>
		<label>Email:</label><br><br>
		<input type="mail" name="email" required="required"><br><br>
		<label>Senha:</label><br><br>
		<input type="password" name="senha" required="required"><br><br>
		<label>Permissão:</label><br><br>
		<input type="text" name="permissao" required="required"><br><br>

		<input type="submit" name="btCadastrar" value="Cadastrar">
	</form>

</body>
</html>
