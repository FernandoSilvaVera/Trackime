<?PHP
	require_once("../controlador/capitulos.php");
	$capitulos = new Capitulos;
	$serie = $capitulos->getCapitulos();
	$nombre = $serie[0]->dato["nombre"];
	$capitulos = $serie[0]->dato["capitulos"];
	$id = $serie[0]->dato["id"];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Trackime</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

	<!-- Barra de navegacion -->
	<?php require "./utils/navegacion.php"?>

	<!-- Lista capitulos -->

	<br>

	<div class="container">
 		<div class="row">
			<div class="col-sm-7">
					<h3 align="center">Listado de capítulos</h3>
					<table class="table table-hover">
						<tbody>
						<?php
							for($i=$capitulos; $i>0; $i--){
								echo "<tr>";
									echo "<td><a href='./visor.php?anime=$nombre&cap=$i'>$nombre</a></td>";
									echo "<td>$i</td>";
								echo "</tr>";
							}
						?>
						</tbody>
					</table>
			</div>
			<div align="center" class="col-sm-5">
					<img src="../images/<?=$serie[0]->dato["id"]?>.jpg" class="img-thumbnail" width="304" height="236">	
					<h5><?=$nombre?></h5>
					<p align="left">	
						Lorem Ipsum is simply dummy text of the printing and typesetting industry.			
						Lorem Ipsum is simply dummy text of the printing and typesetting industry.
					</p>
			</div>
		</div>
	</div>
	

</body>
</html>
