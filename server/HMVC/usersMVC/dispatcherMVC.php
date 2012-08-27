<?php

require_once './HMVC/usersMVC/freeroomUserInterface.php';

require_once './HMVC/componentsOfUsersMVC/eventMVC.php';
require_once './HMVC/componentsOfUsersMVC/dispatcherRequestMVC.php';
require_once './HMVC/componentsOfUsersMVC/individualSheduleMVC.php';

class ControllerOfDispatcher {
	function __construct () {
		$this->model = new ModelOfDispatcher;
		$this->view = new ViewOfDispatcher;
		
		$this->controllerOfDispatcherRequest = new ControllerOfDispatcherRequest;
		$this->controllerOfIndividualShedule = new ControllerOfIndividualShedule;
		$this->controllerOfEvent = new ControllerOfEvent;
	}
	
	var $model;
	var $view;
	
	var $controllerOfDispatcherRequest;
	var $controllerOfIndividualShedule;
	var $controllerOfEvent;
}

class ModelOfDispatcher {
	function ModelOfDispatcher () {
		
	}
	
}

class ViewOfDispatcher implements freeroomUser {
	function ViewOfDispatcher () {
		
	}
	public function createUserInterfaceInHtml () {
		// build all page whith meta-tags and necessary javascripts. Also use mapsView and userRequestView.
		return $DispatcherViewInHtml;
	}
	
	
	//another variants of view...
}

?>