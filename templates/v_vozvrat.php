<?php 
/**
 * Шаблон страницы возврата
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
<?php if ($user['login'] == "med3"): echo ""; else:?>
	<table class="bordered">
				<tr>
		<td colspan="5" class="pagination">
&nbsp;
		</td>
	</tr>
	</table>

<form method="post">
	<div style="width:30%; position:absolute; left: 15px; top:11px; text-align:left;">
	<input type="submit" name="list" value="Добавить лист медицинского освидетельствования"/>
<?php endif;?>
	</div>
</form>	

<div class="grid_16">
	<table class="bordered">
		<thead>
			<tr>
				<th>№</th>
				<th width="5px">Дата создания</th>
				<th>ФИО</th>
				<th>Статья РВК</th>
				<th>Тип документа</th>
				<th>Военкомат</th>
				<?php if ($user['login'] == "med3"):?><th>Получатель</th><?php endif;?>
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
	
<?php $count=1; foreach($priz as $priz): ?>		
			<tr>
				<td><?=$count++?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['date']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['fio']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['vx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>">
				<?php switch ($priz['type'])
				{
					case "control": echo "Контроль"; break;
					case "galoba": echo "Жалоба"; break;
					case "otrabotka": echo "Отработка"; break;
					case "vozvrat": echo "Возврат"; break;		
				}
				?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['otpravitel']?></a></td>
				<?php if ($user['login'] == "med3"):?>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['voenkomat']?></a></td><td>
				<?php endif;?>
				<?php if ($user['login'] == "med3"): else:?>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['ispolnitel']?></a></td>
				<?php endif;?>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" >Диагноз: 
				<?php	
				if (strlen($priz['diagnoz'])>200)
				{
					$text = substr ($priz['diagnoz'], 0,strpos ($priz['diagnoz'], " ", 200)); echo $text."...";
				}
				else echo $priz['diagnoz'];
				?>
				<br><?=$priz['isx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['isx_st']?></a></td>		
				<form action="" method="post">
				<td style="text-align: center;">
				<input type="submit" name="print" value="Печать"/>
				<input type="submit" name="delete" value="Удалить"/>
				<input type="submit" name="edit" value="  Редактировать   "/><br>
				<?php if ($user['login'] == "med3"):?>
				<input type="submit" name="add" value="Добавить в Возвраты"/><br>
				<?php endif;?>
				<input type="hidden" value="<?=$priz['id']?>" name="id" />
				</form>
				</td>				
			</tr>
<?php endforeach;?>			
		</tbody>
	</table>
</div>
