<?PHP

require_once("../modelo/BBDD.php");

class Paginacion{

	private $bbdd;
	private const TAM_PAGINAS = 12;
	private $paginaActual;

	public function __construct(){
		session_start();
		$this->bbdd = new BBDD;
		$this->usuario = $_SESSION["login"];
		$this->analizar();
	}

	private function totalPaginas(){
		$this->paginaActual = empty($_REQUEST["id"]) ?0 :$_REQUEST["id"];
		$max = 'select count(*) as max from CUSTOM join ANIMES where CUSTOM.nombre_anime = ANIMES.nombre and CUSTOM.estado = "pendiente" and CUSTOM.usuario="'.$this->usuario.'"';
		$numFilas = $this->bbdd->obtener($max,array("max"));
		return ceil($numFilas[0]->dato["max"] / $this::TAM_PAGINAS);
	}

	private function obtenerPaginacion(){
		$devolver = array();
		$max = $this->totalPaginas();
		for($i=0; $i<$max; $i++)
			if($i == $this->paginaActual)
				array_push($devolver,'<li class="page-item active"><a class="page-link" href="./series.php?id='.$i.'">'.($i+1).'</a></li>');
			else
				array_push($devolver,'<li class="page-item"><a class="page-link" href="./series.php?id='.$i.'">'.($i+1).'</a></li>');
		return $devolver;
	}

	private function obtenerSerie(){
		$comienzo = $this->paginaActual * $this::TAM_PAGINAS;
		$rango = "select ANIMES.id,ANIMES.nombre 
				from CUSTOM join ANIMES 
				where CUSTOM.nombre_anime = ANIMES.nombre and CUSTOM.estado='pendiente' and CUSTOM.usuario='$this->usuario'
				limit $comienzo," . $this::TAM_PAGINAS;
		return $this->bbdd->obtener($rango,array("nombre","id"));
	}

	public function analizar(){
		$_SESSION["paginacion"] = $this->obtenerPaginacion();
		$_SESSION["series"] = $this->obtenerSerie();
	}
}

new Paginacion;

?>
