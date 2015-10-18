<?php 
/**
 * Шаблон страницы 'Редактирование/Добавление шаблона'
 */

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
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<font face="Times New Roman" style="font-size: 16pt;"><b>Добавление/Редактирование шаблона</b></font>
			</td>
		</tr>
	</table>
	<!--<p class="error">Something went wronk.</p>>-->
</div>

<div style="width:30%; position:absolute; left: 15px; top:37px; text-align:left;">	
	<p>
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</p>
</div>	

<div class="grid_16">
	<p>
		<label for="title">Название шаблона <small>Пример: Пониженое питание</small></label>
		<input type="text" name="fio" value="<?=$priz['fio']?>" />
	</p>
</div>

<div class="grid_16"></div>

<div class="grid_10">
	<p>
		<label>Жалобы <small></small></label>
		<textarea rows="5" name="zaloby"><?=br2nl($priz['zaloby'])?></textarea>
	</p>
</div>

<div class="grid_10">
	<p>
		<label>Анамнез <small></small></label>
		<textarea class="big" rows="5" name="anamnez"><?=br2nl($priz['anamnez'])?></textarea>
	</p>
</div>	

<div class="grid_16">	
	<p>
		<label>Данные объективного исследования <small></small></label>
		<textarea class="big" rows="10" name="doi"><?php if ($user['login'] == "terapevt" and $priz['doi'] == ""): ?>
		Общее состояние удовлетворительное. Питание снижено.
		Рост          см.
		Вес            кг.
		ИМТ 
		В легких дыхание везикулярное, хрипов нет. 
		Сердце- тоны ритмичные,ясные, АД              мм рт. ст.
		Живот мягкий, безболезненный. 
		<?php else: echo br2nl($priz['doi']); endif;?></textarea>
	</p>
	
	<p>
		<label>Результаты специальных исследований <small></small></label>
		<textarea class="big" rows="10" name="rsi"><?php 
		if ($user['login'] == "okylist")
		{	
			if ($priz['rsi'] == "") echo $vsablon['rsi']; else echo $priz['rsi'];
		} else {
		if ($priz['rsi'] == "") echo br2nl($vsablon['rsi']); else echo br2nl($priz['rsi']); 
		}?></textarea>
	</p>
	
	<p>
		<label>Диагноз (по-русски) <small></small></label>
		<textarea class="big" rows="5" name="diagnoz"><?=br2nl($priz['diagnoz'])?></textarea>
	</p>	
</div>

<div class="grid_16"></div>
<div class="grid_16"></div>

<div class="grid_16">	
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<input type="submit" value="Добавить" name="add" />
				<input type="hidden" value="<?=$priz['id']?>" name="id" />
				<input type="submit" value="Сохранить изменения" name="regit" />		
			</td>
		</tr>
	</table>
</div>
</form>