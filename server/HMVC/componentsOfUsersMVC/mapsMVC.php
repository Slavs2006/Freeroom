<?php

//2. getFreeAuds = function of AJAX (date, pare). return new currentFreeAuds

class ControllerOfMaps {
	function ControllerOfMaps () {
		$this->$modelOfMaps = new ModelOfMaps;
		$this->$viewOfMaps = new ViewOfMaps;
	}
	
	var $modelOfMaps;
	var $viewOfMaps;
}

class ModelOfMaps {
	function ModelOfMaps () {
		
	}
	function initNamesAndFilesPathOfMaps ($_adress) {
		$this->$currentAdress = $_adress;
		...
		$this->$assArrayPathAndNames = $queryAssArray;
	}
	function getFreeAuds ($_date, $_pare) {
		...
		return $setOfFreeAuds;
	}
	
	var $currentAdress;
	var $assArrayPathAndNames;	//associative array [path to file with this map] => [name of floor / name of some part of one complicated corpus]
}

class ViewOfMaps {
	function ViewOfMaps () {
		
	}
	function buildHtmlView ($_assArrayPathAndNames) {
		...//construct html of svg and part of floor selecting menu
		return $viewOfMapsInHtml;
	}
	
	//another variants of view...
}

?>