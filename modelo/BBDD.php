<?PHP

define ("HOST","localhost");
define ("USUARIO","root");
define ("CONTRA","1996");
define ("NOMBRE","ANIME");
define ("CHARSET","utf8");

class Informacion{
	public $dato = array();
}

class BBDD{

	private $conexion;

	public function __construct(){
		$this->conexion = mysqli_connect(HOST,USUARIO,CONTRA,NOMBRE);
	}

	public function obtener($consulta,$columna){

		$devolver = array();
		$objeto = new Informacion;
		$tabla = mysqli_query($this->conexion,$consulta);

		while($fila = mysqli_fetch_array($tabla)){
			$objeto = new Informacion;
			for($i=0; $i<count($columna); $i++)
				$objeto->dato[$columna[$i]] = $fila[$columna[$i]];
			array_push($devolver,$objeto);
		}

		return $devolver;
	}

	public function meter($datos){
		mysqli_query($this->conexion, $datos);
	}

}

?>
