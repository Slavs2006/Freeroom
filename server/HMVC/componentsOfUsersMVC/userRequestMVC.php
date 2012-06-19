<?php

//1. getAllActualRequest = function of AJAX (date). return HTML of actual request for this user.

//5. makeOrder = function of AJAX (...full set of order's parametrs...). send to server the order pack . return status: 
					// if OK also return HTML from server and call modelOfUserRequests.addNewRequest()
					// else say some attention message "Your request is suck. try again.."

class Request {
	//maybe some constructor ?  from sqlQuery format convert... ? 
	var $beginTime;
	var $endTime;
	var $status
	...
	
}

class ControllerOfUserRequest {
	function ControllerOfUserRequest () {	
		$this->$modelOfUserRequest = new ModelOfUserRequest;
		$this->$viewOfUserRequest = new ViewOfUserRequest;
	}
	
	var $modelOfUserRequest;
	var $viewOfUserRequest;
}

class ModelOfUserRequest {
	function ModelOfUserRequest () {
	
	}
	function initActualRequests ($_date) {
		...
		$this->$arrOfActualRequests = $someArrOfAllActualRequest;// [0] => [RequestObj], [1] => [RequestObj], ... class Request in "userRequestMainMVC.php"
	}
	function addNewRequest ($_newRequest) {	//RequestObj
		...// add new request in table of notCheckingRequests in DB 
		...// attach $_newRequest to $this->$arrOfActualRequests
		return $statusMessage;
	}
	
	var $arrOfActualRequests;
}

class ViewOfUserRequest {
	function ViewOfUserRequest () {
	
	}
	function buildHtmlRequestList ($_arrOfActualRequests) { // [0] => [RequestObj], [1] => [RequestObj], ... class Request in "userRequestMainMVC.php"
		...
		return $viewOfActualRequestInHtml;
	}
	function buildHtmlOfNewRequest ($_newRequest)
		...
		return $viewOfNewRequestInHtml;
	}
	
	//another variants of view...
	
}



?>