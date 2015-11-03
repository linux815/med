<?php 
/**
 * Шаблон авторизации
 */
?>

<div class="grid_16">
<table class="bordered">
	<tr>
		<td colspan="5" class="pagination">
			<font face="Times New Roman" style="font-size: 16pt;"><b>Авторизация</b></font>
		</td>
	</tr>
</table>

<form method="post">
	<p>
		<label for="title">Выбор специалиста</label>
		<select name="login">
			<option value="ivan.bazhenov@gmail.com">Невропатолог</option>
			<option value="med1">Секретариат - протоколы</option>
			<option value="med2">Секретариат - жалобы</option>
			<option value="med3">Секретариат - возвраты</option>
			<option value="xirurg">Хирург</option>
			<option value="terapevt">Терапевт</option>
			<option value="stomatolog">Стоматолог</option>
			<option value="lor">Лор</option>
			<option value="okylist">Окулист</option>
			<option value="psix">Психиатр</option>
			<option value="dermatolog">Дерматолог</option>
			<option value="admin">Администратор (Только для опытных пользователей)</option>
		</select>
	</p>
	
	<p>
		<label for="remember" style="font-size: 12px;font-weight:normal;"><input type="checkbox" name="remember" style="margin:0px;padding:0px;width:20px;height:15px;line-height:0px;vertical-align: sub;" checked />Запомнить меня</label>
	</p>	
</div>
	
	<p>
		<input type="hidden" name="password" /><br/>
	</p>
	
	<table class="bordered">
		<tr>
			<td colspan="5" class="pagination">
				<input type="submit" value="Войти"/>
			</td>
		</tr>
	</table>	
</form>			