<?
$load_time="NEMAM";
$ftime=file_get_contents("teplota_time.txt");
$poc_cas=(((time()-filemtime("pocasie.html"))/60)/60);
if (file_exists("pocasie.html")==TRUE)
	{
	$load_time="MAM";
	}
if  ($poc_cas>8)
	$load_time="NEMAM";
if ($load_time=="MAM")
	{
	echo 	"<style type=\"text/css\">
			.modra {color: #0000CC}
			.cervena {color: #CC0000}
			.cierna {color: #000000}
			.zelena {color: #00FF00}
			.zlta {color: #FFA500}
			</style>";
//	echo "<p name=\"".date("H:i",filemtime("pocasie.html"))."\">"
	echo file_get_contents("pocasie.html");
//	echo "</p>";
	}
else
	{
	echo 	"<style type=\"text/css\">
			.modra {color: #0000CC}
			.cervena {color: #CC0000}
			.cierna {color: #000000}
			.zelena {color: #00FF00}
			.zlta {color: #FFA500}
			</style>";
	ob_start();
	echo "<table";
//	echo " name=\"".date("H:i",filemtime("pocasie.html"))."\"";
	echo " border=\"1\" bordercolor=\"#0000CC\">";
	echo "<tr name=popis>";
	echo "<td align=\"center\"><a href=\"https://www.snow-forecast.com/resorts/MartinskeHole/6day/mid\" target=\"_blank\">dátum</a></td>";
	echo "<td>";
	echo "<table name=\"minmax\">";
	echo "<tr>";
	echo "<td></td>";
	echo "<td><a href=\"http://www.mbeharka.gaya.sk/martinky/pocasie.php\">min</a></td>";
	echo "<td>max</td>";
	echo "<td><a href=\"http://www.mbeharka.gaya.sk/martinky\">vietor</a></td>";
	echo "</tr>";
	echo "</table>";
	echo "</td><td>východ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;západ</td></tr>";
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_URL, 'https://www.snow-forecast.com/resorts/MartinskeHole/6day/mid'); 
	curl_setopt($ch, CURLOPT_HEADER, 0); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
	curl_setopt($ch, CURLOPT_TIMEOUT, 300);
	echo $frame = curl_exec($ch); 
	$cas_up=stristr($frame, "Issued:");
	$cas_up=stristr($cas_up,"<span class=\"location-issued__no-wrap\">");
	$cas_up1=substr($cas_up, 39 , 12);
	$cas_up1=str_replace("&thinsp;","",$cas_up1);
	if ($cas_up1=="12pm")	{$cas_up_H="19"; $cas_up_i="30";}
	if ($cas_up1=="6am")	{$cas_up_H="13"; $cas_up_i="30";}
	if ($cas_up1=="6pm")	{$cas_up_H="09"; $cas_up_i="30";}
	$cas_up=stristr($cas_up,"</span>");
	$cas_up=stristr($cas_up,"<span class=\"location-issued__no-wrap\">");
	$cas_up2=substr($cas_up, 39 , 30);
	$cas_up2=substr(str_replace("&thinsp;"," ",$cas_up2), 1,29);
	$search  = array('Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Dec');
	$replace = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
	$cas_up2=str_replace($search,$replace,$cas_up2);
	$cas_up_d=substr($cas_up2, 0 , 2);
	$cas_up_m=substr($cas_up2, 3 , 2);
	$cas_up_Y=substr($cas_up2, 6 , 4);
//	echo $cas_up_Y."-".$cas_up_m."-".$cas_up_d."-".$cas_up_H."-".$cas_up_i;
	$cas_up_f=mktime($cas_up_H,$cas_up_i,0,$cas_up_m,$cas_up_d,$cas_up_Y);
	$ft = fopen('pocasie_time.txt', 'w');
	fwrite($ft, $cas_up_f);
	fclose($ft);
//	echo "<br>".time()."<br>";
	$pocitaj=((time()-$cas_up_f)/60/60);
//	echo $pocitaj."hod";
	$pocasie=stristr($frame, "forecast-table__content");

	$den=stristr($pocasie, "forecast-table-days forecast-table__row");
	$cden=stristr($pocasie, "forecast-table-time forecast-table__row");

	$icona=stristr($pocasie, "forecast-table-weather forecast-table__row");
	$vietor=stristr($pocasie, "forecast-table-wind forecast-table__row");
	$max=stristr($pocasie, "temperature-max");
	$min=stristr($pocasie, "temperature-min");
	$vychod=stristr($pocasie, "forecast-table-sunrise__cell forecast-table__cell");
	$zapad=stristr($pocasie, "forecast-table-sunset__cell forecast-table__cell");

	$m=date(M);
	$r=date(Y);
	$nazov_dna=date(w);
	$mail="0";
	$vych=$zap="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	$j=0;
	$vych_mam=0;
	$zap_mam=0;
	for($i=0;$i<21;$i++)
		{	
		$den=stristr($den, "forecast-table-days__date");
		$tb_den[$i]=substr($den, 27, strpos($den,"<")-27);
		$pomoc=substr($tb_den[0],0,2);
		$tb_den[100]=$pomoc-1;
		$den=stristr($den, "forecast-table-days__content");

		$cden=stristr($cden, "forecast-table-time__period");
		$tb_cden[$i]=substr($cden, 32, 2);
		$cden=stristr($cden, "forecast-table-time__cell forecast-table__cell");


		$icona=stristr($icona, "<img alt=");
		$icona=stristr($icona, "/assets/wxvicons");
		$tb_icona[$i]=substr($icona, 17, 9);
		$icona=stristr($icona, "forecast-table-weather__cell forecast-table__cell");
		
		$vietor=stristr($vietor, "wind-icon");
		$tb_vietor[$i]=substr($vietor, stripos($vietor,"text-anchor")+33, stripos($vietor,"</text>")-stripos($vietor,"text-anchor")-33);		
		$smer=stristr($vietor, "rotate(");
		$tb_smer[$i]=substr($smer, 7, stripos($smer,")")-7);	
		$vietor=stristr($vietor, "forecast-table-wind__cell forecast-table__cell");		
		
		$max=stristr($max, "temp forecast-table-temp__value");
		$ppp=stripos($max, "<")-33;
		$tb_max[$i]=substr($max, 33, $ppp);
		$max=stristr($max, "forecast-table-temp__cell forecast-table__cell");
		
		$min=stristr($min, "temp forecast-table-temp__value");
		$ppp=stripos($min, "<")-33;
		$tb_min[$i]=substr($min, 33, $ppp);
		$min=stristr($min, "forecast-table-temp__cell forecast-table__cell");
		
		$vychod=stristr($vychod, "forecast-table-sunrise__value");
		$zapad=stristr($zapad, "forecast-table-sunset__value");
		$tb_vychod[$i]=substr($vychod, 31, 5);
		$tb_zapad[$i]=substr($zapad, 30, 5);
		$vpos=stripos(substr($vychod, 31, 5), ":")+3;
		$zpos=stripos(substr($zapad, 30, 5), ":")+3;
		$tb_vych[$i]=substr($tb_vychod[$i], 0, $vpos);
		$tb_zap[$i]=substr($tb_zapad[$i], 0, $zpos);
		$vychod=stristr($vychod, "forecast-table-sunrise__cell forecast-table__cell");	
		$zapad=stristr($zapad, "forecast-table-sunset__cell forecast-table__cell");
		
//		$tb_vietor[$i]=str_replace("metric.gif\" alt=\"\"/>","",$tb_vietor[$i]);
//		$tb_vietor[$i]=str_replace("wind","",$tb_vietor[$i]);
//		$tb_vietor[$i]=str_replace("S","",$tb_vietor[$i]);
//		$tb_vietor[$i]=str_replace("N","",$tb_vietor[$i]);
//		$tb_vietor[$i]=str_replace("W","",$tb_vietor[$i]);
//		$tb_vietor[$i]=str_replace("E","",$tb_vietor[$i]);
//		$tb_min[$i]=trim(str_replace("</span>","",$tb_min[$i]));
//		$tb_max[$i]=trim(str_replace("</span>","",$tb_max[$i]));
//		$tb_den[$i]=trim(addslashes(str_replace("</div>","",$tb_den[$i])));
//		$tb_icona[$i]=trim(addslashes($tb_icona[$i]));
//		$tb_vietor[$i]=trim(addslashes($tb_vietor[$i]));
//		$tb_max[$i]=addslashes($tb_max[$i]);
//		$tb_min[$i]=addslashes($tb_min[$i]);
//		$tb_vychod[$i]=trim(addslashes($tb_vychod[$i]));
//		$tb_zapad[$i]=trim(addslashes($tb_zapad[$i]));
//		$tb_vych[$i]=trim(addslashes($tb_vych[$i]));
//		$tb_zap[$i]=trim(addslashes($tb_zap[$i]));
	
		if ($tb_max[$i]<0)								$fmax="modra";else $fmax="cervena";
		if ($tb_min[$i]<0)								$fmin="modra";else $fmin="cervena";
		if ($tb_max[$i]==0)								$fmax="cierna";
		if ($tb_min[$i]==0)								$fmin="cierna";
		if ($tb_smer[$i]>=337) 							$tb_smer[$i]="S";
		if ($tb_smer[$i]<=23) 							$tb_smer[$i]="S";
		if (($tb_smer[$i]>=24) and ($tb_smer[$i]<=77)) $tb_smer[$i]="SV";
		if (($tb_smer[$i]>=78) and ($tb_smer[$i]<=113)) $tb_smer[$i]="V";
		if (($tb_smer[$i]>=114) and ($tb_smer[$i]<=157)) $tb_smer[$i]="JV";
		if (($tb_smer[$i]>=158) and ($tb_smer[$i]<=203)) $tb_smer[$i]="J";		
		if (($tb_smer[$i]>=204) and ($tb_smer[$i]<=248)) $tb_smer[$i]="JZ";
		if (($tb_smer[$i]>=249) and ($tb_smer[$i]<=293)) $tb_smer[$i]="Z";
		if (($tb_smer[$i]>=294) and ($tb_smer[$i]<=336)) $tb_smer[$i]="SZ";
		if ($tb_vietor[$i]<=20)	
		$tb_vietor[$i]="<td name=\"0V\" width=\"15\" class=\"zelena\" align=\"right\">".$tb_vietor[$i]."</td><td name=\"0S\" 	width=\"15\" class=\"zelena\">".$tb_smer[$i]."</td>";
		if (($tb_vietor[$i]>20) and ($tb_vietor[$i]<=40))
		$tb_vietor[$i]="<td name=\"20V\" width=\"15\" class=\"zlta\" align=\"right\">".$tb_vietor[$i]."</td><td  name=\"20S\" width=\"15\" class=\"zlta\">".$tb_smer[$i]."</td>";
		if ($tb_vietor[$i]>40)
		$tb_vietor[$i]="<td name=\"40V\" width=\"15\" class=\"cervena\" align=\"right\">".$tb_vietor[$i]."</td><td  name=\"40S\" width=\"15\" class=\"cervena\">".$tb_smer[$i]."</td>";
		$tb_max[$i]="<span class=\"".$fmax."\">".$tb_max[$i]."</span>";
		$tb_min[$i]="<span class=\"".$fmin."\">".$tb_min[$i]."</span>";
		if (($tb_den[$i]==1) && ($i>0))
				{
				if (date(M)=="Dec")		{$m="Jan"; $r++; }
				if (date(M)=="Jan")		$m="Feb";
				if (date(M)=="Feb")		$m="Mar";
				if (date(M)=="Mar")		$m="Apr";
				if (date(M)=="Apr")		$m="Maj";
				if (date(M)=="Maj")		$m="Jun";
				if (date(M)=="Jun")		$m="Jul";
				if (date(M)=="Jul")		$m="Aug";
				if (date(M)=="Aug")		$m="Sep";
				if (date(M)=="Sep")		$m="Okt";
				if (date(M)=="Okt")		$m="Nov";
				if (date(M)=="Nov")		$m="Dec";
				}
		$tb_den[$i]="<td align=\"right\">".$tb_den[$i].".".$m.".".$r."</td>";	
		$tb_icona[$i]="<td><img src=\"img/".$tb_icona[$i].".jpg\" width=\"20\" height=\"20\"></td>";
		$tb_min[$i]="<td width=\"20\" align=\"right\" >".$tb_min[$i]."</td>";
		$tb_max[$i]="<td width=\"20\" align=\"right\" >".$tb_max[$i]."</td>";
		}
	for($i=0;$i<21;$i++)
		{
		if ($tb_cden[$i]=="AM")
			{
			if ($i!=0)
				echo "<tr  name=\"den".$j."\" border=\"1\">".$tb_den[$j]."<td  name=\"teplota\">";
			else
				{
				echo "<tr  name=\"denAM\" border=\"1\">".$tb_den[$i]."<td  name=\"teplota\">";
				}
			echo "<table><tr name=\"AM\">".$tb_icona[$i].$tb_min[$i].$tb_max[$i].$tb_vietor[$i]."</tr>";
			if ($i==20)
				{
				$zap="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "</table></td><td align=\"center\">".$vych."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$zap."</td>";
				}
			$j++;
			}
		if ($tb_cden[$i]=="PM")
			{
			if ($i==0)
				{
				echo "<tr  name=\"denPM\" border=\"1\">".$tb_den[$i]."<td  name=\"teplota\">";
				echo "<table><tr name=\"PM\">".$tb_icona[$i].$tb_min[$i].$tb_max[$i].$tb_vietor[$i]."</tr>";
				$j++;
				$vych_mam=1;
				$roz_mam=1;
				}
			else 
				echo "<tr name=\"PM\">".$tb_icona[$i].$tb_min[$i].$tb_max[$i].$tb_vietor[$i]."</tr>";
			}
		if ($tb_cden[$i]=="ni")	
			{
			if ($i==0)
				echo "<tr  name=\"denni\" border=\"1\"><td align=\"right\">".$tb_den[100].".".$m.".".$r."</td><td  name=\"teplota\"><table><td></td>";
			echo "<tr name=\"ni\">".$tb_icona[$i].$tb_min[$i].$tb_max[$i].$tb_vietor[$i]."</tr></table></td>";
			if ($zap_mam=="1" and $vych_mam=="1")
				{
				$zap=date("H:i", strtotime($zap." PM"));
				if ($roz_mam=="1")
					$roz="&nbsp;&nbsp;&nbsp;&nbsp;";
				else 	
					{
					$roz=gmdate("H:i", strtotime($zap)-strtotime($vych));
					}
				echo "<td align=\"center\">".$vych."&nbsp;&nbsp;<font size=\"0,5\">".$roz."</font>&nbsp;&nbsp;".$zap."</td>";
				$vych_mam=0;
				$zap_mam=0;
				$roz_mam=0;
				}
			}
		if ($tb_vych[$i]!="-</")
			{
			$vych=$tb_vych[$i];
			$vych_mam=1;
			}
		if ($tb_zap[$i]!="-</")
			{
			$zap=$tb_zap[$i];
			$zap_mam=1;	
			}
		}	
echo "</table></table>";
file_put_contents('pocasie.html', ob_get_contents());
}
//echo "</body>";
?>
