<?php 
/**
 * Шаблон страницы 'Протокол'
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
<?php  echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b><span class="active curved">'.$page.'</span></b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;?>
	</td>
</tr>
</table>
<form method="post">
	<div style="width:5%; position:absolute; left: 15px; top:17px; text-align:left;">
		<input type="submit" name="list2" value="Добавить протокол"/>
	</div>

	<div style="width:5%; position:absolute; left: 367px; top:17px; text-align:left;">
		<input type="submit" name="list3" value="Вывести таблицу"/>
	</div>	
	
	<div style="width:16%; position:absolute; left: 158px; top:17px; text-align:left;">	
	<form action="" method="post">		
		<select name="vivod_godnost">	
			<option value="ВА">В-А (отменить)</option>
			<option value="ВБ">В-Б (отменить)</option>			
			<option value="ВВ">В-В (утвердить)</option>
			<option value="ВГ">В-Г (отменить)</option>
			<option value="ВД">В-Д (отменить)</option>
			<option value="ГБ">Г-Б (отменить)</option>
			<option value="ГВ">Г-В (отменить)</option>
			<option value="ГГ">Г-Г (утвердить)</option>
			<option value="ДД">Д-Д (утвердить)</option>
			<option value="А">Только А</option>
			<option value="ВБ">Только Б</option>
		</select>
		<input type="submit" name="vivod" value="Вывести"/>
</form>
</div>	
</form>	
	<div style="width:20%; position:absolute; left: 1058px; top:15px; text-align:left;">	
	<form action="" method="post">		
		<select name="otpravitel">
			<option <?php if ($priz['otpravitel'] == "Баганский"):?> selected <?php else: echo ""; endif;?>>Баганский</option>
			<option <?php if ($priz['otpravitel'] == "Барабинский"):?> selected <?php else: echo ""; endif;?>>Барабинский</option>
			<option <?php if ($priz['otpravitel'] == "Бердский"):?> selected <?php else: echo ""; endif;?>>Бердский</option>
			<option <?php if ($priz['otpravitel'] == "Болотнинский"):?> selected <?php else: echo ""; endif;?>>Болотнинский</option>
			<option <?php if ($priz['otpravitel'] == "Венгеровский"):?> selected <?php else: echo ""; endif;?>>Венгеровский</option>
			<option <?php if ($priz['otpravitel'] == "г. Искитим"):?> selected <?php else: echo ""; endif;?>>г. Искитим</option>
			<option <?php if ($priz['otpravitel'] == "Дзержинский"):?> selected <?php else: echo ""; endif;?>>Дзержинский</option>
			<option <?php if ($priz['otpravitel'] == "Доволенский"):?> selected <?php else: echo ""; endif;?>>Доволенский</option>
			<option <?php if ($priz['otpravitel'] == "Здвинский"):?> selected <?php else: echo ""; endif;?>>Здвинский</option>
			<option <?php if ($priz['otpravitel'] == "Искитимский"):?> selected <?php else: echo ""; endif;?>>Искитимский</option>
			<option <?php if ($priz['otpravitel'] == "Калининский"):?> selected <?php else: echo ""; endif;?>>Калининский</option>
			<option <?php if ($priz['otpravitel'] == "Карасукский"):?> selected <?php else: echo ""; endif;?>>Карасукский</option>
			<option <?php if ($priz['otpravitel'] == "Каргатский"):?> selected <?php else: echo ""; endif;?>>Каргатский</option>
			<option <?php if ($priz['otpravitel'] == "Кировский"):?> selected <?php else: echo ""; endif;?>>Кировский</option>
			<option <?php if ($priz['otpravitel'] == "Колыванский"):?> selected <?php else: echo ""; endif;?>>Колыванский</option>
			<option <?php if ($priz['otpravitel'] == "Коченевский"):?> selected <?php else: echo ""; endif;?>>Коченевский</option>
			<option <?php if ($priz['otpravitel'] == "Кочковский"):?> selected <?php else: echo ""; endif;?>>Кочковский</option>
			<option <?php if ($priz['otpravitel'] == "Красноозерский"):?> selected <?php else: echo ""; endif;?>>Красноозерский</option>
			<option <?php if ($priz['otpravitel'] == "Куйбышевский"):?> selected <?php else: echo ""; endif;?>>Куйбышевский</option>
			<option <?php if ($priz['otpravitel'] == "Купинский"):?> selected <?php else: echo ""; endif;?>>Купинский</option>
			<option <?php if ($priz['otpravitel'] == "Кыштовский"):?> selected <?php else: echo ""; endif;?>>Кыштовский</option>
			<option <?php if ($priz['otpravitel'] == "Ленинский"):?> selected <?php else: echo ""; endif;?>>Ленинский</option>
			<option <?php if ($priz['otpravitel'] == "Маслянинский"):?> selected <?php else: echo ""; endif;?>>Маслянинский</option>
			<option <?php if ($priz['otpravitel'] == "Мошковский"):?> selected <?php else: echo ""; endif;?>>Мошковский</option>
			<option <?php if ($priz['otpravitel'] == "Новосибирский"):?> selected <?php else: echo ""; endif;?>>Новосибирский</option>
			<option <?php if ($priz['otpravitel'] == "Октябрьский"):?> selected <?php else: echo ""; endif;?>>Октябрьский</option>
			<option <?php if ($priz['otpravitel'] == "Ордынский"):?> selected <?php else: echo ""; endif;?>>Ордынский</option>
			<option <?php if ($priz['otpravitel'] == "Первомайский"):?> selected <?php else: echo ""; endif;?>>Первомайский</option>
			<option <?php if ($priz['otpravitel'] == "р.п. Кольцово"):?> selected <?php else: echo ""; endif;?>>р.п. Кольцово</option>
			<option <?php if ($priz['otpravitel'] == "Северный"):?> selected <?php else: echo ""; endif;?>>Северный</option>
			<option <?php if ($priz['otpravitel'] == "Советский"):?> selected <?php else: echo ""; endif;?>>Советский</option>
			<option <?php if ($priz['otpravitel'] == "Сузунский"):?> selected <?php else: echo ""; endif;?>>Сузунский</option>
			<option <?php if ($priz['otpravitel'] == "Татарский"):?> selected <?php else: echo ""; endif;?>>Татарский</option>
			<option <?php if ($priz['otpravitel'] == "Тогучинский"):?> selected <?php else: echo ""; endif;?>>Тогучинский</option>
			<option <?php if ($priz['otpravitel'] == "Убинский"):?> selected <?php else: echo ""; endif;?>>Убинский</option>
			<option <?php if ($priz['otpravitel'] == "Усть-Таркский"):?> selected <?php else: echo ""; endif;?>>Усть-Таркский</option>
			<option <?php if ($priz['otpravitel'] == "Центральный округ"):?> selected <?php else: echo ""; endif;?>>Центральный округ</option>
			<option <?php if ($priz['otpravitel'] == "Чановский"):?> selected <?php else: echo ""; endif;?>>Чановский</option>
			<option <?php if ($priz['otpravitel'] == "Черепановский"):?> selected <?php else: echo ""; endif;?>>Черепановский</option>
			<option <?php if ($priz['otpravitel'] == "Чистоозерный"):?> selected <?php else: echo ""; endif;?>>Чистоозерный</option>
			<option <?php if ($priz['otpravitel'] == "Чулымский"):?> selected <?php else: echo ""; endif;?>>Чулымский</option>				
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
<?php  foreach($priz as $priz): ?>		
			<tr>
				<td><?=$priz['id']?></td>
				<td><a href='../index.php'><?=$priz['date']?></a></td>
				<td><a href=""><?=$priz['fio']?></a></td>
				<td><a href="#" ><?=$priz['vx_godnost']?></a></td>				
				<td><a href="index.php?c=editpage&id=1" ><?=$priz['vx_st']?></a></td>
				<td><a href=""><?=$priz['voenkomat']?></a></td>
				<td><a href=""><?=$priz['godnost']?></a></td>
				<td><a href="index.php?c=editpage&id=1" >Диагноз: 
				<?php 	
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
<?php endforeach;?>			
		</tbody>
	</table>
</div>
	<table class="bordered">
				<tr>
		<td colspan="5" class="pagination">
<?php  echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b><span class="active curved">'.$page.'</span></b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;?>
		</td>
	</tr>
	</table>