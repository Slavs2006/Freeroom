<?php
	session_start();
	
	require './HMVC/usersMVC/dispatcherMVC.php';
	require './HMVC/usersMVC/simpleUserMVC.php';
	require './HMVC/usersMVC/guestMVC.php';
	
	if ($_SESSION['status'] == 'guest') {
		switch ($_POST['command']) {
			case 'renewMaps': 
				$aFreeAuds = $_SESSION['controller']->$controllerOfMaps->$modelOfMaps->getFreeAuds($_POST['date'], $_POST['pare']);
				echo $aFreeAuds;
				break;
			case 'getIndividualShedule':
				$_SESSION['controller']->$controllerOfIndividualShedule->$modelOfIndividualShedule->$initIndividualShedule($_POST['aud'], $_POST['week1'], $_POST['week2']);
				$guestIndividualSheduleInHtmlView = $_SESSION['controller']->$controllerOfIndividualShedule->$viewOfIndividualShedule->buildHtmlIndividualSheduleForGuest(
					$_SESSION['controller']->$controllerOfIndividualShedule->$modelOfIndividualShedule->$assArrayOfIndividualShedule 
				);
				echo $guestIndividualSheduleView;
				break;
			case 'getEvent':
				$eventInHtmlView = $_SESSION['controller']->$controllerOfEvent->$viewOfEvent->buildHtmlView(
					$_SESSION['controller']->$controllerOfEvent->$modelOfEvent->getEvent($_POST['data'], $_POST['para'], $_POST['aud']) 
				);
				echo $eventInHtmlView;
				break;
			default: 
				echo 'Guest cannot do it...who r u? -_-';
				break;
		}
	}
	else if ($_SESSION['status'] == 'simpleUser') {
		switch ($_POST['command']) {
			case 'renewMaps': 
				$aFreeAuds = $_SESSION['controller']->$controllerOfMaps->$modelOfMaps->getFreeAuds($_POST['date'], $_POST['pare']);
				echo $aFreeAuds;
				break;
			case 'getIndividualShedule':
				$_SESSION['controller']->$controllerOfIndividualShedule->$modelOfIndividualShedule->$initIndividualShedule($_POST['aud'], $_POST['week1'], $_POST['week2']);
				$guestIndividualSheduleInHtmlView = $_SESSION['controller']->$controllerOfIndividualShedule->$viewOfIndividualShedule->buildHtmlIndividualSheduleForUser(
														$_SESSION['controller']->$controllerOfIndividualShedule->$modelOfIndividualShedule->$assArrayOfIndividualShedule 
													);
				echo $guestIndividualSheduleView;
				break;
			case 'getEvent':
				$eventInHtmlView = $_SESSION['controller']->$controllerOfEvent->$viewOfEvent->buildHtmlView(
										$_SESSION['controller']->$controllerOfEvent->$modelOfEvent->getEvent($_POST['date'], $_POST['para'], $_POST['aud']) 
									);
				echo $eventInHtmlView;
				break;
			case 'getActualRequests':
				$_SESSION['controller']->$controllerOfUserRequest->$modelOfUserRequest->initActualUserRequests($_POST['date'])
				$actualRequestsViewInHtml = $_SESSION['controller']->$controllerOfUserRequest->$viewOfUserRequest->buildHtmlRequestList( 
												$_SESSION['controller']->$controllerOfUserRequest->$modelOfUserRequest->$arrOfActualRequests
											);
				echo $actualRequestsViewInHtml;
				break;
			case 'newRequest':
				$newRequest = new Request(...)// construct $newRequest = object from $_POST[''] parametrs...
				$statusOfAdd = $_SESSION['controller']->$controllerOfUserRequest->addNewRequest($newRequest);
				if ($statusOfAdd == 'notOk') {
					echo 'cannot add newRequest';
				}
				else if ($statusOfAdd == 'ok'){
					$newRequestViewInHtml = $_SESSION['controller']->$controllerOfUserRequest->$viewOfUserRequest->buildHtmlOfNewRequest($newRequest);
					echo $newRequestViewInHtml;
				}
				else {
					echo 'undefined behaviour';
				}
				break;
			default: 
				echo 'Simple user cannot do it...who r u? -_-';
				break;
		}
	}
	else if ($_SESSION['status'] == 'dispatcher') {
		switch ($_POST['command']) {
			case 'getIndividualShedule':
				$_SESSION['controller']->$controllerOfIndividualShedule->$modelOfIndividualShedule->$initIndividualShedule($_POST['aud'], $_POST['week1'], $_POST['week2']);
				$guestIndividualSheduleInHtmlView = $_SESSION['controller']->$controllerOfIndividualShedule->$viewOfIndividualShedule->buildHtmlIndividualSheduleForUser(
														$_SESSION['controller']->$controllerOfIndividualShedule->$modelOfIndividualShedule->$assArrayOfIndividualShedule 
													);
				echo $guestIndividualSheduleView;
				break;
			case 'getEvent':
				$eventInHtmlView = $_SESSION['controller']->$controllerOfEvent->$viewOfEvent->buildHtmlView(
										$_SESSION['controller']->$controllerOfEvent->$modelOfEvent->getEvent($_POST['date'], $_POST['para'], $_POST['aud']) 
									);
				echo $eventInHtmlView;
				break;
			case 'getActualRequestsOfAllUser':
				$_SESSION['controller']->$controllerOfDispatcherRequest->$modelOfDispatcherRequest->initActualRequestsOfAllUsers($_POST['date'])
				$actualRequestsOfAllUsersViewInHtml = $_SESSION['controller']->$controllerOfDispatcherRequest->$viewOfDispatcherRequest->buildHtmlRequestList( 
												$_SESSION['controller']->$controllerOfDispatcherRequest->$modelOfDispatcherRequest->$arrOfActualRequestsOfAllUsers
											);
				echo $actualRequestsOfAllUsersViewInHtml;
				break;
			case 'moveRequest':
				$statusOfMoving = $_SESSION['controller']->$controllerOfDispatcherRequest->$modelOfDispatcherRequest->moveRequest($_POST['idOfRequest'], $_POST['$directionOfMoving']);
				if ($statusOfMoving == 'notOk') {
					echo 'cannot moving this request';
				}
				else if ($statusOfMoving == 'ok'){
					echo 'ok';
				}
				else {
					echo 'undefined behaviour';
				}
				break;
			case 'newRequest':
				$newRequest = new Request(...)// construct $newRequest = object from $_POST[''] parametrs...
				$statusOfAdd = $_SESSION['controller']->$controllerOfDispatcherRequest->addNewRequest($newRequest);
				if ($statusOfAdd == 'notOk') {
					echo 'cannot add newRequest';
				}
				else if ($statusOfAdd == 'ok'){
					$newRequestViewInHtml = $_SESSION['controller']->$controllerOfUserRequest->$viewOfUserRequest->buildHtmlOfNewRequest($newRequest);
					echo $newRequestViewInHtml;
				}
				else {
					echo 'undefined behaviour';
				}
				break;
			default: 
				echo 'Dispatcher cannot do it...who r u? -_-';
				break;
		}
	}
	else {
		echo 'Who r u? 0_o';
	}
?>