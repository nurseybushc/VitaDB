<?php
	include './db_connection.php';
	include './constants_sql.php';
	
	$queryName = "list_hbs_json";

	//$rows = SelectQuery($queryName);
	$rows = SelectQuery($statement_select[$queryName]);
	
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
	ob_start('ob_gzhandler');
	echo json_encode($rows);
?>