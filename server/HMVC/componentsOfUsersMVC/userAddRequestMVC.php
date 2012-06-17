<?php

//5. makeOrder = function of AJAX (...full set of order's parametrs...). send to server the order pack . return status: 
					// if OK -> order added in stack -> also return HTML from server and call modelOfUserRequests.addNewRequest()
					// else say some attention message "Your request is suck. try again.."
										
class ControllerOfAddUserRequest {
	function ControllerOfAddUserRequest () {
		$this->$modelOfAddUserRequest = new ModelOfAddUserRequest;
		$this->$viewOfAddUserRequest = new ViewOfAddUserRequest;
	}
	
	var $modelOfAddUserRequest;
	var $viewOfAddUserRequest;
}

class ModelOfAddUserRequest {
	function ModelOfAddUserRequest () {
	
	}
	function addNewRequest($_RequestObj) {
		...// add new request in table of notCheckingRequests in DB 
		return $statusMessage;
	}
	
}

class ViewOfAddUserRequest {
	function ViewOfAddUserRequest () {
		
	}
	function buildHtmlOfNewRequest ($_RequestObj)
		...
		return $viewOfNewRequestInHtml;
	}
	
	//another variants of view...
	
}

?>