<?PHP

	session_start();

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

	<br>

	<div class="container">
		<div class="row justify-content-center align-items-center mt-4">
			<div class="col-sm-3">
				<div class="card">
					<a href="#"><img class="card-img-top rounded" src="../images/93.jpg"></a>
				</div>
			</div>
			<div class="col-sm-6">
				<h1>Nombre del anime</h1>
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
		<div class="row justify-content-center align-items-center mt-4">
			<div class="col-sm-3">
				<div class="card">
					<a href="#"><img class="card-img-top rounded" src="../images/104.jpg"></a>
				</div>
			</div>
			<div class="col-sm-6">
				<h1>Nombre del anime</h1>
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
		<div class="row justify-content-center align-items-center mt-4">
			<div class="col-sm-3">
				<div class="card">
					<a href="#"><img class="card-img-top rounded" src="../images/85.jpg"></a>
				</div>
			</div>
			<div class="col-sm-6">
				<h1>Nombre del anime</h1>
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
		<div class="row justify-content-center align-items-center mt-4">
			<div class="col-sm-3">
				<div class="card">
					<a href="#"><img class="card-img-top rounded" src="../images/61.jpg"></a>
				</div>
			</div>
			<div class="col-sm-6">
				<h1>Nombre del anime</h1>
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
		<div class="row justify-content-center align-items-center mt-4">
			<div class="col-sm-3">
				<div class="card">
					<a href="#"><img class="card-img-top rounded" src="../images/117.jpg"></a>
				</div>
			</div>
			<div class="col-sm-6">
				<h1>Nombre del anime</h1>
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
	</div>

</body>
</html>
