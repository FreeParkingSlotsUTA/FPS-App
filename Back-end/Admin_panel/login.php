<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$username=$_POST['username'];
$passwd=md5($_POST['passwd']);

$conn = pg_connect("host=localhost port=5432 dbname=db_admin user=postgres password=anan007");
$ret=pg_query($conn, "SELECT * FROM passwd");
$db_usernamepasswd=pg_fetch_row($ret,0);
if(($username==$db_usernamepasswd[0])&&($passwd==$db_usernamepasswd[1])){
	session_start(); 
	$_SESSION['islogin'] = true;
	echo '<meta http-equiv="refresh" content="0;url=../Admin_panel/Index.php"/>';
}else{
	echo "<script language=javascript>alert('The username or the password you entered was incorrect!');history.back();</script>";
}

?>

