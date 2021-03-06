<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
session_start();
if(!$_SESSION['islogin']){
	echo '<meta http-equiv="refresh" content="0;url=../admin/login.html"/>';exit;
}

include '../conn.php';

$ret=pg_query($conn, "SELECT parkingid,name FROM parkingslots ORDER BY parkingid ASC");

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="./bootstrap2.3.2/css/bootstrap.min.css" rel="stylesheet" />
    <title>Admin Panel</title>
    <link href="./css/Common.css" rel="stylesheet" />
    <link href="./css/Index.css" rel="stylesheet" />
</head>
<body>
    <div class="header">

        <label class="logo-title">Administrator Panel</label>
        <ul class="inline">
            <li>
                <img src="./images/32/client.png" />&nbsp;&nbsp;Welcome,Admin
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle mymsg" data-toggle="dropdown" href="#"><img src="./images/32/166.png" />&nbsp;&nbsp;Personal Data<b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="../admin/ChangePassword.html" target="show">Change Password</a></li>
                </ul>

            </li>
            <li>
                <a class="loginout" href="../admin/logout.php"><img src="./images/32/200.png" />&nbsp;&nbsp;LOGOUT</a>
            </li>

        </ul>


    </div>


    <div class="nav">

        <ul class="breadcrumb">
            <li>
                <img src="./images/32/5025_networking.png" />
            </li>
            <li><a href="../admin/Index2.php" target="show">Front page</a> <span class="divider">>></span></li>
            <li class="active"></li>
        </ul>
    </div>



    
    
     <div class="container-fluid content">
        <div class="row-fluid">
            <div class="span2 content-left">
                <div class="accordion">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                <img class="left-icon" src="./images/32/parkingslots.png" /><span class="left-title">Parking Slots</span>
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">


                            <?php
                                $i = 0;
                                while($db_parkingslots = pg_fetch_array($ret,$i, PGSQL_BOTH)) {

                                    $pid = $db_parkingslots[0];
                                    $name = $db_parkingslots[1];
                                    ?>
                                 <div class="accordion-inner"><a href="parking.php?id=<?= $pid ?>" target="show">
                                <img class="left-icon-child" src="./images/32/parking-signal.jpg" /><span class="left-body"> <?= $name ?></span>
                            </div>
                            <?php $i++; } ?>

                        </div>
                    </div>
                </div>

            </div>

            <div class="span10 content-right">
                <iframe src="Index2.php" class="iframe" name="show"></iframe>
            </div>
        </div>
    </div>

    <script src="./scripts/jquery-1.9.1.min.js"></script>
    <script src="./bootstrap2.3.2/js/bootstrap.min.js"></script>
    <script src="./scripts/Index.js"></script>
	

</body>
</html>
