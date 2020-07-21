<?php
session_start();
include 'inc/header.php';
include '../classes/area.class.php';
$area = new Area();

if(!empty($_GET['id'])){
	$id = $_GET['id'];
	$info = $area->busca($id);
	if(empty($info['nome_area'])){
		header("Location: gestao.area.php");
		exit;
	}
}else{
	header("Location: gestao.area.php");
	exit;
}

?>

<h1>EDITAR ÁREA</h1>

	<form action="editar.area.submit.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
		<label>Nome Área:</label><br><br>
		<input type="text" name="nome_area" required="required" value="<?php echo $info['nome_area']; ?>" ><br><br>
		<label>Descrição Área:</label><br><br>
		<input type="text" name="descricao_area" required="required" value="<?php echo $info['descricao_area']; ?>"><br><br>
		<input type="submit" value="Salvar">
</form>