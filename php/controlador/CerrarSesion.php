<?PHP

class CerrarSesion{

	public function __construct(){	
	}


	public function analizar($url){

		session_start();
		unset($_SESSION['login']);
		session_destroy();
		return "../../index.php";

	}

}

	

?>
