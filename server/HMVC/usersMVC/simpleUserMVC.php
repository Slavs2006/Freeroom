<?php

require_once './HMVC/usersMVC/freeroomUserInterface.php';

require_once './HMVC/componentsOfUsersMVC/mapsMVC.php';
require_once './HMVC/componentsOfUsersMVC/userRequestMVC.php';
require_once './HMVC/componentsOfUsersMVC/eventMVC.php';
require_once './HMVC/componentsOfUsersMVC/individualSheduleMVC.php';

class ControllerOfSimpleUser {
	function __construct() {
		echo 333;
		$this->view = new ViewOfSimpleUser;
		$this->model = new ModelOfSimpleUser;
		echo 222;
		
		$this->controllerOfMaps = new ControllerOfMaps;
		$this->controllerOfUserRequest = new ControllerOfUserRequest;
		$this->controllerOfIndividualShedule = new ControllerOfIndividualShedule;
		$this->controllerOfEvent = new ControllerOfEvent;
	}
	
	var $model;
	var $view;
	
	var $controllerOfMaps;
	var $controllerOfUserRequest;
	var $controllerOfIndividualShedule;
	var $controllerOfEvent;
}

class ModelOfSimpleUser {
	function __construct () {
		
	}
	
}

class ViewOfSimpleUser implements freeroomUser {
	function __construct() {
		
	}
	public function createUserInterfaceInHtml () {
		// build all page whith meta-tags and necessary javascripts. Also use mapsView and userRequestView.
		
		return 'Вы простой пользователь системы freeroom и можете этим гордится.';//$SimpleUserViewInHtml;
	}
	
	
	//another variants of view...
}

?>