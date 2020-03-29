<?php
	include './db_connection.php';

	$queryName = "get_last_updates";
	$rows = SelectQuery($queryName);
	
	header('Content-Type: application/json');
	header('Cache-Control: public, max-age=3600'); //cache for 1 hour
	ob_start('ob_gzhandler');
	echo json_encode($rows);
?>