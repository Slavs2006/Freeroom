<?php 
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
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
<link rel="stylesheet" type="text/css" href="css/index-style.css" />
<link type="text/css" href="jquery/css/custom-theme/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
<script src = "jquery/js/jquery-1.8.0.min.js"></script>
<script src = "jquery/js/jquery-ui-1.8.23.custom.min.js"></script>
</head>
<script>
	$(document).ready(function() {
		$("#btnEnt").button();
		$("#guestChecker").click( function() {
			if ($(".inputLP").attr('disabled') == undefined) {
				$(".inputLP").attr('disabled','disabled');
				$(".inputLP").toggleClass('darkness-field');
			}
			else {
				$(".inputLP").removeAttr('disabled');
				$(".inputLP").toggleClass('darkness-field');
			}
		});
	});
</script>
</head>
<body>
	<div id = "content">
		<div id = "image">
			<img src = "images/logo.png" alt = "freeroom">
		</div>
		<p>
			Найти нужную аудиторию стало легче, чем когда-либо.<br>
			Теперь вопросы, связанные с поиском свободной аудитории	организацией дополнительных лекций и семинаров, [some other opportunity] можно решить on-line.
		</p>
		<form action = "../server/autentification.php" method = "post">
			<div id = "login">Логин <input type = "text" name = "login" class = "inputLP"></div>
			<div id = "pass">Пароль <input type = "password" name = "pass" class = "inputLP"></div>
			<p><input type="checkbox" id = "guestChecker"> Гость</p>
			<p><input type = "submit" name = "sEnter" value = "Войти" id = "btnEnt"></p>
		</form>
	</div>
</body>
</html>