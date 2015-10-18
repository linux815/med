<?php 
/**
 * Шаблон страницы, для смены фамилии специалиста
 */
?>

<style type="text/css"><!--
#p1 {display:none;}
--></style>	
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
	});
	</script>
<form action="" method="post">	
<table class="bordered">
			<tr>
	<td colspan="5" class="pagination">
		<font face="Times New Roman" style="font-size: 16pt;"><b>Настройки</b></font>
	</td>
</tr>
</table>

<div style="width:5%; position:absolute; left: 15px; top:17px; text-align:left;">
	<p class="submit">
		<input type="submit" value="Сохранить" name="add" />
	</p>
</div>

<div style="width:5%; position:absolute; left: 98px; top:17px; text-align:left;">	
	<!-- Печать страницы!!! -->
		<p>
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
		</p>
	<!-- Конец печати страницы -->
</div>	

				<? if ($error == ""): echo ""; else:?>
				<div class="grid_16">
					<p class="error"><?=$error?></p>
				</div>
				<? endif; ?>

<div class="grid_5" id="p1">
	<p>
		<label for="title">Дата контроля <small>Пример: 01.01.2013</small></label>
		<input type="text" name="datecontroly" id="datepicker" value="<?=date('d.m.Y')?>">	
	</p>
</div>

<div class="grid_8">
	<p style="margin-left: 10px;">
		<label for="title">ФИО специалиста<small>Пример: Иванов И.И.</small></label>
		<input type="text" name="surname" value="<?=$user['surname']?>">	
	</p>		
	</div>
</form>