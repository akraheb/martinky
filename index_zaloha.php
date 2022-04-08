<head>
<Meta Http-equiv="Refresh" Content="20" >
<title>Martinky</title>
<link rel="shortcut icon" href="http://www.martinky.com/templates/martinky/favicon.ico">
<style type="text/css">
.logoM{ position:absolute;left:2px;top:2px;width:195px; position:fixed;}
.logoA{position:absolute;left:11px;top:2px;width:204px; position:fixed;}
.obsah{left:2px;top:2px; position:relative}
.pocasie{ position:absolute;left:912px;top:2px; position:fixed;}
</style>
</head>
<body bgcolor="#474a8a">
<div class="obsah" align="center">
<a href="http://80.242.35.37:8081" title="Bufet na svahu"><img src="http://80.242.35.37:8081/axis-cgi/jpg/image.cgi?resolution=640x480"></a>
<a href="http://80.242.35.37:8082" title="Floch Dolna"><img src="http://80.242.35.37:8082/axis-cgi/jpg/image.cgi?resolution=640x480"></a><br>
<a href="http://80.242.35.37:8083" title="Apres-ski bar"><img src="http://80.242.35.37:8083/axis-cgi/jpg/image.cgi?resolution=640x480"></a>
<a href="http://80.242.35.37:8084" title="Chata 2"><img src="http://80.242.35.37:8084/axis-cgi/jpg/image.cgi?resolution=640x480"></a><br>
<a href="martinky.php" title="Floch Horna"><img src="http://www.holidayinfo.sk/camera.cgi?c=286102&amp;size=0" width="640" height="480"></a>
<a href="martinky.php" title="TEST"><iframe src="teplota.php" frameborder="0" width="480" height="640"></iframe></a>
<!-- toto je poznámka v HTML 
<?
if (($_SERVER['REMOTE_ADDR']!="66.249.66.87")||($_SERVER['REMOTE_ADDR']!="66.249.71.235")||($_SERVER['REMOTE_ADDR']!="66.249.66.55")||($_SERVER['REMOTE_ADDR']!="80.242.34.5") ) //kontorla IP adreise
{$y=date(y); //rok
$m=date(m); //mesiac
$d=date(d); //den
$H=date(H); //hodina
$o=date(i); //minuta
if ($o<59) $i=49; //uprava minut na nazov suboru
if ($o<49) $i=39;
if ($o<39) $i=29;
if ($o<39) $i=29;
if ($o<29) $i=19;
if ($o<19) $i="09";
//prechod cez mesiac
if (($H==0)and($o==0)and($d==1))
	$m=$m-1;
//prechod cez polnoc
if (($H==0)and($o==0)) 
	$d=$d-1;
//prechod cez hodinu
if ($o<9)
  {
   $i=59;
   $H=$H-1;
  } 
echo "http://meteo.hzs.sk/Images/webcam/00015/img_20201227_1000_20201227616572.jpg";
echo $obr="http://meteo.hzs.sk/Images/webcam/00015/img_".($y+2000).$m.$d."_".$H."00_".($y+2000).$m.$d."616572.jpg";
for ($j=0;$j<1;$j++)  //jk-ln
	{
	 for($k=0;$k<2;$k++)
	 	{
		 for($l=0;$l<10;$l++)
		 	{
			 for($n=0;$n<10;$n++)
				{
				 //echo $obr="http://meteo.hzs.sk/Images/webcam/00015/img_".($y+2000).$m.$d."_".$H."00_".($y+2000).$m.$d."616572.jpg";
				 $size=GetImageSize($obr);
				 if ($size[3]) //existencia suboru
				 	{
					 //echo "<a href=\"martinky.php\" title=\"Chata Dvojka\"><img src=\"".$obr."\" height=\"480\" width=\"640\"></a>";
					 $j=1; //ukoncenie for pre zrychlenie
					 $k=2;
					 $l=10;
					 $n=10; 
					}
                }
			}
		}
	}
}
else 
//Mail("beho@gaya.sk", "akraheb.tk", "Zase ".$_SERVER['REMOTE_ADDR'], "From: akraheb.tk")
?>
-->
<div class="logoM">
	<a href="martinky.php">
	<img src="http://zima.martinky.com/assets/images/logo@2x.png" width="380" height="135" border="0">	</a>
</div>
<!-- toto je poznámka v HTML 
<div class="logoA">
	<a href="http://www.akraheb.tk">
	<img src="logo.jpg" width="204" height="34">
	</a>
</div>
-->

</body>
</html>

