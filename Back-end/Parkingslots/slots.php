<?php
	
	
	$dbconn = pg_connect("host=localhost port=5432 dbname=db_admin user=postgres password=anan007")
		or die('Could not connect: ' . pg_last_error());
		
	$result1 = pg_query($dbconn, "SELECT parkingid, totalslots, freeslots FROM parkingslots where parkingid = 1");
	if(!$result1){
		echo "An error occurred. \n";
		exit;
	}
	$result2 = pg_query($dbconn, "SELECT parkingid, totalslots, freeslots FROM parkingslots where parkingid = 2");
	if(!$result2){
		echo "An error occurred. \n";
		exit;
	}
	$result3 = pg_query($dbconn, "SELECT parkingid, totalslots, freeslots FROM parkingslots where parkingid = 3");
	if(!$result3){
		echo "An error occurred. \n";
		exit;
	}
	
	$row1 = pg_fetch_row($result1);
	$row2 = pg_fetch_row($result2);
	$row3 = pg_fetch_row($result3);
	
	
	$park1 = array(
		'parkID' => $row1[0],
		'slots' => $row1[1] - $row1[2]
	);

	$park2 = array(
		'parkID' => $row2[0],
		'slots' => $row2[1] - $row2[2]
	);

	$park3 = array(
		'parkID' => $row3[0],
		'slots' => $row3[1] - $row3[2]
	);


	echo "[".json_encode($park1),",".json_encode($park2),",".json_encode($park3)."]";


?>