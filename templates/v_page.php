<?php 
/**
 * Шаблон страницы 'Жалобы и консультации'
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
<?php  if (($user['login'] == "med1") or ($user['login'] == "med2")): else:?>
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				&nbsp;
			</td>
		</tr>
	</table>
<?php  endif; ?>	
	<p>
	<?php  if ($user['login'] == "med1"):?>
	<div style="width:30%; position:absolute; left: 15px; top:34px; text-align:left;">	
	<input type="submit" name="list2" value="Добавить протокол"/>
	</div>
	<?php  elseif ($user['login'] == "med2"): else:?>
	<div style="width:30%; position:absolute; left: 15px; top:11px; text-align:left;">	
		<input type="submit" name="kons" value="Регистрация призывника"/>
	</div>	
	<?php  endif; ?>
	</p>
</form>	

<div class="grid_16">
<?php if ($this->user['login']  == "med1"):?>
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<? echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b><span class="active curved">'.$page.'</span></b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;?>
			</td>
		</tr>
	</table>
<?php endif;?>	
	<table class="bordered">
		<thead>
			<tr>
				<th>№</th>
				<th width="5px">Дата создания</th>
				<th>ФИО</th>
				<th width="0px">Статья РВК</th>
				<th>Тип документа</th>
				<th>Военкомат</th>
				<?php if ($user['login'] == "med1" or $user['login'] == "med2"):?><th>Получатель</th><?php endif;?>
				<th>Время призыва</th>
				<th>Краткое содержание</th>
				<th>Категория годности</th>
				<th width="5px">Итоговая статья</th>
				<th width="150px">Действия</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="12" class="pagination">

				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php  if ($this->user['login']  == "med1"): foreach($priz2 as $priz): ?>	
			<tr>
				<td><?=$priz['id_num']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>">
				<?php  $dd = substr($priz['date'],8, 10); 
			    $mm = substr($priz['date'],5, 2);
			    $yy = substr($priz['date'],0, 4);
			    echo $dd.".".$mm.".".$yy.""?> 
			    <br>
				</a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['fio']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['vx_st']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" >
				<?php switch ($priz['type'])
				{
					case "control": echo "Контроль"; break;
					case "galoba": echo "Жалоба"; break;
					case "otrabotka": echo "Отработка"; break;
					case "vozvrat": echo "Возврат"; break;		
					case "konsult": echo "Консультация"; break;
					case "no": echo "Не назначен"; break;
				}
				?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['otpravitel']?></a></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['voenkomat']?></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['ispolnitel']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" >Диагноз: 
				<?php 	
				if (strlen($priz['diagnoz'])>200)
				{
					$text = substr ($priz['diagnoz'], 0,strpos ($priz['diagnoz'], " ", 200)); echo $text."...";
				}
				else echo $priz['diagnoz'];
				?></a></td>
				<td><a href="index.php?c=find&f=godnost&q=<?=$priz['godnost']?>" >
				<?php if ($priz['godnost'] == "О") echo "Обследование"; else echo $priz['godnost'];
				?></a></td>	
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['isx_st']?></a></td>		
				<form action="" method="post">
				<td style="text-align: center;"><input type="submit" name="konsult" value="Консультация"/><input type="submit" name="print" value="Печать"/>
				<?php if ($user['login'] == "med1"): echo ""; else:?>
				<input type="submit" name="delete" value="Удалить"/>
				<?php endif;?>
				<input type="submit" name="edit" value="Редактировать"/><br>
				<?php  if (($user['login'] == "med1")): ?>
				<input type="submit" name="add_protocol" value="Добавить в протокол"/>
				<?php  elseif ($user['login'] == "med2"):?> <input type="submit" name="add_protocol" value="Добавить в жалобы"/>
				<?php  endif; ?><input type="hidden" value="<?=$priz['id']?>" name="id" />
				</form>
				</td>				
			</tr>
			<?php endforeach; else:?>		
<?php  foreach($priz as $priz): ?>	

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
					case "konsult": echo "Консультация"; break;
					case "no": echo "Не назначен"; break;				
				}
				?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['otpravitel']?></a></a></td>
				<?php if ($user['login'] == "med2"):?>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['voenkomat']?></td>
				<?php endif;?>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>"><?=$priz['ispolnitel']?></a></td>
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" >Диагноз: 
				<?php 	
				if (strlen($priz['diagnoz'])>200)
				{
					$text = substr ($priz['diagnoz'], 0,strpos ($priz['diagnoz'], " ", 200)); echo $text."...";
				}
				else echo $priz['diagnoz'];
				?>
				</a></td>
				<td><a href="index.php?c=find&f=godnost&q=<?=$priz['godnost']?>" >
				<?php if ($priz['godnost'] == "О") echo "Обследование"; else echo $priz['godnost'];
				?></a></td>	
				<td><a href="index.php?c=editpage&id=<?=$priz['id']?>" ><?=$priz['isx_st']?></a></td>		
				<form action="" method="post">
				<td style="text-align: center;"><input type="submit" name="konsult" value="    Консультация    "/><input type="submit" name="print" value="         Печать          "/><br>
				<?php if ($user['login'] == "med1"): echo ""; else:?>
				<input type="submit" name="delete" value="        Удалить         "/>
				<?php endif;?>
				<input type="submit" name="edit" value="   Редактировать   "/><br>
				<?php  if (($user['login'] == "med1")): ?>
				<input type="submit" name="add_protocol" value="Добавить в протокол"/>
				<?php  elseif ($user['login'] == "med2"):?> <input type="submit" name="add_protocol" value="Добавить в жалобы"/>
				<?php  endif; ?><input type="hidden" value="<?=$priz['id']?>" name="id" />
				</form>
				</td>				
			</tr>
<?php endforeach; endif;?>	
<?php if ($this->user['login']  == "med1"):?>
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<?php  echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b><span class="active curved">'.$page.'</span></b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage;?>
			</td>
		</tr>
	</table>	
<?php endif;?>	
		</tbody>
	</table>
</div>
