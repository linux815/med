<?php 
/**
 * Шаблон печати протокола
 */
?>

<form action="" method="post">
	<!-- Печать страницы!!! -->
	<div id="print_button"> 
		<input type=button value="Печать" onClick="document.getElementById('print_button').style.display='none';document.getElementById('print_button2').style.display='none'; window.print();location='index.php?c=printpriz&id=<?=$_GET['id']?>';" name="print"> 
	</div>
	<div id="print_button2"> 
	<div style="width:30%; position:absolute; left: 74px; top:8px; text-align:left;">	
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</div>	
	</div>
	<!-- Конец печати страницы -->
</form>

<table  style="border-collapse: collapse; border: solid black; border: 1px solid black;" width="800px">
	<tr style="text-align: center;">
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 10pt Times New Roman;" width="30px">
		№ <br> п/п
		</td>
		
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 10pt Times New Roman;" width="260px">
		Фамилия, имя, отчество.<br>
		Год рождения.<Br>
		Военный комиссариат.
		</td>
		
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 10pt Times New Roman;" width="270px">
		Диагноз, категория годности к <br> военной службе, показатель <br> предназначения для прохождения <br> военной службы, решение <br>призывной комиссии муниципального <br>образования. Статья, пункт <br> Расписания болезней и таблицы <br>дополнительных требований.
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 10pt Times New Roman;">
		Жалобы гражданина на <br> состояние здоровья и анамнез <br> (другие заявления гражданина и данные на него)
		</td>
	</tr>
	<tr style="text-align: center;">
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;" width="30px">
		1
		</td>
		
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;" width="250px">
		2
		</td>
		
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;" width="260px">
		3
		</td>
		
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;">
		4
		</td>
	</tr>
	<tr style="text-align: center;" height="1040px">
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;" width="30px">
		
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;" width="260px" valign="top" align="top">
		<?=$priz['fio']?><Br>
		<?=$priz['daterogdenia']?><br><br>
		<b>Отдел ВК НСО <br> по 
		<?php if ($priz['voenkomat'] == "Барабинский") echo "Барабинскому и Здвинскому районам" ?>
		<?php if ($priz['voenkomat'] == "Здвинский") echo "Барабинскому и Здвинскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Бердский") echo "Бердскому району" ?>			
		<?php if ($priz['voenkomat'] == "Доволенский") echo "Доволенскому, Красноозерскому и Кочковскому районам" ?>		
		<?php if ($priz['voenkomat'] == "Кочковский") echo "Доволенскому, Красноозерскому и Кочковскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Красноозерский") echo "Доволенскому, Красноозерскому и Кочковскому районам" ?>		
		<?php if ($priz['voenkomat'] == "г. Искитим") echo "г. Искитим и Искитимскому району" ?>			
		<?php if ($priz['voenkomat'] == "Искитимский") echo "г. Искитим и Искитимскому району" ?>			
		<?php if ($priz['voenkomat'] == "Карасукский") echo "Карасукскому и Баганскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Баганский") echo "Карасукскому и Баганскому районам" ?>		
		<?php if ($priz['voenkomat'] == "Каргатский") echo "Каргатскому и Убинскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Убинский") echo "Каргатскому и Убинскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Коченевский") echo "Коченевскому и Колыванскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Колыванский") echo "Коченевскому и Колыванскому районам" ?>		
		<?php if ($priz['voenkomat'] == "Куйбышевский") echo "Куйбышевскому и Северному районам" ?>			
		<?php if ($priz['voenkomat'] == "Северный") echo "Куйбышевскому и Северному районам" ?>			
		<?php if ($priz['voenkomat'] == "Купинский") echo "Купинскому району" ?>			
		<?php if ($priz['voenkomat'] == "Мошковский") echo "Мошковскому району" ?>			
		<?php if ($priz['voenkomat'] == "Ордынский") echo "Ордынскому району" ?>			
		<?php if ($priz['voenkomat'] == "Сузунский") echo "Сузунскому району" ?>			
		<?php if ($priz['voenkomat'] == "Татарский") echo "Татарскому, Усть-Таркскому и Чистоозерному районам" ?>			
		<?php if ($priz['voenkomat'] == "Усть-Таркский") echo "Татарскому, Усть-Таркскому и Чистоозерному районам" ?>			
		<?php if ($priz['voenkomat'] == "Чистоозерный") echo "Татарскому, Усть-Таркскому и Чистоозерному районам" ?>			
		<?php if ($priz['voenkomat'] == "Тогучинский") echo "Тогучинскому и Болотнинскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Болотнинский") echo "Тогучинскому и Болотнинскому районам" ?>		
		<?php if ($priz['voenkomat'] == "Чановский") echo "Чановскому, Венгеровскому и Кыштовскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Венгеровский") echo "Чановскому, Венгеровскому и Кыштовскому районам" ?>	
		<?php if ($priz['voenkomat'] == "Кыштовский") echo "Чановскому, Венгеровскому и Кыштовскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Маслянинский") echo "Маслянинскому и Черепановскому районам" ?>		
		<?php if ($priz['voenkomat'] == "Черепановский") echo "Маслянинскому и Черепановскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Чулымский") echo "Чулымскому району" ?>			
		<?php if ($priz['voenkomat'] == "Новосибирский") echo "р.п. Кольцово и Новосибирскому району" ?>			
		<?php if ($priz['voenkomat'] == "р.п. Кольцово") echo "р.п. Кольцово и Новосибирскому району" ?>		
		<?php if ($priz['voenkomat'] == "Дзержинский") echo "Дзержинскому и Калининскому районам" ?>		
		<?php if ($priz['voenkomat'] == "Калининский") echo "Дзержинскому и Калининскому районам" ?>			
		<?php if ($priz['voenkomat'] == "Заельцовский") echo "Дзержинскому и Калининскому районам" ?>		
		<?php if ($priz['voenkomat'] == "Ленинский") echo "Кировскому и Ленинскому районам" ?>		
		<?php if ($priz['voenkomat'] == "Кировский") echo "Кировскому и Ленинскому районам " ?>		
		<?php if ($priz['voenkomat'] == "Октябрьский") echo "Октябрьскому району и Центральному округу" ?>		
		<?php if ($priz['voenkomat'] == "Железнодорожный") echo "Октябрьскому району и Центральному округу" ?>			
		<?php if ($priz['voenkomat'] == "Центральный округ") echo "Октябрьскому району и Центральному округу" ?>			
		<?php if ($priz['voenkomat'] == "Советский") echo "Советскому и Первомайскому районам " ?>			
		<?php if ($priz['voenkomat'] == "Первомайский") echo "Советскому и Первомайскому районам " ?>															
		
		</b>
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="260px" valign="top" align="top">
		<div style="text-align: left; white-space: pre-wrap;">Диагноз: <?=$priz['vx_diagnoz']?></span><br><br></div>
		
		<?php if ($priz['vx_godnost'] == "В"):?>
		<b>
		Категория годности <br> «В» - ограниченно годен к военной службе. <br>
		Статья 23 п.1 «а» <br>
		Освободить от призыва <br>
		на военную службу <br>
		Зачислить в запас.<br>
		Статья - <?=$priz['vx_st']?><br>
		Протокол № <?=$priz['protocol_numb']?><br>
		от <?=$priz['date_protocol']?>г.
		</b>
		<?php endif; ?>
		
		<?php if ($priz['vx_godnost'] == "Г"):?>
		<b>
		Категория годности <br> «Г» - временно не годен к военной службе. <br>
		Статья 24 п.1 «а» <br>
		 предоставить отсрочку от <br> призыва на военную службу. <br>
		Статья - <?=$priz['vx_st']?><br>
		Протокол № <?=$priz['protocol_numb']?><br>
		от <?=$priz['date_protocol']?>г.
		</b>
		<?php endif; ?>
		
		<?php if ($priz['vx_godnost'] == "Д"):?>
		<b>
		Категория годности <br> «Д» - не годен к военной службе. <br>
		Статья 23 п.1 «а» <br>
		Освободить от призыва <br>
		на военную службу <br>
		и от исполнения воинской обязанности<br>
		Статья - <?=$priz['vx_st']?><br>
		Протокол № <?=$priz['protocol_numb']?><br>
		от <?=$priz['date_protocol']?>г.
		</b>
		<?php endif; ?>
		
		</td>
		
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: left;" valign="top" align="top">
		<div style="white-space: pre-wrap;"><? if (($priz['zaloby'] == "Нет") or ($priz['zaloby'] == "нет")):?>Жалоб: <?=$priz['zaloby']?><? else:?>Жалобы: <?=$priz['zaloby']?><?endif;?><br><?=$priz['anamnez']?></div>
		</td>
	</tr>
	</table>
	
	<br><br><br><br>
	
