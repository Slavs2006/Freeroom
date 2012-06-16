<?php

//2. getEvent = function of AJAX (date, pare, aud). return HTML of event at selected day+pare

class ControllerOfEvent {
	function ControllerOfEvent () {
		$this->$modelOfEvent = new ModelOfEvent;
		$this->$viewOfEvent = new ViewOfEvent;
	}
	
	var $modelOfEvent;
	var $viewOfEvent;
}

class ModelOfEvent {
	function ModelOfEvent () {
		
	}
	function getEvent($_date, $_pare, $_aud) {
		...
		return $assArrayOfInformation;//[prepodName] => [val], [prepodFam] => [val], ... 
	}
}

class ViewOfEvent {
	function ViewOfEvent () {
		
	}
	function buildHtmlView () {
		...//construct html of event
		return $viewOfEventInHtml;
	}
	
	//another variants of view...
}

?>