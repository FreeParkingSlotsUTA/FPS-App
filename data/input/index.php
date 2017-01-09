<?php

error_reporting(E_ALL^E_NOTICE^E_WARNING);
include '../conn.php';
$sql = "";

for($i = 1; $i <= 5; $i++){

	$item = new stdClass();

	if(isset($_GET["p".$i])){

		$tmp = $_GET["p".$i];

		if(is_numeric($tmp)){

			$cars = $tmp;
			$id = $i;

			$query = "UPDATE parkingslots SET freeslots = '".$cars."' where parkingid=".$id.";";

			$sql .= $query;

		}

	}

}

if($sql != ""){
	$ret = pg_query($conn, $sql);
}

?>