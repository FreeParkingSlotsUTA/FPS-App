<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$passwdold=md5($_POST['passwdold']);
$passwdnew=md5($_POST['passwdnew']);
$passwdnewagain=md5($_POST['passwdnewagain']);
include '../conn.php';
$ret=pg_query($conn, "SELECT * FROM passwd");
$db_usernamepasswd=pg_fetch_row($ret,0);

if($passwdold==$db_usernamepasswd[1]){
    if(($passwdnew!=md5(''))&&($passwdnewagain!=md5(''))){
		if(!preg_match("/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:\"\<\>,\.\?\\\ ]/", $passwdnew)) {
					
			if($passwdnew==$passwdnewagain){
			$sql=<<<EOF
		UPDATE passwd SET passwd = '$passwdnew';
EOF;
			$ret = pg_query($conn, $sql);
			if(!$ret){
				echo pg_last_error($conn);
				exit;
			} else {
				echo "<script language=javascript>alert('Password has updated successfully!');history.back();</script>";
			}
			}else{
			echo "<script language=javascript>alert('The two passwords you entered are not same!');history.back();</script>";
			}
		}else{
			echo "<script language=javascript>alert('The new password should not have special characters!');history.back();</script>";
		}
    
    }else{
    	echo "<script language=javascript>alert('The new password should not be empty!');history.back();</script>";
    }
}else{
	echo "<script language=javascript>alert('The old password you entered was incorrect!');history.back();</script>";
}

?>