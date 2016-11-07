<?php
	
	/*
	$dbconn = pg_connect("host=localhost dbname=parking user=null password=null")
		or die('Could not connect: ' . pg_last_error());
		
	$park1 = pg_query('SELECT PAreaId(1), NumberOfSlots, SlotsOccupied FROM ParkingArea....') or die('Query failed: ' . pg_last_error());
	$park2 = pg_query('SELECT PAreaId(2), NumberOfSlots, SlotsOccupied FROM ParkingArea....') or die('Query failed: ' . pg_last_error());
	$park3 = pg_query('SELECT PAreaId(3), NumberOfSlots, SlotsOccupied FROM ParkingArea....') or die('Query failed: ' . pg_last_error());
	*/
	
	$park1 = array(
		'parkId' => 1,
		'slots' => 5
	);

	$park2 = array(
		'parkId' => 2,
		'slots' => 0
	);

	$park3 = array(
		'parkId' => 3,
		'slots' => 11
	);


	echo json_encode($park1);
	echo json_encode($park2);
	echo json_encode($park3);
	
	/*
	pg_free_result($park1);
	pg_free_result($park2);
	pg_free_result($park3);
	pg_close($dbconn);
	*/


?>