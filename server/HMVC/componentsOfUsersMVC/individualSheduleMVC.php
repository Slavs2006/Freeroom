<?php

//1. getIndividualShedule = function of AJAX (aud, week1, week2). return HTML of individual shedule of selected aud.

require_once './HMVC/componentsOfUsersMVC/DateParaAudClass.php';

class ControllerOfIndividualShedule {
	function __construct () {
		$this->modelOfIndividualShedule = new ModelOfIndividualShedule;
		$this->viewOfIndividualShedule = new ViewOfIndividualShedule;
	}

	var $modelOfIndividualShedule;
	var $viewOfIndividualShedule;
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
	function buildHtmlIndividualSheduleForUser ($_assArrayOfIndividualShedule) {
		//...
		return $htmlOfIndividualShedule;
	}
	function buildHtmlIndividualSheduleForGuest ($_assArrayOfIndividualShedule) {
		//...
		return $htmlOfIndividualShedule;
	}
	
}

?>