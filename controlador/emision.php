<?PHP

require_once("../clases/Paginacion.php");

class Emision extends Paginacion{

	private const VISTA = "emision.php";
	private const CONSULTA = array(
		"select" => "select nombre,id ",
		"from" => "from ANIMES join FECHA where ANIMES.nombre = FECHA.nombre_anime and anio = 2017"
	); 

	public function __construct(){
		parent::__construct();
		$this->totalPaginas($this::CONSULTA["from"],null);
		$this->obtenerPaginacion($this::VISTA);
		$this->analizar();
	}

	public function analizar(){
		$_SESSION["paginacion"] = $this->paginas;
		$_SESSION["series"] = $this->obtenerSerie($this::CONSULTA, null);
	}
}

new Emision;

?>
