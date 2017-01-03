<?php
//This allows outside access
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

error_reporting(E_ALL^E_NOTICE^E_WARNING);
include '../conn.php';
//camera1,camera2,camera3 are array ('parkid','freeslots') like ('1','20')

$camera1data=$_POST['camera1'];
$camera2data=$_POST['camera2'];
$camera3data=$_POST['camera3'];
$camera4data=$_POST['camera4'];
$camera5data=$_POST['camera5'];

$freeslots1=$camera1data[1];
$freeslots2=$camera2data[1];
$freeslots3=$camera3data[1];
$freeslots4=$camera4data[1];
$freeslots5=$camera5data[1];

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

if($camera4data[0]=='4'){
	$sql=<<<EOF
    UPDATE parkingslots SET freeslots = '$freeslots4' where parkingid=4;
EOF;
	$ret = pg_query($conn, $sql);
	if($ret){

		echo '<script language=javascript>location.href="camera.php";</script>';
	}
}

if($camera5data[0]=='5'){
	$sql=<<<EOF
    UPDATE parkingslots SET freeslots = '$freeslots5' where parkingid=5;
EOF;
	$ret = pg_query($conn, $sql);
	if($ret){

		echo '<script language=javascript>location.href="camera.php";</script>';
	}
}
?>