<?PHP

require_once("../modelo/BBDD.php");

class Busqueda{

	private $bbdd;
	private $busqueda;

	public function __construct($busqueda){
		session_start();
		$this->bbdd = new BBDD;
		$this->busqueda = $busqueda;
	}

	public function busquedaAnimes(){
		return $this->bbdd->obtener("select id,nombre from ANIMES where nombre like '%$this->busqueda%'",["id","nombre"]);
	}

	public function busquedaGenero($serie){
		return $this->bbdd->obtener("select nombre,genero from GENERO where nombre='$serie'",["nombre","genero"]);
	}

}

$busqueda = new Busqueda($_REQUEST["busqueda"]);
$datos = $busqueda->busquedaAnimes();

foreach($datos as $anime)
	$genero[$anime->dato["nombre"]] = $busqueda->busquedaGenero($anime->dato["nombre"]);

?>
