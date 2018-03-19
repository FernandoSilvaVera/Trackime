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
	<script src="../javascript/ajax.js"> </script>
</head>
<body>

    <!-- Barra de navegacion -->
	<?php require "./utils/navegacion.php"?>

	<!-- Genera los usuarios-->

	<div class="container">

		<?php foreach($usuarios as $usuario):?>

			<div class="row justify-content-center align-items-center mt-4">

				<!-- Imagen del usuario-->

				<div class="col-sm-3" align="center">
					<div class="col-sm-9">
						<a href="./perfil?usuario=<?=$usuario->dato["usuario"]?>"><img class="card-img-top rounded" src="../images/usuario/<?=$usuario->dato["imagen"] ?>.png"></a>
					</div>
				</div>

				<!-- Descripcion del usuario-->

				<div id="<?=$usuario->dato["usuario"]?>" style="cursor:pointer" class="col-sm-7 perfil">
					<h1><?= $usuario->dato["usuario"]?></h1>
					<p>Descripcion del usuario</p>
				</div>
	
				<!-- Boton para seguir al usuario-->

				<div class="col-sm-2 text-center">
					<button type="button" class="btn btn-dark">Seguir</button>
				</div>

			</div> 

		<?php endforeach;?>

	</div>

	<!-- Genera los animes-->

	<div class="container">

		<?php foreach($animes as $anime):?>

			<div class="row justify-content-center align-items-center mt-4">

				<!-- Imagen del anime-->

				<div class="col-sm-3" align="center">
					<a href="./capitulos.php?id=<?=$anime->dato["id"]?>"><img class="card-img-top rounded" src="../images/<?=$anime->dato["id"] ?>.jpg"></a>
				</div>

				<!-- Descripcion del anime-->

				<div id="<?=$anime->dato["id"]?>" style="cursor:pointer" class="col-sm-7 descripcion">
					<h1><?= $anime->dato["nombre"]?></h1>
					<p>Descripcion del anime</p>
					<?php foreach($genero[$anime->dato["nombre"]] as $aux):?>
					<span class="badge badge-dark"><?=$aux->dato["genero"]?></span>
					<?php endforeach;?>
				</div>

				<!-- Boton para agregar el anime-->

				<div class="col-sm-2 text-center">
					<button type="button" class="btn btn-dark">Agregar</button>
				</div>

			</div> 

		<?php endforeach;?>

	</div>

</body>
</html>
