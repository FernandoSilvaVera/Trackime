<?PHP

class CerrarSesion{

	public function __construct(){	
		$this->analizar();
	}

	public function analizar(){
		session_start();
		unset($_SESSION['login']);
		session_destroy();
		header("Location: /Trackime");
	}

}

new CerrarSesion;

?>
