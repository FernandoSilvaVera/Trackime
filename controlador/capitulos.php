<?PHP

require_once("../modelo/BBDD.php");

class Capitulos{

	private $bbdd;

	public function __construct(){
		if(!isset($_SESSION))
			session_start();
		$this->bbdd = new BBDD;
	}

	public function getCapitulos(){
		return $this->bbdd->obtener("SELECT nombre,capitulos,id from ANIMES where id=$_REQUEST[id]", ["nombre","capitulos","id"]);
	}

}

?>
