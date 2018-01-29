<?PHP
	require_once("../controlador/registrarse.php");
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
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form action="./registro.php" method="post">
					<div class="form-group">
						<input class="form-control" id="user" placeholder="Usuario" name="user">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="pwd" placeholder="Contraseña" name="pswd">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" id="pwd" placeholder="Repetir contraseña" name="pswd2">
					</div>
					<button type="submit" class="btn btn-primary">Registrarse</button>
				</form>
			</div>
		</div>
	</div>

</body>
</html>
