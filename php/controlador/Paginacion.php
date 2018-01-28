<?PHP

class Paginacion{

	private $bbdd;
	private $inicio;
	private $fin;
	private $max = 12;

	public function __construct(){
		$this->bbdd = new BBDD;
	}

	private function obtenerPaginacion(){

		$id_0 = $_REQUEST["id"];
		$id_1 = $_REQUEST["id"] +1;
		$id_2 = $_REQUEST["id"] +2;

		$devolver = array();
			array_push($devolver,'<li class="page-item disabled"><a class="page-link" href="../controlador/front.php?link=paginacion&id='.($id_0-1).'">Anterior</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="../controlador/front.php?link=paginacion&id='.($id_0-1).'">'.$id_0.'</a></li>');
			array_push($devolver,'<li class="page-item active"><a class="page-link" href="../controlador/front.php?link=paginacion&id='.($id_1-1).'">'.$id_1.'</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="../controlador/front.php?link=paginacion&id='.($id_2-1).'">'.$id_2.'</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="../controlador/front.php?link=paginacion&id='.($id_2-1).'">Siguiente</a></li>');
		return $devolver;
	}

	public function analizar($url){

		$this->inicio = $_REQUEST["id"] * $this->max;
		$this->fin = $this->inicio + $this->max;

		$series= "SELECT nombre,id from ANIMES where id > $this->inicio and id <= $this->fin";
		$obtenerSeries = $this->bbdd->obtener($series,array("nombre","id"));

		if(!isset($_SESSION))
			session_start();
		
		$_SESSION["series"] = $obtenerSeries; 
		$_SESSION["paginacion"] = $this->obtenerPaginacion();
			

		return "/Trackime/php/vista/series.php";

	}
}

?>
