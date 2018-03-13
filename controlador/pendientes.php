<?PHP

require_once("../clases/Paginacion.php");

class Pendientes extends Paginacion{

	private $usuario;
	private const VISTA = "pendientes.php";
	private const CONSULTA = [
		"select" => "select nombre,id ",
		"from" => "from CUSTOM join ANIMES where CUSTOM.nombre_anime = ANIMES.nombre and CUSTOM.estado = 'pendiente' and CUSTOM.usuario= "
	]; 

	public function __construct($usuario){
		parent::__construct();
		$this->usuario = $usuario;
		$this->totalPaginas($this::CONSULTA["from"], $this->usuario);
		$this->obtenerPaginacion($this::VISTA);
	}

	public function getPaginacion(){
		return $this->paginas;
	}
	
	public function getSeries(){
		return $this->obtenerSerie($this::CONSULTA, $this->usuario);
	}

}

if(!isset($_SESSION))
	session_start();

?>
