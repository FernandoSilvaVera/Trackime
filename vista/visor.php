<?PHP
	if(!isset($_SESSION))
		session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Librerias externas -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

	<!--Propias -->

	<script src="../javascript/ajax.js"></script>
	<script src="../javascript/visor.js"></script>

</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="../index.php">AnimeTracker</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navb">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="./series.php">Series</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
				<?php
				if (isset($_SESSION["login"])){
					echo '<li class="nav-item"> <a class="nav-link" href="./panel.php">Panel de Usuario</a> </li>';
					echo '<li class="nav-item"> <a class="nav-link" href="./logout.php">Cerrar Sesion</a> </li>';
				}else{
					echo '<li class="nav-item"> <a class="nav-link" href="./registro.php">Registrarse</a> </li>';
					echo '<li class="nav-item"> <a class="nav-link" href="./login.php">Logearse</a> </li>';
				}
				?>
				</ul>
			</div>
		</nav>
	</div>
	
	<!-- Parte de visualización -->

	<br>	
	<div class="container">
		<h3 align="center"><?PHP echo $_REQUEST["anime"];?>: Capitulo <?PHP echo $_REQUEST["cap"];?></h3>
 		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe class="embed-responsive-item" src="#"></iframe>
				</div>
				<?php
				if (isset($_SESSION["login"]))
				echo '
				<div class="container text-right">
					<div class="btn-group">
						<button type="button" class="btn btn-dark">Recomendar</button>
						<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Agregar</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" id="agregar" href="#">como pendiente</a>
							<a class="dropdown-item" href="#">como terminada</a>
						</div>
					</div>
				</div>';
				?>
			</div>
			<div class="col-sm-2"></div>
		</div>
  	</div>

</body>
</html>