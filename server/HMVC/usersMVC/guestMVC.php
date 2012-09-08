<?php

require_once '../server/HMVC/usersMVC/freeroomUserInterface.php';

require_once '../server/HMVC/componentsOfUsersMVC/mapsMVC.php';
require_once '../server/HMVC/componentsOfUsersMVC/eventMVC.php';
require_once '../server/HMVC/componentsOfUsersMVC/individualSheduleMVC.php';

class ControllerOfGuest implements freeroomUser {
	function __construct () {
		$this->model = new ModelOfGuest;
		$this->view = new ViewOfGuest;
		
		$this->controllerOfMaps = new ControllerOfMaps;
		$this->controllerOfIndividualShedule = new ControllerOfIndividualShedule;
		$this->controllerOfEvent = new ControllerOfEvent;
	}
	
	var $model;
	var $view;
	
	var $controllerOfMaps;
	var $controllerOfIndividualShedule;
	var $controllerOfEvent;
	
	public function createUserInterfaceInHtml ($_login) {
		$mapsI = $this->controllerOfMaps->createMapsInterfaceInHtml();
		return $this->view->viewInHtml($_login, $mapsI);
	}
}

class ModelOfGuest {
	function __construct () {
		
	}
	
}

class ViewOfGuest {
	function __construct () {
		
	}
	public function viewInHtml ($_login, $_mapsI) {	//	build all page whith meta-tags and necessary javascripts. Also use viewOfMaps to build maps and floor selector
		return 
		'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
		<html>
		<head>
		<title>freeroom IFMO</title>
		<link href="favicon.ico" rel="icon" type="image/x-icon" />
		<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="description" content="Поиск свободной аудитории в ИТМО">
		<meta name="keywords" content="свободная, аудитория, итмо, свободная, пустой, класс, пустой, ifmo, ifmo, итмо, freeroom, free, room, freeroom">
		<meta name="title" content="freeroom IFMO">
		<meta name="resource-type" content="document">
		<meta name="copyright" content=" nikopie. copyright 2012">
		<link rel="stylesheet" type="text/css" href="css/userInterface-style.css"/>
		<link type="text/css" href="jquery/css/custom-theme/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
		<script src = "./jquery/js/jquery-1.8.0.min.js"></script>
		<script src = "./jquery/js/jquery-ui-1.8.23.custom.min.js"></script>
		<script src = "./javascript/componentsOfUsersMVC/calendarAndTimeMVC.js"></script>
		<script src = "./javascript/componentsOfUsersMVC/mapsMVC.js"></script>
		<script src = "./javascript/usersMVC/guestMVC.js"></script>
		<script>
			$(document).ready(function() {
				$("#btnExit").button().attr("style", "padding: 4px; margin: 0; margin-left: 10px;");;
				var Guest = new ControllerOfGuest();
				Guest.activate();
			});
		</script>
		</head>
		<body>
			<div id = "rightBar">
				<div id = "header">
					<img src = "./images/logo.png">
					<form action = "./../server/exit.php" method = "post">
						<input type = "submit" name = "sExit" value = "Выйти" id = "btnExit" >
					</form>
					<p id = "userLogin">'.$_login.'</p>
				</div>
				<div id = "calendarAndTime">
					<div id = "dateButton" style = "width: 360px; margin: 0;"></div>
					<div id = "datepicker" style = "z-index: 1; position: absolute;" ></div>
					<div id = "parepicker" style = "margin: 0; margin-top: 1px;">
						<input type="radio" id="pare1" name="parepicker" /><label for="pare1"><div style = "border-bottom: 1px solid #555;">8:00</div><div>9:20</div></label>
						<input type="radio" id="pare2" name="parepicker" /><label for="pare2"><div style = "border-bottom: 1px solid #555;">9:30</div><div>10:50</div></label>
						<input type="radio" id="pare3" name="parepicker" /><label for="pare3"><div style = "border-bottom: 1px solid #555;">11:00</div><div>12:20</div></label>
						<input type="radio" id="pare4" name="parepicker" /><label for="pare4"><div style = "border-bottom: 1px solid #555;">12:40</div><div>14:00</div></label>
						<input type="radio" id="pare5" name="parepicker" /><label for="pare5"><div style = "border-bottom: 1px solid #555;">14:20</div><div>15:40</div></label>
						<input type="radio" id="pare6" name="parepicker" /><label for="pare6"><div style = "border-bottom: 1px solid #555;">15:50</div><div>17:10</div></label>
						<input type="radio" id="pare7" name="parepicker" /><label for="pare7"><div style = "border-bottom: 1px solid #555;">17:20</div><div>18:40</div></label>
					</div>
				</div>
				<div id = "searchOptions">
				</div>
			</div>
			<div id = "maps">
				'.$_mapsI.'
			</div>
			<div id = "downhall">
				
			</div>
			<div id = "menuOfIndividualSheduleAndEvent">
				<div id = "individualShedule">
				</div>
				<div id = "event">
				</div>
			</div>
		</body>
		</html>';//$guestViewInHtml;
	}
	//another variants of view...
}

?>