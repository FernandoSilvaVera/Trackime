<?PHP

require_once("../clases/Paginacion.php");

class Series extends Paginacion{

	private const VISTA = "series.php";
	private const CONSULTA = array(
		"select" => "select nombre,id ",
		"from" => "from ANIMES"
	); 

	public function __construct(){
		parent::__construct();
		$this->totalPaginas($this::CONSULTA["from"]);
		$this->obtenerPaginacion($this::VISTA);
		$this->analizar();
	}

	private function analizar(){
		$_SESSION["paginacion"] = $this->paginas;
		$_SESSION["series"] = $this->obtenerSerie($this::CONSULTA);
	}

}

new Series;

?>
