<?php
	include './db_connection.php';

	$rows = SelectQuery("SELECT * FROM vitadb_log ORDER BY id DESC LIMIT 5");
	
	header('Content-Type: application/json');
	ob_start('ob_gzhandler');
	echo json_encode($rows);
?>