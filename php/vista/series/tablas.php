<?PHP

class Tabla{

	public $max;

	public function __construct(){}

	public function crearCabeza($nombres){

		for($i=0; $i<sizeof($nombres); $i++)
			if($nombres[$i] == "Anime")
				echo " <th>". $nombres[$i] ." " .$this->max . " </th> ";
			else	
				echo " <th>". $nombres[$i] . "</th> ";

	}

	public function crearCuerpo($series){

		for($i=0; $i<sizeof($series); $i++){
			echo "<tr>";
				echo "<td data-toggle='modal' data-target='#myModal'>" . $series[$i]->dato['nombre'] . "</td>";
				echo "<td data-toggle='modal' data-target='#myModal'>" . $series[$i]->dato['tag'] . "</td>";
				echo "<td data-toggle='modal' data-target='#myModal'>" . $series[$i]->dato['dia_nuevo_cap'] . "</td>";
				echo "<td data-toggle='modal' data-target='#myModal'>" . $series[$i]->dato['capitulos'] . "</td>";
				echo "<td data-toggle='modal' data-target='#myModal'>" . $series[$i]->dato['nota'] . "</td>";
			echo "</tr>";
		}
	
	}


}

?>
