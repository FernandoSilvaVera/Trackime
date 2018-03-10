<?PHP

require_once("../clases/Paginacion.php");

class Terminadas extends Paginacion{

	private const VISTA = "terminadas.php";
	private const CONSULTA = [
		"select" => "select nombre,id ",
		"from" => "from CUSTOM join ANIMES where CUSTOM.nombre_anime = ANIMES.nombre and CUSTOM.estado = 'terminada' and CUSTOM.usuario= "
	]; 

	public function __construct(){
		parent::__construct();
		$this->totalPaginas($this::CONSULTA["from"],$_SESSION["login"]);
		$this->obtenerPaginacion($this::VISTA);
		$this->analizar();
	}

	public function analizar(){
		$_SESSION["paginacion"] = $this->paginas;
		$_SESSION["series"] = $this->obtenerSerie($this::CONSULTA, $_SESSION["login"]);
	}
}

new Terminadas;

?>
