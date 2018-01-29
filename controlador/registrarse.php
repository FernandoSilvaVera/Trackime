<?PHP

require_once("../modelo/BBDD.php");

class Registrarse{

	private $bbdd;
	private $user;
	private $pswd;
	private $pswd2;

	public function __construct(){	
		$this->bbdd = new BBDD;
		$this->analizar();
	}

	private function usuarioDisponible(){
		$usuarios = $this->bbdd->obtener("select * from USUARIOS where usuario='$this->user'",$this->bbdd->usuarios);
		return !count($usuarios);
	}

	private function contraCorrecta(){
		return $this->pswd === $this->pswd2;
	}

	private function crearCuenta(){
		$this->bbdd->meter("insert into USUARIOS (usuario,contrasena) values('$this->user','$this->pswd')");
		$_SESSION["login"] = $this->user;
		return true;
	}

	public function analizar(){

		$this->user = $_POST["user"];
		$this->pswd = $_POST["pswd"];
		$this->pswd2 = $_POST["pswd2"];

		$cuentaCreada = false;

		if(!isset($_SESSION))
			session_start();

		if(!isset($_SESSION["login"]))
			if($this->usuarioDisponible() && $this->contraCorrecta())
				$cuentaCreada = $this->crearCuenta();
		
		if($cuentaCreada)
			header("Location: /Trackime");

	}
}

new Registrarse;

?>
