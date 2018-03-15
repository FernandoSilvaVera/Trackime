<?PHP

require_once("../modelo/BBDD.php");

class Comentarios {

	private $bbdd;
	private $comentarios;

	public function __construct(){
		session_start();
		$this->bbdd = new BBDD;
		$this->Comentarios = array();
	}

	public function obtenerComentarios(){
		return $this->bbdd->obtener("select usuario,comentario from COMENTARIOS where nombre_anime='$_REQUEST[anime]' and capitulo=$_REQUEST[cap]",array("usuario","comentario"));
	}

}

$comentarios = new Comentarios;
$comentario = $comentarios->obtenerComentarios();

?>
