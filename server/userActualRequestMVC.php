<?php

//1. getAllActualRequest = function of AJAX (date). return HTML of actual request for this user.

class ControllerOfActualUserRequest {
	function ControllerOfActualUserRequest ($_date) {
		$this->$modelOfActualUserRequest = new ModelOfActualUserRequest($_date);
		$this->$viewOfActualUserRequest = new ViewOfActualUserRequest;
	}
	
	var $modelOfActualUserRequest;
	var $viewOfActualUserRequest;
}

class ModelOfActualUserRequest {
	function ModelOfActualUserRequest ($_date) {
		$this->$arrOfActualRequests = $this->getActualRequests($_date);
	}
	function getActualRequests ($_date) {
		...
		return $someArrOfAllActualRequest;// [0] => [RequestObj], [1] => [RequestObj], ... class Request in "userRequestMainMVC.php"
	}
	
	var $arrOfActualRequests;
}

class ViewOfActualUserRequest {
	function ViewOfActualUserRequest () {
		
	}
	function buildHtmlRequestList ($_arrOfActualRequests) { // [0] => [RequestObj], [1] => [RequestObj], ... class Request in "userRequestMainMVC.php"
		...
		return $viewOfActualRequestInHtml;
	}
	
	//another variants of view...
	
}



?>