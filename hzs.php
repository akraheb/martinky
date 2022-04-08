<?
//if (($_SERVER['REMOTE_ADDR']!="66.249.66.87")||($_SERVER['REMOTE_ADDR']!="66.249.71.235")||($_SERVER['REMOTE_ADDR']!="66.249.66.55")||($_SERVER['REMOTE_ADDR']!="80.242.34.5") ) //kontorla IP adreise
$y=date(y); //rok
$m=date(m); //mesiac
$d=date(d); //den
$d2=date(d); //den
if (strlen(date(H))==1) 	$H="0".date(H);
	else 					$H=date(H); //hodina
if (date(H)<"24")
$H=18; 	
if (date(H)<"21") 
$H=12;	
if (date(H)<"12") 
$H=06;	
if (date(H)<"6")
$H=00;
$obr="http://www.shmu.sk/data/datanwp/v2/meteogram/al-meteogram_31440-".($y+2000).$m.$d."-".$H."00-nwp-.png";
echo "<img src=\"".$obr."\"></img>";
?>
