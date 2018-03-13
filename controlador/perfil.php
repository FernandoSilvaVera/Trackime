<?PHP

require_once("../modelo/BBDD.php");

class Perfil{

	private $bbdd;

	public function __construct(){
		if(!isset($_SESSION))
			session_start();
		$this->bbdd = new BBDD;
		$this->analizar();
	}

	public function analizar(){
		$usuario = $_REQUEST["usuario"];
		$consulta = "SELECT usuario,imagen from USUARIOS where usuario='$usuario'";
		$_SESSION["usuario"] = $this->bbdd->obtener($consulta,["usuario","imagen"]);
	}

}

new Perfil;

?>