<table  style="border-collapse: collapse; border: solid black; border: 1px solid black; margin-left: 40px;" width="820px">
	<tr style="text-align: center;">
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 10pt Times New Roman;" width="260px">
		Данные объективного <br> исследования, специальных <br> исследований, диагноз <br> (по-русски)
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 10pt Times New Roman;" width="260px">
		Итоговое заключение о <br> категории годности к <br> военной службе, показате <br> предназначения для <br> прохождения военной <br> службы. Статья, пункт <br> Расписания болезней и таблицы дополнительных <br> требований 
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 10pt Times New Roman;" width="270px">
		Решение призывной <br> комиссии <br> Результаты <br> голосования комиссий
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 10pt Times New Roman;">
		Примечание
		</td>
	</tr>
	<tr style="text-align: center;">
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;" width="30px">
		1
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;" width="250px">
		2
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;" width="260px">
		3
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;">
		4
		</td>
	</tr>
	<tr style="text-align: center;" height="1000px">
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: left;" width="600px" valign="top" align="top">
<div style="white-space: pre-wrap;"><font face="Times New Roman" style="font-size: <?php if (strlen($priz['rsi'])>2800 or strlen($priz['doi'])>2800):?>10pt;<?php else:?> 12pt; <?php endif;?>"><?=$priz['doi']?><? if ($priz['rsi'] == ""):  else: echo $priz['rsi']; endif;?><br>Диагноз: <?=$priz['diagnoz']?></font></div>		
				</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center;" width="200px" valign="top" align="top">
		
		<?php if ($priz['godnost'] == "А"):?>
		<b>
		Статья <?=$priz['isx_st']?> <br>
		Категория годности <br> « А » - годен к военной службе.				
		</b>
		<?php endif; ?>
		
		<?php if ($priz['godnost'] == "Б"):?>
		<b>
		Статья <?=$priz['isx_st']?> <br>
		Категория годности <br> « Б » - годен к военной службе с незначительными ограничениями.		
		</b>
		<?php endif; ?>
		
		<?php if ($priz['godnost'] == "В"):?>
		<b>
		Статья <?=$priz['isx_st']?> <br>
		Категория годности <br> « В » - ограниченно  годен к военной службе.		
		</b>
		<?php endif; ?>
		
		<?php if ($priz['godnost'] == "Г"):?>
		<b>
		Статья <?=$priz['isx_st']?> <br>
		Категория годности <br> « Г » - временно  не  годен к военной службе<?=" ".$priz['ispolnitel']?>.		
		</b>
		<?php endif; ?>
		
		<?php if ($priz['godnost'] == "Д"):?>
		<b>
		Статья <?=$priz['isx_st']?> <br>
		Категория годности <br> « Д » не  годен к военной службе.		
		</b>
		<?php endif; ?>
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="30px" valign="top" align="top">
		
		<?php if ((($priz['vx_godnost'] == "В") and ($priz['godnost'] == "А")) or ((($priz['vx_godnost'] == "В") and ($priz['godnost'] == "Б")) or ((($priz['vx_godnost'] == "В") and $priz['godnost'] == "Д")))):?>
		<b>
		Решение призывной <br>
		комиссии<br>
		<?php if ($priz['voenkomat'] == "Барабинский") echo "Барабинского района Новосибирской области" ?>
		<?php if ($priz['voenkomat'] == "Здвинский") echo "Здвинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Бердский") echo "Бердского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Доволенский") echo "Доволенского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Кочковский") echo "Кочковского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Красноозерский") echo "Красноозерского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "г. Искитим") echo "г. Искитим Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Искитимский") echo "Искитимского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Карасукский") echo "Карасукского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Баганский") echo "Баганского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Каргатский") echo "Каргатского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Убинский") echo "Убинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Коченевский") echo "Коченевского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Колыванский") echo "Колыванского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Куйбышевский") echo "Куйбышевского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Северный") echo "Северного района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Купинский") echo "Купинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Мошковский") echo "Мошковского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Ордынский") echo "Ордынского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Сузунский") echo "Сузунского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Татарский") echo "Татарского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Усть-Таркский") echo "Усть-Таркского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Чистоозерный") echo "Чистоозерного района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Тогучинский") echo "Тогучинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Болотнинский") echo "Болотнинского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Чановский") echo "Чановского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Венгеровский") echo "Венгеровского района Новосибирской области" ?>	
		<?php if ($priz['voenkomat'] == "Кыштовский") echo "Кыштовского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Маслянинский") echo "Маслянинского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Черепановский") echo "Черепановского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Чулымский") echo "Чулымского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Новосибирский") echo "Новосибирского района Новосибирской области " ?>			
		<?php if ($priz['voenkomat'] == "р.п. Кольцово") echo "Новосибирского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Дзержинский") echo "Дзержинского района <br>г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Калининский") echo "Калининского района <br>г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Ленинский") echo "Ленинского района <br>г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Кировский") echo "Кировского района <br>г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Октябрьский") echo "Октябрьского района <br>г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Центральный округ") echo "Центрального округа <br>г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Советский") echo "Советского района <br>г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Первомайский") echo "Первомайского района <br>г. Новосибирска" ?>	
		отменено призывной <br> комиссией <br> Новосибирской <br> области о признании <br> 
		« В » - ограниченно годен к военной службе			
		от <?=$priz['date_protocol2']?>г., <br> принято решение в <br> соответствии со ст. 28 <br> п.1 ФЗ «О воинской обязанности и военной службе» - призвать на военную службу. Предназначить в остальные воинские части Сухопутных войск.<br>  
		Протокол № <?=$priz['protocol_numb2']?><br>
		Служебное письмо <br>
		от <?=$priz['date_protocol2']?>г.<br>
		№  <?=$priz['mail']?>
		</b>
		<?php endif; ?>
		
			<?php if ((($priz['vx_godnost'] == "Д") and ($priz['godnost'] == "В"))):?>
			<b>
				Решение призывной <br>
				комиссии<br>
				<?php if ($priz['voenkomat'] == "Барабинский") echo "Барабинского района Новосибирской области" ?>
				<?php if ($priz['voenkomat'] == "Здвинский") echo "Здвинского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Бердский") echo "по г. Бердску Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Доволенский") echo "Доволенского района Новосибирской области" ?>		
				<?php if ($priz['voenkomat'] == "Кочковский") echo "Кочковского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Красноозерский") echo "Красноозерского района Новосибирской области" ?>		
				<?php if ($priz['voenkomat'] == "г. Искитим") echo "г. Искитим Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Искитимский") echo "Искитимского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Карасукский") echo "Карасукского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Баганский") echo "Баганского района Новосибирской области" ?>		
				<?php if ($priz['voenkomat'] == "Каргатский") echo "Каргатского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Убинский") echo "Убинского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Коченевский") echo "Коченевского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Колыванский") echo "Колыванского района Новосибирской области" ?>		
				<?php if ($priz['voenkomat'] == "Куйбышевский") echo "Куйбышевского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Северный") echo "Северного района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Купинский") echo "Купинского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Мошковский") echo "Мошковского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Ордынский") echo "Ордынского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Сузунский") echo "Сузунского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Татарский") echo "Татарского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Усть-Таркский") echo "Усть-Таркского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Чистоозерный") echo "Чистоозерного района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Тогучинский") echo "Тогучинского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Болотнинский") echo "Болотнинского района Новосибирской области" ?>		
				<?php if ($priz['voenkomat'] == "Чановский") echo "Чановского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Венгеровский") echo "Венгеровского района Новосибирской области" ?>	
				<?php if ($priz['voenkomat'] == "Кыштовский") echo "Кыштовского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Маслянинский") echo "Маслянинского района Новосибирской области" ?>		
				<?php if ($priz['voenkomat'] == "Черепановский") echo "Черепановского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Чулымский") echo "Чулымского района Новосибирской области" ?>			
				<?php if ($priz['voenkomat'] == "Новосибирский") echo "Новосибирского района Новосибирской области " ?>			
				<?php if ($priz['voenkomat'] == "р.п. Кольцово") echo "Новосибирского района Новосибирской области" ?>		
				<?php if ($priz['voenkomat'] == "Дзержинский") echo "Дзержинского района г. Новосибирска" ?>		
				<?php if ($priz['voenkomat'] == "Калининский") echo "Калининского района г. Новосибирска" ?>			
				<?php if ($priz['voenkomat'] == "Заельцовский") echo "Заельцовского района г. Новосибирска" ?>		
				<?php if ($priz['voenkomat'] == "Ленинский") echo "Ленинского района г. Новосибирска" ?>		
				<?php if ($priz['voenkomat'] == "Кировский") echo "Кировского района г. Новосибирска" ?>		
				<?php if ($priz['voenkomat'] == "Октябрьский") echo "Октябрьского района г. Новосибирска" ?>		
				<?php if ($priz['voenkomat'] == "Железнодорожный") echo "Железнодорожного района г. Новосибирска" ?>			
				<?php if ($priz['voenkomat'] == "Центральный округ") echo "Центрального округа г. Новосибирска" ?>			
				<?php if ($priz['voenkomat'] == "Советский") echo "Советского района г. Новосибирска" ?>			
				<?php if ($priz['voenkomat'] == "Первомайский") echo "Первомайского района г. Новосибирска" ?>	
				отменено призывной <br> комиссией <br> Новосибирской <br> области о признании <br> 
				« Д » - не годен к военной службе			
				от <?=$priz['date_protocol2']?>г., <br> принято решение в <br> соответствии со ст. 28 <br> п.1 ФЗ « О воинской обязанности и военной службе » - освободить от призыва на военную службу, зачислить в запас. <br>  
				Протокол - № <?=$priz['protocol_numb2']?><br>
				Служебное письмо <br>
				от <?=$priz['date_protocol2']?>г.<br>
				№  <?=$priz['mail']?>
			</b>
			<?php endif; ?>
		
		<?php if (($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Б") or ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "А") or ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "В")):?>
		<b>
		Решение призывной <br>
		комиссии<br>
		<?php if ($priz['voenkomat'] == "Барабинский") echo "Барабинского района Новосибирской области" ?>
		<?php if ($priz['voenkomat'] == "Здвинский") echo "Здвинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Бердский") echo "Бердского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Доволенский") echo "Доволенского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Кочковский") echo "Кочковского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Красноозерский") echo "Красноозерского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "г. Искитим") echo "г. Искитим Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Искитимский") echo "Искитимского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Карасукский") echo "Карасукского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Баганский") echo "Баганского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Каргатский") echo "Каргатского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Убинский") echo "Убинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Коченевский") echo "Коченевского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Колыванский") echo "Колыванского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Куйбышевский") echo "Куйбышевского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Северный") echo "Северного района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Купинский") echo "Купинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Мошковский") echo "Мошковского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Ордынский") echo "Ордынского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Сузунский") echo "Сузунского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Татарский") echo "Татарского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Усть-Таркский") echo "Усть-Таркского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Чистоозерный") echo "Чистоозерного района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Тогучинский") echo "Тогучинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Болотнинский") echo "Болотнинского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Чановский") echo "Чановского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Венгеровский") echo "Венгеровского района Новосибирской области" ?>	
		<?php if ($priz['voenkomat'] == "Кыштовский") echo "Кыштовского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Маслянинский") echo "Маслянинского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Черепановский") echo "Черепановского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Чулымский") echo "Чулымского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Новосибирский") echo "Новосибирского района Новосибирской области " ?>			
		<?php if ($priz['voenkomat'] == "р.п. Кольцово") echo "Новосибирского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Дзержинский") echo "Дзержинского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Калининский") echo "Калининского района г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Заельцовский") echo "Заельцовского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Ленинский") echo "Ленинского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Кировский") echo "Кировского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Октябрьский") echo "Октябрьского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Железнодорожный") echo "Железнодорожного района г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Центральный округ") echo "Центрального округа г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Советский") echo "Советского района г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Первомайский") echo "Первомайского района г. Новосибирска" ?>	
		отменено призывной <br> комиссией <br> Новосибирской <br> области о признании <br> 
		« Г » - временно не годен к военной службе<br>				
		от <?=$priz['date_protocol2']?>г., <br> принято решение в <br> соответствии со ст. 28 <br> п.1 ФЗ «О воинской обязанности и военной службе» - призвать на военную службу. Предназначить в остальные воинские части Сухопутных войск.<br>  
		Протокол № <?=$priz['protocol_numb2']?><br>
		Служебное письмо <br>
		от <?=$priz['date_protocol2']?>г.<br>
		№ <?=$priz['mail']?> 
		</b>
		<?php endif; ?>
		
		<?php if ((($priz['vx_godnost'] == "В") and ($priz['godnost'] == "В")) or (($priz['vx_godnost'] == "Г") and ($priz['godnost'] == "Г")) or (($priz['vx_godnost'] == "Д") and ($priz['godnost'] == "Д"))): ?>
		<b>
		Решение призывной <br>
		комиссии<br>
		<?php if ($priz['voenkomat'] == "Барабинский") echo "Барабинского района Новосибирской области" ?>
		<?php if ($priz['voenkomat'] == "Здвинский") echo "Здвинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Бердский") echo "Бердского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Доволенский") echo "Доволенского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Кочковский") echo "Кочковского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Красноозерский") echo "Красноозерского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "г. Искитим") echo "г. Искитим Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Искитимский") echo "Искитимского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Карасукский") echo "Карасукского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Баганский") echo "Баганского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Каргатский") echo "Каргатского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Убинский") echo "Убинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Коченевский") echo "Коченевского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Колыванский") echo "Колыванского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Куйбышевский") echo "Куйбышевского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Северный") echo "Северного района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Купинский") echo "Купинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Мошковский") echo "Мошковского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Ордынский") echo "Ордынского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Сузунский") echo "Сузунского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Татарский") echo "Татарского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Усть-Таркский") echo "Усть-Таркского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Чистоозерный") echo "Чистоозерного района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Тогучинский") echo "Тогучинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Болотнинский") echo "Болотнинского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Чановский") echo "Чановского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Венгеровский") echo "Венгеровского района Новосибирской области" ?>	
		<?php if ($priz['voenkomat'] == "Кыштовский") echo "Кыштовского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Маслянинский") echo "Маслянинского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Черепановский") echo "Черепановского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Чулымский") echo "Чулымского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Новосибирский") echo "Новосибирского района Новосибирской области " ?>			
		<?php if ($priz['voenkomat'] == "р.п. Кольцово") echo "Новосибирского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Дзержинский") echo "Дзержинского района <br>г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Калининский") echo "Калининского района <br>г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Заельцовский") echo "Заельцовского района <br>г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Ленинский") echo "Ленинского района <br>г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Кировский") echo "Кировского района <br>г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Октябрьский") echo "Октябрьского района <br>г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Железнодорожный") echo "Железнодорожного района <br>г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Центральный округ") echo "Центрального округа <br>г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Советский") echo "Советского района <br>г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Первомайский") echo "Первомайского района <br>г. Новосибирска" ?>	
		утверждено призывной комиссией Новосибирской области<br>
		от <?=$priz['date_protocol2']?>г.<br>
		Протокол № <?=$priz['protocol_numb2']?><br>
		</b>
		<?php endif; ?>
		
		<?php if (($priz['vx_godnost'] == "В") and ($priz['godnost'] == "Г")):?>
		<b>
		Решение призывной <br>
		комиссии<br>
		<?php if ($priz['voenkomat'] == "Барабинский") echo "Барабинского района Новосибирской области" ?>
		<?php if ($priz['voenkomat'] == "Здвинский") echo "Здвинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Бердский") echo "Бердского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Доволенский") echo "Доволенского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Кочковский") echo "Кочковского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Красноозерский") echo "Красноозерского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "г. Искитим") echo "г. Искитим Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Искитимский") echo "Искитимского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Карасукский") echo "Карасукского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Баганский") echo "Баганского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Каргатский") echo "Каргатского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Убинский") echo "Убинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Коченевский") echo "Коченевского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Колыванский") echo "Колыванского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Куйбышевский") echo "Куйбышевского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Северный") echo "Северного района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Купинский") echo "Купинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Мошковский") echo "Мошковского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Ордынский") echo "Ордынского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Сузунский") echo "Сузунского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Татарский") echo "Татарского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Усть-Таркский") echo "Усть-Таркского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Чистоозерный") echo "Чистоозерного района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Тогучинский") echo "Тогучинского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Болотнинский") echo "Болотнинского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Чановский") echo "Чановского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Венгеровский") echo "Венгеровского района Новосибирской области" ?>	
		<?php if ($priz['voenkomat'] == "Кыштовский") echo "Кыштовского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Маслянинский") echo "Маслянинского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Черепановский") echo "Черепановского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Чулымский") echo "Чулымского района Новосибирской области" ?>			
		<?php if ($priz['voenkomat'] == "Новосибирский") echo "Новосибирского района Новосибирской области " ?>			
		<?php if ($priz['voenkomat'] == "р.п. Кольцово") echo "Новосибирского района Новосибирской области" ?>		
		<?php if ($priz['voenkomat'] == "Дзержинский") echo "Дзержинского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Калининский") echo "Калининского района г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Заельцовский") echo "Заельцовского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Ленинский") echo "Ленинского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Кировский") echo "Кировского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Октябрьский") echo "Октябрьского района г. Новосибирска" ?>		
		<?php if ($priz['voenkomat'] == "Железнодорожный") echo "Железнодорожного района г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Центральный округ") echo "Центрального округа <br> г. Новосибирска<br>" ?>			
		<?php if ($priz['voenkomat'] == "Советский") echo "Советского района г. Новосибирска" ?>			
		<?php if ($priz['voenkomat'] == "Первомайский") echo "Первомайского района г. Новосибирска" ?>	
		отменено призывной <br> комиссией <br>Новосибирской <br> области о признании <br>«В» ограниченно годен к военной службе от<br> 
		<?=$priz['date_protocol2']?>г., принято <br> решение в <br> соответствии со ст. 24 <br> п.1 «а» ФЗ <br>
		 «О воинской обязанности и военной службе» - предоставить <br> отсрочку от призыва на военную службу <?=$priz['ispolnitel']?>.<br>
		Протокол № <?=$priz['protocol_numb2']?> <br> 
		Служебное письмо 
		от <?=$priz['date_protocol2']?>г. <br>
		№ <?=$priz['mail']?>
		 
		</b>
		<?php endif; ?>
		
		
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: left;" valign="top" align="top">
		
		</td>
	</tr>
</table>