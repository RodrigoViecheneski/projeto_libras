<?php
include '../classes/usuarios.class.php';

$objUs = new Usuario();

//if(isset($_POST['btCadastrar'])){
	//if($objUs->adicionar($) == 'ok'){
	if(!empty($_POST['email'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$permissao = $_POST['permissao'];

		$objUs->adicionar($email, $nome, $senha, $permissao);

		header('Location: usuarios.php');
	}else{
		echo '<script type="text/javascript">alert("Email já cadastrado!");</script>';
	}


?>