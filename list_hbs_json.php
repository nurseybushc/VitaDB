<?php
	require_once('db_connection.php');
	/*// Creating connection
	require_once('config.php');
	$con = mysqli_connect($servername, $username, $password, $dbname);
	
	// Checking connection
	if (mysqli_connect_errno()){
		http_response_code(500);
		die("Connection failed: " . mysqli_connect_error());
	}*/
	
	//$con = OpenCon();
	
	//$sth = mysqli_query($con,"SELECT * FROM vitadb WHERE type < 8 ORDER BY date DESC");
	$rows = SelectQuery("SELECT * FROM vitadb WHERE type < 8 ORDER BY date DESC");
	//if ($sth){
		//$rows = array();
		foreach($rows as $row=>$r) { 
			//echo $side . " => " . $direc . "\n";  
		//}
		//while($r = mysqli_fetch_assoc($sth)) {
			
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
			
			//$rows[] = $r;
		}
		
		echo json_encode($rows, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
	//} else {
	//	echo("An error occurred: " . mysqli_error($con));
	//}

	//mysqli_close($con);
	//CloseCon($con);
?>