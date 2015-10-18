<?php 
/**
 * Шаблон страницы регистрации призывника в отработке
 */
?>

<style type="text/css"><!--
#pets1_show {display:none;}
#datepicker3 {display:none;}
#p1 {display:none;}
#p2 {display:none;}
#polychatel {display:none;}
--></style>
<script type="text/javascript" src="sel.js"></script>
<script type="text/javascript">
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
document.getElementById("p1").style.display="block";}}
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
	});
	</script>
<script Language="JavaScript">
function XmlHttp()
{
var xmlhttp;
try{xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");}
catch(e)
{
 try {xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");} 
 catch (E) {xmlhttp = false;}
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined')
{
 xmlhttp = new XMLHttpRequest();
}
  return xmlhttp;
}
 
function ajax(param)
{
                if (window.XMLHttpRequest) req = new XmlHttp();
                method=(!param.method ? "POST" : param.method.toUpperCase());
 
                if(method=="GET")
                {
                               send=null;
                               param.url=param.url+"&ajax=true";
                }
                else
                {
                               send="";
                               for (var i in param.data) send+= i+"="+param.data[i]+"&";
                               send=send+"ajax=true";
                }
 
                req.open(method, param.url, true);
                if(param.statbox)document.getElementById(param.statbox).innerHTML = '<img src="templates/img/ajax-loader.gif">';
                req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                req.send(send);
                req.onreadystatechange = function()
                {
                               if (req.readyState == 4 && req.status == 200) //если ответ положительный
                               {
                                               if(param.success)param.success(req.responseText);
                               }
                }
}
</script>		
<br>
<form action="index.php?c=reg" method="post">

<table class="bordered">
			<tr>
	<td colspan="5" class="pagination">
		<font face="Times New Roman" style="font-size: 16pt;"><b>Регистрация призывника</b></font>
	</td>
</tr>
</table>

<div style="width:30%; position:absolute; left: 15px; top:36px; text-align:left;">	
	<!-- Печать страницы!!! -->
		<p>
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
		</p>
	<!-- Конец печати страницы -->
</div>	

	<!--<p class="error">Something went wronk.</p>>-->

<div class="grid_5">
	<p>
		<label for="title">Номер документа<small></small></label>
		<input type="text" name="id_num" value="<?=$id_num?>"/>
	</p>	
</div>
<div class="grid_5">
	<p>
		<label for="title">Дата создания <small>Пример: 01.01.2013</small></label>
		<input type="text" name="date" id="datepicker2" value="<?=$date = date('d.m.Y');?>" />
	</p>
		
</div><hr>
<div class="grid_16">
		
</div>
<div class="grid_5">
	<p>
		<label for="title">ФИО <small>Пример: Иванов Иван Иванович</small></label>
		<input type="text" name="fio" />
	</p>
</div>

<div class="grid_5">
	<p>
		<label for="title">Дата рождения <small>Пример: 01.01.2013</small></label>
		<input type="text" name="daterogdenia" id="datepicker" />
	</p>
</div>
<div class="grid_5">
<?php if ($user['login'] == "terapevt" or $user['login'] == "xirurg"):?>
	<p>
		<label for="title">Статья РВК <small>Пример: 23в</small></label>
		<input type="text" name="vx_st" value="<?=$priz['vx_st']?>" />
	</p>
<?php else:?>
	<p>
		<label for="title">Статья РВК <small>Пример: 23в</small></label>
			<select name="vx_st" id="vx_st" width="50px">
			<option id="status"></option>
				<?php foreach($state as $state):?>
				<option <?php if ($priz['vx_st'] == $state['text']):?> selected <?php endif;?> value="<?=$state['text']?>"><?=$state['text']?></option>
				<?php endforeach;?>		
			</select>
	</p>
<?php endif;?>		
</div>
<div style="width:30%; position:absolute; left: 770px; top:166px; text-align:left;">	
<label for="title">&nbsp; <small>&nbsp;</small></label>	<span class='tip'><a tabindex="1"><em><input type=button value="+" name="print"> </em></a><span class='answer2'>		
		<div id="hidden_content2">
		<span id="print_button2">
	Добавить входящую статью:	<input type="text" name="input_vx_st" id="input_vx_st" style="width: 70px;" value="">
	<input type="button" value="Добавить" onclick='
                               ajax({
                                                               url:"index.php?c=editstate",
                                                               statbox:"status",
                                                               method:"POST",
                                                               data:
                                                               {
                                                                              first_area:document.getElementById("input_vx_st").value
             
                                                              },
                                                               success:function(data){document.getElementById("status").innerHTML=data;
                                                               $("div#hidden_content2").slideToggle("slow");}
                                               })'>
	</span></span></span>
</div>	
</div>
<div class="grid_5">	
			<label for="title">Шаблон:</label>
			<select name="sablon">
			<option selected="" disabled>Выберите шаблон</option>
				<?php foreach($sablon as $sablon):?>
				<option value="<?=$sablon['id']?>"><?=$sablon['fio']?></option>
				<?php endforeach;?>		
			</select>

</div>
<div class="grid_16">

</div>
<div class="grid_16">	
	<p>
		<label>Диагноз (по-русски) <small></small></label>
		<textarea class="big" rows="5" name="diagnoz"><?=$diag['diagnoz']?></textarea>
	</p>	
</div>
<div class="grid_5">
<?php if ($user['login'] == "terapevt" or $user['login'] == "xirurg"):?>
	<p>
		<label for="title">Статья <small>Пример: 23в</small></label>
		<input type="text" name="isx_st" value="<?=$priz['isx_st']?>" />
	</p>
<?php else:?>
	<p>
		<label for="title">Статья <small>Пример: 23в</small></label>
			<select name="isx_st" id="isx_st" width="50px">
			<option id="status2"></option>
				<?php foreach($state2 as $state2):?>
<option <?php if ($priz['isx_st'] == $state2['text']):?> selected="" <?php endif;?> value="<?=$state2['text']?>"><?=$state2['text']?></option>				<?php endforeach;?>		
			</select>
			
	</p>
<?php endif;?>		
</div>

<div style="width:30%; position:absolute; left: 150px; top:406px; text-align:left;">	
<label for="title">&nbsp; <small>&nbsp;</small></label>	<span id='tip' class='tip'><a tabindex="1"><em><input type=button value="+" name="print"> </em></a><span class='answer3'>		
		<div id="hidden_content">
		<span id="print_button2">
	Добавить исходящую статью:	<input type="text" name="input_isx_st" id="input_isx_st" style="width: 70px;" value="">
	<input type="button" value="Добавить" onclick='
                               ajax({
                                                               url:"index.php?c=editstate",
                                                                statbox:"status2",
                                                               method:"POST",
                                                               
                                                               data:
                                                               {
                                                            	   second_area:document.getElementById("input_isx_st").value
             
                                                              },
                                                               success: function(data){document.getElementById("status2").innerHTML=data;
                                                               $("div#hidden_content").slideToggle("slow");
                                                               }
                                                              
                                                              } )'>
	</span></span></span>
	</div>
</div>	
<div class="grid_8">	
			<p>
			<label for="title">Категория годности</label>
			<select name="godnost" id="pets1" onchange="mChange1(this);">
				<option value=""></option>
				<option value="А">А - годен к военной службе</option>
				<option value="Б">Б - годен к военной службе с незначительными ограничениями</option>
				<option value="В">В - ограниченно годен к военной службе</option>
				<option value="Г">Г - временно не годен к военной службе</option>	
				<option value="Д">Д - не годен к военной службе</option>					
			</select>
		</p>	
</div>		
<div class="grid_8">		
	<label for="title" id="p1">Временно не годен к военной службе <small>Пример: на 9 месяцев</small></label>
	<input type="text" name="na" value="<?=$priz['na']?>" id="pets1_show"/>	
</div>

<div class="grid_16">
	<p style="display: none;">
		<label for="title">Получатель</label>
		<select name="voenkomat">
			<option><?=$user['surname']?></option>
		</select>
	</p>
</div>
<div class="grid_8">
	<p>
		<label for="title">Военкомат</label>
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
	</p>
</div>
<div class="grid_8">
	<p>
		<label for="title">Время призыва</label>
		<select name="ispolnitel">
			<option><?php 						
						$year = substr($user['name'],0, 4); 
			  			$month = substr($user['name'],5, 6);	
			  			if ($month == "1") $month = "Весна";
			  			if ($month == "2") $month = "Осень";			  			
			   			echo $month." ".$year."г.";
			  			?></option>
			<option><?php 						
						$year = substr($user['name'],0, 4); 
			  			$month = substr($user['name'],5, 6);	
			  			if ($month == "2") $month = "Весна";
			  			if ($month == "1") $month = "Осень";
			  			if ($month == "Осень") { $month == "Осень"; $year = $year - 1;	}
			  			if ($month == "Весна") { $month == "Весна"; }
			   			echo $month." ".$year."г.";
			  			?></option>
		</select>	
	</p>
</div>
<div class="grid_16">

	</div><div class="grid_16">
	
</div>

<div class="grid_16">	
	<table class="bordered">
			<tr>
	<td colspan="5" class="pagination">	
		<input type="submit" value="Зарегистрировать" name="add" />
	</td>
	</tr>
	</table>
</div>
</form>
