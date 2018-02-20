<?PHP

require_once("../modelo/BBDD.php");

class Comentarios {

	private $bbdd;
	private $datos;

	public function __construct($datos){
		session_start();
		$this->datos = $datos;
		$this->bbdd = new BBDD;
		$this->consulta();
	}

	private function consulta(){
		$nombre = $this->datos['serie'];
		$cap	= $this->datos['capitulo'];
		$user	= $_SESSION['login'];
		$coment = $this->datos['comentario'];
		

		$consulta = "insert into COMENTARIOS(nombre_anime,capitulo,usuario,comentario) values('$nombre','$cap', '$user', '$coment')";
		$this->bbdd->meter($consulta);


	}

}

new Comentarios([
	"serie" => $_GET["serie"],
	"capitulo" => $_GET["capitulo"],
	"comentario" => $_GET["comentario"]
]);

?>
