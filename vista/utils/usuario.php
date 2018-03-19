<div class="col-sm-4 text-center">

	<!-- Si estas con tu cuenta -->
	<?php if($_SESSION["login"] != $usuario[0]->dato["usuario"]):?>
		<img style="height:200px;width:200px" src="../images/usuario/<?= $usuario[0]->dato["imagen"]?>.png" class="rounded mx-auto d-block">
	<?php else:?>
		<img style="height:200px;width:200px" src="../images/usuario/<?= $usuario[0]->dato["imagen"]?>.png" class="rounded mx-auto d-block" data-toggle="modal" data-target="#cambiarImagen">
	<?php endif?>


	<h2 align="center"><?=$usuario[0]->dato["usuario"]?></h2>

	<!-- Si es la cuenta de otra persona -->
	<?php if($_SESSION["login"] != $usuario[0]->dato["usuario"]):?>
		<button type="button" class="btn btn-primary seguir">Seguir</button>
	<?php endif?>


</div>
