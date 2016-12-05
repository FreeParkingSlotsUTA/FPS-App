<?php

error_reporting(E_ALL^E_NOTICE^E_WARNING);
$conn = pg_connect("host=localhost port=5432 dbname=db_admin user=postgres password=anan007");
//camera1,camera2,camera3 are array ('parkid','freeslots') like ('1','20')

$camera1data=$_POST['camera1'];
$camera2data=$_POST['camera2'];
$camera3data=$_POST['camera3'];

$freeslots1=$camera1data[1];
$freeslots2=$camera2data[2];
$freeslots3=$camera3data[3];

if($camera1data[0]=='1'){
	$sql=<<<EOF
    UPDATE parkingslots SET freeslots = '$freeslots1' where parkingid=1;
EOF;
	$ret = pg_query($conn, $sql);
	if($ret){

		echo '<script language=javascript>location.href="camera.php";</script>';
	}
}

if($camera2data[0]=='2'){
	$sql=<<<EOF
    UPDATE parkingslots SET freeslots = '$freeslots2' where parkingid=2;
EOF;
	$ret = pg_query($conn, $sql);
	if($ret){

		echo '<script language=javascript>location.href="camera.php";</script>';
	}
}

if($camera3data[0]=='3'){
	$sql=<<<EOF
    UPDATE parkingslots SET freeslots = '$freeslots3' where parkingid=3;
EOF;
	$ret = pg_query($conn, $sql);
	if($ret){

		echo '<script language=javascript>location.href="camera.php";</script>';
	}
}
?>