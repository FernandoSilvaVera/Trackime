<?PHP
	
	require_once("../controlador/pendientes.php");

	$paginacion = $_SESSION["paginacion"];
	$series = $_SESSION["series"];
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
	<script src="../javascript/imagenes.js"></script>
	<link rel="stylesheet" href="../css/images.css">
</head>
<body>

	<!-- Barra de navegacion -->
	<?php require "./utils/navegacion.php"?>

	<div class="container">
		<div class="row justify-content-center mt-5">

			<!-- Imágen del usuario -->

			<div class="col-sm-4">
				<img style="height:200px;width:200px" src="../images/usuario/<?= $_SESSION["imagen"]?>.png" class="rounded mx-auto d-block" data-toggle="modal" data-target="#cambiarImagen">
				<h2 align="center"><?=$_SESSION["login"] ?></h2>
			</div>

			<!-- Seguidores...etc -->

			<div class="col-sm-8">

				<ul class="nav nav-tabs">
					<li class="nav-item"> <a class="nav-link" href="./perfil.php">Seguidores</a> </li>
					<li class="nav-item"> <a class="nav-link" href="./seguidores.php">Siguiendo</a> </li>
					<li class="nav-item"> <a class="nav-link active" href="./usuarioPendientes.php">Pendientes</a> </li>
					<li class="nav-item"> <a class="nav-link" href="./usuarioTerminadas.php">Terminadas</a> </li>
				</ul>		

				<div class="tab-content">
					<div id="seleccionado" class="container tab-pane active">

						<div class="row mt-2">
							<?php foreach ($series as $serie): ?>
								<div class="col-sm-7 col-md-5 col-lg-4 mt-2">
									<div class="card">
										<a href="./capitulos.php?id=<?= $serie->dato["id"] ?>"><img class="card-img-top" src="../images/<?= $serie->dato["id"]?>.jpg"></a>
										<div class="card-block"><h5 align="center" class="text-bold"><?= $serie->dato["nombre"] ?></h5></div>
									</div>
								</div>
							<?php endforeach?>
						</div>

					</div>
				</div>

			</div>

		</div>
	</div>

	<?PHP require("./utils/modal.php")?>

</body>
</html>
