<?php 
/**
 * Шаблон страницы добавления в протокол
 */

function br2nl($text)
{
	return trim($text);
}
?>

<style type="text/css">
#pets1_show {display:none;}
#p1 {display:none;}
#p2 {display:none;}
</style>

<script type="text/javascript" src="sel.js"></script>

<script type="text/javascript"><!--
//
function mChange1(obj){
var el, s, n, v;
el=obj.options;
n=el.selectedIndex;
v=el[n].value;
s=obj.id+'_show';
if(v=="Г"){
if(document.getElementById(s)){
document.getElementById(s).style.display="block";
document.getElementById("p1").style.display="block";
document.getElementById("p2").style.display="block";}}
if (v=="О"){
if(document.getElementById(s)){	
document.getElementById("datepicker3").style.display="block";
document.getElementById("p2").style.display="block";}}
};//
//

function mChange2(obj){
var el, s, n, v;
el=obj.options;
n=el.selectedIndex;//индекс выбранного оптиона
v=el[n].value;
s=obj.id+'_show';//получить ИД поля
if(v=="Г"){//только если выбран нужный оптион
if(document.getElementById(s)){//существует ли такой элемент?
document.getElementById(s).style.display="block";}};//показать
 };//
</script>
</head>
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
	
<form action="index.php?c=editprotocol&id=<?=$_GET['id']?>" method="post">
<div class="grid_16">
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<font face="Times New Roman" style="font-size: 16pt;"><b>Добавление протокола</b></font>
			</td>
		</tr>
	</table>
	<!--<p class="error">Something went wronk.</p>>-->
</div>

<div style="width:30%; position:absolute; left: 15px; top:37px; text-align:left;">	
	<!-- Печать страницы!!! -->
	<p>
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</p>
	<!-- Конец печати страницы -->
</div>	
<?php if ($user['login'] == "med1" or ($user['login'] == "med2")):?>
<div style="width:30%; position:absolute; left: 105px; top:7px; text-align:left;">	

<div class="grid_5">	
	<label for="title">&nbsp;</label>
	<select name="sablon" width="50px">
		<option selected="" disabled>Выберите человека</option>
			<?php foreach($sablon as $sablon):?>
			<option value="<?=$sablon['id']?>"><?=$sablon['fio']." - (".$sablon['surname'].")"?></option>
			<?php endforeach;?>		
	</select>
</div>

<div class="grid_2">
	<label for="title">&nbsp;</label>
	<input type="submit" value="Добавить" name="add_sablon" />
</div>

</div>
<?php endif;?>

<div class="grid_5">
	<p>
		<label for="title">ФИО <small>Пример: Иванов Иван Иванович</small></label>
		<input type="text" name="fio" value="<?=$priz['fio']?>" />
	</p>
</div>

<div class="grid_5">
	<p>
		<label for="title">Дата рождения <small>Пример: 01.01.2013</small></label>
		<input type="text" name="daterogdenia" id="datepicker"  value="<?=$priz['daterogdenia']?>" />
	</p>
</div>

<div class="grid_4">
	<p>
		<label for="title">Статья РВК <small>Пример: 23в</small></label>
		<input type="text" name="vx_st" value="<?=$priz['vx_st']?>" />
	</p>	
</div>

<div class="grid_4">
	<p>
		<label for="title">Протокол № <small>Пример: 1</small></label>
		<input type="text" name="protocol_numb" value="" />
	</p>
</div>

<div class="grid_4">
	<p>
		<label for="title">Дата протокола</label>
		<input type="text" name="date_protocol" id="datepicker2" value="" />
	</p>
</div>

<div class="grid_16">
	<p>
		<label>Диагноз РВК <small></small></label>
		<textarea rows="5" name="vx_diagnoz"></textarea>
	</p>
</div>

<div class="grid_16">
	<p>
		<label for="title">Категория годности РВК</label>
		<select name="vx_godnost">
			<option value="А" <?php if ($priz['vx_godnost'] == "А"):?> selected <?php else: echo ""; endif;?>>А - годен к военной службе</option>
			<option value="Б" <?php if ($priz['vx_godnost'] == "Б"):?> selected <?php else: echo ""; endif;?>>Б - годен к военной службе с незначительными ограничениями</option>
			<option value="В" <?php if ($priz['vx_godnost'] == "В"):?> selected <?php else: echo ""; endif;?>>В - ограниченно годен к военной службе</option>
			<option value="Г" <?php if ($priz['vx_godnost'] == "Г"):?> selected <?php else: echo ""; endif;?>>Г - временно не годен к военной службе</option>	
			<option value="Д" <?php if ($priz['vx_godnost'] == "Д"):?> selected <?php else: echo ""; endif;?>>Д - не годен к военной службе</option>									
		</select>
	</p>
