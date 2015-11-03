<?php 
/**
 * Шаблон поиска по категориям годности и по районам
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
<div class="grid_16">
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<font face="Times New Roman" style="font-size: 16pt;"><b>Поиск</b></font>
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
<?php  $cout = 0; foreach($priz as $priz): $cout++;?>		
			<tr>
				<td style="background: #FFFFFF;" ><?=$priz['id']?></td>
				<td style="background: #FFFFFF;"><a href='index.php?c=editpage&id=<?=$priz['id']?>'><?=$priz['date']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['fio']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['vx_godnost']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['vx_st']?></a></td>
				<td style="background: #FFFFFF;"><a href="#"><?=$priz['voenkomat']?></a></td>
				<td style="background: #FFFFFF;"><a href="#"><?=$priz['godnost']?></a></td>
				<td style="background: #FFFFFF;"><a href="#" >Диагноз: <?=$priz['diagnoz']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['isx_st']?></a></td>		
				<td style="text-align: left; background: #FFFFFF;">
				<form action="" method="post">
				<a href="index.php?c=editprotocol2&id=<?=$priz['id']?>" class="edit">Редактировать</a><br>
				<?php if ($user['login'] == "med1"):?>
				<a href="index.php?c=printpriz&id=<?=$priz['id']?>" class="delete">Распечатать протокол</a><br>
				<?php else: ?>
				<a href="index.php?c=printgaloba&id=<?=$priz['id']?>" class="delete">Распечатать протокол</a><br>
				<?php endif; ?>
				<a href="index.php?c=mail&id=<?=$priz['id']?>" class="delete">Служебное письмо</a><br>	
				<a href="index.php?c=findprotocol&delete&id=<?=$priz['id']?>" class="delete">Удалить</a><br>	
				</form>				
				</td>				
			</tr>
			<?php endforeach; ?>
			<div style="width:30%; position:absolute; left: 80px; top:23px; text-align:left;">	
			<?="Количество: ".$cout?>
			</div>
		</tbody>
	</table>
</div>