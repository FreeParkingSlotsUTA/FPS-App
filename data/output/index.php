<?php

	include '../conn.php';
		
	$result = pg_query($conn, "SELECT parkingid, freeslots, totalslots, name FROM parkingslots ORDER BY parkingid");
	$numrows = pg_numrows($result);

	if(!$result){
		echo "An error occurred. \n";
		exit;
	}
	
	$data = [];

	for($i = 0; $i < $numrows; $i++) 
	{
	    $row = pg_fetch_array($result, $i);
	    
	    $id = $row[0];
	    $used = $row[1];
	    $total = $row[2];
	    $name = $row[3];

	    $park = new stdClass();

	    $park->parkID = $id;
	    $park->slots = $total - $used;
	    $park->name = $name;

	    if($park->slots < 0){
	    	$park->slots = 0;
	    }

	    $data[] = $park;
	}


	

	echo json_encode($data);


?>