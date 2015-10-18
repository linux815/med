<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_EditProtocol extends C_Base
{
	public $error, $next, $diag;
	public $priz, $sablon, $vsablon;
	//
	// �����������.
	//
	function __construct()
	{		
	}
	
	//
	// ����������� ���������� �������.
	//
	protected function OnInput()
	{
		parent::OnInput();
		
		$database = new Database();
		
		// ���������.
		$mUsers = M_Users::Instance();
		
		// ������� ������ ������.
		$mUsers->ClearSessions();
		
		// ������� ������������.
		$this->user = $mUsers->Get();		

		$this->priz = $database->selectpriz_id($_GET['id'])->fetch();
		
		if ($this->user['login'] == "med1")
		{
		$this->sablon = $database->selectsablon2($this->priz['fio']);
		} elseif ($this->user['login'] == "med2") {
		$this->sablon = $database->selectsablon3($this->priz['fio']);
		}
		
		if (isset($_POST['add_sablon']))
		{
			$this->priz = $database->selectpriz_id($_GET['id'])->fetch();
			$this->vsablon = $database->selectpriz_id($_POST['sablon'])->fetch();
		}
		
		if ($this->user["login"] == "med2")
		{
			if (isset($_POST['add']))
			{
				$vx_st = $_POST['vx_st'];
				$fio = $_POST['fio'];
				$daterogdenia = $_POST['daterogdenia'];
				$type = $_POST['type'];
				$zaloby = $_POST['zaloby'];
				$anamnez = $_POST['anamnez'];
				$doi = $_POST['doi'];
				$rsi = $_POST['rsi'];
				$diagnoz = $_POST['diagnoz'];
				$isx_st = $_POST['isx_st'];
				$godnost = $_POST['godnost'];
				$voenkomat = $_POST['voenkomat'];
				$otpravitel = $_POST['otpravitel'];
				$ispolnitel = $_POST['ispolnitel'];
				$datecontroly = $_POST['datecontroly'];
				$control = $_POST['control'];
				$id_user = $this->user['id_user'];
				$this->next = 1;
				$a = $database->selectprotocol22()->fetch();
				$id = $a['id'] + 1;
				$anamnez = $_POST['anamnez'];
				$zaloby = $_POST['zaloby'];
				$doi = $_POST['doi'];
				$rsi = $_POST['rsi'];
				$diagnoz = $_POST['diagnoz'];
				$vx_diagnoz = $_POST['vx_diagnoz'];
				$graf = $_POST['graf'];
				$database->addgaloba($_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], "gal", $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $_POST['isx_st'], $_POST['datecontroly'], $_POST['control'], $id_user, $_POST['godnost'], $graf, $vx_diagnoz, $_POST['vx_godnost'], $_POST['protocol_numb'], $_POST['protocol_numb2'], $_POST['date_protocol'], $_POST['date_protocol2'], $_POST['mail']);
				header('Location: index.php?c=zaloby');
			}
		} elseif ($this->user["login"] == "med3") {	
			if (isset($_POST['add']))
			{
				$vx_st = $_POST['vx_st'];
				$fio = $_POST['fio'];
				$daterogdenia = $_POST['daterogdenia'];
				$type = $_POST['type'];
				$zaloby = $_POST['zaloby'];
				$anamnez = $_POST['anamnez'];
				$doi = $_POST['doi'];
				$rsi = $_POST['rsi'];
				$diagnoz = $_POST['diagnoz'];
				$isx_st = $_POST['isx_st'];
				$godnost = $_POST['godnost'];
				$voenkomat = $_POST['voenkomat'];
				$otpravitel = $_POST['otpravitel'];
				$ispolnitel = $_POST['ispolnitel'];
				$datecontroly = $_POST['datecontroly'];
				$control = $_POST['control'];
				$id_user = $this->user['id_user'];
				$this->next = 1;
				$a = $database->selectvozvrat()->fetch();
				$id = $a['id'] + 1;
				$anamnez = $_POST['anamnez'];
				$zaloby = $_POST['zaloby'];
				$doi = $_POST['doi'];
				$rsi = $_POST['rsi'];
				$diagnoz = $_POST['diagnoz'];
				$vx_diagnoz = $_POST['vx_diagnoz'];
				$graf = $_POST['graf'];
			$database->addvozvrat($_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], "voz", $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $_POST['zaloby'], $_POST['anamnez'], $_POST['doi'], $_POST['rsi'],$_POST['diagnoz'], $_POST['isx_st'], $_POST['datecontroly'], $_POST['control'], $id_user, $_POST['godnost'], $graf, $_POST['vx_diagnoz'], $_POST['vx_godnost'], $_POST['protocol_numb'], $_POST['protocol_numb2'], $_POST['date_protocol'], $_POST['date_protocol2'], $_POST['mail']);						
			header('Location: index.php?c=vozvrat_osp');
			}
		}
		 else {	
		if (isset($_POST['add']))
		{		
			$vx_st = $_POST['vx_st'];
			$fio = $_POST['fio'];
			$daterogdenia = $_POST['daterogdenia'];
			$type = $_POST['type'];
			$zaloby = $_POST['zaloby'];
			$anamnez = $_POST['anamnez'];
			$doi = $_POST['doi'];
			$rsi = $_POST['rsi'];
			$diagnoz = $_POST['diagnoz'];
			$isx_st = $_POST['isx_st'];	
			$godnost = $_POST['godnost'];	
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = $_POST['datecontroly'];
			$control = $_POST['control'];
			$id_user = $this->user['id_user'];			
			$this->next = 1;
			$a = $database->selectprotocol22()->fetch();
            $id = $a['id'] + 1;
            $graf = $_POST['graf'];
			$database->addprotocol($_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], "control", $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $_POST['zaloby'], $_POST['anamnez'], $_POST['doi'], $_POST['rsi'],$_POST['diagnoz'], $_POST['isx_st'], $_POST['datecontroly'], $_POST['control'], $id_user, $_POST['godnost'], $graf, $_POST['vx_diagnoz'], $_POST['vx_godnost'], $_POST['protocol_numb'], $_POST['protocol_numb2'], $_POST['date_protocol'], $_POST['date_protocol2'], $_POST['mail']);			
			
			header('Location: index.php?c=protocol');
		}
		}
		
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'priz' => $this->priz, 'sablon' => $this->sablon, 'vsablon' => $this->vsablon);	
		$this->content = $this->Template('templates/v_editprotocol.php', $vars);
		parent::OnOutput();
	}		
}