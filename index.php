<head>
<Meta Http-equiv="Refresh" Content="50" >
<title>Martinky</title>
<link rel="shortcut icon" href="http://www.martinky.com/templates/martinky/favicon.ico">
<style type="text/css">
#parent { 
		}
#childW 	{
 	 	width: 75%; 
		top:49px;	margin-left: auto;	margin-right: auto;
  		}
#childM{	top:49px;	right:2px}
.logoM{ position:absolute;left:10px;top:10px;width:195px; position:fixed;}
.teplota{ position:absolute;left:70px;top:140px; position:fixed; text-align: center;}
.logoA{ position:absolute;left:11px;top:2px;width:250px; position:fixed;}
.obsahM{	top:49px;	right:2px}
.pocasieW{ position:absolute;right:2px;top:2px;width:330px; height:800px; position:fixed;}
.pocasieM{ position:absolute;left:2px;top:250px;width:330px; height:800px; position:fixed;}
.shmuWN{ position:absolute;left:12px;top:230px;width:330px; height:800px; position:fixed;}
.shmuMN{ position:absolute;left:2px;top:850px;width:330px; height:800px; position:fixed;}
.shmuW{ position:absolute;left:12px;top:230px;width:330px; height:800px; position:fixed;}
.shmuM{ position:absolute;left:2px;top:850px;width:330px; height:800px; position:fixed;}
.predpoved{ right:2px;}
.fotoW{ position:absolute;left:70px;top:220px; position:fixed; text-align: center;}
.fotoM{ position:absolute;left:70px;top:135px; position:fixed; text-align: center;}
.modra {color: #0000CC}
.cervena {color: #CC0000}
.cierna {color: #000000}
.zelena {color: #00FF00}
.zlta {color: #FFA500}

</style>
</head>
<body bgcolor="#6633ff">
<?
$data= $_SERVER['HTTP_USER_AGENT'];
$ip= $_SERVER['REMOTE_ADDR'];
$version=substr($data, strpos($data, "(")+1, strpos($data, ")")-strpos($data, "(")-1);
$ver=substr($version , 0, 6);
if ($ver== "Window") 
	{
		$pocasie="class=\"pocasieW\"";
		$foto="class=\"fotoW\"";
		$shmu="class=\"shmuW\"";
		$obsah="id=\"childW\" align=\"center\"";
	}
else 
	{
		$pocasie="class=\"pocasieM\"";
		$foto="class=\"fotoM\"";
		$shmu="class=\"shmuM";
		$obsah="id=\"childM\" align=\"right\"";
	}
echo "<div id=\"parent\">";
echo "<div ".$obsah.">";
//echo "<div id=\"child\">"; 
//<!--
//<a href="https://zima.martinky.com/get-webcam/cam2.jpg" title="Floch dolna" target="_blank">
//<img title="Floch dolna" width="640" height="480" src="https://zima.martinky.com/get-webcam/cam2.jpg"></a><br>
//<a href="https://zima.martinky.com/get-webcam/cam3.jpg" title="ApreSki" target="_blank">
//<img title="ApreSki" width="640" height="480" src="https://zima.martinky.com/get-webcam/cam3.jpg"></a><br>
//<a href="https://zima.martinky.com/get-webcam/cam4.jpg" title="Dvojka" target="_blank">
//<img title="Dvojka" width="640" height="480" src="https://zima.martinky.com/get-webcam/cam4.jpg"></a><br>
//<a href="https://zima.martinky.com/get-webcam/cam5.jpg" title="Bufet" target="_blank">
//<img title="Bufet" width="640" height="480" src="https://zima.martinky.com/get-webcam/cam5.jpg"></a><br>
//-->
?>
<a href="https://www.holidayinfo.sk/sk/Kamera/MartinskeHole/286102" title="Floch Horna" target="_blank">
<img src="http://www.holidayinfo.sk/camera.cgi?c=286102&amp;size=0" width="640" height="480"></a><br>

<a href="http://80.242.35.37:8081" title="Bufet na svahu"><img src="http://80.242.35.37:8081/axis-cgi/jpg/image.cgi?resolution=640x480"></a><br>
<a href="http://80.242.35.37:8082" title="Floch Dolna"><img src="http://80.242.35.37:8082/axis-cgi/jpg/image.cgi?resolution=640x480"></a><br>
<a href="http://80.242.35.37:8083" title="Apres-ski bar"><img src="http://80.242.35.37:8083/axis-cgi/jpg/image.cgi?resolution=640x480"></a><br>
<a href="http://80.242.35.37:8084" title="Chata 2"><img src="http://80.242.35.37:8084/axis-cgi/jpg/image.cgi?resolution=640x480"></a><br>
<iframe src="https://www.meteoblue.com/sk/weather/widget/daily/__6698144?days=7&amp;tempunit=CELSIUS&amp;windunit=KILOMETER_PER_HOUR&amp;precipunit=MILLIMETER&amp;coloured=coloured&amp;pictoicon=1&amp;maxtemperature=1&amp;mintemperature=1&amp;windspeed=1&amp;windgust=1&amp;winddirection=1&amp;uv=1&amp;humidity=1&amp;precipitation=1&amp;precipitationprobability=1&amp;layout=light"
frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 640px;height: 390px"></iframe>
</div>
<div class="logoM"><a href="https://martinky.com/" target="_blank"><img src="./logo.svg?v=1608046547" width="380" height="135" border="0"></a></div>
<div class="teplota">
<?php
//include 'teplota.php';
if (substr($ip ,0 , 7 )!="80.242." )
	{
	echo "<script src=\"//c.pocitadlo.sk/?cid=79aacf4c8c9c007\" type=\"text/javascript\"></script>";
	echo "<noscript><a href=\"https://www.pocitadlo.sk/\">";
	echo "<img src=\"//c1.pocitadlo.sk/?cid=79aacf4c8c9c007\"  style=\"border:none\"/></a></noscript>";
	}
else
	{
	echo "<a href=\"https://www.pocitadlo.sk/\">";
	echo "<img src=\"https://www.pocitadlo.sk/showcounter.php?cid=79aacf4c8c9c007\"  style=\"border:none\"/></a>";
	}
if($_SERVER['REMOTE_ADDR']=="80.242.35.171")
	{
	echo "<a href=\"velin.php\">VELIN</a>";
	}
if(($_SERVER['REMOTE_ADDR']=="80.242.35.241") and (date(H)>16) and  (date(H)<8))
	{
	echo "<div ".$foto."><a href=\"http://172.16.1.139/GetData.cgi?CH=1\"><img src=\"http://172.16.1.139/GetImage.cgi?CH=0\" title=\"KRIZAVA LR1\" 		width=\"140\" height=\"110\"></img></a>";
//echo "<a href=\"http://172.16.1.140/GetData.cgi?CH=1\"><img src=\"http://172.16.1.140/GetImage.cgi?CH=0\" title=\"KRIZAVA LR2\" width=\"140\" height=\"110\"></img></a>";
	echo "<br>";
	echo "<a href=\"http://172.16.1.137/GetData.cgi?CH=1\"><img src=\"http://172.16.1.137/GetImage.cgi?CH=0\" title=\"DVOJKA LR1\" width=\"140\" height=\"110\"></img></a>";
	echo "<a href=\"http://172.16.1.138/GetData.cgi?CH=1\"><img src=\"http://172.16.1.138/GetImage.cgi?CH=0\" title=\"DVOJKA LR2\" width=\"140\" 	height=\"110\"></img></a><br>";
	echo "<a href=\"http://172.16.1.141/GetData.cgi?CH=1\"><img src=\"http://172.16.1.141/GetImage.cgi?CH=0\" title=\"CECKO LR1\" width=\"140\" height=\"110\"></img></a>";
	echo "<a href=\"http://172.16.1.142/GetData.cgi?CH=1\"><img src=\"http://172.16.1.142/GetImage.cgi?CH=0\" title=\"CECKO LR2\" width=\"140\" height=\"110\"></img></a><br>";
	echo "<a href=\"http://172.16.1.132/GetData.cgi?CH=1\"><img src=\"http://172.16.1.132/GetImage.cgi?CH=0\" title=\"FLOCH LR2\" width=\"140\" height=\"110\"></img></a><br>";
	echo "<a href=\"http://172.16.1.133/GetData.cgi?CH=1\"><img src=\"http://172.16.1.133/GetImage.cgi?CH=0\" title=\"FLOCH LR3\" width=\"140\" height=\"110\"></img></a>";
	echo "<a href=\"http://172.16.1.134/GetData.cgi?CH=1\"><img src=\"http://172.16.1.134/GetImage.cgi?CH=0\" title=\"FLOCH LR4\" width=\"140\" height=\"110\"></img></a><br>";
	echo "<a href=\"http://172.16.1.135/GetData.cgi?CH=1\"><img src=\"http://172.16.1.135/GetImage.cgi?CH=0\" title=\"FLOCH LR5\" width=\"140\" height=\"110\"></img></a>";
	echo "<a href=\"http://172.16.1.136/GetData.cgi?CH=1\"><img src=\"http://172.16.1.136/GetImage.cgi?CH=0\" title=\"FLOCH LR6\" width=\"140\" height=\"110\"></img></a></div>";
	}
else
	$nie="NIE";
echo "</div><div ".$pocasie.">";
include 'pocasie.php';
if ($nie=="NIE")
	{
	echo "</div><div ".$shmu."N\">";
	}
else
	{
	echo "</div><div ".$shmu."\">";
	}
include 'shmu.php';
?>
</div>
</div>
</body>
</html>

