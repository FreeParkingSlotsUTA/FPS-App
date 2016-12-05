<?php
	
	
	$dbconn = pg_connect("host=localhost dbname=parking user=null password=null")
		or die('Could not connect: ' . pg_last_error());
		
	$result1 = pg_query($dbconn, "SELECT PAreaId(1), NumberOfSlots, SlotsOccupied FROM ParkingArea");
	if(!$result1){
		echo "An error occurred. \n";
		exit;
	}
	$result2 = pg_query($dbconn, "SELECT PAreaId(2), NumberOfSlots, SlotsOccupied FROM ParkingArea");
	if(!$result2){
		echo "An error occurred. \n";
		exit;
	}
	$result3 = pg_query($dbconn, "SELECT PAreaId(3), NumberOfSlots, SlotsOccupied FROM ParkingArea");
	if(!$result3){
		echo "An error occurred. \n";
		exit;
	}
	
	$row1 = pg_fetch_row($result1);
	$row2 = pg_fetch_row($result2);
	$row3 = pg_fetch_row($result3);
	
	
	$park1 = array(
		'parkId' => row1[0],
		'slots' => row1[1] - row1[2]
	);

	$park2 = array(
		'parkId' => row2[0],
		'slots' => row2[1] - row2[2]
	);

	$park3 = array(
		'parkId' => row3[0],
		'slots' => row3[1] - row3[2]
	);


	echo json_encode($park1);
	echo json_encode($park2);
	echo json_encode($park3);


?>