<?PHP

require_once("../modelo/BBDD.php");

class Seguir{

	private $bbdd;

	public function __construct(){
		session_start();
		$this->bbdd = new BBDD;
		$this->seguir();
	}

	public function seguir(){
		$meter = "insert into SOCIAL VALUES('$_SESSION[login]','$_GET[usuario]')";
		$this->bbdd->meter($meter);
	}

}

new Seguir;

?>
