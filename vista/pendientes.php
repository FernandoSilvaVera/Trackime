<?PHP

	require_once("../controlador/pendientes.php");

	if(!isset($_SESSION))
		session_start();

	$paginacion = $_SESSION["paginacion"];
	$series = $_SESSION["series"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ANIME TRACKER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
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
				</ul>';
			</div>
		</nav>
	</div>

	<!-- Esta parte es la 'paginacion' En emision / Pendientes / Terminados-->

	<div class="container">
		<br>
		<!-- Pestañas superiores -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link" href="./series.php">Subidas recientes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./emision.php">En emisión</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#seleccionado">Pendientes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./terminadas.php">Terminadas</a>
			</li>

		</ul>

		<!-- Contenido de las pestañas -->

		<div class="tab-content">
			<div id="seleccionado" class="container tab-pane active"><br>
				<div class="row">
				<?PHP	

				for($i=0; $i<count($series); $i++)
					echo			
						'<div class="col-sm-6 col-md-4 col-lg-3 mt-4">' .
							'<div class="card">' .
								'<img class="card-img-top" src="../images/'.$series[$i]->dato["id"].'.jpg">' .
								'<div class="card-block">' .
									'<h5 align="center" class="text-bold">' . $series[$i]->dato["nombre"] . '</h5> '.
								'</div>'.
							'</div>' . 
						'</div>';
					?>
				</div>

				<br>
			
				<ul align="center" class="pagination">
					<?PHP
					for($i=0; $i<count($paginacion); $i++)
						echo $paginacion[$i];
					?>
				</ul>
			</div>
		</div>
	</div>

</body>
</html>
