<?php 
	$server     = 'localhost';
	$username   = 'root';
	$password   = '';
	$database   = 'aluni_v2';
	
	mysql_connect($server, $username, $password) OR DIE ();
	mysql_select_db($database) OR DIE ();
?>