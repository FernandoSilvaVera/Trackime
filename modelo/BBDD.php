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

	public function __construct(){
		$this->conexion = mysqli_connect(HOST,USUARIO,CONTRA,NOMBRE);
	}

	public function analizar($objeto){

		$devolver = null;

		switch($objeto){

			case new Personajes():
				$devolver = new Personajes();
			break;

			case new Animes():
				$devolver = new Animes();
			break;
	
		}

		return $devolver;
	}

	public function obtener($tabla,$columna,$objeto){

		$devolver = array();
		$tabla = mysqli_query($this->conexion,"select * from " . $tabla);

		while($fila = mysqli_fetch_array($tabla)){
			$personaje = $this->analizar($objeto);
			for($i=0; $i<count($columna); $i++)
				$personaje->dato[$columna[$i]] = $fila[$columna[$i]];
			array_push($devolver,$personaje);
		}

		return $devolver;
	}

}

?>
