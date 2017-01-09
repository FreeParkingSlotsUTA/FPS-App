<?php

//Setup file, it will create the database tables, and fill them.
//If tables exist and has data, it won't do anything.


error_reporting(E_ALL^E_NOTICE^E_WARNING);
include 'conn.php';

//Create tables if they don't exist
$createParksQuery = "CREATE TABLE IF NOT EXISTS parkingslots(parkingid integer,	entrance integer, exit integer, totalslots integer, freeslots integer, name character varying(20));";
$createUsersQuery = "CREATE TABLE IF NOT EXISTS passwd(username character varying(20), passwd character varying(32));";

pg_query($conn, $createParksQuery);
pg_query($conn, $createUsersQuery);



//Check if admin exists
$checkUserQuery = "SELECT * FROM passwd";

$ret1 = pg_query($conn, $checkUserQuery);

$numrows = pg_numrows($ret1);

if($numrows == 0){
	//Insert default user, with name 'admin' and password '1235'
	$addUserQuery = "INSERT INTO passwd VALUES ('admin','827ccb0eea8a706c4c34a16891f84e7b');";

	pg_query($conn, $addUserQuery);
}




//For each 5 parking space, add a row if it doesn't exist
for($i = 1; $i <= 5; $i++){

	$checkParkQuery = "SELECT * FROM parkingslots where parkingid = ".$i;

	$ret2 = pg_query($conn, $checkParkQuery);

	$rows = pg_numrows($ret2);

	if($rows == 0){
		$addParkQuery = "INSERT INTO parkingslots VALUES (".$i.",0,0,0,0,'');";

		pg_query($conn, $addParkQuery);
	}

}


?>