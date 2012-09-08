<?php

//2. getFreeAuds = function of AJAX (date, pare). return new currentFreeAuds

class ControllerOfMaps {
	function __construct () {
		$this->model = new ModelOfMaps;
		$this->view = new ViewOfMaps;
	}
	
	var $model;
	var $view;
	
	function createMapsInterfaceInHtml($_adress = 0) {
		$this->model->initAdress($_adress);
		return $this->view->viewInHtml($this->model->ArrayPathToFloorSvg);
	}
}

class ModelOfMaps {
	function __construct () {
	
	}
	function initAdress($_adress) {
		$this->currentAdress = $_adress;
		//connect to DB and select path to all maps of this adress and names of floors/corpuses
		//...
		//...
		$this->ArrayPathToFloorSvg = array( "1 этаж" => "../server/maps/IFMO/kronverk/floor_1.svg",
											"2 этаж" => "../server/maps/IFMO/kronverk/floor_2.svg",
											"3 этаж" => "../server/maps/IFMO/kronverk/floor_3.svg",
											"4 этаж" => "../server/maps/IFMO/kronverk/floor_4.svg",
											"5 этаж" => "../server/maps/IFMO/kronverk/floor_5.svg",
											"6 этаж" => "../server/maps/IFMO/kronverk/floor_6.svg" );
	}
	function getFreeAuds ($_date, $_pare, $_parity) { // $_date - fulldate
		require './../server/link.php';
		// We determine the name of the day of the week, 
		$listOfAud = "";
		$i = count($this->ArrayPathToFloorSvg);
		while($i > 0) {
			$listOfAud .= $this->getAllAudInFloor($i);
			$i--;
		}
		$dateArray = explode(" ", $_date);
		$dayOfWeek = strtolower($dateArray[0]);
		$nameOfTable = $_parity."_".$dayOfWeek;
		$query = mysql_query("SELECT * FROM ".$nameOfTable." WHERE (nummer_paar='".$_pare."' AND id_adress= 1)");
		while ($f = mysql_fetch_array($query)) {
			$query2 = mysql_query("SELECT nummer_aud FROM auditory WHERE id_aud='".$f['id_aud']."'");
			while ($f_aud = mysql_fetch_assoc($query2)) {
				$nummer_aud = $f_aud['nummer_aud'];
				$listOfAud = str_replace($f_aud['nummer_aud'], "", $listOfAud); // we remove such number of auditories that are already occupied
			}
		}
		$i = 0;
		$tok = strtok($listOfAud, " ");
		$setOfFreeAuds = array();
		while ($tok) {
			$setOfFreeAuds[$i] = new DateParaAud;
			$setOfFreeAuds[$i]->aud = $tok;
			$setOfFreeAuds[$i]->status = 0;
			$setOfFreeAuds[$i]->floor = $tok[0];
			$setOfFreeAuds[$i]->date = $_date;
			$setOfFreeAuds[$i]->pare = $_pare;
			$tok = strtok(" ");
			$i++;
		}
		return $setOfFreeAuds;
	}
	
	function getReservedAuds ($_date, $_pare, $_floor = 1) {
		
		return $setOfReservedAuds;
	}
	function getAllAudInFloor($_floor = 1) {
		$listOfAud = "";
		$query = mysql_query("SELECT nummer_aud FROM auditory WHERE id_adress = '1' and nummer_etage='".$_floor."'");
		while ($f = mysql_fetch_assoc($query)) {
			$listOfAud  .= " ".$f['nummer_aud'];
		}
		return $listOfAud;
	}
	
	var $currentAdress;
	var $ArrayPathToFloorSvg;	//associative array [name of floor / name of some part of one complicated corpus] => [path to file with this map]
}

class ViewOfMaps {
	function __construct () {
		
	}
	public function viewInHtml ($_ArrayOfFloorNamesAndPaths) {	//...construct html of svg and part of floor selecting menu
		$resultView =  '
						<div id = "floorSelector" >';
		$i = 1;
		foreach ($_ArrayOfFloorNamesAndPaths as $floorName => $path) {
			$resultView .= '
							<input type="radio" id="floor'.$i.'" name="floorSelector" /><label for="floor'.$i.'">'.$floorName.'</label>';
			$i++;
		}
		$resultView .= '
						</div>
						<div id = "floorPlans">'; 
		$resultView .= ' 
							<object data="../server/maps/shade.svg" type="image/svg+xml" id = "shadeSVG">
								<p>К сожалению, вы используете устаревшую версию браузера, который не поддерживает интерактивную карту.</p>
							</object>';
		$i = 1;
		foreach ($_ArrayOfFloorNamesAndPaths as $floorName => $path) {
			$resultView .= '	
							<object data="'.$path.'" type="image/svg+xml" class = "imap" id = "'.$i.'floorSVG">
								<p>К сожалению, вы используете устаревшую версию браузера, который не поддерживает интерактивную карту.</p>
							</object>';
			$i++;
		}	
		$resultView .= '
						</div>';
		return $resultView;
	}
}

?>