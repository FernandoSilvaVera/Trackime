<?PHP

require_once("../modelo/BBDD.php");

class Paginacion{

	private $bbdd;
	private const TAM_PAGINAS = 12;
	private $paginaActual;

	public function __construct(){
		$this->bbdd = new BBDD;
		$this->analizar();
	}




	private function totalPaginas(){
		$this->paginaActual = empty($_REQUEST["id"]) ?0 :$_REQUEST["id"];
		$max = 'select count(*) as max from CUSTOM join ANIMES where CUSTOM.nombre_anime = ANIMES.nombre and CUSTOM.estado = "pendiente"';
		$numFilas = $this->bbdd->obtener($max,array("max"));
		return ceil($numFilas[0]->dato["max"] / $this::TAM_PAGINAS);
	}

	private function obtenerPaginacion(){
		$devolver = array();
		for($i=0; $i<$this->totalPaginas(); $i++)
			if($i == $this->paginaActual)
				array_push($devolver,'<li class="page-item active"><a class="page-link" href="./pendientes.php?id='.$i.'">'.($i+1).'</a></li>');
			else
				array_push($devolver,'<li class="page-item"><a class="page-link" href="./pendientes.php?id='.$i.'">'.($i+1).'</a></li>');
		return $devolver;
	}

	private function obtenerSerie(){
		$comienzo = $this->paginaActual * $this::TAM_PAGINAS;
		$rango = "select ANIMES.id,ANIMES.nombre from CUSTOM join ANIMES where CUSTOM.nombre_anime = ANIMES.nombre and CUSTOM.estado='pendiente' limit $comienzo," . $this::TAM_PAGINAS;
		return $this->bbdd->obtener($rango,array("nombre","id"));
	}

	public function analizar(){
		if(!isset($_SESSION))
			session_start();

		$_SESSION["paginacion"] = $this->obtenerPaginacion();
		$_SESSION["series"] = $this->obtenerSerie();
	}
}

new Paginacion;

?>
