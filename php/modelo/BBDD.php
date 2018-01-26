<?PHP

error_reporting(E_ALL);
ini_set('display_errors','1');

define ("HOST","localhost");
define ("USUARIO","root");
define ("CONTRA","y");
define ("NOMBRE","ANIME");
define ("CHARSET","utf8");

class BBDD{

	private $conexion = null;

	public $columnaPersonajes = array("nombre_anime","sexo","nombre","color_pelo","loli");
	public $columnaAnimes = array("id","nombre","temporada","tag","nota","capitulos","web");
	public $columnaSeries = array("nombre","tag","dia_nuevo_cap","capitulos","nota");
	public $usuarios = array("usuario","contrasena");

	public function __construct(){
		$this->conexion = mysqli_connect(HOST,USUARIO,CONTRA,NOMBRE);
	}

	public function obtener($consulta,$columna){

		$devolver = array();
		$objeto = new Series;
		$tabla = mysqli_query($this->conexion,$consulta );

		while($fila = mysqli_fetch_array($tabla)){
			$objeto = new Series;
			for($i=0; $i<count($columna); $i++)
				$objeto->dato[$columna[$i]] = $fila[$columna[$i]];
			array_push($devolver,$objeto);
		}

		return $devolver;
	}

	public function meter($consulta){
		mysqli_query($this->conexion, $consulta);
	}

}

?>
