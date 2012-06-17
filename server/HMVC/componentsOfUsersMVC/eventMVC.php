<?php

//2. getEvent = function of AJAX (date, pare, aud). return HTML of event at selected day+pare

class Event {
	//[prepodName] => [val], [prepodFam] => [val], ... 
}

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
		return $findedEventObj; //Event class discripted above ^
	}
}

class ViewOfEvent {
	function ViewOfEvent () {
		
	}
	function buildHtmlView ($_eventObj) {
		...//construct html of event
		return $viewOfEventInHtml;
	}
	
	//another variants of view...
}

?>