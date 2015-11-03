<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_EditObsledovanie extends C_Base
{
	public $error, $next, $diag;
	public $priz, $id_num;
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
		
		if (isset($_POST['add']))
		{	
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = $_POST['datecontroly'];
			$graf = $_POST['graf'];
			
			if ($this->priz['control'] == "no" or $this->priz['control'] == "")
			{
				$control = "no";
			} else 	$control = "yes";
			
			$id_user = $this->user['id_user'];
			
			if (($this->priz['godnost'] <> "О"))
			{
				$type = "obsledovanie";
				$anamnez = $_POST['anamnez'];
				$q = $database->select_q_obsledovanie($this->user['id_user'])->fetchAll();
				$this->id_num = $q[0][0] + 1;
				$database->addpriz($_POST['date'], $_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $_POST['zaloby'], $_POST['anamnez'], $_POST['doi'], $_POST['rsi'],$_POST['diagnoz'], $_POST['isx_st'], $datecontroly, "", $control, $id_user, $_POST['godnost'], $graf, $this->id_num);
				
				if ((!isset($_GET['obs'])) and (($this->priz['godnost'] == "О")))
				{
					$anamnez = $_POST['anamnez'];
					$zaloby = $_POST['zaloby'];
					$doi = $_POST['doi'];
					$rsi = $_POST['rsi'];
					$diagnoz = $_POST['diagnoz'];
					$database->update_priz($_POST['date'], $_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $_POST['type'], $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $_POST['isx_st'], $_POST['datecontroly'], $_POST['dateyvki'], "", $control, "О", $_POST['graf'], $_POST['id_num'], $_GET['id']);
				}
				
				header('Location: index.php?c=obsledovanie');
				die();
			}
			else 
			{
				if ($this->priz['godnost'] == "О")
				{
					$type = "obsledovanie";
					$anamnez = $_POST['anamnez'];
					$zaloby = $_POST['zaloby'];
					$doi = $_POST['doi'];
					$rsi = $_POST['rsi'];
					$diagnoz = $_POST['diagnoz'];
					$database->update_priz($_POST['date'], $_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $_POST['type'], $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $_POST['isx_st'], $_POST['datecontroly'], $_POST['dateyvki'], "", $control, $_POST['godnost'], $_POST['graf'], $_POST['id_num'], $_GET['id']);	
					header('Location: index.php?c=otrabotka');
					die();
				} 
				else 
				{
					$anamnez = $_POST['anamnez'];
					$zaloby = $_POST['zaloby'];
					$doi = $_POST['doi'];
					$rsi = $_POST['rsi'];
					$diagnoz = $_POST['diagnoz'];
					$database->update_priz($_POST['date'], $_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $_POST['type'], $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $_POST['isx_st'], $_POST['datecontroly'], $_POST['dateyvki'], "", $control, $_POST['godnost'], $_POST['graf'], $_POST['id_num'], $_GET['id']);
					header('Location: index.php?c=otrabotka');
					die();	
				}
			}
		}
		
		if (isset($_POST['add2']))
		{
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = $_POST['datecontroly'];
			$graf = $_POST['graf'];
			
			if ($this->priz['type'] == "obsledovanie")
			{
				$control = "yes";
				$type = "obsledovanie";
			} else 
			{
				$control = "yes";
				$type = "control";
			}
			
			$id_user = $this->user['id_user'];
			$database->update_priz($_POST['date'], $_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $_POST['zaloby'], $_POST['anamnez'], $_POST['doi'], $_POST['rsi'],$_POST['diagnoz'], $_POST['isx_st'], $_POST['datecontroly'], $_POST['dateyvki'], $control, $_POST['godnost'], $_POST['graf'], $_POST['id_num'], $_GET['id']);
			header('Location: index.php?c=otrabotka');
			die();
		}		
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'priz' => $this->priz, 'id_num' => $this->id_num);	
		$this->content = $this->Template('templates/v_edit_obsledovanie.php', $vars);
		parent::OnOutput();
	}		
}