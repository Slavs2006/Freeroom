<?php

class ControllerOfAutentification {
	function ControllerOfAutentification ($_login, $_pass) {
		$this->$modelOfAutentification = new ModelOfAutentification($_login, $_pass);
		$this->$viewOfAutentification = new ViewOfAutentification;
	}

	var $modelOfAutentification;
	var $viewOfAutentification;
}

class ModelOfAutentification {
	function ModelOfAutentification ($_login, $_pass) {
		$this->$currentStatus = $this->checkLoginAndPass($_login, $_pass);
	}
	function checkLoginAndPass ($_login, $_pass) {
		...
		return $status; // 1.admin 2.user 3.guest 4.invalid
	}
	var $currentStatus;
}

class ViewOfAutentification {
	function ViewOfAutentification () {
	
	}
	
}

?>