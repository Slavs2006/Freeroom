<?php
function openLink() {
	$Link = mysql_connect('localhost','guest','');
	@mysql_query("SET NAMES 'cp1251'", $Link);
	if ($Link) {
		mysql_select_db('univercity');
	}
}
function closeLink() {
	
}	
?>