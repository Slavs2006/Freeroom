<?php

require_once '../componentsOfUsersMVC/mapsMVC.php';
require_once '../componentsOfUsersMVC/userRequestMVC.php';
require_once '../componentsOfUsersMVC/eventMVC.php';
require_once '../componentsOfUsersMVC/individualSheduleMVC.php';

class ControllerOfSimpleUser {
	function ControllerOfSimpleUser () {
		$this->$modelOfSimpleUser = new ModelOfSimpleUser;
		$this->$viewOfSimpleUser = new ViewOfSimpleUser;
		
		$this->$controllerOfMaps = new ControllerOfMaps;
		$this->$controllerOfUserRequest = new ControllerOfUserRequest;
		$this->$controllerOfIndividualShedule = new ControllerOfIndividualShedule;
		$this->$controllerOfEvent = new ControllerOfEvent;
	}
	
	var $modelOfSimpleUser;
	var $viewOfSimpleUser;
	
	var $controllerOfMaps;
	var $controllerOfUserRequest;
	var $controllerOfIndividualShedule;
	var $controllerOfEvent;
}

class ModelOfSimpleUser {
	function ModelOfSimpleUser () {
		
	}
	
}

class ViewOfSimpleUser {
	function ViewOfSimpleUser () {
		
	}
	function buildSimpleUserViewInHtml () {
		...// build all page whith meta-tags and necessary javascripts. Also use mapsView and userRequestView.
		return $SimpleUserViewInHtml;
	}
	
	
	//another variants of view...
}

?>