<?php 
/**
 * Шаблон печати таблицы при нажатии на кнопку 'Вывести таблицу' в протоколе.  
 */
?>

<form action="" method="post">
	<!-- Печать страницы!!! -->
	<div id="print_button"> 
		<input type=button value="Печать" onClick="document.getElementById('print_button').style.display='none';document.getElementById('print_button2').style.display='none'; window.print();location='index.php?c=print_table';" name="print"> 
	</div>
	<div id="print_button2"> 
	<div style="width:30%; position:absolute; left: 74px; top:8px; text-align:left;">
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</div>
	</div>
	<!-- Конец печати страницы -->
</form>

<table  style="border-collapse: collapse; border: solid black; border: 1px solid black; text-aling: center; margin-left: 0px;" width="1000px">
	<tr style="text-align: center;">
		<td width="500px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="260px">
			Дата и номер протокола
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="260px">
 			Вызвано на КО
 		</td>
	
		<td width="60px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="270px">
			Итого
		</td>
	
		<td width="250px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;">
			Прибыло на КО
		</td>

		<td width="60px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="260px">
			Итого
		</td>
	
		<td width="200px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="260px">
 			Из них поменяли решение
 		</td>
	
		<td width="200px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="270px">
			Категория годности А
		</td>
	
		<td width="200px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;">
			Категория годности Б
		</td>
		
		<td width="200px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;">
			Отправлено на обследование
		</td>				
	</tr>
<?php $a = 0; $b = 0; $c = 0; $d = 0; foreach ($priz as $priz):?>
	<tr style="text-align: center;">
		<td width="500px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: left; font: 12pt Times New Roman;" width="260px">
			№<?=$priz['protocol_numb2']?>  от <?=$priz['date_protocol2']?> 
		</td>
	
		<td style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="260px">
 		
 		</td>
	
		<td width="60px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="270px">
		 
		</td>
	
		<td width="250px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;">
			<?php  $a = $a+$priz['count']; echo $a;?>
		</td>

		<td width="60px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="260px">
			<?=$priz['count']?>
		</td>
	
		<td width="200px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="260px">
 			<?php  $b = $b+$priz['pomenyli']; echo $b?>
 		</td>
	
		<td width="200px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;" width="270px">
			<?php  $c = $c+$priz['A']; echo $c;?>
		</td>
	
		<td width="200px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;">
			<?php  $d = $d+$priz['B']; echo $d;?>
		</td>
		
		<td width="200px" style="border-collapse: collapse; border: solid black; border: 1px solid black; text-align: center; font: 12pt Times New Roman;">
		
		</td>				
	</tr>	
<?php endforeach;?>	
</table>	