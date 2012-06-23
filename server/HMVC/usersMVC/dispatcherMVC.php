<?php

require_once '../componentsOfUsersMVC/dispatcherRequestMVC.php';
require_once '../componentsOfUsersMVC/eventMVC.php';
require_once '../componentsOfUsersMVC/individualSheduleMVC.php';

class ControllerOfDispatcher {
	function ControllerOfDispatcher () {
		$this->$modelOfDispatcher = new ModelOfDispatcher;
		$this->$viewOfDispatcher = new ViewOfDispatcher;
		
		$this->$controllerOfDispatcherRequest = new ControllerOfDispatcherRequest;
		$this->$controllerOfIndividualShedule = new ControllerOfIndividualShedule;
		$this->$controllerOfEvent = new ControllerOfEvent;
	}
	
	var $modelOfDispatcher;
	var $viewOfDispatcher;
	
	var $controllerOfDispatcherRequest;
	var $controllerOfIndividualShedule;
	var $controllerOfEvent;
}

class ModelOfDispatcher {
	function ModelOfDispatcher () {
		
	}
	
}

class ViewOfDispatcher {
	function ViewOfDispatcher () {
		
	}
	function buildDispatcherViewInHtml () {
		...// build all page whith meta-tags and necessary javascripts. Also use mapsView and userRequestView.
		return $DispatcherViewInHtml;
	}
	
	
	//another variants of view...
}

?>