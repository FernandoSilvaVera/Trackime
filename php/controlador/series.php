<?PHP

require("../modelo/BBDD.php");

class Series{


	private $bbdd;

	public function __construct(){
		$this->bbdd = new BBDD;
	}

	public function analizar($url){

		$emision = "select nombre,tag,dia_nuevo_cap,capitulos,nota from ANIMES join FECHA where ANIMES.nombre = FECHA.nombre_anime";
		$datosEmision = $this->bbdd->obtener($emision,$this->bbdd->columnaSeries);
		$vista = "./series.php";

		if(!isset($_SESSION))
			session_start();
		
		if(!isset($_SESSION["series"])){
			$_SESSION["series"] = $datosEmision;						            



		}



		$distina_pagina = "localhost/Trackime/php/controlador/front.php?link=series";
		if($url == $distina_pagina)
			$vista = "../vista/series.php";

		return $vista;
		
	}

}

?>
