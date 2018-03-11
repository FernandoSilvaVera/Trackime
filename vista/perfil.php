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
	<script src="../javascript/imagenes.js"></script>
	<link rel="stylesheet" href="../css/images.css">
</head>
<body>

	<!-- Barra de navegacion -->
	<?php require "./utils/navegacion.php"?>

	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-sm-4">
				<img style="height:200px;width:200px" src="../images/usuario/<?= $_SESSION["imagen"]?>.png" class="rounded mx-auto d-block" data-toggle="modal" data-target="#cambiarImagen">
			</div>
			<div class="col-sm-8">
							
			</div>
		</div>
	</div>

	<!-- MODAL -->

	<div class="container">
		<div class="modal fade" id="cambiarImagen">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<h4 class="modal-title">Editar imágen de perfil</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<!-- Modal body -->
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-3">
								<img style="height:100px;width:100px;cursor:pointer" src="../images/usuario/jibril.png" class="rounded nueva-imagen" id="jibril">
							</div>
							<div class="col-sm-3">
								<img style="height:100px;width:100px;cursor:pointer" src="../images/usuario/sagiri.png" class="rounded nueva-imagen" id="sagiri">
							</div>
							<div class="col-sm-3">
								<img style="height:100px;width:100px;cursor:pointer" src="../images/usuario/shuvi.png" class="rounded nueva-imagen" id="shuvi">
							</div>
							<div class="col-sm-3">
								<img style="height:100px;width:100px;cursor:pointer" src="../images/usuario/jibril.png" class="rounded nueva-imagen" id="loli">
							</div>
						</div>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button type="button" class="btn btn-success cambiar-imagen" data-dismiss="modal">Actualizar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</div>
			</div>
		</div>
	</div>




</body>
</html>
