<?php

function openConnection () {
	$Link = mysql_connect('localhost','root','');
	@mysql_query("SET NAMES 'cp1251'", $Link);
	if ($Link) {
		mysql_select_db('univercity');
	}
}

function closeConnection () {
	//??
}
		
?>