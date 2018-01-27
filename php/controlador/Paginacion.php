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

		$series= "SELECT nombre,tag,dia_nuevo_cap,capitulos,nota 
				from 
				ANIMES join FECHA 
				where ANIMES.nombre = FECHA.nombre_anime 
				and 
				ANIMES.id >= $this->inicio
				and 
				ANIMES.id < $this->fin";
		$obtenerSeries = $this->bbdd->obtener($series,$this->bbdd->columnaSeries);

		if(!isset($_SESSION))
			session_start();
		
		$_SESSION["series"] = $obtenerSeries; 

		return "/Trackime/php/vista/series.php";

	}
}

?>
