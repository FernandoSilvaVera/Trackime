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

	<div class="container">
		<?php foreach($datos as $anime):?>
		<div class="row justify-content-center align-items-center mt-4">
			<div class="col-sm-3">
				<div class="card">
					<a href="./capitulos.php?id=<?=$anime->dato["id"]?>"><img class="card-img-top rounded" src="../images/<?=$anime->dato["id"] ?>.jpg"></a>
				</div>
			</div>
			<div id="<?=$anime->dato["id"]?>" style="cursor:pointer" class="col-sm-7 descripcion">
				<h1><?= $anime->dato["nombre"]?></h1>
				<p>Descripcion del anime</p>
				<?php foreach($genero[$anime->dato["nombre"]] as $aux):?>
				<span class="badge badge-dark"><?=$aux->dato["genero"]?></span>
				<?php endforeach;?>
			</div>
			<div class="col-sm-2 text-center">
				<button type="button" class="btn btn-dark">Seguir</button>
			</div>
		</div> 
		<?php endforeach;?>
	</div>

</body>
</html>
