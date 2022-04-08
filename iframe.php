<?php
  $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_URL, 'https://www.holidayinfo.sk/sk/Kamera/286102'); 
  curl_setopt($ch, CURLOPT_HEADER, 0); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
curl_setopt($ch, CURLOPT_TIMEOUT, 300);
$dataT = curl_exec($ch); 
$dataT=stristr($dataT, "color:black; font-weight:bold; font-size:1.0em;");
$teplota=substr($dataT, 64, 19);
$znamienko=substr($dataT, 71, 1);
if ($znamienko=="-")	{	$colort="#80dfff";}
	else
			{	$colort=red;}

echo "<p style='color:".$colort.";font-size:30px'>" . $teplota . "</p>";
echo $teplota;
  curl_close($ch);
?>