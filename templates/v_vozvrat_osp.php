<?php 
/**
 * Шаблон страницы 'Протокол (Возврат с ОСП)'
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
<table class="bordered">
			<tr>
	<td colspan="5" class="pagination">
		<font face="Times New Roman" style="font-size: 16pt;"><b>&nbsp;</b></font>
	</td>
</tr>
</table>
<form method="post">
	<div style="width:5%; position:absolute; left: 15px; top:17px; text-align:left;">
		<input type="submit" name="list2" value="Добавить протокол"/>
	</div>
	
	<div style="width:20%; position:absolute; left: 158px; top:17px; text-align:left;">	

</div>	
</form>	

<div class="grid_16">
	<table class="bordered">
		<thead>
			<tr>
				<th>№</th>
				<th width="5px">Дата создания</th>
				<th>ФИО</th>
				<th width="5px">Категория годности РВК</th>				
				<th>Статья РВК</th>
				<th>Военкомат</th>
				<th width="5px">Категория годности </th>
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
<? $count=1; foreach($priz as $priz): ?>		
			<tr>
				<td><?=$count++?></td>
				<td><a href='../index.php'><?=$priz['date']?></a></td>
				<td><a href=""><?=$priz['fio']?></a></td>
				<td><a href="#" ><?=$priz['vx_godnost']?></a></td>				
				<td><a href="index.php?c=editpage&id=1" ><?=$priz['vx_st']?></a></td>
				<td><a href=""><?=$priz['voenkomat']?></a></td>
				<td><a href=""><?=$priz['godnost']?></a></td>
				<td><a href="index.php?c=editpage&id=1" >Диагноз: 
				<?	
				if (strlen($priz['diagnoz'])>200)
				{
					$text = substr ($priz['diagnoz'], 0,strpos ($priz['diagnoz'], " ", 200)); echo $text."...";
				}
				else echo $priz['diagnoz'];
				?>
				</a></td>
				<td><a href="#" ><?=$priz['isx_st']?></a></td>		
				<td style="text-align: center;">
				<form action="" method="post">
				<input type="submit" name="print" value="Печать"/>
				<input type="submit" name="vipiska" value="Выписка"/>	
				<input type="hidden" value="<?=$priz['id']?>" name="id" /><br>
				<input type="submit" name="delete" value="Удалить"/>
				<input type="submit" name="edit" value="Редактировать"/>
				<input type="submit" name="mail" value="Служебное письмо"/>				
				</form>
				</td>				
			</tr>
<?endforeach;?>			
		</tbody>
	</table>
</div>
