<?PHP

require_once("../modelo/BBDD.php");

class Imagen{

	private $bbdd;

	public function __construct(){
		session_start();
		$this->bbdd = new BBDD;
		$this->analizar();
	}

	public function analizar(){
		$usuario = $_SESSION["login"];
		$imagen = $_GET["imagen"];
		$actulizar = "update USUARIOS set imagen='$imagen' where usuario='$usuario'";
		$_SESSION["imagen"] = $imagen;
		$this->bbdd->meter($actulizar);
	}

}

new Imagen;

?>
