<?PHP

	require_once("../controlador/series.php");

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
					<form class="form-inline" action="./busqueda.php">
						<input class="form-control" type="text" placeholder="Buscar usuarios o series">
					</form>
					<?php if (isset($_SESSION["login"])): ?>
					<li class="nav-item dropdown">
						<div style="cursor:pointer" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="../images/índice.svg" style="width:32px;"></div>
						<div class="dropdown-menu dropdown-menu-right">
							<a class="dropdown-item" href="./perfil.php">Perfil</a>
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

	<!-- Esta parte es la 'paginacion' En emision / Pendientes / Terminados-->

	<div class="container">
		<br>
		<!-- Pestañas superiores -->
		<ul class="nav nav-tabs">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#seleccionado">Subidas recientes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./emision.php">En emisión</a>
			</li>
			<?php if (isset($_SESSION["login"])): ?>
			<li class="nav-item">
				<a class="nav-link" href="./pendientes.php">Pendientes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="./terminadas.php">Terminadas</a>
			</li>
			<?php endif; ?>
		</ul>

		<!-- Contenido de las pestañas -->

		<div class="tab-content">
			<div id="seleccionado" class="container tab-pane active"><br>
				<div class="row">
					<?php foreach ($series as $serie): ?>
						<div class="col-sm-6 col-md-4 col-lg-3 mt-4">
							<div class="card">
								<a href="./capitulos.php?id=<?= $serie->dato["id"] ?>"><img class="card-img-top" src="../images/<?= $serie->dato["id"]?>.jpg"></a>
								<div class="card-block">
									<h5 align="center" class="text-bold"><?= $serie->dato["nombre"] ?></h5>
								</div>
							</div>
						</div>
					<?php endforeach?>
				</div>

				<br>
			
				<ul align="center" class="pagination">
					<?php foreach ($paginacion as $paginas): ?>
						<?= $paginas?>
					<?php endforeach?>
				</ul>
			</div>
		</div>
	</div>

</body>
</html>
