<?php 
/**
 * Шаблон страницы 'Редактирование'
 */

function br2nl($text)
{
	return trim($text);
}
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style type="text/css">
#pets1_show {display:none;}
#datepicker3 {display:none;}
#p1 {display:none;}
#p2 {display:none;}
#p3 {display:none;}
#polychatel {display:none;}
</style>

<script type="text/javascript" src="sel.js"></script>

<script type="text/javascript">
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
};

function mChange2(obj){
var el, s, n, v;
el=obj.options;
n=el.selectedIndex;//индекс выбранного оптиона
v=el[n].value;
s=obj.id+'_show';//получить ИД поля
if(v=="Г"){//только если выбран нужный оптион
if(document.getElementById(s)){//существует ли такой элемент?
document.getElementById(s).style.display="block";}};//показать
 };
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
	$( "#datepicker4" ).datepicker({
		changeMonth: true,
		changeYear: true
	});		
});
</script>
</head>

<form action="" method="post">
<div class="grid_16">
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<font face="Times New Roman" style="font-size: 16pt;"><b>Лист медицинского освидетельствования</b></font>
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

<div class="grid_5">	
	<label for="title">Шаблон:</label>
	<select name="sablon" width="50px">
		<option selected="" >Выберите шаблон</option>
		<?php foreach($sablon as $sablon):?>
		<option value="<?=$sablon['id']?>"><?=$sablon['fio']?></option>
		<?php endforeach;?>		
	</select>
</div>

<div class="grid_2">
	<label for="title">&nbsp;</label>
	<input type="submit" value="Добавить" name="add_sablon" />
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
			<?phpforeach($state as $state):?>
			<option <?php if ($priz['vx_st'] == $state['text']):?> selected <?php endif;?> value="<?=$state['text']?>"><?=$state['text']?></option>
			<?phpendforeach;?>		
		</select>
	</p>
<?php endif;?>	
</div>

<div style="width:30%; position:absolute; left: 770px; top:166px; text-align:left;">	
	<label for="title">&nbsp; <small>&nbsp;</small></label>	
	<span class='tip'><a tabindex="1"><em><input type=button value="+" name="print"> </em></a>
		<span class='answer2'>		
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
			</span>
			</div>
		</span>
	</span>
</div>

<div class="grid_5">
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
		    <option value="no" <?php if ($priz['type'] == "no"):?> selected <?php else: echo ""; endif;?>>Не назначен</option>
		</select>
	</p>
</div>

<div class="grid_16"></div>

<div class="grid_10">
	<p>
		<label>Жалобы <small></small></label>
		<textarea rows="5" name="zaloby"><?php if ($priz['zaloby'] == "") echo br2nl($vsablon['zaloby']); else echo br2nl($priz['zaloby']);?></textarea>
	</p>
</div>

<div class="grid_11">
	<p>
		<label>Анамнез <small></small></label>
		<textarea class="big" rows="5" name="anamnez"><?php if ($priz['anamnez'] == "") echo br2nl($vsablon['anamnez']); else echo br2nl($priz['anamnez']);?></textarea>
	</p>
</div>	

<div class="grid_16">	
	<p>
		<label>Данные объективного исследования <small></small></label>
		<textarea class="big" rows="10" name="doi"><?php if ($priz['doi'] == "") echo br2nl($vsablon['doi']); else echo br2nl($priz['doi']); ?></textarea>
	</p>
	
	<p>
		<label>Результаты специальных исследований <small></small></label>
		<textarea class="big" rows="10" name="rsi"><?php if ($user['login'] == "okylist")
		{	
			if ($priz['rsi'] == "") echo $vsablon['rsi']; else echo $priz['rsi'];
		} else {
		if ($priz['rsi'] == "") echo br2nl($vsablon['rsi']); else echo br2nl($priz['rsi']); 
		}?></textarea>
	</p>
	
	<p>
		<label>Диагноз (по-русски) <small></small></label>
		<textarea class="big" rows="5" name="diagnoz"><?php if ($priz['diagnoz'] == "") echo br2nl($vsablon['diagnoz']); else echo br2nl($priz['diagnoz']);?></textarea>
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
			<?phpforeach($state2 as $state2):?>
			<option <?php if ($priz['isx_st'] == $state2['text']):?> selected="" <?php endif;?> value="<?=$state2['text']?>"><?=$state2['text']?></option>				<?phpendforeach;?>		
		</select>	
	</p>	
<?php endif;?>	
</div>

<div style="width:30%; position:absolute; left: 150px; top:1090px; text-align:left;">	
	<label for="title">&nbsp; <small>&nbsp;</small></label>	
	<span id='tip' class='tip'><a tabindex="1"><em><input type=button value="+" name="print"> </em></a>
		<span class='answer3'>		
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
                                                               $("div#hidden_content").slideToggle("slow");}		                                                              
			                                    })'>
			</span>
			</div>
		</span>
	</span>
</div>	

