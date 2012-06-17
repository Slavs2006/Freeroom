<?php
	
	function preprocessingOfLoginAndPass ($_login, $_pass) {
		...// preprocessing input value and return status of checking. preprocessing = find taboo symbol   ^:)(*-_? etc.
		return $statusOfPreprocessing; // "OK" and "notOK"
	}
	function checkLoginAndPassInDB ($_login, $_pass) {	
		...	//search in DB user with login == $login and pass == md5($pass). 
		return $statusOfUser; // status from DB record of user: 1.dispatcher 2.simpleUser 3.invalid
	}
	
	$login = $_POST['login'];
	$pass = $_POST['pass'];
	if (preprocessingOfLoginAndPass($login, $pass) == "notOK") {
		echo "error";
	}
	else {
		$statusOfUser = checkLoginAndPassInDB($login, $pass);	//in DB should also be kept user with login Guest, empty pass and status Guest 
		if ($statusOfUser == 'invalid') {
			echo "wrong data";
		}
		else {
			start_session();
			$_SESSION['login'] = $login;
			$_SESSION['status'] = $statusOfUser;
			$_SESSION['controller'] = new UserMVC($statusOfUser);
			echo $_SESSION['controller']->initUserInterfaceInHtml();	// how send new full page???? not Ajax answer...
		}
	}
	
?>