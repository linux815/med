<?php 
/**
 * Шаблон распечатки выписки
 * С пивом всё будет понятно что и как)
 */
?>

<form action="" method="post">
	<!-- Печать страницы!!! -->
	<div id="print_button"> 
		<input type=button value="Печать" onClick="document.getElementById('print_button').style.display='none';document.getElementById('print_button2').style.display='none'; window.print();location='index.php?c=vipiska&id=<?=$_GET['id']?>';" name="print"> 
	</div>
	<div id="print_button2"> 
	<div style="width:30%; position:absolute; left: 74px; top:8px; text-align:left;">
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</div>
	</div>
	<!-- Конец печати страницы -->
</form>

<table width="820px" style="border: 1px black; margin-top: -10px; padding-top: 0px; padding-left: 30px; padding-right: 30px; padding-aling: justify; ">
	<tr>
		<td align="center" COLSPAN=2>
			<br>
			<font face="Times New Roman" style="font-size: 14pt;">
			<b>ВЫПИСКА ИЗ РЕШЕНИЯ ПРИЗЫВНОЙ КОМИССИИ <br> НОВОСИБИРСКОЙ ОБЛАСТИ</b>
			<br><br>
		    </font>
		</td>	
	</tr>
	<tr>
		<td align="justify" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			Решение призывной комиссии 			
			<?php if ($priz['voenkomat'] == "Барабинский") echo "Барабинского района" ?>
			<?php if ($priz['voenkomat'] == "Здвинский") echo "Здвинского района" ?>			
			<?php if ($priz['voenkomat'] == "Бердский") echo "по г. Бердску" ?>			
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
			</font>
			<br><br>
		</td>
	</tr>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			От <? $dd = substr($priz['date_protocol'],0, 2); 
			   $mm = substr($priz['date_protocol'],3, 2);
			   $yy = substr($priz['date_protocol'],6, 10);
			   switch ($mm)
			   {
			   		case "01": { $mm = "января"; break;	}
			   		case "02": { $mm = "февраля"; break;	}
			   		case "03": { $mm = "марта"; break;	}
			   		case "04": { $mm = "апреля"; break;	}
			   		case "05": { $mm = "мая"; break;	}
			   		case "06": { $mm = "июня"; break;	}
			   		case "07": { $mm = "июля"; break;	}
			   		case "08": { $mm = "августа"; break;	}
			   		case "09": { $mm = "сентября"; break;	}
			   		case "10": { $mm = "октября"; break;	}
			   		case "11": { $mm = "ноября"; break;	}
			   		case "12": { $mm = "декабря"; break;	}
			   }
			   echo "«".$dd."» ".$mm." ".$yy."г."?> № <?=$priz['protocol_numb']?>	
			</font> 
			<br><br>
		</td>
	</tr>
	<tr>
		<td align="left" COLSPAN=2>
<body onLoad="doIt(this); return false;">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="templates/js/Name.js"></script>
<script type="text/javascript">
function doIt(form) {
	var box = document.getElementById('resultsBox');
	try {
		var rn = new RussianName(form.fullName.value);
		var pred = rn.fullName(rn.gcasePred);
		box.innerHTML ='по гражданину '+rn.fullName(rn.gcaseDat);
	} catch(e) {
		box.innerHTML = 'Не удалось распознать ФИО. Пишите выписку вручную :(';
	}
}
</script>
    <script>
      window.onload = function () {
        document.getElementById('mybutt').click()
      }
    </script>
<form action="" onSubmit="doIt(this); return false;" style="display: none;">
	ФИО в именительном падеже:<br />
	<input type="text" name="fullName" value="<?=$priz['fio']?>" size="40" />
	<input type="submit" id="mybutt" value="Просклонять" />
	
