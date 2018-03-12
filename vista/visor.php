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

	<!-- Barra de navegacion -->
	<?php require "./utils/navegacion.php"?>

	
	<!-- Visualización -->

	<br>
	<div class="container">
		<h3 align="center"><?=$_REQUEST["anime"]?>: Capitulo <?=$_REQUEST["cap"]?></h3>
 		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<div class="embed-responsive embed-responsive-16by9">
					<video controls>
						  <source src="../images/1.jpg" type="video/mp4">
					</video>
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
			<img class="d-flex mr-3" style="width:64px" src="../images/usuario/<?= $_SESSION["imagen"]?>"/>
			<div class="media-body">
				<h5 class="mt-0"><?=$comentario->dato["usuario"]?></h5>
				<p><?=$comentario->dato["comentario"] ?></p>
			</div>
		</div>
		<?php endforeach?>
	</div>

</body>
</html>
