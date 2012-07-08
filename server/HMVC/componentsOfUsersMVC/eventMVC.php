<?php

//2. getEvent = function of AJAX (date, pare, aud, status). return HTML of event at selected day+pare

require_once '../componentsOfUsersMVC/EventClass.php';

class ControllerOfEvent {
	function ControllerOfEvent () {
		$this->$modelOfEvent = new ModelOfEvent;
		$this->$viewOfEvent = new ViewOfEvent;
	}
	
	var $modelOfEvent;
	var $viewOfEvent;
}

class ModelOfEvent {
	function ModelOfEvent () {
		
	}
	function tableNameFromDate($_date) {
		// construct table name from date
		return $oddOrEven.'_'.$dayOfWeek;
	}
	function getEvent($_date, $_pare, $_aud, $_status) {
		$findedEvent = new Event;
		
		$queryAuditoryIdSelect = mysql_query("SELECT id_aud FROM auditory WHERE nummer_aud='".$_aud."' and id_adress='1'");
		$idAuditory = mysql_fetch_assoc($query);
		if (!$idAuditory) {
			return 	$findedEvent; // WTF ???
		}
		$idAuditory = $idAuditory['id_aud'];
		
		switch ($_status) {
			case 'singleUse' :	$tableNameForQuery = 'reserved_auditories';	//reserved for one time
								break;
			case 'constant' :	$tableNameForQuery = tableNameFromDate($_date);//from shedule
								break;
			default :			return 	$findedEvent; // WTF ???
		}
		
		$queryInfoAboutPara = mysql_query("SELECT * FROM ".$tableNameForQuery." WHERE id_adress='1' and nummer_paar='".$_pare."' and id_aud='".$idAuditory."'");
		$fInfoAboutPara = mysql_fetch_assoc($queryInfoAboutPara);
		if (!$fInfoAboutPara) {
			return 	$findedEvent; // WTF ???
		}
		
		$queryInfoPrepod = mysql_query("SELECT * FROM prep WHERE id_prep='".$fInfoAboutPara['id_prepod']."'");
		$fInfoPrepod = mysql_fetch_assoc($queryInfoPrepod);
		if (!$fInfoPrepod) {
			return 	$findedEvent; // WTF ???
		}
		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		//! restruct all db table of shedule (omeTimeReserved and constantShedulle) to some ONE type of naming next fields : !
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
	
		return $findedEventObj; //Event class discripted above ^
	}
}

class ViewOfEvent {
	function ViewOfEvent () {
		
	}
	function buildHtmlView ($_eventObj) {
		...//construct html of event
		return $viewOfEventInHtml;
	}
	
	//another variants of view...
}

?>