<?php
	include './db_connection.php';
	
	$id = $_GET['hid'];
	$queryName = "get_hb_json";
	$rows = SelectQuery($queryName, array($id=>"i"), array($id));
	
	foreach($rows as $row=>$r) {
		// Downloads counter support
		$masked_link = "https://vitadb.rinnegatamante.it/get_hb_link.php?id=" . $r['id'];
		$r['url'] = $masked_link;
	}

	header('Content-Type: application/json');
	header('Cache-Control: public, max-age=3600'); //cache for 1 hour
	ob_start('ob_gzhandler');
	echo json_encode($rows);
?>