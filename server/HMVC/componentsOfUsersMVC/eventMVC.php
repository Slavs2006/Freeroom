<?php

//2. getEvent = function of AJAX (date, pare, aud, status). return HTML of event at selected day+pare

require_once '../server/HMVC/componentsOfUsersMVC/EventClass.php';
require_once '../server/connectDB.php';

class ControllerOfEvent {
	function __construct () {
		$this->modelOfEvent = new ModelOfEvent;
		$this->viewOfEvent = new ViewOfEvent;
	}
	
	var $modelOfEvent;
	var $viewOfEvent;
}

class ModelOfEvent {
	function __construct () {
		
	}
	function tableNameFromDate($_date) {
		//... construct table name from date
		return $oddOrEven.'_'.$dayOfWeek;
	}
	function getEvent($_date, $_pare, $_aud, $_status) {
		$findedEvent = new Event;
		
		openConnection();
		
		$queryAuditoryIdSelect = mysql_query("SELECT id_aud FROM auditory WHERE nummer_aud='".$_aud."' and id_adress='1'");
		$idAuditory = mysql_fetch_assoc($query);
		if (!$idAuditory) {
			closeConnection();
			return 	$findedEvent; // WTF ???
		}
		$idAuditory = $idAuditory['id_aud'];
		
		switch ($_status) {
			case 'singleUse' :	$tableNameForQuery = 'reserved_auditories';	//reserved for one time
								break;
			case 'constant' :	$tableNameForQuery = tableNameFromDate($_date);//from shedule
								break;
			default :			closeConnection();
								return 	$findedEvent; // WTF ???
		}
		
		$queryInfoAboutPara = mysql_query("SELECT * FROM ".$tableNameForQuery." WHERE id_adress='1' and nummer_paar='".$_pare."' and id_aud='".$idAuditory."'");
		$fInfoAboutPara = mysql_fetch_assoc($queryInfoAboutPara);
		if (!$fInfoAboutPara) {
			closeConnection();
			return 	$findedEvent; // WTF ???
		}
		
		$queryInfoPrepod = mysql_query("SELECT * FROM prep WHERE id_prep='".$fInfoAboutPara['id_prepod']."'");
		$fInfoPrepod = mysql_fetch_assoc($queryInfoPrepod);
		if (!$fInfoPrepod) {
			closeConnection();
			return 	$findedEvent; // WTF ???
		}
		
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		//! restruct all db table of shedule (oneTimeReserved and constantShedulle) to some ONE type of naming next fields : !
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		
		$findedEvent->$prepodName = iconv("cp1251","utf-8",$fInfoPrepod['name']);
		$findedEvent->$prepodFam = iconv("cp1251","utf-8",$fInfoPrepod['fam']);
		$findedEvent->$prepodOtch = iconv("cp1251","utf-8",$fInfoPrepod['otch']);
		$findedEvent->$prepodPhoto = iconv("cp1251","utf-8",$fInfoPrepod['foto']);
		if ($findedEvent->$prepodPhoto == "") {
			$findedEvent->$prepodPhoto = "client/images/noPhoto.png";
		}
		$findedEvent->$nameOfAction = iconv("cp1251","utf-8",$fInfoAboutPara['reservAction']);
		$findedEvent->$numberOfAud = $_aud;
		$findedEvent->$dateOfAction = $_date;
		$findedEvent->$pareOfAction = $_pare;
		$findedEvent->$listeners = iconv("cp1251","utf-8",$fInfoAboutPara['reservAudience']);
		
		closeConnection();
		return $findedEventObj; //Event class discripted above ^
	}
}

class ViewOfEvent {
	function __construct () {
		
	}
	function buildHtmlView ($_eventObj) {//construct html of event
		$viewOfEventInHtml .= "<br>";
		$viewOfEventInHtml .= "<br><table border style='color:white;width:50%;' cellpadding = '0' cellspacing = '0'>";
		$viewOfEventInHtml .= "<tr>";
		$viewOfEventInHtml .= "<td rowspan=4>";
		$viewOfEventInHtml .= "<img src='".$_eventObj->$prepodPhoto."' />";
		$viewOfEventInHtml .= "</td>";
		$viewOfEventInHtml .= "</tr>";
		$viewOfEventInHtml .= "<tr>";
		$viewOfEventInHtml .= "<td>";
		$viewOfEventInHtml .= "Преподаватель";
		$viewOfEventInHtml .= "</td>";
		$viewOfEventInHtml .= "<td>";
		$viewOfEventInHtml .= $_eventObj->$prepodFam." ".$_eventObj->$prepodName." ".$_eventObj->$prepodOtch;
		$viewOfEventInHtml .= "</td>";
		$viewOfEventInHtml .= "</tr>";
		$viewOfEventInHtml .= "<tr>";
		$viewOfEventInHtml .= "<td>";
		$viewOfEventInHtml .= "Предмет";
		$viewOfEventInHtml .= "</td>";
		$viewOfEventInHtml .= "<td>";
		$viewOfEventInHtml .= $_eventObj->$nameOfAction;
		$viewOfEventInHtml .= "</td>";
		$viewOfEventInHtml .= "</tr>";
		$viewOfEventInHtml .= "<tr>";
		$viewOfEventInHtml .= "<td>";
		$viewOfEventInHtml .= "Группа";
		$viewOfEventInHtml .= "</td>";
		$viewOfEventInHtml .= "<td>";
		$viewOfEventInHtml .= $_eventObj->$listeners;;
		$viewOfEventInHtml .= "</td>";
		$viewOfEventInHtml .= "</tr>";
		$viewOfEventInHtml .= "</table>";
		return $viewOfEventInHtml;
	}
	
	//another variants of view...
}

?>