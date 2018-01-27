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
		$series= "SELECT nombre,tag,dia_nuevo_cap,capitulos,nota 
				from 
				ANIMES join FECHA 
				where ANIMES.nombre = FECHA.nombre_anime 
				and 
				ANIMES.id >= 1 
				and 
				ANIMES.id <= 12";
		return $this->bbdd->obtener($series,$this->bbdd->columnaSeries);
	}

	public function analizar($url){

		if(!isset($_SESSION))
			session_start();
		
		if(!isset($_SESSION["emision"]))
			$_SESSION["emision"] = $this->obtenerEnEmision();

		if(!isset($_SESSION["series"]))
			$_SESSION["series"] = $this->obtenerIniciales();

		return "../vista/series.php";

	}

}

?>
