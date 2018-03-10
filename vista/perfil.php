<?PHP
	if(!isset($_SESSION))
		session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
     	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>

	<!-- Barra de navegacion -->
	<?php require "./utils/navegacion.php"?>

	<br>

	<div class="container">
		<!-- Pestañas superiores -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#seleccionado">Perfil</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#otraCosa">Seguidores</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#otraCosa">Siguiendo</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#otraCosa">Estadisticas</a>
			</li>
		</ul>

		<!-- Contenido de las pestañas -->

		<div class="tab-content">
			<br>
			<div id="seleccionado" class="container tab-pane active">

			</div>
		</div>
	</div>


</body>
</html>
