<?
echo "cas v html ".$time_save=file_get_contents("teplota_time.txt");
$tep_cas=date("Y.m.d H:i",filemtime("teplota.html"));
$tep_cas_Y=substr($tep_cas, 0 , 4);
$tep_cas_m=substr($tep_cas, 5 , 2);
$tep_cas_d=substr($tep_cas, 8 , 2);
$tep_cas_H=substr($tep_cas, 11 , 2);
$tep_cas_i=substr($tep_cas, 14 , 2);
echo "<br>";
echo "cas suboru ".$tep_cas=mktime($tep_cas_H,$tep_cas_i,0,$tep_cas_m,$tep_cas_d,$tep_cas_Y);
echo "<br>";
echo "cas teraz ".time();
echo "<br>";
$pocitaj=((time()-$time_save)/60);
//echo "rozdiel cas-cas v html ".$pocitaj."min";
//echo "<br>";
//echo date("i",$time_save);
//echo "<br>";
if (date("i",$time_save)>20)
				$test=12;
if (date("i",$time_save)>30)	
				$test=22;		
if (date("i",$time_save)>50)
				$test=32;
//echo "nacitam nove po ".$test."min";
if ($pocitaj>$test)
	{
	$load_time="NEMAM";
	}
else
	$load_time="MAM";
if (file_exists("teplota.html")!=TRUE)
	$load_time="NEMAM";
else
	$ftepolota=file_get_contents("teplota.html");
if ((date(H)>18) or  (date(H)<6))
$load_time="MAM";
if ($load_time=="MAM") 
	{
//	echo "<p name=\"OLD\">".
	echo $ftepolota;
//	echo "</p>";
	}
else
	{
	echo "ano"; 
	echo "<br>";	
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_URL, 'https://www.holidayinfo.sk/sk/Kamera/MartinskeHole/286102'); 	
	$dataT = curl_exec($ch);  
	$dataT = file_get_contents('https://www.holidayinfo.sk/sk/Kamera/MartinskeHole/286102');
	echo $dataT."L";  
	curl_close($ch);
	$dataT=stristr($dataT, "color:black; font-weight:bold; font-size:1.0em;");
	if ($dataT!="")
		{
		$post=stripos($dataT, "&#xb0;C");
		$post=$post-57;
		$teplota=substr($dataT, 64, $post);
		$time_load=stristr($dataT, "block;\">");
		$time_save=substr($time_load, stripos($time_load,"block;\">")+8, 5);
		$time_load=substr($time_load, stripos($time_load,":")+1, 2);
		$datum=stristr($dataT, "box-title");
		$datum=stristr($datum, "berov");
		$datum=stristr($datum, "font-weight:normal;");
		$poss=stripos($datum, ".");
		$poss=$poss-2;
		$datum=substr($datum, $poss, 10);
		$time_save=$datum."&nbsp;".$time_save;
//		echo $time_save;
		$time_save_d=substr($time_save, 0 , 2);
		$time_save_m=substr($time_save, 3 , 2);
		$time_save_Y=substr($time_save, 6 , 4);
		$time_save_H=substr($time_save, 16 , 2);
		$time_save_i=substr($time_save, 19 , 2);
//		echo "<br>".$time_save_Y."-".$time_save_m."-".$time_save_d."-".$time_save_H."-".$time_save_i;
		$time_savef=mktime($time_save_H,$time_save_i,0,$time_save_m,$time_save_d,$time_save_Y);
//		echo "<br>".$tep_cas_Y."-".$tep_cas_m."-".$tep_cas_d."-".$tep_cas_H."-".$tep_cas_i;
//		echo "<br>".time();
		}
	else
		{
		$nacitaj=file_get_contents("teplota.txt");
		$datum=substr($nacitaj, 0 , strpos($nacitaj,";"));
		$teplota=substr($nacitaj, strpos($nacitaj,";")+1 , 20);
		}
	$fp = fopen('teplota.txt', 'w');
	fwrite($fp, $datum.";".$teplota);
	fclose($fp);
	$ft = fopen('teplota_time.txt', 'w');
	fwrite($ft, $time_savef);
	fclose($ft);
	if(substr($datum, 0, 2)== date(d))
		$colord=green;	else	$colord=black;
	$teplota2=stristr($teplota, ",");
	$znamienko=substr($teplota2, 2, 1);
	if($znamienko=="-")
		$colort=blue;	else	$colort=red;
	echo "<p name=\"NEW\">";
	ob_start();
	echo "<a name=\"NEW\" href='http://www.mbeharka.gaya.sk/martinky/pocasie.php' style='color:".$colord.";font-size:30px'>".$datum."</a><br>";
	echo "<a name=\"NEW\" href='https://www.holidayinfo.sk/sk/Kamera/MartinskeHole/286102' style='color:".$colort.";font-size:30px'>".$teplota."</a><br>";
	file_put_contents('teplota.html', ob_get_contents());
	echo "</p>";
	echo "</body></html>";
	}
?>