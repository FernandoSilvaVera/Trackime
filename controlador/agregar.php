<?PHP

require_once("../modelo/BBDD.php");

class Agregar{

	private $bbdd;

	public function __construct(){
		$this->bbdd = new BBDD;
		$this->analizar();
	}

	public function analizar(){
	
		if(!isset($_SESSION))
			session_start();

		$usuario = $_SESSION["login"];
		$serie = $_GET["serie"];
		$datos = 'insert into CUSTOM (usuario,nombre_anime) values("'.$usuario.'","'.$serie.'")';
		$this->bbdd->meter($datos);

	}

}

new Agregar;

?>