</div>	

<div class="grid_10">
	<p>
		<label>Жалобы <small></small></label>
		<textarea rows="5" name="zaloby"><?=br2nl($priz['zaloby'])?> <?php if ($vsablon['zaloby'] == "") echo ""; else echo "\n".$vsablon['zaloby'];?></textarea>
	</p>
</div>

<div class="grid_11">
	<p>
		<label>Анамнез <small></small></label>
		<textarea class="big" rows="5" name="anamnez"><?=br2nl($priz['anamnez'])?> <?php if ($vsablon['anamnez'] == "") echo ""; else echo "\n".$vsablon['anamnez'];?></textarea>
	</p>
</div>	

<div class="grid_16">	
	<p>
		<label>Данные объективного исследования <small></small></label>
		<textarea class="big" rows="10" name="doi"><?=br2nl($priz['doi'])?> <?php if ($vsablon['doi'] == "") echo ""; else echo "\n".$vsablon['doi'];?></textarea>
	</p>
	
	<p>
		<label>Результаты специальных исследований <small></small></label>
		<textarea class="big" rows="10" name="rsi"><?=br2nl($priz['rsi'])?> <?php if ($vsablon['rsi'] == "") echo ""; else echo "\n".$vsablon['rsi'];?></textarea>
	</p>
	
	<p>
		<label>Диагноз (по-русски) <small></small></label>
		<textarea class="big" rows="5" name="diagnoz"><?=br2nl($priz['diagnoz'])?> <?php if ($vsablon['diagnoz'] == "") echo ""; else echo "\n".$vsablon['diagnoz'];?></textarea>
	</p>
		
	<p>
		<label for="title">Статья <small>Пример: 23в</small></label>
		<input type="text" name="isx_st" value="<?=$priz['isx_st']?>" />
	</p>		
</div>

<div class="grid_8">	
	<p>
		<label for="title">Категория годности</label>
		<select name="godnost" id="pets1" onchange="mChange1(this);">
			<option value="А" <?php if ($priz['godnost'] == "А"): ?> selected <?php else: echo ""; endif;?>>А - годен к военной службе</option>
			<option value="А" <?php if ($priz['godnost'] == "А1"):?> selected <?php else: echo ""; endif;?>>А - годен к военной службе</option>
			<option value="А" <?php if ($priz['godnost'] == "А2"):?> selected <?php else: echo ""; endif;?>>А - годен к военной службе</option>
			<option value="А" <?php if ($priz['godnost'] == "А3"):?> selected <?php else: echo ""; endif;?>>А - годен к военной службе</option>
			<option value="А" <?php if ($priz['godnost'] == "А4"):?> selected <?php else: echo ""; endif;?>>А - годен к военной службе</option>
			<option value="Б" <?php if ($priz['godnost'] == "Б"): ?> selected <?php else: echo ""; endif;?>>Б - годен к военной службе с незначительными ограничениями</option>
			<option value="Б" <?php if ($priz['godnost'] == "Б1"):?> selected <?php else: echo ""; endif;?>>Б - годен к военной службе с незначительными ограничениями</option>
			<option value="Б" <?php if ($priz['godnost'] == "Б2"):?> selected <?php else: echo ""; endif;?>>Б - годен к военной службе с незначительными ограничениями</option>
			<option value="Б" <?php if ($priz['godnost'] == "Б3"):?> selected <?php else: echo ""; endif;?>>Б - годен к военной службе с незначительными ограничениями</option>
			<option value="Б" <?php if ($priz['godnost'] == "Б4"):?> selected <?php else: echo ""; endif;?>>Б - годен к военной службе с незначительными ограничениями</option>				
			<option value="В" <?php if ($priz['godnost'] == "В"): ?> selected <?php else: echo ""; endif;?>>В - ограниченно годен к военной службе</option>
			<option value="Г" <?php if ($priz['godnost'] == "Г"): ?> selected <?php else: echo ""; endif;?>>Г - временно не годен к военной службе</option>	
			<option value="Д" <?php if ($priz['godnost'] == "Д"): ?> selected <?php else: echo ""; endif;?>>Д - не годен к военной службе</option>									
			<option value="О" <?php if ($priz['godnost'] == "О"): ?> selected <?php else: echo ""; endif;?>>Подлежит обследованию</option>													
			<?php if ($user['login'] == "med3"):?>
			<option value="А1" <?php if ($priz['godnost'] == "А1"):?> selected <?php else: echo ""; endif;?>>А1 - годен к военной службе</option>		
			<option value="А2" <?php if ($priz['godnost'] == "А2"):?> selected <?php else: echo ""; endif;?>>А2 - годен к военной службе</option>
			<option value="А3" <?php if ($priz['godnost'] == "А3"):?> selected <?php else: echo ""; endif;?>>А3 - годен к военной службе</option>
			<option value="А4" <?php if ($priz['godnost'] == "А4"):?> selected <?php else: echo ""; endif;?>>А4 - годен к военной службе</option>
			<?php endif;?>	
			<option value="Б" <?php if ($priz['godnost'] == "Б"):  ?> selected <?php else: echo ""; endif;?>>Б - годен к военной службе с незначительными ограничениями</option>
			<?php if ($user['login'] == "med3"):?>
			<option value="Б1" <?php if ($priz['godnost'] == "Б1"):?> selected <?php else: echo ""; endif;?>>Б1 - годен к военной службе с незначительными ограничениями</option>
			<option value="Б2" <?php if ($priz['godnost'] == "Б2"):?> selected <?php else: echo ""; endif;?>>Б2 - годен к военной службе с незначительными ограничениями</option>
			<option value="Б3" <?php if ($priz['godnost'] == "Б3"):?> selected <?php else: echo ""; endif;?>>Б3 - годен к военной службе с незначительными ограничениями</option>
			<option value="Б4" <?php if ($priz['godnost'] == "Б4"):?> selected <?php else: echo ""; endif;?>>Б4 - годен к военной службе с незначительными ограничениями</option>
			<?php endif;?>	
		</select>
