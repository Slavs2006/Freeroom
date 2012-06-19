<?php
	session_start();
	
	require './HMVC/usersMVC/dispatcherMVC.php';
	require './HMVC/usersMVC/simpleUserMVC.php';
	require './HMVC/usersMVC/guestMVC.php';
	
	function preprocessingOfLoginAndPass ($_login, $_pass) {
		...// preprocessing input value and return status of checking. preprocessing = find taboo symbol   ^:)(*-_? etc.
		return $statusOfPreprocessing; // "OK" and "notOK"
	}
	function checkLoginAndPassInDB ($_login, $_pass) {	
		...	//search in DB user with login == $login and pass == md5($pass). 
		return $statusOfUser; // status from DB record of user: 1.dispatcher 2.simpleUser 3.guest 4.invalid
	}
	
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	if (preprocessingOfLoginAndPass($login, $pass) == "notOK") {
		session_destroy();
		echo "error";// !!!!! not simple error. must send file of registration with message of alert...???
	}
	else {
		$statusOfUser = checkLoginAndPassInDB($login, $pass);	//in DB should also be kept user with login Guest, empty pass and status guest 
		if ($statusOfUser == 'invalid') {
			session_destroy();
			echo "wrong data"; // !!!!! same thing...???
		}
		else {
			$_SESSION['login'] = $login;
			$_SESSION['status'] = $statusOfUser;
			switch ($statusOfUser) {
				case 'dispatcher':	$_SESSION['controller'] = new DispatcherMVC;
									break;
				case 'simpleUser':	$_SESSION['controller'] = new SimpleUserMVC;
									break;
				case 'guest':		$_SESSION['controller'] = new GuestMVC;
									break;
				default:			session_destroy();
									echo 'Who is this guy?'; // !!!!! same thing....?????????
									break;
			}
			echo $_SESSION['controller']->$viewOfUser->initUserInterfaceInHtml();
		}
	}
?>