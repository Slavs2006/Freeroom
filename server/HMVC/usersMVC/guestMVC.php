<?php

require_once '../componentsOfUsersMVC/mapsMVC.php';
require_once '../componentsOfUsersMVC/eventMVC.php';
require_once '../componentsOfUsersMVC/individualSheduleMVC.php';

class ControllerOfGuest {
	function ControllerOfGuest () {
		$this->$modelOfGuest = new ModelOfGuest;
		$this->$viewOfGuest = new ViewOfGuest;
		
		$this->$controllerOfMaps = new ControllerOfMaps;
		$this->$controllerOfIndividualShedule = new ControllerOfIndividualShedule;
		$this->$controllerOfEvent = new ControllerOfEvent;
	}
	
	var $modelOfGuest;
	var $viewOfGuest;
	
	var $controllerOfMaps;
	var $controllerOfIndividualShedule;
	var $controllerOfEvent;
}

class ModelOfGuest {
	function ModelOfGuest () {
		
	}
	
}

class ViewOfGuest {
	function ViewOfGuest () {
		
	}
	function buildGuestViewInHtml () {
		...// build all page whith meta-tags and necessary javascripts. Also use viewOfMaps to build maps and floor selector
		return $guestViewInHtml;
	}
	
	
	//another variants of view...
}

?>