</div>

<div class="grid_8">			
	<p>
		<label for="title" id="p1">Временно не годен к военной службе <small>Пример: на 9 месяцев</small></label>
		<input type="text" name="ispolnitel" id="pets1_show" value="<?=$priz['na']?>" />
	</p>
</div>	

<div class="grid_16">
	<p>	
		<label for="title">Причина изменения решения <small>Обязательно поле для служебного письма</small></label>
		<input type="text" name="otpravitel" value="<?=$priz['izm']?>" />	</p>
	</p>
</div>	

<div class="grid_16">
	<p>
		<label for="title">Военкомат</label>
		<select name="voenkomat">
			<option <?php if ($priz['otpravitel'] == "Барабинский"):?> selected <?php else: echo ""; endif;?>>Барабинский</option>
			<option <?php if ($priz['otpravitel'] == "Здвинский"):?> selected <?php else: echo ""; endif;?>>Здвинский</option>
			<option <?php if ($priz['otpravitel'] == "Бердский"):?> selected <?php else: echo ""; endif;?>>Бердский</option>
			<option <?php if ($priz['otpravitel'] == "Доволенский"):?> selected <?php else: echo ""; endif;?>>Доволенский</option>
			<option <?php if ($priz['otpravitel'] == "Кочковский"):?> selected <?php else: echo ""; endif;?>>Кочковский</option>
			<option <?php if ($priz['otpravitel'] == "Красноозерский"):?> selected <?php else: echo ""; endif;?>>Красноозерский</option>
			<option <?php if ($priz['otpravitel'] == "г. Искитим"):?> selected <?php else: echo ""; endif;?>>г. Искитим</option>
			<option <?php if ($priz['otpravitel'] == "Искитимский"):?> selected <?php else: echo ""; endif;?>>Искитимский</option>
			<option <?php if ($priz['otpravitel'] == "Карасукский"):?> selected <?php else: echo ""; endif;?>>Карасукский</option>
			<option <?php if ($priz['otpravitel'] == "Баганский"):?> selected <?php else: echo ""; endif;?>>Баганский</option>
			<option <?php if ($priz['otpravitel'] == "Каргатский"):?> selected <?php else: echo ""; endif;?>>Каргатский</option>
			<option <?php if ($priz['otpravitel'] == "Убинский"):?> selected <?php else: echo ""; endif;?>>Убинский</option>
			<option <?php if ($priz['otpravitel'] == "Коченевский"):?> selected <?php else: echo ""; endif;?>>Коченевский</option>
			<option <?php if ($priz['otpravitel'] == "Колыванский"):?> selected <?php else: echo ""; endif;?>>Колыванский</option>
			<option <?php if ($priz['otpravitel'] == "Куйбышевский"):?> selected <?php else: echo ""; endif;?>>Куйбышевский</option>
			<option <?php if ($priz['otpravitel'] == "Северный"):?> selected <?php else: echo ""; endif;?>>Северный</option>
			<option <?php if ($priz['otpravitel'] == "Купинский"):?> selected <?php else: echo ""; endif;?>>Купинский</option>
			<option <?php if ($priz['otpravitel'] == "Мошковский"):?> selected <?php else: echo ""; endif;?>>Мошковский</option>		
			<option <?php if ($priz['otpravitel'] == "Ордынский"):?> selected <?php else: echo ""; endif;?>>Ордынский</option>
			<option <?php if ($priz['otpravitel'] == "Сузунский"):?> selected <?php else: echo ""; endif;?>>Сузунский</option>
			<option <?php if ($priz['otpravitel'] == "Татарский"):?> selected <?php else: echo ""; endif;?>>Татарский</option>
			<option <?php if ($priz['otpravitel'] == "Усть-Таркский"):?> selected <?php else: echo ""; endif;?>>Усть-Таркский</option>
			<option <?php if ($priz['otpravitel'] == "Чистоозерный"):?> selected <?php else: echo ""; endif;?>>Чистоозерный</option>
			<option <?php if ($priz['otpravitel'] == "Тогучинский"):?> selected <?php else: echo ""; endif;?>>Тогучинский</option>
			<option <?php if ($priz['otpravitel'] == "Болотнинский"):?> selected <?php else: echo ""; endif;?>>Болотнинский</option>
			<option <?php if ($priz['otpravitel'] == "Чановский"):?> selected <?php else: echo ""; endif;?>>Чановский</option>
			<option <?php if ($priz['otpravitel'] == "Венгеровский"):?> selected <?php else: echo ""; endif;?>>Венгеровский</option>
			<option <?php if ($priz['otpravitel'] == "Кыштовский"):?> selected <?php else: echo ""; endif;?>>Кыштовский</option>
			<option <?php if ($priz['otpravitel'] == "Маслянинский"):?> selected <?php else: echo ""; endif;?>>Маслянинский</option>
			<option <?php if ($priz['otpravitel'] == "Черепановский"):?> selected <?php else: echo ""; endif;?>>Черепановский</option>
			<option <?php if ($priz['otpravitel'] == "Чулымский"):?> selected <?php else: echo ""; endif;?>>Чулымский</option>
			<option <?php if ($priz['otpravitel'] == "Новосибирский"):?> selected <?php else: echo ""; endif;?>>Новосибирский</option>
			<option <?php if ($priz['otpravitel'] == "р.п. Кольцово"):?> selected <?php else: echo ""; endif;?>>р.п. Кольцово</option>	
			<option <?php if ($priz['otpravitel'] == "Дзержинский"):?> selected <?php else: echo ""; endif;?>>Дзержинский</option>
			<option <?php if ($priz['otpravitel'] == "Калининский"):?> selected <?php else: echo ""; endif;?>>Калининский</option>
			<option <?php if ($priz['otpravitel'] == "Ленинский"):?> selected <?php else: echo ""; endif;?>>Ленинский</option>
			<option <?php if ($priz['otpravitel'] == "Кировский"):?> selected <?php else: echo ""; endif;?>>Кировский</option>	
			<option <?php if ($priz['otpravitel'] == "Октябрьский"):?> selected <?php else: echo ""; endif;?>>Октябрьский</option>
			<option <?php if ($priz['otpravitel'] == "Центральный округ"):?> selected <?php else: echo ""; endif;?>>Центральный округ</option>
			<option <?php if ($priz['otpravitel'] == "Советский"):?> selected <?php else: echo ""; endif;?>>Советский</option>
			<option <?php if ($priz['otpravitel'] == "Первомайский"):?> selected <?php else: echo ""; endif;?>>Первомайский</option>		
		</select>
	</p>
