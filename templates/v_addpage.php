<?php 
/**
 * Шаблон добавления возврата
 */
?>

<!-- Для отображения календарей -->
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
	$( "#datepicker4" ).datepicker({
		changeMonth: true,
		changeYear: true
	});		
});
</script>

<!-- Для добавления статей, работы Ajax -->
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

<form action="index.php?c=addpage" method="post">
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
		<input type="text" name="id_num" value="<?=$id_num?>"/>
	</p>	
</div>

<div class="grid_5">
	<p>
		<label for="title">Дата создания <small>Пример: 01.01.2013</small></label>
		<input type="text" name="date" id="datepicker" value="<?=$date = date('d.m.Y'); ?>" />
	</p>
</div>

<div class="grid_5">	
	<label for="title">Шаблон:</label>
	<select name="sablon" width="50px">
		<option selected disabled>Выберите шаблон</option>
		<?phpforeach($sablon as $sablon): //Вывод шаблонов?>
		<option value="<?=$sablon['id']?>"><?=$sablon['fio']?></option>
		<?phpendforeach;?>		
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
		<input type="text" name="fio" />
	</p>
</div>

<div class="grid_5">
	<p>
		<label for="title">Дата рождения <small>Пример: 01.01.2013</small></label>
		<input type="text" name="daterogdenia" id="datepicker2" />
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
				<?phpforeach($state as $state): // Вывод входящих статей?>
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

<div class="grid_6">
	<p>
		<label for="title">Тип документа</label>
		<select name="type">
			<option value="vozvrat">Возврат с ОСП</option>
		</select>
	</p>
</div>

<div class="grid_16"></div>

<div class="grid_10">
	<p>
		<label>Жалобы <small></small></label>
		<textarea rows="5" name="zaloby"><?=$vsablon['zaloby']?></textarea>
	</p>
</div>

<div class="grid_6">
	<p>
		<label>Анамнез <small></small></label>
		<textarea class="big" rows="5" name="anamnez"><?=$vsablon['anamnez']?></textarea>
	</p>
</div>	

<div class="grid_16">	
	<p>
		<label>Данные объективного исследования <small></small></label>
		<textarea class="big" rows="10" name="doi"><?=$vsablon['doi']?></textarea>
	</p>
	
	<p>
		<label>Результаты специальных исследований <small></small></label>
		<textarea class="big" rows="10" name="rsi"><?=$vsablon['rsi']?></textarea>
	</p>
	
	<p>
		<label>Диагноз (по-русски) <small></small></label>
		<textarea class="big" rows="5" name="diagnoz"><?=$vsablon['diagnoz']?></textarea>
	</p>
		
	<p>
		<label for="title">Категория годности</label>
		<select name="godnost">
			<option value="А">А - годен к военной службе</option>
			<option value="Б">Б - годен к военной службе с незначительными ограничениями</option>
			<option value="В">В - ограниченно годен к военной службе</option>
			<option value="Г">Г - временно не годен к военной службе</option>	
			<option value="Д">Д - не годен к военной службе</option>	
			<option value="О">Подлежит обследованию</option>					
		</select>
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
			<?phpforeach($state2 as $state2): // Вывод исходящих статей?>
			<option <?php if ($priz['isx_st'] == $state2['text']):?> selected="" <?php endif;?> value="<?=$state2['text']?>"><?=$state2['text']?></option>				<?phpendforeach;?>		
		</select>		
	</p>
<?php endif;?>		
</div>

<div style="width:30%; position:absolute; left: 150px; top:1169px; text-align:left;">	
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

<div class="grid_6">
	<p style="display: none;">
		<label for="title">Получатель</label>
		<select name="voenkomat">
			<option><?=$user['surname']?></option>
		</select>
	</p>
</div>

<div class="grid_6">
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

<div class="grid_16">
	<p>
		<label for="title">Дата явки <small> Пример: 01.01.2013</small></label>
		<input type="text" name="dateyvki2" id="datepicker4" value="<?php if ($priz['dateyvki'] == "") echo date('d.m.Y'); else echo $priz['dateyvki'];?>">
	<p>
</div>	
<div class="grid_6">	
	<p>
		<label for="title">Время призыва</label>
		<input type="text" name="ispolnitel">	
	</p>
</div>

<div class="grid_16"></div>
<div class="grid_16"></div>

<div class="grid_6">
	<p>
		<label for="title">Графа годности:</label>
		<select name="graf">
			<option>I</option>
			<option>II</option>
			<option>III</option>
		</select>
	</p>
</div>

<div class="grid_16">	
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">	
				<input type="submit" value="Добавить" name="add" />
			</td>
		</tr>
	</table>
</div>
</form>
