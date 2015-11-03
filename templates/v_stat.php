<?php 
/**
 * Шаблон страницы не помню для чего.. возможно ее можно удалить :)
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
		<input type="submit" name="list" value="Зарегистрировать призывника"/>
		<span id="text1">
	</p>
</form>	

<div class="grid_16">
<? if ($priz2 == ""): ?>
 <? else:?>
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
				<th>Исполнитель</th>
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
<?foreach($priz2 as $priz2): ?>


	<tr >
				<td ><?=$priz2['id_num']?></td>
				<td><a href='index.php?c=find&f=date&q=<?=$priz2['date']?>'><?=$priz2['date']?></a></td>
				<td><a href="#"><?=$priz2['fio']?></a></td>
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
				?></a></td>
				<td><a href='index.php?c=find&f=otpravitel&q=<?=$priz2['otpravitel']?>'><?=$priz2['otpravitel']?></a></td>
				<td><a href="#"><?=$priz2['voenkomat']?></a></td>
				<td><a href="#"><?=$priz2['ispolnitel']?></a></td>
				<td><a href="#" >Диагноз: <?=$priz2['diagnoz']?><br><?=$priz2['isx_st']?></a></td>
				<td><a href="index.php?c=find&f=isx_st&q=<?=$priz2['isx_st']?>" ><?=$priz2['isx_st']?></a></td>		
				<td style="text-align: center;">
				<form action="" method="post">
				<input type="submit" name="ytverdit" value="Утвердить"/><input type="submit" name="print" value="Печать"/>
				<input type="hidden" value="<?=$priz2['id']?>" name="id" /><br>
				<input type="submit" name="control" value="Контроль"/>	<input type="submit" name="delete" value="Удалить"/>
				<input type="submit" name="edit" value="Редактировать"/>
				</form>
				</td>				
			</tr>
		
<?endforeach;?>	
		
		</tbody>
	</table>
<? endif; ?>	
</div>