</div>

<div class="grid_16">
	<p>
		<label for="title">Дата протокола <small>Пример: 01.01.2013</small></label>
		<input type="text" name="date_protocol2" id="datepicker3" value="">	
	</p>
</div>

<div class="grid_16"></div>
<div class="grid_16"></div>

<br>

<div class="grid_16">
	<p>
		<label for="title">Номер протокола <small>Пример: 1</small></label>
		<input type="text" name="protocol_numb2" value="">	
	</p>
</div>

<div class="grid_16">
	<p>
		<label for="title">Номер служебного письма <small>Пример: 1</small></label>
		<input type="text" name="mail" value="">	
	</p>
</div>

<div class="grid_16">
	<p>
		<label for="title">Графа годности <small></small></label>
		<input type="text" name="graf" value="<?=$priz['graf']?>">	
	</p>
</div>

<div class="grid_16">
	<p>
		<label for="title">Приложение <small></small></label>
		<input type="text" name="datecontroly" value="<?=$priz['datecontroly']?>">	
	</p>
</div>

<table class="bordered">
	<tr>
		<td colspan="5" class="pagination">
			<input type="hidden" value="<?=$priz['id']?>" name="id" />
			<input type="submit" value="Добавить" name="add" />
		</td>
	</tr>
</table>
</form>	