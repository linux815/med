<?php 
/**
 * Шаблон печати листа медицинского освидетельствования
 */
?>

<form action="" method="post">
	<!-- Печать страницы!!! -->
	<div style="width:30%; position:absolute; left: 15px; top:10px; text-align:left;">	
	<div id="print_button"> 
		<input type=button value="Печать" onClick="document.getElementById('print_button').style.display='none';document.getElementById('print_button2').style.display='none'; window.print();location='index.php?c=printlist&id=<?=$_GET['id']?>';" name="print"> 
	</div>
	</div>
	<div style="width:30%; position:absolute; left: 83px; top:10px; text-align:left;">	
	<div id="print_button2"> 
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</div>
	</div>
	<!-- Конец печати страницы -->
</form>

<table width="840px" style="border: 1px black;">
	<tr>
		<td>
		<font face="Times New Roman" style="font-size: 12pt;">
		ВОЕННО – ВРАЧЕБНАЯ КОМИССИЯ <br>
		НОВОСИБИРСКОЙ ОБЛАСТИ
		</font>	
		</td>
	</tr>
	<tr>
		<td align="center">
		<font face="Times New Roman" style="font-size: 16pt;">ЛИСТ<br>
		медицинского освидетельствования
		</font>
		<br><br>
		<font face="Arial" style="font-size: 14pt;"><b><?=$priz['fio']?>, <?php  //$a = substr($priz['daterogdenia'],6, 10); echo $a;
																			echo $priz['daterogdenia']?> г.р.</b></font>
		<br>
		<font face="Arial" style="font-size: 13pt; line-height: 2">(фамилия, имя, отчество, дата рождения)</font>
		<br><br>
		</td>
	</tr>
	<tr>
		<td > <br> <br> <br> <br> <br>
		<font face="Arial" style="font-size: 16pt;">Жалобы:</font>
		<span style="line-height: 2;">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td style="padding-left: 25px;" valign=top height="100px">
<div style="white-space: pre-wrap;"><font face="Arial" style="font-size: 14pt;"><?php  if ($priz['zaloby'] == "") echo ""; else echo $priz['zaloby'];?></font>
</div>
		</td>
	</tr>
	<tr>
		<td> <br><br>
		<font face="Arial" style="font-size: 16pt;" valign=top height="150px">Анамнез:</font>
		<span style="line-height: 2;">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td style="padding-left: 25px;" valign=top height="200px" >
		<div style="white-space: pre-wrap;"><font face="Arial" style="font-size: 14pt;"><?php  if ($priz['anamnez'] == "") echo ""; else echo $priz['anamnez'];?></font>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<font face="Arial" style="font-size: 16pt;" valign=top height="150px">Данные объективного исследования:</font>
		<span style="line-height: 2;">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td style="padding-left: 25px;" valign=top height="500px" >
		<div style="white-space: pre-wrap;"><font face="Arial" style="font-size: 14pt;"><?php  if ($priz['doi'] == "") echo ""; else echo $priz['doi'];?></font>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		 
		<font face="Arial" style="font-size: 16pt;" valign=top height="150px">Результаты специальных исследований (лабораторных, рентгенологических, инструментальных и др.):</font>
		<span style="line-height: 2;">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td style="padding-left: 25px;" valign=top height="350px">
		<div style="white-space: pre-wrap;"><font face="Arial" style="font-size: 14pt;"><?php  if ($priz['rsi'] == "") echo ""; else echo $priz['rsi'];?></font>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<font face="Arial" style="font-size: 16pt;" valign=top height="150px">Диагноз (по-русски):</font>
		<span style="line-height: 2;">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td style="padding-left: 25px;" valign=top height="200px">
		<div style="white-space: pre-wrap;"><font face="Arial" style="font-size: 14pt;"><?php  if ($priz['diagnoz'] == "") echo ""; else echo $priz['diagnoz'];?></font>
		</div>
		</td>
	</tr>
	<tr>
		<td>
		<font face="Times New Roman" style="font-size: 16pt;">Заключение врача-специалиста. На основании статьи <?=$priz['isx_st']?>   графы <?=$priz['graf']."<br>"?>
		Расписания болезней и ТДТ (приложение к Положению о военно-врачебной экспертизе, утверждённому постановлением Правительства РФ №123–2003г.:</font>
		</td>
	</tr>
	<tr>
		<td style="padding-left: 25px;"><br>
		<font face="Times New Roman" style="font-size: 16pt;">
		<?php if ($priz['godnost'] == "А") echo "А - годен к военной службе"?>
		<?php if ($priz['godnost'] == "А1") echo "А 1 (".$priz['tdt'].") - годен к военной службе"?>
		<?php if ($priz['godnost'] == "А2") echo "А 2 (".$priz['tdt'].") - годен к военной службе"?>
		<?php if ($priz['godnost'] == "А3") echo "А 3 (".$priz['tdt'].") - годен к военной службе"?>
		<?php if ($priz['godnost'] == "А4") echo "А 4 (".$priz['tdt'].") - годен к военной службе"?>		
		<?php if ($priz['godnost'] == "Б") echo "Б - годен к военной службе с незначительными ограничениями"?>	
		<?php if ($priz['godnost'] == "Б1") echo "Б 1 (".$priz['tdt'].") - годен к военной службе с незначительными ограничениями"?>	
		<?php if ($priz['godnost'] == "Б2") echo "Б 2 (".$priz['tdt'].") - годен к военной службе с незначительными ограничениями"?>	
		<?php if ($priz['godnost'] == "Б3") echo "Б 3 (".$priz['tdt'].") - годен к военной службе с незначительными ограничениями"?>	
		<?php if ($priz['godnost'] == "Б4") echo "Б 4 (".$priz['tdt'].") - годен к военной службе с незначительными ограничениями"?>			
		<?php if ($priz['godnost'] == "В") echo "В - ограниченно годен к военной службе"?>			
		<?php if ($priz['godnost'] == "Г") echo "Г - временно не годен к военной службе ".$priz['na']?>				
		<?php if ($priz['godnost'] == "Д") echo "Д - не годен к военной службе"?>	
		<?php if ($priz['godnost'] == "О" or isset($_GET['obs'])) echo "Подлежит обследованию (лечению), явиться на повторное освидетельствование ".$priz['dateyvki2']."г."?>			
		<?php if ($priz['godnost'] == "Х") echo "Вынесение решения в компетенции хирурга."?>
		<?php if ($priz['godnost'] == "My") echo $priz['tdt']?>			
		<br>
		<?php  if ($priz['izm'] == ""): echo ""; else:?>
		<?php if ($priz['godnost'] == "О"): echo ""; else:?>
		Причина изменения решения:<?php endif;?> <?=$priz['izm']?>
		<?php  endif; ?>
		</font>
		</td>
	</tr>
	<tr>
		<td align=center><br>
		<font face="Arial" style="font-size: 13pt;">(указать категорию годности и показатель предназначения)</font>
		<span style="line-height: 2;">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td align=right><br>
		<font face="Arial" style="font-size: 16pt;"><?=$user['surname']?></font>
		</td>
	</tr>
	<tr>
		<td align=right>
		<font face="Arial" style="font-size: 13pt;">(подпись, фамилия, инициалы врача-специалиста)</font>
		</td>
	</tr>
	<tr>
		<td align=left><br>
		<font face="Times New Roman" style="font-size: 14t;"><?=$priz['dateyvki']?></font><br>
		<font face="Arial" style="font-size: 13pt;">(дата освидетельствования)</font>
		</td>
	</tr>
</table>