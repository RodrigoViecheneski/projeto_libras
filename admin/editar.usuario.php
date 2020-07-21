<?php
include '../classes/usuarios.class.php';
$usuario = new Usuario();

if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$info = $usuario->busca($id);
	if(empty($info['email'])){
		header("Location: gestao.usuarios.php");
		exit;
	}
}else{
	header("Location: gestao.usuarios.php");
	exit;
}

?>

<h1>EDITAR USUÁRIO</h1>

	<form action="editar.usuario.submit.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
		<label>Nome:</label><br><br>
		<input type="text" name="nome" required="required" value="<?php echo $info['nome']; ?>" ><br><br>
		<label>Email:</label><br><br>
		<input type="mail" name="email" required="required" value="<?php echo $info['email']; ?>"><br><br>
		<label>Senha:</label><br><br>
		<input type="password" name="senha" required="required" value="<?php echo $info['senha']; ?>"><br><br>
		<label>Permissão:</label><br><br>
		<input type="text" name="permissao" required="required" value="<?php echo $info['permissao']; ?>"><br><br>

		<input type="submit" value="Salvar">
</form>