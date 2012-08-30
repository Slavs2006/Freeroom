<?php
	session_start();
	unset($_SESSION['login']);
	unset($_SESSION['pass']);
	unset($_SESSION['status']);
	unset($_SESSION['controller']);
	session_destroy();
	header("Location: ./../client/index.php");
	exit();
?>