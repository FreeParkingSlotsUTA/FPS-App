<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
include '../conn.php';
$ret=pg_query($conn, "SELECT * FROM parkingslots");


$exit1new=$_POST['exit1new'];
$id=$_POST['id'];

if(is_numeric($exit1new)==true){
	$sql=<<<EOF
    UPDATE parkingslots SET exit = '$exit1new' where parkingid='$id';
EOF;
	$ret = pg_query($conn, $sql);
	if(!$ret){
		echo pg_last_error($conn);
		exit;
	} else {
		echo '<script language=javascript>alert("Data has updated successfully!");location.href="parking1.php";</script>';
	}
}else{
	echo "<script language=javascript>alert('Please input valid data!');history.back();</script>";
}


?>