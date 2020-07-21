<?php
session_start();
include 'inc/header.php';
include '../classes/usuarios.class.php';
$usuario = new Usuario();
//$nome = $usuario->listar( );
//print_r($nome);
?>

<h1>Gestão de Usuários</h1>

<a href="usuarios.php">Adicionar</a>

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
		<td>
			<a href="editar.usuario.php?id=<?php echo $item['id']; ?>">EDITAR |</a>
			<a href="excluir.usuario.php?id=<?php echo $item['id']; ?>">EXCLUIR</a>
		</td>
	</tr>
	<?php
		endforeach;
	?>

</table>