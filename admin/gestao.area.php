<?php
session_start();
include 'inc/header.php';
include '../classes/area.class.php';
$area = new Area();

?>

<h1>Gestão de Área</h1>
<div class="jumbotron">
<a href="area.php">Adicionar</a>

<table border="1" width="700px">
	<tr>
		<th>ID</th>
		<th>NOME ÁREA</th>
		<th>DESCRIÇÃO ÁREA</th>
		<th>AÇÕES</th>
	</tr>
	<?php
		$lista = $area->listar();
		foreach ($lista as $item):
	?>
	<tr>
		<td><?php echo $item['id']; ?></td>		
		<td><?php echo $item['nome_area']; ?></td>	
		<td><?php echo $item['descricao_area']; ?></td>	
		<td>
			<a href="editar.area.php?id=<?php echo $item['id']; ?>">EDITAR |</a>
			<a href="excluir.area.php?id=<?php echo $item['id']; ?>">EXCLUIR</a>
		</td>
	</tr>
	<?php
		endforeach;
	?>

</table>
</div>