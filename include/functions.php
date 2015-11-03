<?php

// Функция конвертирования даты из дд.мм.ГГГГ в формат ГГГГ-ММ-ДД
function Convert($datetime)
{
	$val = explode(" ",$datetime);
	$date = explode(".",$val[0]);
	return $date[2]."-".$date[1]."-".$date[0];
}