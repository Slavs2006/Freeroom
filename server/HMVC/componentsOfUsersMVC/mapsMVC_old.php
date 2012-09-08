<?php

//2. getFreeAuds = function of AJAX (date, pare). return new currentFreeAuds

class ControllerOfMaps {
	function __construct () {
		$this->model = new ModelOfMaps;
		$this->view = new ViewOfMaps;
	}
	
	var $model;
	var $view;
	
	function createMapsInterfaceInHtml() {
		$this->model->initNamesAndFilesPathOfMaps('1');
		return $this->view->viewInHtml($this->model->assArrayPathAndNames);
	}
}

class ModelOfMaps {
	function __construct () {
		
	}
	function initNamesAndFilesPathOfMaps ($_adressID) {
		$this->currentAdressID = $_adressID;
		//...
		$this->assArrayPathAndNames = 0;	//	$queryAssArray;
	}
	function getFreeAndReservedAuds ($_date, $_pare) {
		//...
		return $setOfFreeAndReservedAuds;
	}
	
	var $currentAdressID;
	var $assArrayPathAndNames;	//associative array [path to file with this map] => [name of floor / name of some part of one complicated corpus]
}

class ViewOfMaps {
	function __construct () {
		
	}
	public function viewInHtml ($_assArrayPathAndNames) {	//...construct html of svg and part of floor selecting menu
		return '
			<div id = "floorSelector" >
				<input type="radio" id="floor1" name="floorSelector" /><label for="floor1">1 этаж</label>
				<input type="radio" id="floor2" name="floorSelector" /><label for="floor2">2 этаж</label>
				<input type="radio" id="floor3" name="floorSelector" /><label for="floor3">3 этаж</label>
				<input type="radio" id="floor4" name="floorSelector" /><label for="floor4">4 этаж</label>
				<input type="radio" id="floor5" name="floorSelector" /><label for="floor5">5 этаж</label>
				<input type="radio" id="floor6" name="floorSelector" /><label for="floor6">6 этаж</label>
			</div>
			<div id = "floorPlans">
				<object data="./../server/maps/shade.svg" type="image/svg+xml" id = "shadeSVG">
					<p>К сожалению, вы используете устаревшую версию браузера, который не поддерживает интерактивную карту.</p>
				</object>
				<object data="./../server/maps/IFMO/kronverk/floor_1.svg" type="image/svg+xml" class = "imap" id = "1floorSVG">
					<p>К сожалению, вы используете устаревшую версию браузера, который не поддерживает интерактивную карту.</p>
				</object>
				<object data="./../server/maps/IFMO/kronverk/floor_2.svg" type="image/svg+xml" class = "imap" id = "2floorSVG">
					<p>К сожалению, вы используете устаревшую версию браузера, который не поддерживает интерактивную карту.</p>
				</object>
				<object data="./../server/maps/IFMO/kronverk/floor_3.svg" type="image/svg+xml" class = "imap" id = "3floorSVG">
					<p>К сожалению, вы используете устаревшую версию браузера, который не поддерживает интерактивную карту.</p>
				</object>
				<object data="./../server/maps/IFMO/kronverk/floor_4.svg" type="image/svg+xml" class = "imap" id = "4floorSVG">
					<p>К сожалению, вы используете устаревшую версию браузера, который не поддерживает интерактивную карту.</p>
				</object>
				<object data="./../server/maps/IFMO/kronverk/floor_5.svg" type="image/svg+xml" class = "imap" id = "5floorSVG">
					<p>К сожалению, вы используете устаревшую версию браузера, который не поддерживает интерактивную карту.</p>
				</object>
				<object data="./../server/maps/IFMO/kronverk/floor_6.svg" type="image/svg+xml" class = "imap" id = "6floorSVG">
					<p>К сожалению, вы используете устаревшую версию браузера, который не поддерживает интерактивную карту.</p>
				</object>
			</div>
		';
	}
	
	//another variants of view...
}

?>