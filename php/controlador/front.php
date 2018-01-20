<?PHP

include './login.php';

class MainController{

	private $controladores;

	public function __construct(){

		$this->controladores = array();
		$this->controladores["login.do"] = new Login;

		$this->analizarPeticion();

	}
	
	private function analizarPeticion(){

		$peticion = "login.do";

		$vista = $this->controladores[$peticion]->analizar();
		$this->redirigir($vista);

	}

	private function redirigir($lugar){
		header('Location: ' . $lugar);
	}

}

new MainController;

?>
