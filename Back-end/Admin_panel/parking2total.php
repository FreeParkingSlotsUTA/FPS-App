<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$conn = pg_connect("host=localhost port=5432 dbname=db_admin user=postgres password=anan007");
$ret=pg_query($conn, "SELECT * FROM parkingslots");


$total2new=$_POST['total2new'];


if($total2new!=''){
	$sql=<<<EOF
    UPDATE parkingslots SET totalslots = '$total2new' where parkingid=2;
EOF;
	$ret = pg_query($conn, $sql);
	if(!$ret){
		echo pg_last_error($conn);
		exit;
	} else {
		echo '<script language=javascript>alert("Data has updated successfully!");location.href="parking2.php";</script>';
	}
}else{
	echo "<script language=javascript>alert('The new data should not be empty!');history.back();</script>";
}



?>