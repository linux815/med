<?php 
/**
 * Шаблон поиска
 */
?>
<style>
#text1 {
    display: none;
}

</style>

<script>
function Go() {
    document.getElementById('text1').style.display=(document.getElementById('r1').checked)? 'block': 'none'
}
</script>

<form method="post">
<div class="grid_16">
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<font face="Times New Roman" style="font-size: 16pt;"><b>Поиск</b></font>
			</td>
		</tr>
	</table>
	<!--<p class="error">Something went wronk.</p>>-->
	</div>
	
<div style="width:30%; position:absolute; left: 15px; top:17px; text-align:left;">	
	<p>
		<input type=button value="Назад" onClick="history.back(1);" name="print2"> 
	</p>
</div>
</form>	

<div class="grid_16">
	<table class="bordered">
		<thead>
			<tr>
			<?php if (($user['login'] == "med1" and $_GET['w'] != "page") or ($user['login'] == "med2" and $_GET['w'] != "page") or ($user['login'] == "med3" and $_GET['w'] != "vozvrat")):?>
				<th>№</th>
				<th width="5px">Дата создания</th>
				<th>ФИО</th>
				<th width="5px">Категория годности РВК</th>				
				<th>Статья РВК</th>
				<th>Военкомат</th>
				<th width="5px">Категория годности </th>
				<th>Краткое содержание</th>
				<th width="5px">Итоговая статья</th>
				<th width="150px">Действия</th>			
			<?php elseif (($user['login'] == "med1" and $_GET['w'] == "page") or ($user['login'] == "med2" and $_GET['w'] == "page")  or ($user['login'] == "med3" and $_GET['w'] == "vozvrat")):?>
				<th>№</th>
				<th width="5px">Дата создания</th>
				<th>ФИО</th>
				<th>Статья РВК</th>
				<th>Тип документа</th>
				<th>Военкомат</th>
				<th>Получатель</th>
				<th>Время призыва</th>
				<th>Краткое содержание</th>
				<th>Категория годности</th>
				<th width="5px">Итоговая статья</th>
				<th width="150px">Действия</th>
			<?php else:?>	
				<th>№</th>
				<th width="5px">Дата создания</th>
				<th>ФИО</th>
				<th>Статья РВК</th>
				<th>Тип документа</th>
				<th>Военкомат</th>
				<th>Получатель</th>
				<th>Время призыва</th>
				<th>Краткое содержание</th>
				<th>Категория годности</th>
				<th width="5px">Итоговая статья</th>
				<th width="150px">Действия</th>
			<?php endif;?>						
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="12" class="pagination">

				</td>
			</tr>
		</tfoot>
		<tbody>
<?php if ($_GET['w'] == "otrabotka"):
$cout = 0; foreach($priz as $priz): $cout++;?>		
			<tr>
				<td style="background: #FFFFFF;" ><?=$priz['id_num']?></td>
				<td style="background: #FFFFFF;"><a href='index.php?c=editpage&id=<?=$priz['id']?>'><?=$priz['date']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['fio']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['vx_st']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>">				
				<?php switch ($priz['type'])
				{
					case "control": echo "Контроль"; break;
					case "galoba": echo "Жалоба"; break;
					case "otrabotka": echo "Отработка"; break;
					case "vozvrat": echo "Возврат"; break;	
					case "ytverdit": echo "Утвердить"; break;
				}
				?></a></td>
				<td style="background: #FFFFFF;"><a href='index.php?c=editpage&id=<?=$priz['id']?>'><?=$priz['otpravitel']?></a></td>
				<td style="background: #FFFFFF;"><a href="#"><?=$priz['voenkomat']?></a></td>
				<td style="background: #FFFFFF;"><a href="#"><?=$priz['ispolnitel']?></a></td>
				<td style="background: #FFFFFF;"><a href="#" >Диагноз: <?=$priz['diagnoz']?><br><?=$priz['isx_st']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>" >
				<?php if ($priz['godnost'] == "О") echo "Обследование"; else echo $priz['godnost'];
				?></a></td>	
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['isx_st']?></a></td>		
				<td style="text-align: center; background: #FFFFFF;">
				<form action="" method="post">
				<input type="submit" name="ytverdit" value="Утвердить"/><input type="submit" name="print" value="Печать"/>
				<input type="hidden" value="<?=$priz['id']?>" name="id" /><br>
				<input type="submit" name="control" value="Контроль"/>	<input type="submit" name="delete" value="Удалить"/>
				<input type="submit" name="edit" value="Редактировать"/>
				</form>				
				</td>				
			</tr>
<?php endforeach; endif;?>

