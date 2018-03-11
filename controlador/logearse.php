<?PHP

require_once("../modelo/BBDD.php");

class Logearse{

	private $bbdd;

	public function __construct(){	
		session_start();
		$this->bbdd = new BBDD;
		$this->analizar();
	}

	public function analizar(){

		$usuarios = $this->bbdd->obtener("select usuario,contrasena,imagen from USUARIOS",["usuario","contrasena","imagen"]);

		if(!isset($_SESSION["login"]) && isset($_POST["user"]))
			foreach($usuarios as $buscar)
				if($buscar->dato["usuario"] === $_POST["user"] && $buscar->dato["contrasena"] === $_POST["pswd"]){
					$_SESSION["login"] = $buscar->dato["usuario"];
					$_SESSION["imagen"] = $buscar->dato["imagen"];
					header('Location: /Trackime/');
				}

	}

}

new Logearse;

?>
