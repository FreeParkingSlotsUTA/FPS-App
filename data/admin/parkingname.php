<?php

include '../conn.php';

$id = 1;

$possibleIds = [1,2,3,4,5];

if(isset($_GET["id"]) && in_array($_GET["id"], $possibleIds)){
	$id = $_GET["id"];
}

error_reporting(E_ALL^E_NOTICE^E_WARNING);

$namenew=$_POST['namenew'];

$isValid = true;

if(isValid){
	$sql= "UPDATE parkingslots SET name = '".$namenew."' where parkingid = ".$id;

	$ret = pg_query($conn, $sql);
	if(!$ret){
		echo pg_last_error($conn);
		exit;
	} else {
		echo '<script language=javascript>alert("Data has updated successfully!");location.href="parking.php?id='.$id.'";</script>';
	}
}else{
	echo "<script language=javascript>alert('Please input valid data!');history.back();</script>";
}




?>