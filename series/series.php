<!DOCTYPE html>
<html lang="en">
<head>
	<title>ANIME TRACKER</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="./css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
     	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
</head>
<body>

<?PHP
include './tablas.php';
$cabecera = new CuerpoColumna(array("Anime","Tag","Día capítulo","Capítulo","Nota"),null,null);
?>

	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<a class="navbar-brand" href="javascript:void(0)">AnimeTracker</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navb">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="./series/series.php">Series</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="javascript:void(0)">Datos</a>
					</li>
				</ul>
			</div>
		</nav>
	</div>


	<!-- Esta parte es la 'paginacion' En emision / Pendientes / Terminados-->

	<div class="container">
		<br>

		<!-- Pestañas superiores -->

		<ul class="nav nav-tabs" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#home">En emision</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#menu1">Pendientes</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#menu2">Terminados</a>
			</li>
		</ul>

		<!-- Contenido de las pestañas -->

		<div class="tab-content">

			<!-- En emision-->
			<div id="home" class="container tab-pane active"><br>
				<table class="table table-striped">
					<thead align="center">
						<tr>
							<?PHP $cabecera->crearFila();?>
						</tr>
					</thead>
					<tbody align="center">
						<tr>
							<?PHP $cabecera->crearCuerpo();?>
						</tr>
					</tbody>
				</table>
			</div>

			<!-- Pendientes-->
			<div id="menu1" class="container tab-pane fade"><br>
				<h3>Menu 1</h3>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>

			<!-- Terminados-->
			<div id="menu2" class="container tab-pane fade"><br>
				<h3>Menu 2</h3>
				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
			</div>
		</div>
	</div>




</body>
</html>
