<?PHP
	class Fecha{

		private $diasSemana = array("Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo");
		
		public function diaActual(){return $this->diasSemana[date("N")-1];}

	}

	class CabeceraColumna extends Fecha{
		private $nombre	= array();
		private $max;
		private $info;

		public function __construct($nombres,$info){
			$this->nombre 	= $nombres;
			$this->info	= $info;
			$this->max 	= sizeof($this->nombre);
		}
		
		private function nombre($posicion){return $this->nombre[$posicion];}
		private function info(){return $this->info;}
		public function max(){return $this->max;}

		public function crearFila(){

			for($i=0; $i<$this->max(); $i++)
				if($this->nombre($i) == "Anime")
					echo " <th class='Centrar'>". $this->nombre($i) . $this->info() . " </th> ";
				else	
					echo " <th class='Centrar'>". $this->nombre($i) ."</th> ";
							
		}
	}

	class CuerpoColumna extends CabeceraColumna{

		private $consulta;

		public function __construct($nombres,$info,$consulta){
			parent::__construct($nombres,$info);
			$this->consulta = $consulta;
		}

		private function consulta(){return $this->consulta;}

		public function crearCuerpo(){

			while($fila = mysqli_fetch_row($this->consulta())){
				if($fila[2] == $this->diaActual())
					echo "<tr class='info'>";
				else
					echo "<tr>";
				for($i=0 ;$i<$this->max() ;$i++)
					echo "<td data-toggle='modal' data-target='#myModal'>$fila[$i]</td>";
		
					echo "</tr>";
			}	
		}
	}
	
?>
