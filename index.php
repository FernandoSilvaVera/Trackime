<?PHP
	if(!isset($_SESSION))
		session_start();		
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>ANIME TRACKER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="./index.php">AnimeTracker</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navb">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="./vista/series.php">Series</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<form class="form-inline" action="./vista/busqueda.php" method="get">
						<input class="form-control" type="text" name="busqueda" placeholder="Buscar usuarios o series">
					</form>

					<?php if (isset($_SESSION["login"])): ?>
					<li class="nav-item dropdown">
						<div style="cursor:pointer" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="./images/usuario/<?=$_SESSION["imagen"]?>.png" style="width:32px;"></div>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="./vista/perfil.php">Perfil</a>
							<a class="dropdown-item" href="./vista/logout.php">Cerrar Sesión</a>
						</div>
					</li>
					<?php else: ?>
					<li class="nav-item"> <a class="nav-link" href="./vista/registro.php">Registrarse</a> </li>
					<li class="nav-item"> <a class="nav-link" href="./vista/login.php">Logearse</a> </li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>
	</div>
</body>
</html>
