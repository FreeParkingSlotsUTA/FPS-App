<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$conn = pg_connect("host=localhost port=5432 dbname=db_admin user=postgres password=anan007");
$ret=pg_query($conn, "SELECT * FROM parkingslots");


$free1new=$_POST['free1new'];

if($free1new!=''){
	$sql=<<<EOF
    UPDATE parkingslots SET freeslots = '$free1new' where parkingid=1;
EOF;
	$ret = pg_query($conn, $sql);
	if(!$ret){
		echo pg_last_error($conn);
		exit;
	} else {
		echo '<script language=javascript>alert("Data has updated successfully!");location.href="parking1.php";</script>';
	}
}else{
	echo "<script language=javascript>alert('The new data should not be empty!');history.back();</script>";
}



?>