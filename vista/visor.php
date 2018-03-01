<?php
	require_once("../controlador/visor.php");
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

</head>
<body>

	<!-- Barra de navegación-->
		
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
					<form class="form-inline" action="/action_page.php">
						<input class="form-control" type="text" placeholder="Buscar usuarios o series">
					</form>
					<?php if (isset($_SESSION["login"])): ?>
					<li class="nav-item dropdown">
						<div style="cursor:pointer" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="../images/índice.svg" style="width:32px;"></div>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="./perfil.php">Perfil</a>
							<a class="dropdown-item" href="./logout.php">Administrar Series</a>
							<a class="dropdown-item" href="./logout.php">Cerrar Sesión</a>
						</div>
					</li>
					<?php else: ?>
						<li class="nav-item"> <a class="nav-link" href="./registro.php">Registrarse</a> </li>
						<li class="nav-item"> <a class="nav-link" href="./login.php">Logearse</a> </li>
					<?php endif; ?>
				</ul>
			</div>
		</nav>
	</div>
	
	<!-- Visualización -->

	<br>
	<div class="container">
		<h3 align="center"><?PHP echo $_REQUEST["anime"];?>: Capitulo <?PHP echo $_REQUEST["cap"];?></h3>
 		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="embed-responsive embed-responsive-16by9">
					<iframe scrolling="no" class="embed-responsive-item" src="../images/1.jpg"></iframe>
				</div>
				<br>
			
				<!-- Guardar la serie -->

				<?php if (isset($_SESSION["login"])): ?>
				<div class="container text-right">
					<div class="btn-group">
						<button type="button" class="btn btn-dark">Recomendar</button>
						<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Agregar</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" id="pendiente">como pendiente</a>
							<a class="dropdown-item" id="terminada">como terminada</a>
						</div>
					</div>
				</div>
				<?php endif; ?>
			</div>
			<div class="col-sm-2"></div>
		</div>
  	</div>

	<!-- Comentarios -->

	<br>

	<div class="container">
		<h2 align="center">Comentarios</h2>
		
		<!-- Escribir un comentario -->

		<div class="form-group">
			<label for="exampleTextarea">Escribe un comentario</label>
			<textarea class="form-control" id="comentario" maxlength="255" rows="3"></textarea>
			<br>
			<button type="submit" id="comentar" class="btn btn-primary float-right">Comentar</button>
		</div>

		<br>

		<!-- Mostrar comentarios -->
	
		<?php foreach($comentario as $comentario): ?>
		<div class="media">
			<img class="d-flex mr-3" src="../images/índice.svg"/>
			<div class="media-body">
				<h5 class="mt-0"><?=$comentario->dato["usuario"]?></h5>
				<p><?=$comentario->dato["comentario"] ?></p>
			</div>
		</div>
		<?php endforeach?>
	</div>

</body>
</html>
