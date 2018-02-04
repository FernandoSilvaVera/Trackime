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
		$estado = $_GET["estado"];
		$datos = 'insert into CUSTOM (usuario,nombre_anime,estado) values("'.$usuario.'","'.$serie.'","'.$estado.'")';
		$this->bbdd->meter($datos);

	}

}

new Agregar;

?>
