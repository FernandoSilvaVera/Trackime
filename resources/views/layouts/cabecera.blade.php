<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<div class="container">
		<a class="navbar-brand" href="./index">AnimeTracker</a>
		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navb">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"><a class="nav-link" href="./vista/series">Animes</a></li>
				<li class="nav-item"><a class="nav-link" href="./vista/aleatorio">Aleatorio</a></li>
			</ul>
			<ul class="navbar-nav ml-auto">
				<form class="form-inline" action="./vista/busqueda" method="get">
					<input class="form-control" type="text" name="busqueda" placeholder="Buscar usuarios o series">
				</form>
			</ul>
		</div>
	</div>
</nav>
