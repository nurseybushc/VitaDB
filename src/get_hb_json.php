<?php
	include './db_connection.php';
	include './constants_sql.php';
	
	$queryName = "get_hb_json";

	$id = $_GET['hid'];

	$rows = SelectQueryWithParams($statement_select[$queryName], array("i"), array($id));
	
	foreach($rows as $row=>$r) {
		
		// Downloads counter support
		$masked_link = "https://vitadb.rinnegatamante.it/get_hb_link.php?id=" . $r['id'];
		$r['url'] = $masked_link;
		
		// Redirect patch for when bintray is off
		//$data_link = $r['data'];
		//$data_link = str_replace("https://bintray.com/vitadb/VitaDB/download_file?file_path=",
		//	"https://dl.coolatoms.org/vitadb/",
		//	$data_link);
		//$data_link = str_replace("%2F", "/", $data_link);
		//$data_link = str_replace("+", " ", $data_link);
		//unset($r['data']);
		//$r['data'] = $data_link;
	}

	header('Content-Type: application/json');
	header('Cache-Control: public, max-age=3600'); //cache for 1 hour
	ob_start('ob_gzhandler');
	echo json_encode($rows);
?>