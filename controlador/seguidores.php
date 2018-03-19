<?PHP

require_once("../clases/Paginacion.php");

class Seguidores extends Paginacion{

	private $usuario;
	private const VISTA = "seguidores.php";
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

	public function obtenerDatos(){
		return $this->bbdd->obtener("select usuario as seguidores,imagen from SOCIAL natural join USUARIOS where siguiendo='$this->usuario'", ["seguidores","imagen"]);
	}

}

if(!isset($_SESSION))
	session_start();

?>
