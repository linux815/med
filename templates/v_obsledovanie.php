<?php 
/**
 * Шаблон страницы 'Обследование'
 */
?>
<style>
#text1 {
    display: none;
}
</style>

<script>
function Go() {
    document.getElementById('text1').style.display=(document.getElementById('r1').checked)? 'block': 'none'
}
</script>

<form method="post">
	<p>
		<span id="text1">
	</p>
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
			<th>Время призыва</th>
			<th>Краткое содержание</th>
			<th width="5px">Итоговая статья</th>
			<th width="150px">Действия</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="11" class="pagination">

			</td>
		</tr>
	</tfoot>
	<tbody>
<?php // Вычисляем должников, не пришедших на контрольное освидетельствование за 3 дня
$date = date('Y-m-d', mktime(0,0,0,date('m'), date('d'), date('Y'))); 
//$date1 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m')+1, date('d')-16, date('Y'))); 
$date4 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+1, date('Y')));
$date5 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+2, date('Y')));
$date6 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')+3, date('Y')));
$date2 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')-2, date('Y'))); 
$date3 = date('Y-m-d', mktime(date('H'), date('i'), date('s'), date('m'), date('d')-3, date('Y'))); 

foreach($priz2 as $priz2):
// Если наша дата за 3 дня совпадает с текущей даты из базы, то выделяем
if ((($priz2['datecontroly'] == $date4 or $priz2['datecontroly'] == $date5 or $priz2['datecontroly'] == $date6 or $date >= $priz2['datecontroly']) and ($priz2['datecontroly'] <> ""))):$count++;
?>
	<tr>
		<td style="background: #E0EEEE;" ><?=$priz2['id_num']?></td>
		<td style="background: #E0EEEE;"><a href='index.php?c=find&f=date&q=<?=$priz2['date']?>'><?=$priz2['date']?></a></td>
		<td style="background: #E0EEEE;"><a href="#"><?=$priz2['fio']?></a></td>
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
		<td style="background: #E0EEEE;"><a href="#"><?=$priz2['ispolnitel']?></a></td>
		<td style="background: #E0EEEE;"><a href="#" >Диагноз: 
		<?php	
		if (strlen($priz2['diagnoz'])>200)
		{
			$text = substr ($priz2['diagnoz'], 0,strpos ($priz2['diagnoz'], " ", 200)); echo $text."...";
		}
		else echo $text;
		?>
		</a></td>
		<td style="background: #E0EEEE;"><a href="index.php?c=find&f=isx_st&q=<?=$priz2['isx_st']?>" ><?=$priz2['isx_st']?></a></td>		
		<td style="text-align: center; background: #E0EEEE;">
		<form action="" method="post">
		<input type="submit" name="print" value="Печать"/>
		<input type="hidden" value="<?=$priz2['id']?>" name="id" /><br>
		<input type="submit" name="delete" value="Удалить"/>
		<input type="submit" name="edit" value="Редактировать"/>
		</form>
		</td>				
	</tr>
<?php else: // Иначе выводим запись без подсветки ?>
	<tr>
		<td><?=$priz2['id_num']?></td>
		<td><a href='#'><?=$priz2['date']?></a></td>
		<td><a href="#"><?=$priz2['fio']?></a></td>
		<td><a href="#" ><?=$priz2['vx_st']?></a></td>
		<td><a href="#">				
		<?php switch ($priz2['type'])
		{
			case "control": echo "Контроль"; break;
			case "galoba": echo "Жалоба"; break;
			case "otrabotka": echo "Отработка"; break;
			case "vozvrat": echo "Возврат"; break;	
			case "ytverdit": echo "Утвердить"; break;
			case "obsledovanie": echo "Обследование"; break;
		}
		?></a></td>
		<td><a href='#'><?=$priz2['otpravitel']?></a></td>
		<td><a href="#"><?=$priz2['ispolnitel']?></a></td>
		<td><a href="#" >Диагноз: 
		<?php	
		if (strlen($priz2['diagnoz'])>200)
		{
			$text = substr ($priz2['diagnoz'], 0,strpos ($priz2['diagnoz'], " ", 200)); echo $text."...";
		}
		else echo $text;
		?>
		</a></td>
		<td><a href="#" ><?=$priz2['isx_st']?></a></td>		
		<td style="text-align: center;">
		<form action="" method="post">
		&nbsp;<input type="submit" name="print" value="       Печать      "/>
		<input type="hidden" value="<?=$priz2['id']?>" name="id" /><br>
		<input type="submit" name="delete" value="      Удалить     "/>
		<input type="submit" name="edit" value="Редактировать"/>
		</form>
		</td>				
	</tr>
<?php endif; endforeach;?>		
	</tbody>
</table>	
<?php endif; ?>		
</div>
