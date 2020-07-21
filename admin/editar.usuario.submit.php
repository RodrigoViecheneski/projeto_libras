<?php
include '../classes/usuarios.class.php';
$usuario = new Usuario();

if(!empty($_POST['id'])){
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$permissao = $_POST['permissao'];
	$id = $_POST['id'];

	if(!empty($email)){
		$usuario->editar($nome, $email, $senha, $permissao, $id);

	}
	header("Location: gestao.usuarios.php");
}