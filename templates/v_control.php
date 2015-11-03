<?php 
/**
 * Шаблон страницы 'Контроль'
 */
?>

<style type="text/css">
#p1 {display:none;}
</style>
	
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

<form action="index.php?c=control" method="post">	
<table class="bordered">
	<tr>
		<td colspan="5" class="pagination">
			<font face="Times New Roman" style="font-size: 16pt;"><b>Контроль</b></font>
		</td>
	</tr>
</table>

<div style="width:5%; position:absolute; left: 11px; top:17px; text-align:left;">	
	<p>
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</p>
</div>	

<div class="grid_16">
	<p>
		<label for="title">Дата контроля <small> Пример: 01.01.2013 (когда должен придти)</small></label>
		<input type="text" name="datecontroly" id="datepicker" value="<?=$priz['datecontroly']?>">	
	</p>
</div>

<table class="bordered">
	<tr>
		<td colspan="5" class="pagination">
			<input type="hidden" value="<?=$_GET['id']?>" name="id" />
			<input type="submit" value="Поставить на контроль" name="add" />
		</td>
	</tr>
</table>	
</form>