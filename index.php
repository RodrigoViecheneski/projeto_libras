<?php
session_start();
require 'classes/conexao.class.php';
include 'classes/usuarios.class.php';

if(!isset($_SESSION['logado'])){
	header("Location: admin/login.php");
	exit;
}



$usuario = new Usuario();
//$nome = $usuario->listar( );
//print_r($nome);
?>


