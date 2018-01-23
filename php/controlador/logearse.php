<?PHP

class Logearse{

	public function __construct(){	
	}


	public function analizar($url){

		if(!isset($_SESSION))
			session_start();
		
		if(!isset($_SESSION["login"])){
			$_SESSION["login"] = "Fernando";
		}

		return "../vista/login.php";
	}

}

	

?>
