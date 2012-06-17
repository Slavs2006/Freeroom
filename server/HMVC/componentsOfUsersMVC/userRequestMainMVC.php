<?php


class Request {
	//maybe some constructor ?  from sqlQuery format convert... ? 
	var $beginTime;
	var $endTime;
	var $status
	...
	
}

class ControllerOfUserRequestMain {
	function ControllerOfUserRequestMain () {
		$this->$controllerOfActualUserRequest = new ControllerOfActualUserRequest;
		$this->$controllerOfAddUserRequest = new ControllerOfAddUserRequest;
		
		$this->$modelOfUserRequestMain = new ModelOfUserRequestMain;
		$this->$viewOfUserRequestMain = new ViewOfUserRequestMain;
	}
	
	var $controllerOfActualUserRequest;
	var $controllerOfAddUserRequest;
	
	var $modelOfUserRequestMain;
	var $viewOfUserRequestMain;
}

class ModelOfUserRequestMain {
	function ModelOfUserRequestMain () {
	
	}
	function attachRequest ($_newRequest) {	//RequestObj
		...//attach $newRequest to the $arrOfActualRequests
	}
	
}

class ViewOfUserRequestMain {
	function ViewOfUserRequestMain () {
	
	}
	
}



?>