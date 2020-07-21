<?php
include '../classes/usuarios.class.php';
$usuario = new Usuario();

if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$usuario->excluir($id);
	header("Location: gestao.usuarios.php");
}else{
	echo '<script type="text/javascript">alert("Erro ao excluir!");</script>';
	header("Location: gestao.usuarios.php");
}