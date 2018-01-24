<?PHP

class Logearse{

	public function __construct(){	
	}

	public function analizar($url){

		$bbdd = new BBDD;
		$usuarios = $bbdd->obtener("select * from USUARIOS",$bbdd->usuarios);
		$tiene_acceso = false;

		if(!isset($_SESSION))
			session_start();

		if(!isset($_SESSION["login"]))
			foreach($usuarios as $buscar)
				if($buscar->dato["usuario"] === $_POST["user"])
					if($buscar->dato["contrasena"] == $_POST["pswd"]){
						$_SESSION["login"] = $buscar->dato["usuario"];
						$tiene_acceso = true;	
					}

		return $tiene_acceso ?"../../index.php" : "../vista/login.php";

	}

}

	

?>
