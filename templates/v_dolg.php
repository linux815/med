<?php 
/**
 * Шаблон вывода должников
 */
include 'include/functions.php'; // Функция конвертирования даты в вид ГГГГ-ММ-ДД
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
<div class="grid_16">
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<font face="Times New Roman" style="font-size: 16pt;"><b>&nbsp;</b></font>
			</td>
		</tr>
	</table>
	<!--<p class="error">Something went wronk.</p>>-->
</div>

<div style="width:30%; position:absolute; left: 15px; top:17px; text-align:left;">	
	<p>
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</p>
</div>	
</form>	

<div class="grid_16">
	<?php if ($priz2 == ""): ?>
	 <?php else:?>
		<table class="bordered">
			<thead>	
				<tr>
					<th>№</th>
					<th width="5px">Дата создания</th>
					<th>ФИО</th>
					<th>Статья РВК</th>
					<th>Тип документа</th>
					<th>Военкомат</th>
					<th>Получатель</th>
					<th>Время призыва</th>
					<th>Краткое содержание</th>
					<th>Категория годности</th>
					<th width="5px">Итоговая статья</th>
					<th width="150px">Действия</th>
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
	// Высчитываем контрольников, не пришедние на контрольное медицинское освидетельствование
	$date = date('Y-m-d', mktime(0,0,0,date('m'), date('d'), date('Y'))); 
	//$date1 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m')+1, date('d')-16, date('Y'))); 
	$date4 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+1, date('Y')));
	$date5 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+2, date('Y')));
	$date6 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+3, date('Y')));
	$date2 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')-2, date('Y'))); 
	$date3 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')-3, date('Y'))); 
	
	foreach($priz2 as $priz2):
		//$dt1 = explode('-',$priz2['datecontroly']);
		//  $t1  = mktime(0, 0, 0, $dt1[1], $dt1[0], $dt1[2]);
		if ((($priz2['datecontroly'] == $date4 or $priz2['datecontroly'] == $date5 or $priz2['datecontroly'] == $date6 or $date >= $priz2['datecontroly']) and ($priz2['datecontroly'] <> ""))):$count++;?>
			<tr>
				<td style="background: #E0EEEE;" ><?=$priz2['id_num']?></td>
				<td style="background: #E0EEEE;"><a href='index.php?c=find&f=date&q=<?=Convert($priz2['date'])?>'><?=$priz2['date']?></a></td>
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
				?></a></td>
				<td style="background: #E0EEEE;"><a href='index.php?c=find&f=otpravitel&q=<?=$priz2['otpravitel']?>'><?=$priz2['otpravitel']?></a></td>
				<td style="background: #E0EEEE;"><a href="#"><?=$priz2['voenkomat']?></a></td>
				<td style="background: #E0EEEE;"><a href="#"><?=$priz2['ispolnitel']?></a></td>
				<td style="background: #E0EEEE;"><a href="#" >Диагноз: <?=$priz2['diagnoz']?><br><?=$priz2['isx_st']?></a></td>
				<td style="background: #E0EEEE;"><a href="index.php?c=find&f=godnost&q=<?=$priz2['godnost']?>" >
				<?phpif ($priz2['godnost'] == "О") echo "Обследование"; else echo $priz2['godnost'];
				?></a></td>	
				<td style="background: #E0EEEE;"><a href="index.php?c=find&f=isx_st&q=<?=$priz2['isx_st']?>" ><?=$priz2['isx_st']?></a></td>		
				<td style="text-align: center; background: #E0EEEE;">
				<form action="" method="post">
				<input type="submit" name="ytverdit" value="Утвердить"/><input type="submit" name="print" value="Печать"/>
				<input type="hidden" value="<?=$priz2['id']?>" name="id" /><br>
				<input type="submit" name="control" value="Контроль"/>	<input type="submit" name="delete" value="Удалить"/>
				<input type="submit" name="edit" value="Редактировать"/>
				</form>
				</td>				
			</tr>
	<?php endif; endforeach; echo $t1." ".$t;?>	
	</tbody>
</table>
	<?php endif; ?>	
</div>
