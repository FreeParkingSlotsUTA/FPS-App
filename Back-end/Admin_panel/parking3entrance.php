<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$conn = pg_connect("host=localhost port=5432 dbname=db_admin user=postgres password=anan007");
$ret=pg_query($conn, "SELECT * FROM parkingslots");

$entrance3new=$_POST['entrance3new'];

if(is_numeric($entrance3new)==true){
	$sql=<<<EOF
    UPDATE parkingslots SET entrance = '$entrance3new' where parkingid=3;
EOF;
	$ret = pg_query($conn, $sql);
	if(!$ret){
		echo pg_last_error($conn);
		exit;
	} else {
		echo '<script language=javascript>alert("Data has updated successfully!");location.href="parking3.php";</script>';
	}
}else{
	echo "<script language=javascript>alert('Please input valid data!');history.back();</script>";
}




?>