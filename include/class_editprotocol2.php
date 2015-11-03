<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_EditProtocol2 extends C_Base
{
	public $error, $next, $diag;
	public $priz;
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

		$this->priz = $database->selectprotocol2($_GET['id'])->fetch();
	
		if (isset($_POST['add']))
		{		
			$vx_st = $_POST['vx_st'];
			$fio = $_POST['fio'];
			$daterogdenia = $_POST['daterogdenia'];
			$type = "control";
			$isx_st = $_POST['isx_st'];	
			$godnost = $_POST['godnost'];	
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = $_POST['datecontroly'];
			$control = $_POST['control'];
			$id_user = $this->user['id_user'];			
			$this->next = 1;
			$graf = $_POST['graf'];
	//		$a = $database->selectprotocol()->fetch();
         //   $id = $a['id'] + 1;
			$anamnez = $_POST['anamnez'];
			$zaloby = $_POST['zaloby'];
			$doi = $_POST['doi'];
			$rsi = $_POST['rsi'];
			$diagnoz = $_POST['diagnoz'];
			$vx_diagnoz = $_POST['vx_diagnoz'];
			$database->updateprotocol($_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $_POST['isx_st'], $_POST['datecontroly'], $_POST['control'], $id_user, $_POST['godnost'], $graf, $vx_diagnoz, $_POST['vx_godnost'], $_POST['protocol_numb'], $_POST['protocol_numb2'], $_POST['date_protocol'], $_POST['date_protocol2'], $_POST['mail'], $_POST['id']);			
			header('Location: index.php?c=printpriz&id='.$_POST['id']);
		}
		
		if (isset($_POST['add2']))
		{		
			$vx_st = $_POST['vx_st'];
			$fio = $_POST['fio'];
			$daterogdenia = $_POST['daterogdenia'];
			$type = "gal";
			$isx_st = $_POST['isx_st'];	
			$godnost = $_POST['godnost'];	
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = $_POST['datecontroly'];
			$control = $_POST['control'];
			$id_user = $this->user['id_user'];			
			$this->next = 1;
			$graf = $_POST['graf'];
	//		$a = $database->selectprotocol()->fetch();
         //   $id = $a['id'] + 1;
			$anamnez = $_POST['anamnez'];
			$zaloby = $_POST['zaloby'];
			$doi = $_POST['doi'];
			$rsi = $_POST['rsi'];
			$diagnoz = $_POST['diagnoz'];
			$vx_diagnoz = $_POST['vx_diagnoz'];
			$database->updateprotocol($_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $_POST['isx_st'], $_POST['datecontroly'], $_POST['control'], $id_user, $_POST['godnost'], $graf, $vx_diagnoz, $_POST['vx_godnost'], $_POST['protocol_numb'], $_POST['protocol_numb2'], $_POST['date_protocol'], $_POST['date_protocol2'], $_POST['mail'], $_POST['id']);			
			header('Location: index.php?c=printgaloba&id='.$_POST['id']);
		}

		if (isset($_POST['add3']))
		{
			$vx_st = $_POST['vx_st'];
			$fio = $_POST['fio'];
			$daterogdenia = $_POST['daterogdenia'];
			$type = "voz";
			$isx_st = $_POST['isx_st'];
			$godnost = $_POST['godnost'];
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = $_POST['datecontroly'];
			$control = $_POST['control'];
			$id_user = $this->user['id_user'];
			$this->next = 1;
			$graf = $_POST['graf'];
			//		$a = $database->selectprotocol()->fetch();
			//   $id = $a['id'] + 1;
			$anamnez = $_POST['anamnez'];
			$zaloby = $_POST['zaloby'];
			$doi = $_POST['doi'];
			$rsi = $_POST['rsi'];
			$diagnoz = $_POST['diagnoz'];
			$vx_diagnoz = $_POST['vx_diagnoz'];
			$database->updateprotocol($_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $_POST['isx_st'], $_POST['datecontroly'], $_POST['control'], $id_user, $_POST['godnost'], $graf, $vx_diagnoz, $_POST['vx_godnost'], $_POST['protocol_numb'], $_POST['protocol_numb2'], $_POST['date_protocol'], $_POST['date_protocol2'], $_POST['mail'], $_POST['id']);
			header('Location: index.php?c=printvozvrat&id='.$_POST['id']);
		}	
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'priz' => $this->priz);	
		$this->content = $this->Template('templates/v_editprotocol2.php', $vars);
		parent::OnOutput();
	}		
}