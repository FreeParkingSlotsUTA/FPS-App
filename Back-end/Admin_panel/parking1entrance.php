<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
include '../conn.php';
$ret=pg_query($conn, "SELECT * FROM parkingslots");

$entrance1new=$_POST['entrance1new'];

	if(is_numeric($entrance1new)==true){
    	$sql=<<<EOF
    UPDATE parkingslots SET entrance = '$entrance1new' where parkingid=1;
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