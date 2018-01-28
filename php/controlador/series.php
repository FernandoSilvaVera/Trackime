<?PHP

require("../modelo/BBDD.php");

class Series{

	private $bbdd;

	public function __construct(){
		$this->bbdd = new BBDD;
	}

	private function obtenerEnEmision(){
		$emision = "select nombre,tag,dia_nuevo_cap,capitulos,nota from ANIMES join FECHA where ANIMES.nombre = FECHA.nombre_anime and FECHA.mes_final = 'En emision'";
		return $this->bbdd->obtener($emision,$this->bbdd->columnaSeries);
	}

	private function obtenerIniciales(){
		$series= "SELECT nombre,id from ANIMES where id >= 1 and id <= 12";
		return $this->bbdd->obtener($series,array("nombre","id"));
	}

	private function obtenerPaginacionInicial(){
		$devolver = array();
			array_push($devolver,'<li class="page-item disabled"><a class="page-link" href="#">Anterior</a></li>');
			array_push($devolver,'<li class="page-item active"><a class="page-link" href="../controlador/front.php?link=paginacion&id=0">1</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="../controlador/front.php?link=paginacion&id=1">2</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="../controlador/front.php?link=paginacion&id=2">3</a></li>');
			array_push($devolver,'<li class="page-item"><a class="page-link" href="../controlador/front.php?link=paginacion&id=1">Siguiente</a></li>');
		return $devolver;

	}

	public function analizar($url){

		if(!isset($_SESSION))
			session_start();
		
		if(!isset($_SESSION["emision"]))
			$_SESSION["emision"] = $this->obtenerEnEmision();

		if(!isset($_SESSION["series"]))
			$_SESSION["series"] = $this->obtenerIniciales();

		if(!isset($_SESSION["paginacion"]))
			$_SESSION["paginacion"] = $this->obtenerPaginacionInicial();


		return "../vista/series.php";

	}

}

?>
