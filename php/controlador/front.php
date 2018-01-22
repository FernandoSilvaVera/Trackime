<?PHP

include './series.php';

class MainController{

	private $controladores;

	public function __construct($peticion,$url){

		$this->controladores = array();
		$this->controladores["series"] = new Series;
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
