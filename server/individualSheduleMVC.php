<?php

//1. getIndividualShedule = function of AJAX (aud, week1, week2). return HTML of individual shedule of selected aud.

class DateParaAud {
	var $date;
	var $pare;
	var $aud;
	var $status;
}

class ControllerOfIndividualShedule {
	function ControllerOfIndividualShedule ($_aud, $_week1, $_week2) {
		$this->$modelOfIndividualShedule = new ModelOfIndividualShedule($_aud, $_week1, $_week2);
		$this->$viewOfIndividualShedule = new ViewOfIndividualShedule;
	}

	var $modelOfIndividualShedule;
	var $viewOfIndividualShedule;
}

class ModelOfIndividualShedule {
	function ModelOfIndividualShedule ($_aud, $_week1, $_week2) {
		$this->$assArrayOfIndividualShedule = $this->getIndividualShedule($_aud, $_week1, $_week2);
	}
	function getIndividualShedule ($_aud, $_week1, $_week2) {
		...
		return $tmpAssArrayOfIndividualShedule;
	}
	
	var $assArrayOfIndividualShedule; // [1] => [DateParaAud obj], [2] => [DateParaAud obj], ... , [14*kol-vo_par] => [DateParaAud obj]
}

class ViewOfIndividualShedule {
	function ViewOfIndividualShedule () {
	
	}
	function buildHtmlIndividualShedule ($_assArrayOfIndividualShedule) {
		...
		return $htmlOfIndividualShedule;
	}
	
}

?>