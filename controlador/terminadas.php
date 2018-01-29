<?PHP

require_once("../modelo/BBDD.php");

class Paginacion{

	private $bbdd;
	private $inicio;
	private $fin;
	private $max = 12;

	public function __construct(){
		$this->bbdd = new BBDD;
		$this->inicio = $_REQUEST["id"] * $this->max;
		$this->fin = $this->inicio + $this->max;
		$this->analizar();
	}

	private function obtenerPaginacion(){

		$id_0 = $_REQUEST["id"];
		$id_1 = $_REQUEST["id"] +1;
		$id_2 = $_REQUEST["id"] +2;

		$devolver = array();
			array_push($devolver,'<li class="page-item disabled"><a class="page-link" href="./terminadas.php?id='.($id_0-1).'">Anterior</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="./terminadas.php?id='.($id_0-1).'">'.$id_0.'</a></li>');
			array_push($devolver,'<li class="page-item active"><a class="page-link" href="./terminadas.php?id='.($id_1-1).'">'.$id_1.'</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="./terminadas.php?id='.($id_2-1).'">'.$id_2.'</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="./terminadas.php?id='.($id_2-1).'">Siguiente</a></li>');
		return $devolver;
	}

	private function obtenerPaginacionInicial(){
		$devolver = array();
			array_push($devolver,'<li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>');
			array_push($devolver,'<li class="page-item active"><a class="page-link" href="./terminadas.php?id=0">1</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="./terminadas.php?id=1">2</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="./terminadas.php?id=2">3</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="./terminadas.php?id=1">Siguiente</a></li>');
		return $devolver;
	}

	private function obtenerSeries(){
		$series= "SELECT nombre,id from ANIMES where id > $this->inicio and id <= $this->fin";
		return $this->bbdd->obtener($series,array("nombre","id"));
	}

	public function analizar(){

		if(!isset($_SESSION))
			session_start();

		$_SESSION["series"] = $this->obtenerSeries(); 

		if(empty($_REQUEST["id"]))
			$_SESSION["paginacion"] = $this->obtenerPaginacionInicial();
		else
			$_SESSION["paginacion"] = $this->obtenerPaginacion();

	}
}

new Paginacion;

?>
