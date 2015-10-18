<?php 
/**
 * Шаблон страницы 'Отработка'
 */

?>
<style>
#text1 {
    display: none; 
}

</style>
	<script>
	$(function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
		$( "#datepicker2" ).datepicker({
			changeMonth: true,
			changeYear: true
		});
	});
	</script>
<script>
function Go() {
    document.getElementById('text1').style.display=(document.getElementById('r1').checked)? 'block': 'none'
}
</script>

<form action="" method="post">
	<div style="width:30%; position:absolute; left: 15px; top:14px; text-align:left;">
		<input type="submit" name="list" value="Зарегистрировать призывника">
	</div>
	
	<div style="width:5%; position:absolute; left: 231px; top:14px; text-align:left;">
		<input type="submit" name="dolg" value="Вывести должников">
	</div>
	<div style="width:5%; position:absolute; left: 370px; top:14px; text-align:left;">
		<span id="print_button"> 
		<span class='tip'><a tabindex="1"><em><input type=button value="Поиск по дате" name="print"> </em></a><span class='answer'>		
		<span id="print_button2">
		Вывести с:	<input type="text" name="from" id="datepicker" style="width: 70px;" value=""> по
		<input type="text" name="to" id="datepicker2" style="width: 70px;" value=""> 	<input type="text" name="find_text" value="">	<select name="field">			
			<option value="date">Дата создания</option>
			<option value="dateyvki">Дата явки</option>
			<option value="datecontroly">Дата контроля</option>
			<option value="fio">ФИО</option>
			<option value="vx_st">Статья РВК</option>
			<option value="type">Тип документа</option>
			<option value="isx_st">Итоговая статья</option>
		</select><input type="submit" name="vivod" value="Вывести"></span></span></span></span>
	</div>
</form>	

<div class="grid_16">
<div class=example_16"">
	<div class="clear"></div>
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<?php echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b><span class="active curved">'.$page.'</span></b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;?>
			</td>
		</tr>
	</table>
<?php if ($priz2 == ""): else:?>
	<table class="bordered">
		<thead>	
			<tr>
				<th>№</th>
				<th>Дата создания</th>
				<th>ФИО</th>
				<th>Статья РВК</th>
				<th>Тип документа</th>
				<th>Военкомат</th>
				<th>Время призыва</th>
				<th>Краткое содержание</th>
				<th>Категория годности</th>
				<th >Итоговая статья</th>
				<th>Действия</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="12" class="pagination">

				</td>
			</tr>
		</tfoot>
		<tbody>
<?php
$date = date('Y-m-d', mktime(0,0,0,date('m'), date('d'), date('Y'))); 
//$date1 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m')+1, date('d')-16, date('Y'))); 
$date4 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+1, date('Y')));
$date5 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+2, date('Y')));
$date6 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+3, date('Y')));
$date2 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')-2, date('Y'))); 
$date3 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')-3, date('Y'))); 

foreach($priz2 as $priz2):
// Если наша дата за 3 дня совпадает с текущей даты из базы, то выделяем
if ((($priz2['datecontroly'] == $date4 or $priz2['datecontroly'] == $date5 or $priz2['datecontroly'] == $date6 or $date >= $priz2['datecontroly']) and ($priz2['datecontroly'] != ''))): $count++;
?>
	<tr>
		<td style="background: #E0EEEE;" ><?=$priz2['id_num']?></td>
		<td style="background: #E0EEEE;"><a href='index.php?c=find&f=date&q=<?php echo $priz2['date']?>'><?=$priz2['date']?></a></td>
		<td style="background: #E0EEEE;"><a href="#"><?=$priz2['fio']?>, <?$a = substr($priz2['daterogdenia'],6, 10); echo $a;?>г.р.</a></td>
		<td style="background: #E0EEEE;"><a href="index.php?c=find&f=vx_st&q=<?=$priz2['vx_st']?>" ><?=$priz2['vx_st']?></a></td>
		<td style="background: #E0EEEE;"><a href="index.php?c=find&f=type&q=<?=$priz2['type']?>">				
		<?php switch ($priz2['type'])
		{
			case "control": echo "Контроль"; break;
			case "galoba": echo "Жалоба"; break;
			case "otrabotka": echo "Отработка"; break;
			case "vozvrat": echo "Возврат"; break;	
			case "ytverdit": echo "Утвердить"; break;
		}
		if (($priz2['control'] == "yes") and ($priz2['type'] == "control")) echo " (прибыл)"; elseif (($priz2['control'] == "no" or $priz2['control'] == "") and ($priz2['type'] == "control")) echo " (не прибыл)";
		?></a></td>
		<td style="background: #E0EEEE;"><a href='index.php?c=find&f=otpravitel&q=<?=$priz2['otpravitel']?>'><?=$priz2['otpravitel']?></a></td>
		<td style="background: #E0EEEE;"><a href="#"><?=$priz2['ispolnitel']?></a></td>
		<td style="background: #E0EEEE;"><a href="#" >Диагноз: 
		<?php	
		if (strlen($priz2['diagnoz'])>200)
		{
			$text = substr ($priz2['diagnoz'], 0,strpos ($priz2['diagnoz'], " ", 200)); echo $text."...";
		}
		else echo $priz2['diagnoz'];
		?></a></td>
		<td style="background: #E0EEEE;"><a href="index.php?c=find&f=godnost&q=<?=$priz2['godnost']?>" >
		<?phpif ($priz2['godnost'] == "О") echo "Обследование"; else echo $priz2['godnost'];
		?></a></td>	
		<td style="background: #E0EEEE;"><a href="index.php?c=find&f=isx_st&q=<?=$priz2['isx_st']?>" ><?=$priz2['isx_st']?></a></td>		
		<td style="text-align: center; background: #E0EEEE;">
		<form action="" method="post">
		<input type="submit" name="ytverdit" value="     Утвердить    "/><input type="submit" name="print" value="       Печать       "/>
		<input type="hidden" value="<?=$priz2['id']?>" name="id" /><br>
		<input type="submit" name="control" value="     Контроль     "/><input style="width: 80px;" type="submit" name="delete" value="      Удалить      "/>
		<input type="submit" name="edit" value="Редактировать"/>
		</form>
		</td>				
	</tr>
