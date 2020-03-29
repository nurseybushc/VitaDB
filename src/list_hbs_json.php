<?php
	include './db_connection.php';
	
	$queryName = "list_hbs_json";
	$rows = SelectQuery($queryName);
	
	foreach($rows as $row=>$r) {
		
		// Downloads counter support
		$masked_link = "https://vitadb.rinnegatamante.it/get_hb_link.php?id=" . $r['id'];
		unset($r['url']);
		$r['url'] = $masked_link;
		
		// Redirect patch for when bintray is off
		$data = $r['data'];
		$data = str_replace("https://bintray.com/vitadb/VitaDB/download_file?file_path=",
			"https://dl.coolatoms.org/vitadb/",
			$data);
		$data = str_replace("%2F", "/", $data);
		$data = str_replace("+", " ", $data);
		unset($r['data']);
		$r['data'] = $data;
	}

	header('Content-Type: application/json');
	header('Cache-Control: public, max-age=3600'); //cache for 1 hour
	ob_start('ob_gzhandler');
	echo json_encode($rows);
?>