<?php if ($_GET['w'] == "data"):
$cout = 0; foreach($priz as $priz): $cout++;?>		
			<tr>
				<td style="background: #FFFFFF;" ><?=$priz['id_num']?></td>
				<td style="background: #FFFFFF;"><a href='index.php?c=editpage&id=<?=$priz['id']?>'><?=$priz['date']?></a></td>
				<td style="background: #FFFFFF;"><a href="#"><?=$priz['fio']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['vx_st']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>">				
				<?php switch ($priz['type'])
				{
					case "control": echo "Контроль"; break;
					case "galoba": echo "Жалоба"; break;
					case "otrabotka": echo "Отработка"; break;
					case "vozvrat": echo "Возврат"; break;	
					case "ytverdit": echo "Утвердить"; break;
				}
				?></a></td>
				<td style="background: #FFFFFF;"><a href='index.php?c=editpage&id=<?=$priz['id']?>'><?=$priz['otpravitel']?></a></td>
				<td style="background: #FFFFFF;"><a href="#"><?=$priz['voenkomat']?></a></td>
				<td style="background: #FFFFFF;"><a href="#"><?=$priz['ispolnitel']?></a></td>
				<td style="background: #FFFFFF;"><a href="#" >Диагноз: <?=$priz['diagnoz']?><br><?=$priz['isx_st']?></a></td>
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>" >
				<?php if ($priz['godnost'] == "О") echo "Обследование"; else echo $priz['godnost'];
				?></a></td>	
				<td style="background: #FFFFFF;"><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['isx_st']?></a></td>		
				<td style="text-align: center; background: #FFFFFF;">
				<form action="" method="post">
				<input type="submit" name="ytverdit" value="Утвердить"/><input type="submit" name="print" value="Печать"/>
				<input type="hidden" value="<?=$priz['id']?>" name="id" /><br>
				<input type="submit" name="control" value="Контроль"/>	<input type="submit" name="delete" value="Удалить"/>
				<input type="submit" name="edit" value="Редактировать"/>
				</form>				
				</td>				
			</tr>
<?php endforeach; endif;?>

