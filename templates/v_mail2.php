<?php 
/**
 * Шаблон служебного письма для возврата
 */
?>

<form action="" method="post">
	<!-- Печать страницы!!! -->
	<div id="print_button"> 
		<input type=button value="Печать" onClick="document.getElementById('print_button').style.display='none';document.getElementById('print_button2').style.display='none'; window.print();location='index.php?c=mail2&id=<?=$_GET['id']?>';" name="print"> 
	</div>
	<div id="print_button2"> 
	<div style="width:30%; position:absolute; left: 74px; top:8px; text-align:left;">
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</div>
	</div>
	<!-- Конец печати страницы -->
</form>

<table width="820px" style="border: 1px black; padding-top: 40px; padding-left: 30px; padding-right: 30px; padding-aling: justify; ">
	<tr>
		<td align="center" width="46,4%">
			<img alt="" src="templates/img/image002.gif"> <br>
			<font face="Times New Roman" style="font-size: 14pt;">
			МИНИСТЕРСТВО ОБОРОНЫ <br>
			РОССИЙСКОЙ ФЕДЕРАЦИИ <br> (МИНОБОРОНЫ РОССИИ) <br><br>
			</font>
			<font face="Times New Roman" style="font-size: 14pt;">
			<b>
			ВОЕННЫЙ  КОМИССАРИАТ <br>
			НОВОСИБИРСКОЙ  ОБЛАСТИ <br>
			</b>
			</font>
			<br>
			<font face="Times New Roman" style="font-size: 14pt;">
			г. Новосибирск, 630007 <br>
			<span style="margin-right: 167px;">
			<?php $dd = substr($priz['date_protocol2'],0, 2); 
			   $mm = substr($priz['date_protocol2'],3, 2);
			   $yy = substr($priz['date_protocol2'],6, 10);
			   echo "«".$dd."» ".$mm." ".$yy."г"?> </span><br>
		    На № <?=$priz['mail']?>	
		    </font>			
		</td>
		<td align="center" width="50,7%">
			<font face="Times New Roman" style="font-size: 14pt;">
			НАЧАЛЬНИКУ ОТДЕЛА ВОЕННОГО <br> КОМИССАРИАТА НОВОСИБИРСКОЙ ОБЛАСТИ <br> 
			ПО
			<?php if ($priz['voenkomat'] == "Барабинский") echo "Г. БАРАБИНСК, БАРАБИНСКОМУ И ЗДВИНСКОМУ РАЙОНАМ" ?>
			<?php if ($priz['voenkomat'] == "Здвинский") echo "Г. БАРАБИНСК, БАРАБИНСКОМУ И ЗДВИНСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Бердский") echo "Г. БЕРДСК" ?>			
			<?php if ($priz['voenkomat'] == "Доволенский") echo "ДОВОЛЕНСКОМУ, КРАСНООЗЕРСКОМУ И КОЧКОВСКОМУ РАЙОНАМ" ?>		
			<?php if ($priz['voenkomat'] == "Кочковский") echo "ДОВОЛЕНСКОМУ, КРАСНООЗЕРСКОМУ И КОЧКОВСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Красноозерский") echo "ДОВОЛЕНСКОМУ, КРАСНООЗЕРСКОМУ И КОЧКОВСКОМУ РАЙОНАМ" ?>		
			<?php if ($priz['voenkomat'] == "г. Искитим") echo "Г. ИСКИТИМ" ?>			
			<?php if ($priz['voenkomat'] == "Искитимский") echo "Г. ИСКИТИМ" ?>			
			<?php if ($priz['voenkomat'] == "Карасукский") echo "Г. КАРАСУК, КАРАСУКСКОМУ И БАГАНСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Баганский") echo "Г. КАРАСУК, КАРАСУКСКОМУ И БАГАНСКОМУ РАЙОНАМ" ?>		
			<?php if ($priz['voenkomat'] == "Каргатский") echo "Г. КАРГАТ, КАРГАТСКОМУ И УБИНСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Убинский") echo "Г. КАРГАТ, КАРГАТСКОМУ И УБИНСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Коченевский") echo "КОЧЕНЕВСКОМУ И КОЛЫВАНСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Колыванский") echo "КОЧЕНЕВСКОМУ И КОЛЫВАНСКОМУ РАЙОНАМ" ?>		
			<?php if ($priz['voenkomat'] == "Куйбышевский") echo "Г. КУЙБЫШЕВ, КУЙБЫШЕВСКОМУ И СЕВЕРНОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Северный") echo "КУЙБЫШЕВСКОМУ И СЕВЕРНОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Купинский") echo "КУПИНСКОМУ РАЙОНУ" ?>			
			<?php if ($priz['voenkomat'] == "Мошковский") echo "МОШКОВСКОМУ РАЙОНУ" ?>			
			<?php if ($priz['voenkomat'] == "Ордынский") echo "ОРДЫНСКОМУ РАЙОНУ" ?>			
			<?php if ($priz['voenkomat'] == "Сузунский") echo "СУЗУНСКОМУ РАЙОНУ" ?>			
			<?php if ($priz['voenkomat'] == "Татарский") echo "Г. ТАТАРСК, ТАТАРСКОМУ, УСТЬ-ТАРКСКОМУ И ЧИСТООЗЕРНОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Усть-Таркский") echo "Г. ТАТАРСК, ТАТАРСКОМУ, УСТЬ-ТАРКСКОМУ И ЧИСТООЗЕРНОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Чистоозерный") echo "Г. ТАТАРСК, ТАТАРСКОМУ, УСТЬ-ТАРКСКОМУ И ЧИСТООЗЕРНОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Тогучинский") echo "Г. ТОГУЧИН, ТОГУЧИНСКОМУ И БОЛОТНИНСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Болотнинский") echo "Г. ТОГУЧИН, ТОГУЧИНСКОМУ И БОЛОТНИНСКОМУ РАЙОНАМ" ?>		
			<?php if ($priz['voenkomat'] == "Чановский") echo "ЧАНОВСКОМУ, ВЕНГЕРОВСКОМУ И КЫШТОВСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Венгеровский") echo "ЧАНОВСКОМУ, ВЕНГЕРОВСКОМУ И КЫШТОВСКОМУ РАЙОНАМ" ?>	
			<?php if ($priz['voenkomat'] == "Кыштовский") echo "ЧАНОВСКОМУ, ВЕНГЕРОВСКОМУ И КЫШТОВСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Маслянинский") echo "Г. ЧЕРЕПАНОВО, ЧЕРЕПАНОВСКОМУ И МАСЛЯНИНСКОМУ РАЙОНАМ" ?>		
			<?php if ($priz['voenkomat'] == "Черепановский") echo "Г. ЧЕРЕПАНОВО, ЧЕРЕПАНОВСКОМУ И МАСЛЯНИНСКОМУ РАЙОНАМ" ?>			
			<?php if ($priz['voenkomat'] == "Чулымский") echo "ЧУЛЫМСКОМУ РАЙОНУ" ?>			
			<?php if ($priz['voenkomat'] == "Новосибирский") echo "НОВОСИБИРСКОМУ РАЙОНУ, Г. ОБЬ И Р.П. КОЛЬЦОВО" ?>			
			<?php if ($priz['voenkomat'] == "р.п. Кольцово") echo "НОВОСИБИРСКОМУ РАЙОНУ, Г. ОБЬ И Р.П. КОЛЬЦОВО" ?>		
			<?php if ($priz['voenkomat'] == "Дзержинский") echo "ДЗЕРЖИНСКОМУ И КАЛИНИНСКОМУ РАЙОНАМ <BR> Г. НОВОСИБИРСК" ?>		
			<?php if ($priz['voenkomat'] == "Калининский") echo "ДЗЕРЖИНСКОМУ И КАЛИНИНСКОМУ РАЙОНАМ <BR> Г. НОВОСИБИРСК" ?>			
			<?php if ($priz['voenkomat'] == "Заельцовский") echo "ДЗЕРЖИНСКОМУ И КАЛИНИНСКОМУ РАЙОНАМ <BR> Г. НОВОСИБИРСК" ?>		
			<?php if ($priz['voenkomat'] == "Ленинский") echo "КИРОВСКОМУ И ЛЕНИНСКОМУ РАЙОНАМ <BR> Г. НОВОСИБИРСК" ?>		
			<?php if ($priz['voenkomat'] == "Кировский") echo "КИРОВСКОМУ И ЛЕНИНСКОМУ РАЙОНАМ <BR> Г. НОВОСИБИРСК" ?>		
			<?php if ($priz['voenkomat'] == "Октябрьский") echo "ОКТЯБРЬСКОМУ РАЙОНУ И ЦЕНТРАЛЬНОМУ ОКРУГУ <BR> Г. НОВОСИБИРСК" ?>		
			<?php if ($priz['voenkomat'] == "Железнодорожный") echo "ОКТЯБРЬСКОМУ РАЙОНУ И ЦЕНТРАЛЬНОМУ ОКРУГУ <BR> Г. НОВОСИБИРСК" ?>			
			<?php if ($priz['voenkomat'] == "Центральный округ") echo "ОКТЯБРЬСКОМУ РАЙОНУ И ЦЕНТРАЛЬНОМУ ОКРУГУ <BR> Г. НОВОСИБИРСК" ?>			
			<?php if ($priz['voenkomat'] == "Советский") echo "СОВЕТСКОМУ И ПЕРВОМАЙСКОМУ РАЙОНАМ <BR> Г. НОВОСИБИРСК" ?>			
			<?php if ($priz['voenkomat'] == "Первомайский") echo "СОВЕТСКОМУ И ПЕРВОМАЙСКОМУ РАЙОНАМ <BR> Г. НОВОСИБИРСК" ?>	 <br>
			</font>
		</td>
	</tr>
	<tr>
	</tr>
	<tr>
		<td align="center" COLSPAN=2>
			<br>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			Cлужебное письмо<br><br>
		    </font>
		</td>	
	</tr>
	<tr>
		<td align="justify" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;В соответствии с решением призывной комиссии  Новосибирской области  протокол  № <?=$priz['protocol_numb2']?> от <?=$priz['date_protocol2']?> года     
            возвращается со сборного пункта призывник <?=$priz['fio']?>, <? $a = substr($priz['daterogdenia'],6, 10); echo $a;?>г.р. 
			<?php if ($priz['godnost'] == "А") echo "«А» - годен к военной службе"?>				
			<?php if ($priz['godnost'] == "Б") echo "«Б» - годен к военной службе с незначительными ограничениями"?>				
			<?php if ($priz['godnost'] == "В") echo "на основании статьи ".$priz['isx_st']." графы ".$priz['graf']." расписания болезней и ТДТ (приложение к Положению о военно-врачебной экспертизе, утвержденному постановлением Правительства РФ 2003 года № 123). «В» - ограниченно годен к военной службе"?>			
			<?php if ($priz['godnost'] == "Г") echo "на основании статьи ".$priz['isx_st']." графы ".$priz['graf']." расписания болезней и ТДТ (приложение к Положению о военно-врачебной экспертизе, утвержденному постановлением Правительства РФ 2003 года № 123). «Г» - временно не годен к военной службе сроком ".$priz['ispolnitel']."."?>				
			<?php if ($priz['godnost'] == "Д") echo "«Д» - не годен к военной службе"?>	
			<?php if ($priz['godnost'] == "О") echo "Подлежит обследованию."?>	
			</font>
			<br><br>
		</td>
	</tr>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ранее вынесенное решение призывной комиссии 
			<?php if ($priz['voenkomat'] == "Барабинский") echo "Барабинского района" ?>
			<?php if ($priz['voenkomat'] == "Здвинский") echo "Здвинского района" ?>			
			<?php if ($priz['voenkomat'] == "Бердский") echo "Бердского района" ?>			
			<?php if ($priz['voenkomat'] == "Доволенский") echo "Доволенского района" ?>		
			<?php if ($priz['voenkomat'] == "Кочковский") echo "Кочковского района" ?>			
			<?php if ($priz['voenkomat'] == "Красноозерский") echo "Красноозерского района" ?>		
			<?php if ($priz['voenkomat'] == "г. Искитим") echo "г. Искитим" ?>			
			<?php if ($priz['voenkomat'] == "Искитимский") echo "Искитимского района" ?>			
			<?php if ($priz['voenkomat'] == "Карасукский") echo "Карасукского района" ?>			
			<?php if ($priz['voenkomat'] == "Баганский") echo "Баганского района" ?>		
			<?php if ($priz['voenkomat'] == "Каргатский") echo "Каргатского района" ?>			
			<?php if ($priz['voenkomat'] == "Убинский") echo "Убинского района" ?>			
			<?php if ($priz['voenkomat'] == "Коченевский") echo "Коченевского района" ?>			
			<?php if ($priz['voenkomat'] == "Колыванский") echo "Колыванского района" ?>		
			<?php if ($priz['voenkomat'] == "Куйбышевский") echo "Куйбышевского района" ?>			
			<?php if ($priz['voenkomat'] == "Северный") echo "Северного района" ?>			
			<?php if ($priz['voenkomat'] == "Купинский") echo "Купинского района" ?>			
			<?php if ($priz['voenkomat'] == "Мошковский") echo "Мошковского района" ?>			
			<?php if ($priz['voenkomat'] == "Ордынский") echo "Ордынского района" ?>			
			<?php if ($priz['voenkomat'] == "Сузунский") echo "Сузунского района" ?>			
			<?php if ($priz['voenkomat'] == "Татарский") echo "Татарского района" ?>			
			<?php if ($priz['voenkomat'] == "Усть-Таркский") echo "Усть-Таркского района" ?>			
			<?php if ($priz['voenkomat'] == "Чистоозерный") echo "Чистоозерного района" ?>			
			<?php if ($priz['voenkomat'] == "Тогучинский") echo "Тогучинского района" ?>			
			<?php if ($priz['voenkomat'] == "Болотнинский") echo "Болотнинского района" ?>		
			<?php if ($priz['voenkomat'] == "Чановский") echo "Чановского района" ?>			
			<?php if ($priz['voenkomat'] == "Венгеровский") echo "Венгеровского района" ?>	
			<?php if ($priz['voenkomat'] == "Кыштовский") echo "Кыштовского района" ?>			
			<?php if ($priz['voenkomat'] == "Маслянинский") echo "Маслянинского района" ?>		
			<?php if ($priz['voenkomat'] == "Черепановский") echo "Черепановского района" ?>			
			<?php if ($priz['voenkomat'] == "Чулымский") echo "Чулымского района" ?>			
			<?php if ($priz['voenkomat'] == "Новосибирский") echo "Новосибирского района" ?>			
			<?php if ($priz['voenkomat'] == "р.п. Кольцово") echo "Новосибирского района" ?>		
			<?php if ($priz['voenkomat'] == "Дзержинский") echo "Дзержинского района" ?>		
			<?php if ($priz['voenkomat'] == "Калининский") echo "Калининского района" ?>				
			<?php if ($priz['voenkomat'] == "Ленинский") echo "Ленинского района" ?>		
			<?php if ($priz['voenkomat'] == "Кировский") echo "Кировского района" ?>		
			<?php if ($priz['voenkomat'] == "Октябрьский") echo "Октябрьского района" ?>				
			<?php if ($priz['voenkomat'] == "Центральный округ") echo "Центрального округа" ?>			
			<?php if ($priz['voenkomat'] == "Советский") echo "Советского района" ?>			
			<?php if ($priz['voenkomat'] == "Первомайский") echo "Первомайского района" ?>	
			 отменить. 
			</font> 
			<br><br>
		</td>
	</tr>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Причина отмены решения: <?=$priz['otpravitel']?>
			</font> 
			<br><br>
		</td>
	</tr>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Приложение: <?=$priz['datecontroly']?>
			</font> 
			<br><br>
		</td>
	</tr>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;После получения служебного письма в течение 10 дней предоставить материалы расследования.
			</font> 
			<br><br><br>
		</td>
	</tr>	
	<tr>
		<td align="center" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 14pt;">
				НАЧАЛЬНИК ОТДЕЛА ПОДГОТОВКИ И ПРИЗЫВА ГРАЖДАН НА ВОЕННУЮ СЛУЖБУ <br>  ВОЕННОГО КОМИССАРИАТА НОВОСИБИРСКОЙ ОБЛАСТИ	
			</font>
		</td>
	</tr>
	<tr>
		<td align="right" COLSPAN=2 style="padding-top: 7px;"> 
			<font face="Times New Roman" style="font-size: 14pt;">
				<span style="margin-right: 115px; margin-top: 14px;">
					Е. КРАЕВ
				</span>		
			</font>
		</td>
	</tr>
</table>