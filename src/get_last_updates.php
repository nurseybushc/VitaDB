<?php
	include './db_connection.php';
	include './constants_sql.php';

	$queryName = "get_last_updates";

	//$rows = SelectQuery($queryName);
	$rows = SelectQuery($statement_select[$queryName]);
	
	header('Content-Type: application/json');
	ob_start('ob_gzhandler');
	echo json_encode($rows);
?>