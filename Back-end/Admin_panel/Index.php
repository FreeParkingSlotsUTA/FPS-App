<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
session_start();
if(!$_SESSION['islogin']){
	echo '<meta http-equiv="refresh" content="0;url=http://localhost/xampp/Admin_panel/login.html"/>';exit;
}
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
                    <li><a href="/xampp/Admin_panel/ChangePassword.html" target="show">Change Password</a></li>
                </ul>

            </li>
            <li>
                <img src="./images/32/200.png" />&nbsp;&nbsp;<a class="loginout" href="/xampp/Admin_panel/login.html" <?php session_unset();session_destroy();?>>LOGOUT</a>
            </li>

        </ul>


    </div>


    <div class="nav">

        <ul class="breadcrumb">
            <li>
                <img src="./images/32/5025_networking.png" />
            </li>
            <li><a href="/xampp/Admin_panel/Index2.php" target="show">Front page</a> <span class="divider">>></span></li>
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
                                <img class="left-icon" src="./images/32/5026_settings.png" /><span class="left-title">Columns</span>
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                            <a href="column1.html" target="show"><div class="accordion-inner">
                                <img class="left-icon-child" src="./images/32/4962_sitemap.png" /><span class="left-body"> column1</span>
                            </div></a>
                            <a href="column2.html" target="show"><div class="accordion-inner">
                                <img class="left-icon-child" src="./images/32/4957_customers.png" /><span class="left-body"> column2</span>
                            </div></a>
                            
                        </div>
                    </div>
                </div>

            </div>

            <div class="span10 content-right">
            <iframe src="/xampp/Admin_panel/Index2.php" class="iframe" name="show"></iframe>   
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="foot"></div>
    <script src="./scripts/jquery-1.9.1.min.js"></script>
    <script src="./bootstrap2.3.2/js/bootstrap.min.js"></script>
    <script src="./scripts/Index.js"></script>
	<div style="text-align:center;">
</div>

</body>
</html>