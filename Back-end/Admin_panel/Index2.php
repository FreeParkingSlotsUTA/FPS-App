<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Welcome</title>
</head>
<body onload="setTime()" style="background-image: url('./images/bg.jpg'); background-size:cover">
	<h2 align="center" style="font-family: verdana,arial,sans-serif;">Welcome to the administrator panel of Free Parking Slots!</h2>	
	<h3 id="time" align="center" style="font-family: verdana,arial,sans-serif;"></h3>
	<style type="text/css">
	.mod{
	background:url('./images/32/button_orange.jpg');
	background-size:cover;
	border: 1px solid black; 
	padding: 22px 65px; 
	border-radius: 20px; 
	padding-left:65px;
	color:black;
	font-size:35px;
	font-family: verdana,arial,sans-serif;
	}
	.mod:hover{
	border: 5px solid red;
	}
	</style>
	<script>
         function setTime(){
			var date = new Date();
			var y = date.getFullYear();
			var m = date.getMonth()+1;
			var d = date.getDate();
			var hh = date.getHours();
			var mm = date.getMinutes();
			var ss = date.getSeconds();
			var w = date.getDay();
			m = setFormat(m);
			d = setFormat(d);
			hh = setFormat(hh);
			mm = setFormat(mm);
			ss = setFormat(ss);
			document.getElementById('time').innerHTML=y + "/" + m + "/" + d + " " + hh + ":" + mm + ":" + ss;
			t = setTimeout(function(){
					setTime(),1000
				});
             } 
         function setFormat(x){
				if(x<10){
					x="0"+x;
				}
				return x;
         }
	</script>
	<table align="center" style="font-family: verdana,arial,sans-serif;">
		
		<tr>
		<td><a href="parking1.php"><div class="mod">Parking1</div></a></td>
		</tr>
		<tr>
		<td><a href="parking2.php"><div class="mod">Parking2</div></a></td>
		</tr>
		<tr>
		<td><a href="parking3.php"><div class="mod">Parking3</div></a></td>
		</tr>
	</table>
	
</body>
</html>
