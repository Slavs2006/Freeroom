<?php

require_once './HMVC/usersMVC/freeroomUserInterface.php';

require_once './HMVC/componentsOfUsersMVC/mapsMVC.php';
require_once './HMVC/componentsOfUsersMVC/eventMVC.php';
require_once './HMVC/componentsOfUsersMVC/individualSheduleMVC.php';

class ControllerOfGuest {
	function __construct () {
		$this->model = new ModelOfGuest;
		$this->view = new ViewOfGuest;
		
		$this->controllerOfMaps = new ControllerOfMaps;
		$this->controllerOfIndividualShedule = new ControllerOfIndividualShedule;
		$this->controllerOfEvent = new ControllerOfEvent;
	}
	
	var $model;
	var $view;
	
	var $controllerOfMaps;
	var $controllerOfIndividualShedule;
	var $controllerOfEvent;
}

class ModelOfGuest {
	function __construct () {
		
	}
	
}

class ViewOfGuest implements freeroomUser {
	function __construct () {
		
	}
	public function createUserInterfaceInHtml () {
		// build all page whith meta-tags and necessary javascripts. Also use viewOfMaps to build maps and floor selector
		return $guestViewInHtml;
	}
	
	
	//another variants of view...
}

?>