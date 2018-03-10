<?PHP

require_once("../modelo/BBDD.php");

class Capitulos{

	private $bbdd;

	public function __construct(){
		$this->bbdd = new BBDD;
		$this->analizar();
	}

	public function analizar(){
	
		if(!isset($_SESSION))
			session_start();

		$id = $_REQUEST["id"];
		$capitulos= "SELECT nombre,capitulos,id from ANIMES where id=$id";
		$_SESSION["capitulos"] = $this->bbdd->obtener($capitulos,["nombre","capitulos","id"]);
		
	}

}

new Capitulos;

?>
