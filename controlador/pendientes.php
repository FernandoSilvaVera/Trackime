<?PHP

require_once("../clases/Paginacion.php");

class Pendientes extends Paginacion{

	private const VISTA = "pendientes.php";
	private const CONSULTA = array(
		"select" => "select nombre,id ",
		"from" => "from CUSTOM join ANIMES where CUSTOM.nombre_anime = ANIMES.nombre and CUSTOM.estado = 'pendiente' and CUSTOM.usuario= "
	); 

	public function __construct(){
		parent::__construct();
		$this->totalPaginas($this::CONSULTA["from"], $_SESSION["login"]);
		$this->obtenerPaginacion($this::VISTA);
		$this->analizar();
	}

	public function analizar(){
			$_SESSION["paginacion"] = $this->paginas;
			$_SESSION["series"] = $this->obtenerSerie($this::CONSULTA, $_SESSION["login"]);
	}
}

new Pendientes;

?>
