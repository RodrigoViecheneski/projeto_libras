<?php
session_start();
require '../classes/conexao.class.php';
include '../classes/usuarios.class.php';

if(!isset($_SESSION['logado'])){
	header("Location: login.php");
	exit;
}



$usuario = new Usuario();
//$nome = $usuario->listar( );
//print_r($nome);
?>

<h1>Index Admin Glossario de Libras</h1>

<a href="gestao.usuarios.php">Gestão de Usuarios</a><br/>
<a href="gestao.area.php">Gestão de Área</a><br/>