<?php else: // Иначе выводим запись без подсветки ?>
	<tr >
		<td ><?=$priz2['id_num']?></td>
		<td><a href='index.php?c=find&f=date&q=<?=$priz2['date']?>'><?=$priz2['date']?></a></td>
		<td><a href="#"><?=$priz2['fio']?>, <?$a = substr($priz2['daterogdenia'],6, 10); echo $a;?>г.р.</a></td>
		<td><a href="index.php?c=find&f=vx_st&q=<?=$priz2['vx_st']?>" ><?=$priz2['vx_st']?></a></td>
		<td><a href="index.php?c=find&f=type&q=<?=$priz2['type']?>">				
		<?php switch ($priz2['type'])
		{
			case "control": echo "Контроль"; break;
			case "galoba": echo "Жалоба"; break;
			case "otrabotka": echo "Отработка"; break;
			case "vozvrat": echo "Возврат"; break;	
			case "ytverdit": echo "Утвердить"; break;
		}
		if (($priz2['control'] == "yes") and ($priz2['type'] == "control")) echo " (прибыл)"; elseif (($priz2['control'] == "no" or $priz2['control'] == "") and ($priz2['type'] == "control")) echo " (не прибыл)";
		?></a></td>
		<td><a href='index.php?c=find&f=otpravitel&q=<?=$priz2['otpravitel']?>'><?=$priz2['otpravitel']?></a></td>
		<td style="text-align: center;"><a href="index.php?c=find&f=ispolnitel&q=<?=$priz2['ispolnitel']?>"><?=$priz2['ispolnitel']?></a></td>
		<td><a href="#" >Диагноз: 
		<?php	
		if (strlen($priz2['diagnoz'])>200)
		{
			$text = substr ($priz2['diagnoz'], 0,strpos ($priz2['diagnoz'], " ", 200)); echo $text."...";
		}
		else echo $priz2['diagnoz'];
		?></a></td>
		<td><a href="index.php?c=find&f=godnost&q=<?=$priz2['godnost']?>" >
		<?php if ($priz2['godnost'] == "О") echo "Обследование"; else echo $priz2['godnost'];
		?></a></td>	
		<td><a href="index.php?c=find&f=isx_st&q=<?=$priz2['isx_st']?>" ><?=$priz2['isx_st']?></a></td>		
		<td style="text-align: center;">
		<form action="" method="post">
		<input type="submit" name="ytverdit" value="     Утвердить    "/><input type="submit" name="print" value="       Печать       "/>
		<input type="hidden" value="<?=$priz2['id']?>" name="id" /><br>
		<input type="submit" name="control" value="     Контроль     "/><input style="width: 80px;" type="submit" name="delete" value="      Удалить      "/>
		<input type="submit" name="edit" value="Редактировать"/>
		</form>
		</td>			
	</tr>
<?php endif; endforeach;?>	
</tbody>
	</table>
<?php  endif; ?>	
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<?php  echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b><span class="active curved">'.$page.'</span></b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;?>
			</td>
		</tr>
	</table>
	</div>
</div>
