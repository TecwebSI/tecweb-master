<?php
$dbhost = '172.22.4.232';
$dbusername = 'p804863';
$dbuserpassword = 'p804863';
$default_dbname = 'tecweb_tp';
$dbname = 'tecweb_tp';
$ambienteDesenvolvimento = true;
$ambienteProducao = false;

$linkId = db_connect($default_dbname,$dbhost,$dbusername,$dbuserpassword,$default_dbname);

function db_connect() {
	$link_id = mysql_connect($dbhost,$dbusername,$dbuserpassword);
	if(!$link_id) die("Conexão falhou ao host $dbhost base $default_dbname.<br>".sql_error($link_id));
	else	
		mysql_select_db($dbname,$link_id);
	return $link_id;
}

function sql_error($link) {
	return mysql_errno($link).": ".mysql_error($link);
}


?>