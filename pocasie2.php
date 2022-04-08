	<head>
<title>Martinky</title>
<style type="text/css">
<!--
.modra {color: #0000CC}
.cervena {color: #CC0000}
.cierna {color: #000000}
-->
</style>
</head>
<body>
<table border="1" bordercolor="#0000CC">
<tr name=popis><td align="center">dátum</td>
								<td><table name="minmax">
										   <tr><td></td><td></td><td>min</td><td>max</td></tr>
								</table></td>
								
										   <td>východ západ</td>
								
</tr>
<?
 $ch = curl_init(); 
  curl_setopt($ch, CURLOPT_URL, 'https://www.snow-forecast.com/resorts/MartinskeHole/6day/mid'); 
  curl_setopt($ch, CURLOPT_HEADER, 0); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
curl_setopt($ch, CURLOPT_TIMEOUT, 300);
$frame = curl_exec($ch); 
$pocasie=stristr($frame, "forecast-table__content");

$den=stristr($pocasie, "forecast-table-days forecast-table__row");
$cden=stristr($pocasie, "forecast-table-time forecast-table__row");

$icona=stristr($pocasie, "forecast-table-weather forecast-table__row");
$vietor=stristr($pocasie, "forecast-table-wind forecast-table__row");
$max=stristr($pocasie, "temperature-max");
$min=stristr($pocasie, "temperature-min");
$vychod=stristr($pocasie, "forecast-table-sunrise forecast-table__row");
$zapad=stristr($pocasie, "forecast-table-sunset forecast-table__row");

$m=date(M);
$r=date(Y);
$nazov_dna=date(w);
$mail="0";
$pocd="0";
//prepocet medzi  rokmi ak 1 a 1 $r++;
for($i=0;$i<21;$i++)
	{	
		$den=stristr($den, "forecast-table-days__date");
		$tb_den[$i]=substr($den, 27, 20);
			if ($tb_den[$i]!="")
				$pocd=$pocd+1;
		$den=stristr($den, "forecast-table-days__content");

		$cden=stristr($cden, "forecast-table-time__period");
		$tb_cden[$i]=substr($cden, 32, 2);
		$cden=stristr($cden, "forecast-table-time__cell forecast-table__cell");


		$icona=stristr($icona, "<img alt=");
		$icona=stristr($icona, "/assets/wxvicons");
		$tb_icona[$i]=substr($icona, 17, 8);
		$icona=stristr($icona, "forecast-table-weather__cell forecast-table__cell");
		
		$vietor=stristr($vietor, "wind-icon__val");
		$tb_vietor[$i]=substr($vietor, 72, 37);		
		$vietor=stristr($vietor, "forecast-table-wind__cell forecast-table__cell");	
		
		$max=stristr($max, "temp forecast-table-temp__value");
		$tb_max[$i]=substr($max, 33, 17);
		$max=stristr($max, "forecast-table-temp__cell forecast-table__cell");
		
		$min=stristr($min, "temp forecast-table-temp__value");
		$tb_min[$i]=substr($min, 33, 17);
		$min=stristr($min, "forecast-table-temp__cell forecast-table__cell");
		
		$vychod=stristr($vychod, "forecast-table-sunrise__value");
		$tb_vychod[$i]=substr($vychod, 31, 10);
		$vychod=stristr($vychod, "forecast-table-sunrise__cell forecast-table__cell");	
		
		$zapad=stristr($zapad, "forecast-table-sunset__value");
		$tb_zapad[$i]=substr($zapad, 30, 10);
		$zapad=stristr($zapad, "forecast-table-sunset__cell forecast-table__cell");
		
		$tb_vietor[$i]=str_replace("metric.gif\" alt=\"\"/>","",$tb_vietor[$i]);
		$tb_vietor[$i]=str_replace("wind","",$tb_vietor[$i]);
		$tb_vietor[$i]=str_replace("S","",$tb_vietor[$i]);
		$tb_vietor[$i]=str_replace("N","",$tb_vietor[$i]);
		$tb_vietor[$i]=str_replace("W","",$tb_vietor[$i]);
		$tb_vietor[$i]=str_replace("E","",$tb_vietor[$i]);
		$tb_min[$i]=trim(str_replace("</span>","",$tb_min[$i]));
		$tb_max[$i]=trim(str_replace("</span>","",$tb_max[$i]));
		$tb_den[$i]=trim(addslashes(str_replace("</div>","",$tb_den[$i])));
		$tb_icona[$i]=trim(addslashes($tb_icona[$i]));
		$tb_vietor[$i]=trim(addslashes($tb_vietor[$i]));
		$tb_max[$i]=addslashes($tb_max[$i]);
		$tb_min[$i]=addslashes($tb_min[$i]);
		$tb_vychod[$i]=trim(addslashes($tb_vychod[$i]));
		$tb_zapad[$i]=trim(addslashes($tb_zapad[$i]));
		
		if ($tb_max[$i]<0)$fmax="modra";else $fmax="cervena";
		if ($tb_min[$i]<0)$fmin="modra";else $fmin="cervena";
		if ($tb_max[$i]==0)$fmax="cierna";
		if ($tb_min[$i]==0)$fmin="cierna";
		$tb_max[$i]="<span class=\"".$fmax."\">".$tb_max[$i]."</span>";
		$tb_min[$i]="<span class=\"".$fmin."\">".$tb_min[$i]."</span>";
		
		if (substr($tb_den[$i],0,1)==0) 
			{
			$tb_den[$i]=str_replace("0","",$tb_den[$i]);
			if (($tb_den[$i]==1) && ($i>0))
				{
				if (date(M)=="Dec")		$m="Jan";
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
				if ($mail!="1")
					{
					//Mail("beho@gaya.sk", "akraheb.tk", "PRELOM mesiaca ".$_SERVER['REMOTE_ADDR'] , "From: akraheb.tk");
					$mail="1";
					}
				}	
			$tb_den[$i]="<td align=\"right\">".$tb_den[$i].".".$m.".".$r."</td>";
			}	
		else $tb_den[$i]="<td align=\"right\">".$tb_den[$i].".".$m.".".$r."</td>";
		$tb_icona[$i]="<td><img src=\"img/".$tb_icona[$i].".jpg\" width=\"20\" height=\"20\"\"></td>";
		$tb_vietor[$i]="<td width=\"15\">".$tb_vietor[$i]."</td>";
		$tb_min[$i]="<td align=\"right\">".$tb_min[$i]."</td>";
		$tb_max[$i]="<td align=\"right\">".$tb_max[$i]."</td>";
	}
$vych=$zap="<td></td>";
for($i=0;$i<21;$i++)
	{
		
		if ($i==0) 
			{//.$tb_vietor[$i] zmazany z kazdeho zaciatku	
			echo "<tr  name=\"den\" border=\"1\">".$tb_den[$i]."<td  name=\"teplota\"><table name=\"i0\"><tr>".$tb_icona[$i].$tb_min[$i].$tb_max[$i]."</tr>";
			if($tb_den[$i+1]==$tb_den[$i])
				{  
				if($tb_vychod[$i]!="-")
					{
					$vych="<td  name=\"vych1\">".$tb_vychod[$i];
					}
				else $vych="<td name=\"vych2\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				if($tb_zapad[$i]!="-")
					{
					$zap=$tb_zapad[$i]."</td>";
					}
				}
			else	
				{
				$vych="<td  name=\"vych3\">";
				$zap="</td>";
				}
			}
		else 
			if ($pokrac==0)
				{	
				if($tb_den[$i]==$tb_den[$i-1])
				 	{
			    	echo "<tr name=\"POKRAC\">".$tb_icona[$i].$tb_min[$i].$tb_max[$i]."</tr>";
					if($tb_vychod[$i]!="-")
						{
						$vych="<td name=\"pokrac".$i."\">".$tb_vychod[$i];
						}
					if($tb_zapad[$i]!="-")
						{
						$zap="&nbsp;&nbsp;-&nbsp;&nbsp;".$tb_zapad[$i]."</td>";
						}
					}
				else 
					{
					echo "</table>";					
					echo $vych.$zap;
					$pokrac=1;
					}
				}
		if($pokrac==1)	
			{
			if($tb_den[$i]!=$tb_den[$i-1])
				echo "<tr name=\"poKRAC\">".$tb_den[$i]."<td name=\"pokrac=1\"><table><tr>".$tb_icona[$i].$tb_min[$i].$tb_max[$i]."</tr>";
				if($tb_vychod[$i]!="-")
					{
					$vych="<td name=\"pokracvych=1\">".$tb_vychod[$i];
					}
				if($tb_zapad[$i]!="-")
					{
					$zap= "&nbsp;&nbsp;-&nbsp;&nbsp;".$tb_zapad[$i]."</td>";
					}
			else $zap="";
			$pokrac=0;
			}	
	}
echo "</table>".$vych.$zap;
if ($mail!=1)
//Mail("beho@gaya.sk", "akraheb.tk", "SRANDA :)".$_SERVER['REMOTE_ADDR'], "From: akraheb.tk");
?>
</table>
</body>
</html>