<?php  if (!isset($_GET['w'])):
$cout = 0; foreach($priz as $priz): $cout++;?>		
			<tr>
				<td><?=$priz['id_num']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['date']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['fio']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['vx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>">
				<?php switch ($priz['type'])
				{
					case "control": echo "Контроль"; break;
					case "galoba": echo "Жалоба"; break;
					case "otrabotka": echo "Отработка"; break;
					case "vozvrat": echo "Возврат"; break;
					case "ytverdit": echo "Утвердить"; break;
					case "konsult": echo "Консультация"; break;
				}
				?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['otpravitel']?></a></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['voenkomat']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['ispolnitel']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>">Диагноз: <?=$priz['diagnoz']?><br><?=$priz['isx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['godnost']?></a></td>		
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['isx_st']?></a></td>		
				<td style="text-align: center;">
				<form action="" method="post">
				<input type="submit" name="ytverdit" value="Утвердить"/><input type="submit" name="print" value="Печать"/>
				<input type="hidden" value="<?=$priz['id']?>" name="id" /><br>
				<input type="submit" name="control" value="Контроль"/>	<input type="submit" name="delete" value="Удалить"/>
				<input type="submit" name="edit" value="Редактировать"/>
				</form>				
				</td>		
			</tr>
<?php endforeach; endif;?>

<?php  if ($_GET['w'] == "page"):
$cout = 0; foreach($priz as $priz): $cout++; ?>		
			<tr>
				<td><?=$priz['id_num']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['date']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['fio']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['vx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>">
				<?php switch ($priz['type'])
				{
					case "control": echo "Контроль"; break;
					case "galoba": echo "Жалоба"; break;
					case "otrabotka": echo "Отработка"; break;
					case "vozvrat": echo "Возврат"; break;
					case "ytverdit": echo "Утвердить"; break;
					case "konsult": echo "Консультация"; break;
				}
				?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['otpravitel']?></a></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['voenkomat']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['ispolnitel']?></a></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" >Диагноз: <?=$priz['diagnoz']?><br><?=$priz['isx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['godnost']?></a></td>	
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['isx_st']?></a></td>		
				<td style="text-align: left;">
				<form action="" method="post">
				<a href="index.php?c=editpage&find=1&id=<?=$priz['id']?>">Редактировать</a><br>
							<?php if (($user['login'] == "med1")): ?>
				<a href="index.php?c=editprotocol&id=<?=$priz['id']?>" >Добавить в протокол</a><br>
				<?php endif;?>
				<?php if (($user['login'] == "med2")): ?>
				<a href="index.php?c=editprotocol&id=<?=$priz['id']?>" >Добавить в жалобы</a><br>
				<?php endif;?>
				<a href="index.php?c=printlist&id=<?=$priz['id']?>" >Распечатать лист</a>
				<?php if (($user['login'] == "med1") or ($user['login'] == "med2")): else:?>
				<a href="index.php?c=page&delete=<?=$priz['id']?>" >Удалить</a>
				<?php endif;?>
				</form>				
				</td>				
			</tr>
<?php endforeach; endif;?>	

<?php if ($_GET['w'] == "protocol" or ($_GET['w'] == "zaloby") or ($_GET['w'] == "vozvrat_osp")):
$cout = 0; foreach($priz as $priz): $cout++;?>		
			<tr>
				<td><?=$priz['id']?></td>
				<td><a href='../index.php'><?=$priz['date']?></a></td>
				<td><a href=""><?=$priz['fio']?></a></td>
				<td><a href="#"><?=$priz['vx_godnost']?></a></td>				
				<td><a href="index.php?c=editpage&id=1"><?=$priz['vx_st']?></a></td>
				<td><a href=""><?=$priz['voenkomat']?></a></td>
				<td><a href=""><?=$priz['godnost']?></a></td>
				<td><a href="index.php?c=editpage&id=1">Диагноз: <?=$priz['diagnoz']?><br><?=$priz['isx_st']?></a></td>
				<td><a href="#"><?=$priz['isx_st']?></a></td>		
				<td style="text-align: left;"><a href="index.php?c=editprotocol2&find=1&id=<?=$priz['id']?>" >Редактировать</a><br>
				<a href="index.php?c=vipiska&id=<?=$priz['id']?>" >Выписка</a><br>
				<?php if (($user['login'] == "med1")):?>
				<a href="index.php?c=printpriz&id=<?=$priz['id']?>" >Распечатать протокол</a><br>
				<?php endif;?>
				
				<?php if (($user['login'] == "med2")):?>
				<a href="index.php?c=printgaloba&id=<?=$priz['id']?>" >Распечатать протокол</a><br>
				<?php endif;?>
				
				<?php if (($user['login'] == "med3")):?>
				<a href="index.php?c=mail2&id=<?=$priz['id']?>" >Служебное письмо</a><br>
				<?php else:?>
				<a href="index.php?c=mail&id=<?=$priz['id']?>" >Служебное письмо</a><br>
				<?php endif;?>
				<a href="index.php?c=protocol&delete=<?=$priz['id']?>" >Удалить</a><br>
				</td>				
			</tr>
<?php endforeach; endif;?>	

<?php if ($_GET['w'] == "vozvrat"):
$cout = 0; foreach($priz as $priz): $cout++;?>		
			<tr>
				<td><?=$priz['id_num']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['date']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['fio']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['vx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" >
				<?php switch ($priz['type'])
				{
					case "control": echo "Контроль"; break;
					case "galoba": echo "Жалоба"; break;
					case "otrabotka": echo "Отработка"; break;
					case "vozvrat": echo "Возврат"; break;
					case "ytverdit": echo "Утвердить"; break;
					case "konsult": echo "Консультация"; break;
				}
				?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['otpravitel']?></a></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['voenkomat']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['ispolnitel']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" >Диагноз: <?=$priz['diagnoz']?><br><?=$priz['isx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['godnost']?></a></td>	
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['isx_st']?></a></td>		
				<td style="text-align: left;">
				<form action="" method="post">
				<a href="index.php?c=editpage&find=1&id=<?=$priz['id']?>" >Редактировать</a><br>
				<a href="index.php?c=printlist&id=<?=$priz['id']?>" >Распечатать лист</a>
				<?php if ($user['login'] == "med3"):?>
				<a href="index.php?c=editprotocol&id=<?=$priz['id']?>" >Добавить в возвраты</a><br>
				<?php endif;?>
				<?php if ($user['login'] == "med3"): else:?>
				<a href="index.php?c=vozvrat&delete=<?=$priz['id']?>" >Удалить</a>
				<?php endif;?>
				</form>				
				</td>				
			</tr>
<?php endforeach; endif;?>

<?php if ($_GET['w'] == "obsledovanie"):
$cout = 0; foreach($priz as $priz): $cout++;?>		
			<tr>
				<td><?=$priz['id_num']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['date']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['fio']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['vx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>">
				<?php switch ($priz['type'])
				{
					case "control": echo "Контроль"; break;
					case "galoba": echo "Жалоба"; break;
					case "otrabotka": echo "Отработка"; break;
					case "vozvrat": echo "Возврат"; break;
					case "ytverdit": echo "Утвердить"; break;
					case "konsult": echo "Консультация"; break;
				}
				?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['otpravitel']?></a></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['voenkomat']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['ispolnitel']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>">Диагноз: <?=$priz['diagnoz']?><br><?=$priz['isx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['godnost']?></a></td>	
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['isx_st']?></a></td>		
				<td style="text-align: center;">
				<form action="" method="post">
				<input type="submit" name="print" value="Печать"/>
				<input type="hidden" value="<?=$priz['id']?>" name="id" /><br>
				<input type="submit" name="delete" value="Удалить"/>
				<input type="submit" name="edit" value="Редактировать"/>
				</form>			
				</td>				
			</tr>
<?php endforeach; endif;?>	
<div style="width:30%; position:absolute; left: 80px; top:23px; text-align:left;">	
<?="Количество: ".$cout?>
</div>	
		</tbody>
	</table>
</div>