<div class="grid_8">					
	<p>
		<label for="title">Категория годности</label>
		<select name="godnost" id="pets1" onchange="mChange1(this);">
			<option value=""></option>
			<option value="А"  <?php if ($priz['godnost'] == "А"): ?> selected <?php else: echo ""; endif;?>>А - годен к военной службе</option>
			<option value="А1" <?php if ($priz['godnost'] == "А1"):?> selected <?php else: echo ""; endif;?>>А1 - годен к военной службе</option>
			<option value="А2" <?php if ($priz['godnost'] == "А2"):?> selected <?php else: echo ""; endif;?>>А2 - годен к военной службе</option>
			<option value="А3" <?php if ($priz['godnost'] == "А3"):?> selected <?php else: echo ""; endif;?>>А3 - годен к военной службе</option>
			<option value="А4" <?php if ($priz['godnost'] == "А4"):?> selected <?php else: echo ""; endif;?>>А4 - годен к военной службе</option>
			<option value="Б"  <?php if ($priz['godnost'] == "Б"): ?> selected <?php else: echo ""; endif;?>>Б - годен к военной службе с незначительными ограничениями</option>
			<option value="Б1" <?php if ($priz['godnost'] == "Б1"):?> selected <?php else: echo ""; endif;?>>Б1 - годен к военной службе с незначительными ограничениями</option>
			<option value="Б2" <?php if ($priz['godnost'] == "Б2"):?> selected <?php else: echo ""; endif;?>>Б2 - годен к военной службе с незначительными ограничениями</option>
			<option value="Б3" <?php if ($priz['godnost'] == "Б3"):?> selected <?php else: echo ""; endif;?>>Б3 - годен к военной службе с незначительными ограничениями</option>
			<option value="Б4" <?php if ($priz['godnost'] == "Б4"):?> selected <?php else: echo ""; endif;?>>Б4 - годен к военной службе с незначительными ограничениями</option>
			<option value="В"  <?php if ($priz['godnost'] == "В"): ?> selected <?php else: echo ""; endif;?>>В - ограниченно годен к военной службе</option>
			<option value="Г"  <?php if ($priz['godnost'] == "Г"): ?> selected <?php else: echo ""; endif;?>>Г - временно не годен к военной службе</option>	
			<option value="Д"  <?php if ($priz['godnost'] == "Д"): ?> selected <?php else: echo ""; endif;?>>Д - не годен к военной службе</option>					
			<option value="О"  <?php if ($priz['godnost'] == "О"): ?> selected <?php else: echo ""; endif;?> onClick="document.getElementById('dateyvki').style.display='inline';">Подлежит обследованию</option>	
			<option value="Х"  <?php if ($priz['godnost'] == "Х"): ?> selected <?php else: echo ""; endif;?>>Вынесение решения в компетенции хирурга.</option>		
			<option value="My" <?php if ($priz['godnost'] == "My"):?> selected <?php else: echo ""; endif;?>>Заполнить свои данные</option>		
		</select>
	</p>	
</div>

<div class="grid_8">			
		<label for="title" id="p1">Временно не годен к военной службе <small>Пример: на 9 месяцев</small></label>
		<input type="text" name="na" value="<?=$priz['na']?>" id="pets1_show"/>	
</div>

<div class="grid_8">	
	<p>
		<label for="title" id="p2">Дата явки <small>В случае, если подлежит обследованию</small></label>
		<input type="text" name="dateyvki" id="datepicker3" value="<? if (isset($_GET['obs'])) echo $priz['dateyvki2']; else $priz['dateyvki']?>" />
	</p>
</div>
	
<div class="grid_16">
	<label for="title">Показатель предназначения <small>Пример: 1,2,4-10</small></label>
	<input type="text" name="tdt" value="<?=$priz['tdt']?>" />
</div>		

<div class="grid_16">
	<p>
		<label for="title">Дата явки <small> Пример: 01.01.2013</small></label>
		<input type="text" name="dateyvki2" id="datepicker4" value="<?php if ($priz['dateyvki'] == "") echo date('d.m.Y'); else echo $priz['dateyvki'];?>">
	<p>
	
	<p>
		<label for="title" >Причина изменения решения <small>Необязательное поле</small></label>
		<input type="text" name="izm" value="<?=$priz['izm']?>" />
	</p>
</div>

<div class="grid_16">
	<p id="polychatel">
		<label for="title" >Получатель</label>
		<select name="voenkomat">
			<option><?=$priz['voenkomat']?></option>
		</select>
	</p>
</div>

<div class="grid_16">
	<p>
		<label for="title">Военкомат</label>
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
		<label for="title">Время призыва</label>
		<input type="text" name="ispolnitel" value="<?php if ($priz['ispolnitel'] == "") 
		{
			$year = substr($user['name'],0, 4);
			$month = substr($user['name'],5, 6);
			if ($month == "1") $month = "Весна";
			if ($month == "2") $month = "Осень";
			echo $month." ".$year."г.";
		}		
		else echo $priz['ispolnitel'];?>">	
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

<table class="bordered">
	<tr>
		<td colspan="5" class="pagination">	
			<div style="text-align: left; position: absolute; width: 10px;"><input type=button value="Назад" onClick="history.back(1);" name="print2"></div>
			<input type="submit" value="Сохранить изменения" name="add" />
			<?php if (isset($_GET['obs'])):?><input type="submit" value="Обследование" name="add3" /><?php endif;?>
			<input type="submit" value="Сохранить изменения и отправить на контроль" name="add2" />	
			<input type="hidden" value='<?=$_SERVER['HTTP_REFERER']?>' name="back"/><br>	
		</td>
	</tr>
</table>
	<p id="p3">
		<label for="title">Дата контроля <small> Пример: 01.01.2013 (когда должен придти)</small></label>
		<input type="text" name="datecontroly" id="datepicker" value="<?=$priz['datecontroly']?>">	
	</p>
</form>