<?php
include '../classes/area.class.php';
$area = new Area();

if(!empty($_POST['id'])){
	$nome_area = $_POST['nome_area'];
	$descricao_area = $_POST['descricao_area'];
	$id = $_POST['id'];

	if(!empty($nome_area)){
		$area->editar($nome_area, $descricao_area, $id);

	}
	header("Location: gestao.area.php");
}