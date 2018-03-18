<?PHP

require_once("../clases/Paginacion.php");

class Siguiendo extends Paginacion{

	private $usuario;
	private const VISTA = "siguiendo.php";
	private const CONSULTA = [
		"select" => "select usuario ",
		"from" => "from SOCIAL where usuario= "
	]; 

	public function __construct($usuario){
		parent::__construct();
		$this->usuario = $usuario;
		$this->totalPaginas($this::CONSULTA["from"], $this->usuario);
		$this->obtenerPaginacion($this::VISTA);
	}

	public function getUsuarios(){
		return $this->bbdd->obtener("select siguiendo,imagen from SOCIAL natural join USUARIOS where usuario='$this->usuario'", ["siguiendo","imagen"]);
	}

}

if(!isset($_SESSION))
	session_start();

?>
