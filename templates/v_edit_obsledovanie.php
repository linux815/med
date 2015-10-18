<?php 
/**
 * Шаблон редактирования обследования
 */

// Функция удаления пробелов
function br2nl($text)
{
	return trim($text);
}
?>

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
	$( "#datepicker3" ).datepicker({
		changeMonth: true,
		changeYear: true
	});	
});
</script>

<form action="" method="post">
<div class="grid_16">
	<h2>Лист медицинского освидетельствования</h2>
	<!--<p class="error">Something went wronk.</p>>-->
</div>

<div class="grid_5">
	<p>
		<label for="title">Номер документа<small></small></label>
		<input type="text" name="id_num" value="<?=$priz['id_num']?>"/>
	</p>
</div>

<div class="grid_5">
	<p>
		<label for="title">Дата создания <small>Пример: 01.01.2013</small></label>
		<input type="text" name="date" id="datepicker" value="<?=$priz['date']?>" />
	</p>	
</div>

<hr>

<div class="grid_5">
	<p>
		<label for="title">ФИО <small>Пример: Иванов Иван Иванович</small></label>
		<input type="text" name="fio" value="<?=$priz['fio']?>" />
	</p>
</div>

<div class="grid_5">
	<p>
		<label for="title">Дата рождения <small>Пример: 01.01.2013</small></label>
		<input type="text" name="daterogdenia" id="datepicker2" value="<?=$priz['daterogdenia']?>" />
	</p>
</div>

<div class="grid_5">
	<p>
		<label for="title">Статья РВК <small>Пример: 23в</small></label>
		<input type="text" name="vx_st" value="<?=$priz['vx_st']?>" />
	</p>
</div>

<div class="grid_6">
	<p>
		<label for="title">Тип документа</label>
		<select name="type">
			<option value="konsult" <?php if ($priz['type'] == "konsult"):?> selected <?php else: echo ""; endif;?>>Консультация</option>
			<option value="galoba" <?php if ($priz['type'] == "galoba"):?> selected <?php else: echo ""; endif;?>>Жалоба</option>
			<option value="vozvrat" <?php if ($priz['type'] == "vozvrat"):?> selected <?php else: echo ""; endif;?>>Возврат с ОСП</option>
			<option value="ytverdit" <?php if ($priz['type'] == "ytverdit"):?> selected <?php else: echo ""; endif;?>>Утвердить</option>
			<option value="otrabotka" <?php if ($priz['type'] == "otrabotka"):?> selected <?php else: echo ""; endif;?>>Отработка</option>
			<option value="control" <?php if ($priz['type'] == "control"):?> selected <?php else: echo ""; endif;?>>Контроль</option>
			<option value="obsledovanie" <?php if ($priz['type'] == "obsledovanie"):?> selected <?php else: echo ""; endif;?>>Обследование</option>
		</select>
	</p>
</div>

<div class="grid_16"></div>

<div class="grid_10">
	<p>
		<label>Жалобы <small></small></label>
		<textarea rows="5" name="zaloby"><?=br2nl($priz['zaloby'])?></textarea>
	</p>
</div>

<div class="grid_6">
	<p>
		<label>Анамнез <small></small></label>
		<textarea class="big" rows="5" name="anamnez"><?=br2nl($priz['anamnez'])?></textarea>
	</p>
</div>	

<div class="grid_16">	
	<p>
		<label>Данные объективного исследования <small></small></label>
		<textarea class="big" rows="5" name="doi"><?php if ($user['login'] == "terapevt" and $priz['diagnoz'] == ""): ?>
		Общее состояние удовлетворительное. Питание снижено.
		Рост          см.
		Вес            кг.
		ИМТ 
		В легких дыхание везикулярное, хрипов нет. 
		Сердце- тоны ритмичные,ясные, АД              мм рт. ст.
		Живот мягкий, безболезненный. 
		<?php else: echo br2nl($priz['doi']); endif;?>
		</textarea>
	</p>
	
	<p>
		<label>Результаты специальных исследований <small></small></label>
		<textarea class="big" rows="5" name="rsi"><?=br2nl($priz['rsi'])?></textarea>
	</p>
	
	<p>
		<label>Диагноз (по-русски) <small></small></label>
		<textarea class="big" rows="5" name="diagnoz"><?=br2nl($priz['diagnoz'])?>
		</textarea>
	</p>
		
	<p>
		<label for="title">Статья <small>Пример: 23в</small></label>
		<input type="text" name="isx_st" value="<?=$priz['isx_st']?>" />
	
	</p>		
	<p>
		<label for="title">Категория годности</label>
		<select name="godnost">
			<option value="А" <?php if ($priz['godnost'] == "А"):?> selected <?php else: echo ""; endif;?>>А - годен к военной службе</option>
			<option value="Б" <?php if ($priz['godnost'] == "Б"):?> selected <?php else: echo ""; endif;?>>Б - годен к военной службе с незначительными ограничениями</option>
			<option value="В" <?php if ($priz['godnost'] == "В"):?> selected <?php else: echo ""; endif;?>>В - ограниченно годен к военной службе</option>
			<option value="Г" <?php if ($priz['godnost'] == "Г"):?> selected <?php else: echo ""; endif;?>>Г - временно не годен к военной службе</option>	
			<option value="Д" <?php if ($priz['godnost'] == "Д"):?> selected <?php else: echo ""; endif;?>>Д - не годен к военной службе</option>					
			<option value="О" <?php if ($priz['godnost'] == "О"):?> selected <?php else: echo ""; endif;?>>Подлежит обследованию</option>		
		</select>
	</p>
			
	<p>
		<label for="title">Дата явки <small>В случае, если подлежит обследованию</small></label>
		<input type="text" name="dateyvki2" id="datepicker3" value="<?=$priz['dateyvki2']?>" />
	</p>	
</div>

<div class="grid_16">
	<p>
		<label for="title">Получатель</label>
		<select name="voenkomat">
			<option><?=$priz['voenkomat']?></option>
		</select>
	</p>
</div>

<div class="grid_16">
	<p>
		<label for="title">Отправитель</label>
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
	</p>
</div>

<div class="grid_16">
	<p>
		<label for="title">Исполнитель</label>
		<input type="text" name="ispolnitel" value="<?=$priz['ispolnitel']?>">	
	</p>
</div>

<div class="grid_16"></div>
<div class="grid_16"></div>

<div class="grid_16">
	<p>
		<label for="title">Графа годности:</label>
		<select name="graf">
			<option <?php if ($priz['graf'] == "I"):?> selected <?php else: echo ""; endif;?>>I</option>
			<option <?php if ($priz['graf'] == "II"):?> selected <?php else: echo ""; endif;?>>II</option>
			<option <?php if ($priz['graf'] == "III"):?> selected <?php else: echo ""; endif;?>>III</option>
		</select>
	</p>
</div>

<div class="grid_16">	
	<p class="submit">
		<input type="submit" value="Сохранить изменения" name="add" />
		<input type="submit" value="Сохранить изменения и отправить на контроль" name="add2" />		
	</p>
</div>
</form>