<?php
	session_start();
	require_once '../server/HMVC/usersMVC/dispatcherMVC.php';
	require_once '../server/HMVC/usersMVC/simpleUserMVC.php';
	require_once '../server/HMVC/usersMVC/guestMVC.php';
	function insertedIllegalSymbols($_login, $_pass) {	//	preprocessing input value and return status of checking. preprocessing = find taboo symbol   ^:)(*-_? etc.
		if (strpbrk($_login, '!@#$%^&*()_+-="№;:?[]{}\'\\/.,><') !== false || strpbrk($_pass, '!@#$%^&*()_+-="№;:?[]{}\'\\/.,><') !== false) {
			return true;
		}
		else {
			return false;
		}
	}
	function authorization($_login, $_pass) {	//	search in DB user with login == $login and pass == md5($pass). 
		$Link = mysql_connect('localhost','root','cnfhdfhc3');
		@mysql_query("SET NAMES 'cp1251'", $Link);
		if ($Link) {
			mysql_select_db('univercity');
		}
		$_passMD5 = md5($_pass); 
		$query = mysql_query("SELECT * FROM users WHERE login='".$_login."' AND password = '".$_passMD5."'");
		$f = mysql_fetch_assoc($query);
		if ($f) {
			$status = $f['status'];
		}
		else {
			$status = "unknownUser";
		}
		return $status; // status from DB record of user: 1.dispatcher 2.simpleUser 3.unknownUser
	}
	
	if (!empty($_SESSION['controller'])) {	//	session started?
		$controller = unserialize($_SESSION['controller']);
		echo $controller->createUserInterfaceInHtml($_SESSION['login']);	//	yes. create and show interface.
	}
	else {	//	no, session not started
		if (!empty($_POST['login']) && !empty($_POST['pass'])) {	//	Get we some login and pass via POST?
			$login = $_POST['login'];	//	Yes. Save them and check.
			$pass = $_POST['pass'];
			if (insertedIllegalSymbols($login, $pass)) {
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
								$(".inputLP").attr('value','');
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
						<form action = "./index.php" method = "post">
							<p id = "errorPlace">Недопустимые символы в логине/пароле</p>
							<div id = "login">Логин <input type = "text" name = "login" class = "inputLP"></div>
							<div id = "pass">Пароль <input type = "password" name = "pass" class = "inputLP"></div>
							<p><input type="checkbox" id = "guestChecker" name = "guest"> Гость</p>
							<p><input type = "submit" name = "sEnter" value = "Войти" id = "btnEnt"></p>
						</form>
					</div>
				</body>
				</html>		
			<?php
			}
			else {
				$authStatus = authorization($login, $pass);
				if ($authStatus == 'unknownUser') {	
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
									$(".inputLP").attr('value','');
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
							<form action = "./index.php" method = "post">
								<p id = "errorPlace">Введен неправильный логин или пароль.</p>
								<div id = "login">Логин <input type = "text" name = "login" class = "inputLP"></div>
								<div id = "pass">Пароль <input type = "password" name = "pass" class = "inputLP"></div>
								<p><input type="checkbox" id = "guestChecker" name = "guest"> Гость</p>
								<p><input type = "submit" name = "sEnter" value = "Войти" id = "btnEnt"></p>
							</form>
						</div>
					</body>
					</html>
				<?php
				}
				else {
					$_SESSION['login'] = $login;
					$_SESSION['status'] = $authStatus;
					switch ($_SESSION['status']) {
						case 'dispatcher':	$controller = new ControllerOfDispatcher;
											break;
						case 'simpleUser':	$controller = new ControllerOfSimpleUser;
											break;
						default:			session_destroy();
											echo 'Who are you?';	// ??????????????????????????????????
											break;
					}
					echo $controller->createUserInterfaceInHtml($_SESSION['login']);
					$_SESSION['controller'] = serialize($controller);
				}
			}
		}
		else if (!empty($_POST['guest'])) {	//	No, login and pass not send, BUT was send guestChecker
			$_SESSION['login'] = 'Гость';
			$controller = new ControllerOfGuest;
			echo $controller->createUserInterfaceInHtml($_SESSION['login']);
			$_SESSION['controller'] = serialize($controller);
		}
		else {	//	No, login and pass not send.
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
								$(".inputLP").attr('value','');
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
						<form action = "./index.php" method = "post">
							<p id = "errorPlace"></p>
							<div id = "login">Логин <input type = "text" name = "login" class = "inputLP"></div>
							<div id = "pass">Пароль <input type = "password" name = "pass" class = "inputLP"></div>
							<p><input type="checkbox" id = "guestChecker" name = "guest"> Гость</p>
							<p><input type = "submit" name = "sEnter" value = "Войти" id = "btnEnt"></p>
						</form>
					</div>
				</body>
				</html>	
		<?php		
		}
	}
?>