</form>		
		
			<font face="Times New Roman" style="font-size: 16.5pt;">
			<div id="resultsBox"></div> 
			</font> 
			<br>
		</td>
	</tr>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			<!-- Отменить -->
			<?php if (($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "Г") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "Д" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Д" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Г") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Г") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "В") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "В") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "В")):?>
			<b><u>ОТМЕНИТЬ</u></b>
			<?php endif;?>
			
			<!-- Утвердить -->
			<?php if ($priz['vx_godnost'] == "В" and $priz['godnost'] == "В"):?>
			об освобождении от призыва на военную службу <b><u>УТВЕРДИТЬ</u></b>
			<?php endif;?>
		
			<?php if (($priz['vx_godnost'] == "А" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Б")):?>
			о призыве на военную службу <b><u>УТВЕРДИТЬ</u></b>
			<?php endif;?>
			
			<?php if (($priz['vx_godnost'] == "А" and $priz['godnost'] == "О") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "О")):?>
			о призыве на военную службу <b><u>ОТМЕНИТЬ</u></b>
			<?php endif;?>			
			
			<?php if ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Г"):?>
			о предоставлении отсрочки от призыва на военную службу <b><u>УТВЕРДИТЬ</u></b>
			<?php endif;?>
			
			<?php if ($priz['vx_godnost'] == "Д" and $priz['godnost'] == "Д"):?>
			об освобождении от призыва на военную службу и исполнения воинской обязанности <b><u>УТВЕРДИТЬ</u></b>
			<?php endif;?>						
			</font> 
			<br><br>
		</td>
	</tr>	
	<?php if (($priz['vx_godnost'] == "В" and $priz['godnost'] == "В") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Д" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Г")): else:?>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			<!-- Отменить -->
			<?php if (($priz['vx_godnost'] == "А" and $priz['godnost'] == "О") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "О") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "Г") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "Д" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Д" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Г") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Г") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "В") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "В") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "В")):?>
			Основание: ст. 29 п.3 ФЗ «О воинской обязанности и военной службе»
			<?php endif;?>
			<br><br>
			</font>
		</td>
	</tr>
	<?php endif;?>
	<tr>
		<td align="left" COLSPAN=2> 
			<font face="Times New Roman" style="font-size: 16.5pt;">
			
			Признать 			
			<?php if ($priz['godnost'] == "А") echo "ст. ".$priz['isx_st']." «А» - годен к военной службе"?>				
			<?php if ($priz['godnost'] == "Б") echo "ст. ".$priz['isx_st']." «Б» - годен к военной службе с незначительными ограничениями"?>				
			<?php if ($priz['godnost'] == "В") echo "ст. ".$priz['isx_st']." «В» - ограниченно годен к военной службе"?>			
			<?php if ($priz['godnost'] == "Г") echo "ст. ".$priz['isx_st']." «Г» - временно не годен к военной службе сроком ".$priz['ispolnitel']."."?>				
			<?php if ($priz['godnost'] == "Д") echo "ст. ".$priz['isx_st']." «Д» - не годен к военной службе"?>	
			<?php if ($priz['godnost'] == "О") echo "Подлежит обследованию."?>	
		<br><br>
			</font>
		</td>
	</tr>
	<?php if (($priz['vx_godnost'] == "В" and $priz['godnost'] == "В") OR ($priz['vx_godnost'] == "Д" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Г") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Б")):?>
		<tr>	
			<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
				<!-- Утвердить -->
			<?php if (($priz['vx_godnost'] == "В" and $priz['godnost'] == "В") OR ($priz['vx_godnost'] == "Д" and $priz['godnost'] == "Д")):?>
			Основание: ст. 23   п.1 «а» ФЗ «О воинской обязанности и военной службе»
		    <?php endif;?>
		    
		    <?php if (($priz['vx_godnost'] == "А" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Б")):?>
		    Основание: п.1 ст. 22 ФЗ «О воинской обязанности и военной службе»                                    
		    <?php endif;?>
		    
		    <?php if ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Г"):?>
			Основание: ст. 24. п.1 «а» ФЗ «О воинской обязанности и военной службе»  
		    <?php endif;?></font><br><br></td></tr>	<?php else:?>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			
			<?php if (($priz['vx_godnost'] == "В" and $priz['godnost'] == "Г") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Г") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Г")):?>
			ст. 24 п.1 «а» ФЗ «О воинской обязанности и военной службе»   - <b>предоставить отсрочку от призыва на военную службу.</b>
			<?php endif;?>
			
			<?php if (($priz['vx_godnost'] == "А" and $priz['godnost'] == "В") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "В") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "В")):?>
			ст. 28 п.1 ФЗ «О воинской обязанности и военной службе»   - <b>освободить от призыва на военную службу, зачислить в запас.</b>
			<?php endif;?>
			
			<?php if ($priz['godnost'] == "О"):?>
			
			<?php endif;?>	
			
			<?php if (($priz['vx_godnost'] == "Д" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Б") OR ($priz['vx_godnost'] == "Д" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "А") OR ($priz['vx_godnost'] == "Г" and $priz['godnost'] == "А")):?>
			ст. 28 п.1 ФЗ «О воинской обязанности и военной службе» - <b>призвать на военную службу. Предназначить в остальные воинские части Сухопутных войск.</b> 
			<?php endif;?>
			
			<?php if (($priz['vx_godnost'] == "Г" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "Б" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "А" and $priz['godnost'] == "Д") OR ($priz['vx_godnost'] == "В" and $priz['godnost'] == "Д")):?>
			ст. 28 п.1 ФЗ «О воинской обязанности и военной службе» - <b>освободить  от исполнения воинской обязанности.</b>
			<?php endif;?>		
			</font> 
			<br><br>
		</td>
	</tr>	
	<?php endif;?>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			От <? $dd = substr($priz['date_protocol2'],0, 2); 
			   $mm = substr($priz['date_protocol2'],3, 2);
			   $yy = substr($priz['date_protocol2'],6, 10);
			   switch ($mm)
			   {
			   		case "01": { $mm = "января"; break;	}
			   		case "02": { $mm = "февраля"; break;	}
			   		case "03": { $mm = "марта"; break;	}
			   		case "04": { $mm = "апреля"; break;	}
			   		case "05": { $mm = "мая"; break;	}
			   		case "06": { $mm = "июня"; break;	}
			   		case "07": { $mm = "июля"; break;	}
			   		case "08": { $mm = "августа"; break;	}
			   		case "09": { $mm = "сентября"; break;	}
			   		case "10": { $mm = "октября"; break;	}
			   		case "11": { $mm = "ноября"; break;	}
			   		case "12": { $mm = "декабря"; break;	}
			   }
			   echo "«".$dd."» ".$mm." ".$yy."г."?> № <?=$priz['protocol_numb2']?>	
			</font> 
			<br><br>
		</td>
	</tr>
	<tr>
		<td align="left" COLSPAN=2>
			<font face="Times New Roman" style="font-size: 16.5pt;">
			Секретарь призывной комиссии области &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$user['surname']?>
			</font> 
			<br><br>
		</td>
	</tr>			
			
</table>