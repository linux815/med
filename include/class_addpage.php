<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');
include_once 'include/functions.php';

class C_AddPage extends C_Base
{
	public $error, $next, $diag, $sablon, $vsablon, $fio, $id_num, $state, $state2;
	
	//
	// Конструктор
	//
	function __construct()
	{		
	}
	
	protected function OnInput()
	{
		parent::OnInput();
		
		$database = new Database();
		
		// Пользователи
		$mUsers = M_Users::Instance();
		
		// Очищение сессии.
		$mUsers->ClearSessions();
		
		// Индендицикация пользователя.
		$this->user = $mUsers->Get();	
			
		// Узнаем текущий порядковый номер
		$q = $database->select_q($this->user['id_user'])->fetchAll();
		
		// Прибавляем к текущему порядковому номеру 1
		$this->id_num = $q[0][0] + 1;
		
		// Выборка шаблонов
		$this->sablon = $database->selectsablon($this->user['id_user']);
		
		// Выборка входящих статей
		$this->state = $database->selectstate($this->user['id_user']);
		
		// Выборка исходящих статей
		$this->state2 = $database->selectstate2($this->user['id_user']);		
		
		// Если нажали кнопку 'Добавить', тогда загружаем контректный шаблон
		if (isset($_POST['sablon']))
		{	
			$this->vsablon = $database->selectsablon_id($_POST['sablon'])->fetch();
		}
		
		// Если нажата кнопка 'Сохранить изменения'
		if (isset($_POST['add']))
		{	
			// Если выбрали категорию годность 'Подлежит обследованию', тогда добавляем призывника во вкладку 'Обследование'
			if ($_POST['godnost'] == "О")
			{
				$type = "obsledovanie";
				$anamnez = $_POST['anamnez'];
				$zaloby = $_POST['zaloby'];
				$doi = $_POST['doi'];
				$rsi = $_POST['rsi'];
				$diagnoz = $_POST['diagnoz'];
				$sablon = $_POST['sablon'];
				$graf = $_POST['graf'];
				$database->addpriz(Convert($_POST['date']), $_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $_POST['type'], $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi, $diagnoz, $_POST['isx_st'], $datecontroly, Convert($_POST['dateyvki2']), $control, $id_user, $_POST['godnost'], $graf, $_POST['id_num'], "", "", "", $sablon, $_POST['na']);
			}		
			
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = $_POST['datecontroly'];
			$graf = $_POST['graf'];
			$control = $_POST['control'];
			$id_user = $this->user['id_user'];
			$anamnez = $_POST['anamnez'];
			$zaloby = $_POST['zaloby'];
			$doi = $_POST['doi'];
			$rsi = $_POST['rsi'];
			$diagnoz = $_POST['diagnoz'];
			$sablon = $_POST['sablon'];
			
			// Добавляем призывника в 'Возврат'
			$database->addpriz(Convert($_POST['date']), $_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $_POST['type'], $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi, $diagnoz, $_POST['isx_st'], $datecontroly, Convert($_POST['dateyvki2']), $control, $id_user, $_POST['godnost'], $graf, $_POST['id_num'], "", "", "", $sablon, $_POST['na']);
			
			// Переходим в 'Возврат' и завершаем выполнение скрипта
			header('Location: index.php?c=vozvrat');
			die();	
		}
	}
	
	// Функция вывода HTML, в ней передаются все переменные в шаблон
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'id_num' => $this->id_num, 'sablon' => $this->sablon, 'vsablon' => $this->vsablon, 'state' => $this->state, 'state2' => $this->state2);	
		$this->content = $this->Template('templates/v_addpage.php', $vars);
		parent::OnOutput();
	}		
}