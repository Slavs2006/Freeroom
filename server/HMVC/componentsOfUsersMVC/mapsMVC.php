<?php

//2. getFreeAuds = function of AJAX (date, pare). return new currentFreeAuds

class ControllerOfMaps {
	function __construct () {
		$this->model = new ModelOfMaps;
		$this->view = new ViewOfMaps;
	}
	
	var $model;
	var $view;
	
	function createMapsInterfaceInHtml() {
		$this->model->initNamesAndFilesPathOfMaps('1');
		return $this->view->viewInHtml($this->model->assArrayPathAndNames);
	}
}

class ModelOfMaps {
	function __construct () {
		
	}
	function initNamesAndFilesPathOfMaps ($_adressID) {
		$this->currentAdressID = $_adressID;
		//...
		$this->assArrayPathAndNames = 0;	//	$queryAssArray;
	}
	function getFreeAndReservedAuds ($_date, $_pare) {
		//...
		return $setOfFreeAndReservedAuds;
	}
	
	var $currentAdressID;
	var $assArrayPathAndNames;	//associative array [path to file with this map] => [name of floor / name of some part of one complicated corpus]
}

class ViewOfMaps {
	function __construct () {
		
	}
	public function viewInHtml ($_assArrayPathAndNames) {	//...construct html of svg and part of floor selecting menu
		return '
			<div id = "floorSelector">
				селектор этажей
			</div>
			<div id = "floorPlans">
				сами карты
			</div>
		';
	}
	
	//another variants of view...
}

?>