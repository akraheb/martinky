<?
//if (($_SERVER['REMOTE_ADDR']!="66.249.66.87")||($_SERVER['REMOTE_ADDR']!="66.249.71.235")||($_SERVER['REMOTE_ADDR']!="66.249.66.55")||($_SERVER['REMOTE_ADDR']!="80.242.34.5") ) //kontorla IP adreise
$y=date(y); //rok
$m=date(m); //mesiac
$d=date(d); //den
$mam=0;
if ((date("H:i")>"00:00") and (date("H:i")<="01:59") and  ($mam!=1))
{	$H="18";
	$mam=1;	
	}
if ((date("H:i")>"23:41") and (date("H:i")<="23:59") and ($mam!=1))
{	$H="18"; 
	$mam=1;	
		}	
if ((date("H:i")>"15:31") and (date("H:i")<="23:40") and ($mam!=1))
{	$H="12";
	$mam=1;
		}	
if ((date("H:i")>"12:02") and (date("H:i")<="15:30") and ($mam!=1))
{	$H="06";	
	$mam=1;		
		}	
if ((date("H:i")>"02:00") and (date("H:i")<="12:01") and  ($mam!=1))
{	$H="00";
	$mam=1;	
		}
if ((date("H")<6) and (date("H")>0))
	{
		$d=$d-1;
		if (strlen($d)==1) 	
			$d="0".$d;
	}
$obr="http://www.shmu.sk/data/datanwp/v2/meteogram/al-meteogram_31440-".($y+2000).$m.$d."-".$H."00-nwp-.png";
//echo "<img src=\"".$obr."\"></img>";
//600x923
//200x307
//300x460
//330x506
//330x450
echo "<a href=\"http://www.shmu.sk/sk/?page=1&id=meteo_num_mgram&nwp_mesto=31440\" ><img src=\"".$obr."\" width=\"330\" height=\"400\"></img></a>";
?>
