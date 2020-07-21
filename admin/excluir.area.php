<?php
include '../classes/area.class.php';
$area = new Area();

if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$area->excluir($id);
	header("Location: gestao.area.php");
}else{
	echo '<script type="text/javascript">alert("Erro ao excluir!");</script>';
	header("Location: gestao.area.php");
}