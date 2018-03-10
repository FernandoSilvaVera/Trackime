<?PHP
	require ("../controlador/busqueda.php");
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

    <!-- Barra de navegacion -->
	<?php require "./utils/navegacion.php"?>

	<br>

	<div class="container">
		<?php foreach ($datos as $serie): ?>
		<div class="row justify-content-center align-items-center mt-4">
			<div class="col-sm-3">
				<div class="card">
					<a href="#"><img class="card-img-top rounded" src="../images/<?=$serie->dato["id"] ?>.jpg"></a>
				</div>
			</div>
			<div class="col-sm-6">
				<h1><?= $serie->dato["nombre"]?></h1>
				<p>Descripcion del anime</p>
				<span class="badge badge-dark">Mecha</span>
				<span class="badge badge-dark">shonnen</span>
				<span class="badge badge-dark">Recuerdon de la vida</span>
				<span class="badge badge-dark">Comedia</span>
			</div>
			<div class="col-sm-3 text-center">
				<button type="button" class="btn btn-dark">Seguir</button>
			</div>
		</div> 
		<?php endforeach?>
	</div>

</body>
</html>
