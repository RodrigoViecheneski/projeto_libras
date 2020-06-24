<?php
require_once '../classes/usuarios.class.php';

$objUs = new Usuario();

if(isset($_POST['btCadastrar'])){
	if($objUs->adicionar($_POST) == 'ok'){
	/*if(!empty($_POST['email'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$permissao = $_POST['permissao'];

		$objUs->adicionar($email, $nome, $senha, $permissao);*/

		header('Location: usuarios.php');
	}else{
		echo '<script type="text/javascript">alert("Erro ao cadastrar!");';
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Gestão de usuários</title>
	<meta charset="utf-8">
</head>
<body>
	<form name="formCadUs" action="" method="POST">
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
