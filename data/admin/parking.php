<?php

include '../conn.php';

$id = 1;

$possibleIds = [1,2,3,4,5];

if(isset($_GET["id"]) && in_array($_GET["id"], $possibleIds)){
	$id = $_GET["id"];
}

session_start();
error_reporting(E_ALL^E_NOTICE^E_WARNING);

$ret=pg_query($conn, "SELECT * FROM parkingslots WHERE parkingid = ".$id);
$db_parkingslots=pg_fetch_row($ret,0);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Parking - <?= $db_parkingslots[5] ?></title>
</head>
<body style="background-image: url('./images/bg.jpg'); background-size:cover">
<h2 align="center" style="font-family: verdana,arial,sans-serif;"><?= $db_parkingslots[5] ?></h2>
<style type="text/css">
.mod{
	background:#00BFFF;
	border: 2px solid black; 
	padding: 7px 0px; 
	border-radius: 3px; 
	padding-left:5px;
	color:white;
	font-family: verdana,arial,sans-serif;
}
.mod:hover{
	border: 2px solid red;
}
.bk{
	border: 2px solid black; padding: 7px 0px; border-radius: 3px; padding-left:5px; background-color: #FFFFF0;
}
.bk1{
	border: 2px solid red; padding: 7px 0px; border-radius: 3px; padding-left:5px;
}
table.imagetable {
	font-family: verdana,arial,sans-serif;
	font-size:15px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
}
table.imagetable th {
	background:#b5cfd2 url('./images/cell-blue.jpg');
	border-width: 1px;
	padding: 18px;
	border-style: solid;
	border-color: #999999;
	text-align:center;
}
table.imagetable td {
	background:#dcddc0 url('./images/cell-grey.jpg');
	border-width: 1px;
	padding: 18px;
	border-style: solid;
	border-color: #999999;
	text-align:center;
}
.white_content {
 display: none;
 position: absolute;
 top: 25%;
 left: 25%;
 width: 50%;
 padding: 6px 16px;
 border: 12px solid #AFEEEE;
 background-color: #FFFFF0;
 z-index:1002;
 overflow: auto;
}
.black_overlay {
 display: none;
 position: absolute;
 top: 0%;
 left: 0%;
 width: 100%;
 height: 100%;
 background-color:#f5f5f5;
 z-index:1001;
 -moz-opacity: 0.8;
 opacity:.80;
 filter: alpha(opacity=80);
}
.close {
 float:right;
 clear:both;
 width:100%;
 text-align:right;
 margin:0 0 6px 0
}
.close a {
 color:#333;
 text-decoration:none;
 font-size:14px;
 font-weight:700
}
.con {
 text-indent:1.5pc;
 line-height:21px;
text-align:center;
}
</style>
<script>
function show(tag){
 var light=document.getElementById(tag);
 var fade=document.getElementById('fade');
 light.style.display='block';
 fade.style.display='block';
 }
function hide(tag){
 var light=document.getElementById(tag);
 var fade=document.getElementById('fade');
 light.style.display='none';
 fade.style.display='none';
}
</script>

	<table width="90%" border="1" align="center" class="imagetable">
		<tr>
			<th>Park ID</th>
			<th>Name</th>
			<th>Entrance</th>
			<th>Exit</th>
			<th>Total Slots</th>
			<th>Used Slots</th>
		</tr>
		<tr>
			<td><?php echo $db_parkingslots[0];?></td>
			<td><?php echo $db_parkingslots[5];?></td>
			<td><?php echo $db_parkingslots[1];?></td>
			<td><?php echo $db_parkingslots[2];?></td>
			<td><?php echo $db_parkingslots[3];?></td>
			<td><?php echo $db_parkingslots[4];?></td>
		</tr>
		<tr>
			<th>
				
			</th>
			<th>
				<input value="Modify " style="width:50%;" type="submit" class="mod" href="javascript:void(0)" onclick="show('light')">
			</th>
				<div id="light" class="white_content">
	      			<div class="close"><a href="javascript:void(0)" onclick="hide('light')"><img src="./images/32/103.png"></a></div>
	      				<div class="con">
	      					<form action='parkingname.php?id=<?= $db_parkingslots[0] ?>' method="post"> 
			      					Park Name:
			       					<input name="namenew" placeholder="input new data" type="text" class="bk" onmouseout="this.className='bk'" onmousemove="this.className='bk1'" />
								<input value="CONFIRM " type="submit" class="mod">
							</form>							
	     				</div>
				</div>
			<th>
				<input value="Modify " style="width:50%;" type="submit" class="mod" href="javascript:void(0)" onclick="show('light')">
			</th>
				<div id="light" class="white_content">
	      			<div class="close"><a href="javascript:void(0)" onclick="hide('light')"><img src="./images/32/103.png"></a></div>
	      				<div class="con">
	      					<form action='parkingentrance.php?id=<?= $db_parkingslots[0] ?>' method="post"> 
			      					Number of Entrance:
			       					<input name="entrancenew" placeholder="input new data" type="text" class="bk" onmouseout="this.className='bk'" onmousemove="this.className='bk1'" />
								<input value="CONFIRM " type="submit" class="mod">
							</form>							
	     				</div>
				</div>
			<th>
				<input value="Modify " style="width:50%;" type="submit" class="mod" href="javascript:void(0)" onclick="show('light2')">
			</th>
				<div id="light2" class="white_content">
	      			<div class="close"><a href="javascript:void(0)" onclick="hide('light2')"><img src="./images/32/103.png"></a></div>
	      				<div class="con">
	      					<form action='parkingexit.php?id=<?= $db_parkingslots[0] ?>' method="post"> 
			      					Number of Exit:
			       					<input name="exitnew" placeholder="input new data" type="text" class="bk" onmouseout="this.className='bk'" onmousemove="this.className='bk1'" />
								<input value="CONFIRM " type="submit" class="mod">
							</form>
	     				</div>
				</div>
			<th>
				<input value="Modify " style="width:50%;" type="submit" class="mod" href="javascript:void(0)" onclick="show('light3')">
			</th>
				<div id="light3" class="white_content">
	      			<div class="close"><a href="javascript:void(0)" onclick="hide('light3')"><img src="./images/32/103.png"></a></div>
	      				<div class="con">
	      					<form action='parkingtotal.php?id=<?= $db_parkingslots[0] ?>' method="post"> 
			      					Total slots:
			       					<input name="totalnew" placeholder="input new data" type="text" class="bk" onmouseout="this.className='bk'" onmousemove="this.className='bk1'" />
								<input value="CONFIRM " type="submit" class="mod">
							</form>
	     				</div>
				</div>
			<th>
				<input value="Modify " style="width:50%;" type="submit" class="mod" href="javascript:void(0)" onclick="show('light4')">
			</th>
				<div id="light4" class="white_content">
	      			<div class="close"><a href="javascript:void(0)" onclick="hide('light4')"><img src="./images/32/103.png"></a></div>
	      				<div class="con">
	      					<form action='parkingfree.php?id=<?= $db_parkingslots[0] ?>' method="post"> 
			      					Free Slots:
			       					<input name="freenew" placeholder="input new data" type="text" class="bk" onmouseout="this.className='bk'" onmousemove="this.className='bk1'" />
								<input value="CONFIRM " type="submit" class="mod">
							</form>
	     				</div>
				</div>
		</tr>
	</table>

	<div id="fade" class="black_overlay"></div>

</body>
</html>