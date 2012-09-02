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
		<script>
			$(document).ready(function() {
				$("#btnExit").button();
			});
		</script>
		</head>
		<body>
			<div id = "header">
				<img src = "./images/logo.png">
				<form action = "./../server/exit.php" method = "post">
					<input type = "submit" name = "sExit" value = "Выйти" id = "btnExit" >
				</form>
				<p id = "userLogin">'.$_login.'</p>
			</div>
			<div id = "maps">
				'.$_mapsI.'
			</div>
			<div id = "rightBar">
				<div id = "calendarAndTime">
					календарь 
				</div>
				<div id = "searchOptions">
					опции поиска
				</div>
			</div>
			<div id = "downhall">
				подвал с контактной инфой и копирайтами
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