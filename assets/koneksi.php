<?php
	$host = '139.59.226.31';
	$username = "cendana";
	$password = 'cendananr2425';
	$db = 'cendana_auwfar_blog';

	$conn = mysql_connect($host, $username, $password);

	mysql_select_db($db, $conn);
?>