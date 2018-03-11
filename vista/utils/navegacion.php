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
				<form class="form-inline" action="./busqueda.php" method="get">
					<input class="form-control" type="text" name="busqueda" placeholder="Buscar usuarios o series">
				</form>
				<?php if (isset($_SESSION["login"])): ?>
				<li class="nav-item dropdown">
					<div style="cursor:pointer" class="nav-link dropdown-toggle" data-toggle="dropdown"><img src="../images/usuario/<?= $_SESSION["imagen"] ?>" style="width:32px;"></div>
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
