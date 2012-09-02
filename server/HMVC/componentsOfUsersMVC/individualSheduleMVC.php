<?php

//1. getIndividualShedule = function of AJAX (aud, week1, week2). return HTML of individual shedule of selected aud.

require_once '../server/HMVC/componentsOfUsersMVC/DateParaAudClass.php';

class ControllerOfIndividualShedule {
	function __construct () {
		$this->model = new ModelOfIndividualShedule;
		$this->view = new ViewOfIndividualShedule;
	}

	var $model;
	var $view;
	
	public function createIndividualShedule($_aud, $_week1, $_week2) {
		$this->model->initIndividualShedule($_aud, $_week1, $_week2);
		return $this->view->viewInHtml($this->model->assArrayOfIndividualShedule);
	}
}

class ModelOfIndividualShedule {
	function __construct () {
		
	}
	function initIndividualShedule ($_aud, $_week1, $_week2) {
		//...
		$this->assArrayOfIndividualShedule = $tmpAssArrayOfIndividualShedule;
	}
	
	var $assArrayOfIndividualShedule; // [1] => [DateParaAud obj], [2] => [DateParaAud obj], ... , [14*kol-vo_par] => [DateParaAud obj]
}

class ViewOfIndividualShedule {
	function __construct () {
	
	}
	function viewInHtml ($_assArrayOfIndividualShedule) {
		//...
		return $htmlOfIndividualShedule;
	}
	
}

?>