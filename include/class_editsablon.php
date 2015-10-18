<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_EditSablon extends C_Base
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
$this->priz = $database->selectsablon_id($_GET['id'])->fetch();
		if (isset($_POST['add']))
		{	
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = $_POST['datecontroly'];
			$graf = $_POST['graf'];
			
			$control = "no";
			
			$id_user = $this->user['id_user'];
			
			$type = "obsledovanie";
			$anamnez = $_POST['anamnez'];
			$q = $database->select_q_obsledovanie($this->user['id_user'])->fetchAll();
			$this->id_num = $q[0][0] + 1;
			$tdt = $_POST['tdt'];
			$izm = $_POST['izm'];
			$vx_st = str_replace(" ","",$_POST['vx_st']);
			$isx_st = str_replace(" ","",$_POST['isx_st']);
			$database->addsablon($_POST['date'], $vx_st, $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $_POST['zaloby'], $_POST['anamnez'], $_POST['doi'], $_POST['rsi'],$_POST['diagnoz'], $isx_st, $datecontroly, $control, $id_user, $_POST['godnost'], $graf, $this->id_num, $tdt, $izm, $_POST['dateyvki']);
			header('Location: index.php?c=sablon');
			die();
		}	

        if (isset($_POST['regit']))
				{
					$anamnez = $_POST['anamnez'];
					$zaloby = $_POST['zaloby'];
					$doi = $_POST['doi'];
					$rsi = $_POST['rsi'];
									$tdt = $_POST['tdt'];
				$izm = $_POST['izm'];
					$diagnoz = $_POST['diagnoz'];
					$type = "control";
					$vx_st = str_replace(" ","",$_POST['vx_st']);
					$isx_st = str_replace(" ","",$_POST['isx_st']);
					$database->update_sablon($_POST['fio'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $_POST['id']);
							header('Location: index.php?c=sablon');
			die();
				}		
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'priz' => $this->priz, 'id_num' => $this->id_num);	
		$this->content = $this->Template('templates/v_editsablon.php', $vars);
		parent::OnOutput();
	}		
}