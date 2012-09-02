<?php

//1. getAllActualRequest = function of AJAX (date). return HTML of actual request for this user.

//5. makeOrder = function of AJAX (...full set of order's parametrs...). send to server the order pack . return status: 
					// if OK also return HTML from server and call modelOfUserRequests.addNewRequest()
					// else say some attention message "Your request is suck. try again.."

require_once '../server/HMVC/componentsOfUsersMVC/RequestClass.php';

class ControllerOfUserRequest {
	function __construct () {	
		$this->model = new ModelOfUserRequest;
		$this->view = new ViewOfUserRequest;
	}
	
	var $model;
	var $view;
	
	public function createUserRequestInterfaceInHtml() {
		$this->model->initActualUserRequests();
		return $this->view->viewInHtml($this->model->arrOfActualRequests);
	}
}

class ModelOfUserRequest {
	function __construct () {
	
	}
	function initActualUserRequests () {
		//... use $_SESSION['login'] and current date(to select only actual requests)
		$this->arrOfActualRequests = 0;//$someArrOfAllActualRequest;// [0] => [RequestObj], [1] => [RequestObj], ... class Request in "userRequestMainMVC.php"
	}
	function addNewRequest ($_newRequest) {	//RequestObj
		//... add new request in table of notCheckingRequests in DB 
		//... attach $_newRequest to $this->$arrOfActualRequests
		return $statusMessage;
	}
	
	var $arrOfActualRequests;
}

class ViewOfUserRequest {
	function __construct () {
	
	}
	function viewInHtml ($_arrOfActualRequests) { // [0] => [RequestObj], [1] => [RequestObj], ... class Request in "userRequestMainMVC.php"
		//...
		return 'пользовательский запрос 1, пользовательский запрос 2, ...';//$viewOfActualRequestInHtml;
	}
	function buildHtmlOfNewRequest ($_newRequest) {
		//...
		return $viewOfNewRequestInHtml;
	}
	function buildHtmlOfRequestInputInterface () {
		//...
		return $viewOfRequestInputInterfaceInHtml;
	}
	
	
	//another variants of view...
	
}



?>