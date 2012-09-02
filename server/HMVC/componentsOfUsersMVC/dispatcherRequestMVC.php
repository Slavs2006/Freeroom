<?php

//1. HTML list af all users actual request = function of AJAX(_date)
//2. Move request = function of AJAX(_acceptOrDenieVariable)
//all changes in client view make js. he thust say to server where move. 
//and if get "OK" status then destroy accordion, cut html and do all neccecury transformations

require_once 'RequestClass.php';

class ControllerOfDispatcherRequest {
	function __construct () {	
		$this->model = new ModelOfDispatcherRequest;
		$this->view = new ViewOfDispatcherRequest;
	}
	
	var $model;
	var $view;
	
	public function createDispatcherRequestInterfaceInHtml() {
		$this->model->initActualRequestsOfAllUsers();
		return $this->view->viewInHtml($this->model->$arrOfActualRequests);
	}
}

class ModelOfDispatcherRequest {
	function __construct () {
	
	}
	function initActualRequestsOfAllUsers () {
		//...use current date to select only actual request
		$this->arrOfActualRequestsOfAllUsers = $someArrOfAllActualRequest;// [0] => [RequestObj], [1] => [RequestObj], ... class Request in "userRequestMainMVC.php"
	}
	function moveRequest($idOfRequest, $directionOfMoving) {
		//...
		return $statusOfMoving;
	}
	function addNewRequest ($_newRequest) {	//RequestObj
		// add new requst in DB tableOfAccepted
		return $statusMessage;
	}
	
	var $arrOfActualRequestsOfAllUsers;
}

class ViewOfDispatcherRequest {
	function __construct () {
	
	}
	function viewInHtml ($_arrOfActualRequests) { // [0] => [RequestObj], [1] => [RequestObj], ...
		//...
		return $viewOfActualRequestInHtml;
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