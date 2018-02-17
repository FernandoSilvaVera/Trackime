<?php

require_once("../modelo/BBDD.php");

class Paginacion{

	protected const TAM_PAGINAS = 12;
	protected $paginaActual;
	protected $maxPaginas;
	protected $paginas;
	protected $bbdd;

	protected function __construct(){
		session_start();
		$this->paginaActual = empty($_REQUEST["id"]) ?0 :$_REQUEST["id"];
		$this->paginas = array();
		$this->bbdd = new BBDD;
	}

	protected function totalPaginas($from){
		$numFilas = $this->bbdd->obtener("SELECT count(*) as max $from", array("max"));
		$this->maxPaginas = ceil($numFilas[0]->dato["max"] / $this::TAM_PAGINAS);
	}

	protected function obtenerPaginacion($vista){
		for($i=0; $i<$this->maxPaginas; $i++)
			if($i == $this->paginaActual)
				array_push($this->paginas,'<li class="page-item active"><a class="page-link" href="./'.$vista.'?id='.$i.'">'.($i+1).'</a></li>');
			else
				array_push($this->paginas,'<li class="page-item"><a class="page-link" href="./'.$vista.'?id='.$i.'">'.($i+1).'</a></li>');
	}

	protected function obtenerSerie($consulta){
		$comienzo = $this->paginaActual * $this::TAM_PAGINAS;
		$rango = "$consulta[select] $consulta[from] limit $comienzo," . $this::TAM_PAGINAS;
		return $this->bbdd->obtener($rango,array("nombre","id"));
	}
}

?>
