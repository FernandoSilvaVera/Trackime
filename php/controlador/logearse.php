<?PHP

class Logearse{

	private $bbdd;

	public function __construct(){	
		$this->bbdd = new BBDD;
	}

	public function analizar($url){

		$usuarios = $this->bbdd->obtener("select * from USUARIOS",$this->bbdd->usuarios);
		$tiene_acceso = false;

		if(!isset($_SESSION))
			session_start();

		if(!isset($_SESSION["login"]))
			foreach($usuarios as $buscar)
				if($buscar->dato["usuario"] === $_POST["user"])
					if($buscar->dato["contrasena"] === $_POST["pswd"]){
						$_SESSION["login"] = $buscar->dato["usuario"];
						$tiene_acceso = true;	
					}

		return $tiene_acceso ?"../../index.php" : "../vista/login.php";

	}

}

	

?>
