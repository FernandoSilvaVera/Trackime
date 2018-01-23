<?PHP

include './series.php';
include './logearse.php';
include './registrarse.php';
include './CerrarSesion.php';

class MainController{

	private $controladores;

	public function __construct($peticion,$url){

		$this->controladores = array();
		$this->controladores["series"] = new Series;
		$this->controladores["logearse"] = new Logearse;
		$this->controladores["registrarse"] = new Registrarse;
		$this->controladores["cerrarSesion"] = new CerrarSesion;

		$this->analizarPeticion($peticion,$url);

	}
	
	private function analizarPeticion($peticion,$url){

		$vista = $this->controladores[$peticion]->analizar($url);

		$this->redirigir($vista);

	}

	private function redirigir($vista){
		header('Location: ' . $vista);
	}

}

$peticion = $_REQUEST["link"];
$url = $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];

new MainController($peticion,$url);

?>
