<?php

require_once '../server/HMVC/usersMVC/freeroomUserInterface.php';

require_once '../server/HMVC/componentsOfUsersMVC/eventMVC.php';
require_once '../server/HMVC/componentsOfUsersMVC/dispatcherRequestMVC.php';
require_once '../server/HMVC/componentsOfUsersMVC/individualSheduleMVC.php';

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
	public function createUserInterfaceInHtml ($_login) {
		// build all page whith meta-tags and necessary javascripts. Also use mapsView and userRequestView.
		return 'Вы самый что ни на есть диспетчер freeroom. Ликуйте. <form action = "../server/exit.php" method = "post"><input type = "submit" name = "sExit" value = "Выйти" id = "btnExit" ></form>';//$DispatcherViewInHtml;
	}
	
	
	//another variants of view...
}

?>