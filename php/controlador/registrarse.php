<?PHP

class Registrarse{

	private $bbdd;

	public function __construct(){	
		$this->bbdd = new BBDD;
	}

	public function usuarioDisponible(){
		$user = $_POST["user"];
		$usuarios = $this->bbdd->obtener("select * from USUARIOS where usuario='$user'",$this->bbdd->usuarios);
		return !count($usuarios);
	}

	public function contraCorrecta(){
		return $_POST["pswd"] === $_POST["pswd2"];
	}

	public function analizar($url){
		
		if(!isset($_SESSION))
			session_start();

		if(!isset($_SESSION["login"]))
			if($this->usuarioDisponible() && $this->contraCorrecta())
				$_SESSION["login"] = $_POST["user"];

		return "../../index.php";

	}
}

?>
