<?PHP

include './series.php';
include './logearse.php';
include './registrarse.php';
include './CerrarSesion.php';
include './Paginacion.php';

class MainController{

	private $controladores;

	public function __construct($url){
		$this->controladores = array();
		$this->controladores["series"] = new Series;
		$this->controladores["logearse"] = new Logearse;
		$this->controladores["registrarse"] = new Registrarse;
		$this->controladores["cerrarSesion"] = new CerrarSesion;
		$this->controladores["paginacion"] = new Paginacion;

		$this->analizarPeticion($url);
	}
	
	private function analizarPeticion($url){
		$vista = $this->controladores[$_REQUEST["link"]]->analizar($url);
		header('Location: ' . $vista);	
	}

}

$url = $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI];

new MainController($url);

?>
