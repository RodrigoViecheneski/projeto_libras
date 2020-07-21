<!DOCTYPE html>
<?php require '../classes/conexao.class.php'?>
<html>
<head>
	<title>Administrativo Glossário de Libras</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a href="gestao.usuarios.php" class="navbar-brand">Glossário de Libras</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<?php if(isset($_SESSION['logado']) && !empty($_SESSION['logado'])):?>
				<li><a href="index.php">Página inicial administrativo</a></li>
				<li><a href="sair.php">Sair</a></li>
			<?php else: ?>
				<li><a href="usuarios.php"></a>Cadastre-se</li>
				<li><a href="login.php">Login</a></li>
			<?php endif; ?>
		</ul>
	</div>
</nav>
