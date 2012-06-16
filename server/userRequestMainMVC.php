<?php


class Request {
	//maybe some constructor ?  from sqlQuery format convert... ? 
	var $beginTime;
	var $endTime;
	var $status
	...
	
}

class ControllerOfUserRequestMain {
	function ControllerOfUserRequestMain ($_date, ) {
		$this->$controllerOfActualUserRequest = new ControllerOfActualUserRequest($_date);
		$this->$controllerOfAddUserRequest = new ControllerOfAddUserRequest();
		
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
	function attachRequest ($newRequest) {	//RequestObj
		...//attach $newRequest to the $arrOfActualRequests
	}
	
}

class ViewOfUserRequestMain {
	function ViewOfUserRequestMain () {
	
	}
	
}



?>