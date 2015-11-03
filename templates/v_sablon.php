<?php 
/**
 * Шаблон страницы 'Шаблоны'
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
&nbsp;
		</td>
	</tr>
	</table>
<form method="post">
	<div style="width:30%; position:absolute; left: 15px; top:11px; text-align:left;">	
		<input type="submit" name="list" value="Добавить шаблон"/>
	</div>
</form>	

<div class="grid_16">
<? if ($priz2 == ""): else:?>
	<table class="bordered">
		<thead>
			<tr>
				<th>Название шаблона</th>
				<th>Краткое содержание</th>
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
<?if ($count == 0): echo ""; else:?> <tr><td colspan=12 style="background: #4F4F4F"></td></tr><? endif;?>
<?foreach($priz2 as $priz2):?>
	<tr >
				<td><a href="#"><?=$priz2['fio']?></a></td>
				<td><a href="#" >Диагноз: <?=$priz2['diagnoz']?></a></td>
				<td style="text-align: center;">
				<form action="" method="post">

				<input type="submit" name="edit" value="Редактировать"/>				<input type="hidden" value="<?=$priz2['id']?>" name="id" /><br>
				<input type="submit" name="delete" value="      Удалить     "/>&nbsp;
				</form>
				</td>				
			</tr>
<?endforeach;?>	
		</tbody>
	</table>
<? endif; ?>	
</div>
