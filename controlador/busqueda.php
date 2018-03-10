<?PHP

require_once("../modelo/BBDD.php");

class Busqueda{

	private $bbdd;

	public function __construct(){
		session_start();
		$this->bbdd = new BBDD;
	}

	public function analizar(){
		$busqueda = $_REQUEST["busqueda"];
		return $resultado = $this->bbdd->obtener("select id,nombre from ANIMES where nombre like '%$busqueda%'",["id","nombre"]);
	}

}

$busqueda = new Busqueda;
$datos = $busqueda->analizar();

?>
