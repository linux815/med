<?php 
/**
 * Шаблон страницы 'Жалобы (Протокол)'
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
</form>	
<table class="bordered">
			<tr>
	<td colspan="5" class="pagination">
		<font face="Times New Roman" style="font-size: 16pt;"><b>&nbsp;</b></font>
	</td>
</tr>
</table>
<form method="post">	
		<div style="width:5%; position:absolute; left: 225px; top:35px; text-align:left;">
		<input type="submit" name="list2" value="Добавить протокол"/>
	</div>

<div style="width:16%; position:absolute; left: 15px; top:35px; text-align:left;">	
	<form action="index.php?c=page" method="post">		
		<select name="vivod_godnost">	
			<option value="АА">А-А (утвердить)</option>
			<option value="АБ">А-Б (утвердить)</option>			
			<option value="АВ">А-В (отменить)</option>
			<option value="АГ">А-Г (отменить)</option>
			<option value="БА">Б-А (утвердить)</option>
			<option value="ББ">Б-Б (утвердить)</option>
			<option value="БВ">Б-В (отменить)</option>
			<option value="БГ">Б-Г (отменить)</option>
		</select>
		<input type="submit" name="vivod" value="Вывести"/>
</form>
</div>	

</form>	
	<div style="width:20%; position:absolute; left: 1058px; top:37px; text-align:left;">	
	<form action="" method="post">		
		<select name="otpravitel">
			<option>Баганский</option>
			<option>Барабинский</option>
			<option>Бердский</option>
			<option>Болотнинский</option>
			<option>Венгеровский</option>
			<option>г. Искитим</option>
			<option>Дзержинский</option>
			<option>Доволенский</option>
			<option>Железнодорожный</option>
			<option>Заельцовский</option>
			<option>Здвинский</option>
			<option>Искитимский</option>
			<option>Калининский</option>
			<option>Карасукский</option>
			<option>Каргатский</option>
			<option>Кировский</option>
			<option>Колыванский</option>
			<option>Коченевский</option>
			<option>Кочковский</option>
			<option>Красноозерский</option>
			<option>Куйбышевский</option>
			<option>Купинский</option>
			<option>Кыштовский</option>
			<option>Ленинский</option>
			<option>Маслянинский</option>
			<option>Мошковский</option>
			<option>Новосибирский</option>
			<option>Октябрьский</option>
			<option>Ордынский</option>
			<option>Первомайский</option>
			<option>р.п. Кольцово</option>
			<option>Северный</option>
			<option>Советский</option>
			<option>Сузунский</option>
			<option>Татарский</option>
			<option>Тогучинский</option>
			<option>Убинский</option>
			<option>Усть-Таркский</option>
			<option>Центральный округ</option>
			<option>Чановский</option>
			<option>Черепановский</option>
			<option>Чистоозерный</option>
			<option>Чулымский</option>			
		</select>
		<input type="submit" name="vivod2" value="Вывести"/>
</form>
</div>	
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
<? foreach($priz as $priz): ?>		
			<tr>
				<td><?=$priz['id']?></td>
				<td><a href='../index.php'><?=$priz['date']?></a></td>
				<td><a href=""><?=$priz['fio']?></a></td>
				<td><a href="#"><?=$priz['vx_godnost']?></a></td>				
				<td><a href="index.php?c=editpage&id=1" ><?=$priz['vx_st']?></a></td>
				<td><a href=""><?=$priz['voenkomat']?></a></td>
				<td><a href=""><?=$priz['godnost']?></a></td>
				<td><a href="index.php?c=editpage&id=1" >Диагноз: <?=$priz['diagnoz']?><br><?=$priz['isx_st']?></a></td>
				<td><a href="#" ><?=$priz['isx_st']?></a></td>		
				<td style="text-align: left;"><a href="index.php?c=editprotocol2&gal&id=<?=$priz['id']?>" >Редактировать</a><br>
				<a href="index.php?c=vipiska&id=<?=$priz['id']?>" >Выписка</a><br>
				<a href="index.php?c=printgaloba&id=<?=$priz['id']?>" >Распечатать протокол</a><br>
				<a href="index.php?c=mail&id=<?=$priz['id']?>" >Служебное письмо</a><br>
				<a href="index.php?c=protocol&delete=<?=$priz['id']?>" >Удалить</a><br>
				</td>				
			</tr>
<?endforeach;?>			
		</tbody>
	</table>
</div>
