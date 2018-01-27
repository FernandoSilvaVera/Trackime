<?PHP

class Paginacion{

	private $bbdd;
	private $inicio;
	private $fin;
	private $max = 12;

	public function __construct(){
		$this->bbdd = new BBDD;
	}

	public function analizar($url){

		$this->inicio = $_REQUEST["id"] * $this->max;
		$this->fin = $this->inicio + $this->max;

		$series= "SELECT nombre,id from ANIMES where id > $this->inicio and id <= $this->fin";
		$obtenerSeries = $this->bbdd->obtener($series,array("nombre","id"));

		if(!isset($_SESSION))
			session_start();
		
		$_SESSION["series"] = $obtenerSeries; 

		return "/Trackime/php/vista/series.php";

	}
}

?>
