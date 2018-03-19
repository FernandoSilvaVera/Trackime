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

	public function obtenerDatos(){

		$usuarios = $this->bbdd->obtener("select siguiendo from SOCIAL where usuario='$this->usuario'", ["siguiendo"]);

		foreach($usuarios as $usuario){
			$imagenUsuario = $usuario->dato["siguiendo"];
			$img = $this->bbdd->obtener("select imagen from USUARIOS where usuario='$imagenUsuario'", ["imagen"]);
			$usuario->dato["imagen"] = $img[0]->dato["imagen"];
		}
		
		return $usuarios;

	}

}

if(!isset($_SESSION))
	session_start();

?>