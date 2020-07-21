<?php
include '../classes/area.class.php';

$objArea = new Area();

//if(isset($_POST['btCadastrar'])){
	//if($objUs->adicionar($) == 'ok'){
	if(!empty($_POST['nome_area'])){
		$nome_area = $_POST['nome_area'];
		$descricao_area = $_POST['descricao_area'];

		$objArea->adicionar($nome_area, $descricao_area);

		header('Location: gestao.area.php');
	}else{
		echo '<script type="text/javascript">alert("Área já cadastrada!");</script>';
	}


?>