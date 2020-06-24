<?php
include 'classes/usuarios.class.php';
$usuario = new Usuario();
//$nome = $usuario->listar( );
//print_r($nome);
?>

<h1>Index Glossario de Libras</h1>

<a href="admin/usuarios.php">Gestão de Usuarios</a>

<table border="1" width="700px">
	<tr>
		<th>ID</th>
		<th>NOME</th>
		<th>EMAIL</th>
		<th>SENHA</th>
		<th>PERMISSÃO</th>
		<th>AÇÕES</th>
	</tr>
	<?php
		$lista = $usuario->listar();
		foreach ($lista as $item):
	?>
	<tr>
		<td><?php echo $item['id']; ?></td>		
		<td><?php echo $item['nome']; ?></td>	
		<td><?php echo $item['email']; ?></td>	
		<td><?php echo $item['senha']; ?></td>	
		<td><?php echo $item['permissao']; ?></td>	
		<td>EDITAR | EXCLUIR</td>
	</tr>
	<?php
		endforeach;
	?>

</table>