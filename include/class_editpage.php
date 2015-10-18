<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');
include_once 'include/functions.php';

class C_EditPage extends C_Base
{
	public $error, $next, $diag;
	public $priz, $id_num, $vsablon, $sablon, $state, $state2;
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
		$this->vsablon = $database->selectsablon_id($this->priz['sablon'])->fetch();
		$this->sablon = $database->selectsablon($this->user['id_user']);
		$this->state = $database->selectstate($this->user['id_user'])->fetch();
		$this->state2 = $database->selectstate2($this->user['id_user'])->fetch();
		if (isset($_POST['add_sablon']))
		{
			$database->update_edit_sablon($_POST['sablon'], $_GET['id']);
			header('Location: index.php?c=editpage&id='.$_GET['id']);
		}	
		
		if (isset($_POST['add']))
		{	
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = Convert($_POST['datecontroly']);
			$graf = $_POST['graf'];
			
			if ($this->priz['control'] == "no" or $this->priz['control'] == "")
			{
				$control = "no";
			} else 	$control = "yes";
			
			$id_user = $this->user['id_user'];
			
			if ($_POST['godnost'] == "О" and ($_POST['type'] == "otrabotka" or $_POST['type'] == "control" or $_POST['type'] == "galoba"))
			{
				$type = "obsledovanie";
				$anamnez = $_POST['anamnez'];
				$q = $database->select_q_obsledovanie($this->user['id_user'])->fetchAll();
				$this->id_num = $q[0][0] + 1;
				$tdt = $_POST['tdt'];
				$izm = $_POST['izm'];
				$vx_st = str_replace(" ","",$_POST['vx_st']);
				$isx_st = str_replace(" ","",$_POST['isx_st']);
				$database->addpriz(Convert($_POST['date']), $vx_st, $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $_POST['zaloby'], $_POST['anamnez'], $_POST['doi'], $_POST['rsi'],$_POST['diagnoz'], $isx_st, $datecontroly, Convert($_POST['dateyvki2']), $control, $id_user, $_POST['godnost'], $graf, $this->id_num, $tdt, $izm, $_POST['dateyvki'], $_POST['na']);
				
				if (!isset($_GET['obs']))
				{
					$anamnez = $_POST['anamnez'];
					$zaloby = $_POST['zaloby'];
					$doi = $_POST['doi'];
					$rsi = $_POST['rsi'];
					$tdt = $_POST['tdt'];
					$izm = $_POST['izm'];
					$diagnoz = $_POST['diagnoz'];
					
					if ($_POST['type'] == "galoba") $type = "galoba";
					else $type = "control";
					$vx_st = str_replace(" ","",$_POST['vx_st']);
					$isx_st = str_replace(" ","",$_POST['isx_st']);
					$database->update_priz(Convert($_POST['date']), $vx_st, $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, Convert($_POST['datecontroly']), Convert($_POST['dateyvki2']), $control, "О", $_POST['graf'], $_POST['id_num'], $_GET['id'], $tdt, $izm, $_POST['dateyvki'], $_POST['na']);
				}
				
				header('Location: index.php?c=obsledovanie');
				die();
			}
			else 
			{
				if (($this->priz['godnost'] == "О") and (isset($_GET['obs'])))
				{
					$type = "obsledovanie";
					$anamnez = $_POST['anamnez'];
					$zaloby = $_POST['zaloby'];
					$doi = $_POST['doi'];
					$rsi = $_POST['rsi'];
									$tdt = $_POST['tdt'];
				$izm = $_POST['izm'];
					$diagnoz = $_POST['diagnoz'];
					$vx_st = str_replace(" ","",$_POST['vx_st']);
					$isx_st = str_replace(" ","",$_POST['isx_st']);
					$database->update_priz(Convert($_POST['date']), $vx_st, $_POST['fio'], $_POST['daterogdenia'], $_POST['type'], $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, "", Convert($_POST['dateyvki2']), $control, $_POST['godnost'], $_POST['graf'], $_POST['id_num'], $_GET['id'], $tdt, $izm, $_POST['dateyvki'], $_POST['na']);	
					header('Location: index.php?c=obsledovanie');
					die();
				} 
				else 
				{
					$anamnez = $_POST['anamnez'];
					$zaloby = $_POST['zaloby'];
					$doi = $_POST['doi'];
					$rsi = $_POST['rsi'];
					$tdt = $_POST['tdt'];
					$izm = $_POST['izm'];
					$diagnoz = $_POST['diagnoz'];
					$vx_st = str_replace(" ","",$_POST['vx_st']);
					$isx_st = str_replace(" ","",$_POST['isx_st']);
					if ($this->priz['datecontroly'] == "") $a = "";
					else $a = Convert($_POST['datecontroly']);
					$database->update_priz(Convert($_POST['date']), $vx_st, $_POST['fio'], $_POST['daterogdenia'], $_POST['type'], $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $a, Convert($_POST['dateyvki2']), $control, $_POST['godnost'], $_POST['graf'], $_POST['id_num'], $_GET['id'], $tdt, $izm, $_POST['dateyvki'], $_POST['na']);
					if (isset($_GET['gal']))
					{
						header('Location: index.php?c=page');
						die();
					} elseif (isset($_GET['vozvrat'])) {
					header('Location: index.php?c=vozvrat');
					die();	
					} elseif (isset($_GET['obs'])) {
					header('Location: index.php?c=obsledovanie');
					die();	
					} 
					elseif (isset($_GET['find'])) 
					{
						$redicet =  $_POST['back'];
						header("Location: $redicet");
						die();
					}
					{
						header('Location: index.php?c=otrabotka');
						die();
					}	
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
			} elseif (isset($_GET['gal'])) { $control = "yes"; $type = "galoba";}
			elseif (isset($_GET['vozvrat'])) { $type = "vozvrat";}
			else {
				$control = "yes";
				$type = "control";
				}
			
			$id_user = $this->user['id_user'];
			$tdt = $_POST['tdt'];
			$izm = $_POST['izm'];
			$dateyvki = "";	
			$vx_st = str_replace(" ","",$_POST['vx_st']);
			$isx_st = str_replace(" ","",$_POST['isx_st']);
			$database->update_priz(Convert($_POST['date']), $vx_st, $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $_POST['zaloby'], $_POST['anamnez'], $_POST['doi'], $_POST['rsi'],$_POST['diagnoz'], $isx_st, "", Convert($_POST['dateyvki2']), $control, $_POST['godnost'], $_POST['graf'], $_POST['id_num'], $_GET['id'], $tdt, $izm, "", $_POST['na']);
			if (isset($_GET['gal']))
			header('Location: index.php?c=page');
			elseif (isset($_GET['vozvrat'])) header('Location: index.php?c=vozvrat');
			else header('Location: index.php?c=printlist&id='.$_GET['id']);
			die();
		}		
		
		if (isset($_POST['add3']))
		{
			$voenkomat = $_POST['voenkomat'];
			$otpravitel = $_POST['otpravitel'];
			$ispolnitel = $_POST['ispolnitel'];
			$datecontroly = Convert($_POST['datecontroly']);
			$graf = $_POST['graf'];
			
			if ($this->priz['control'] == "no" or $this->priz['control'] == "")
			{
				$control = "no";
			} else 	$control = "yes";
			
			$id_user = $this->user['id_user'];
			
				$type = "obsledovanie";
				$anamnez = $_POST['anamnez'];
				$q = $database->select_q_obsledovanie($this->user['id_user'])->fetchAll();
				$this->id_num = $q[0][0] + 1;
				$tdt = $_POST['tdt'];
				$izm = $_POST['izm'];
				$vx_st = str_replace(" ","",$_POST['vx_st']);
				$isx_st = str_replace(" ","",$_POST['isx_st']);
				$database->addpriz(Convert($_POST['date']), $vx_st, $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $_POST['zaloby'], $_POST['anamnez'], $_POST['doi'], $_POST['rsi'],$_POST['diagnoz'], $isx_st, $datecontroly, Convert($_POST['dateyvki2']), $control, $id_user, $_POST['godnost'], $graf, $this->id_num, $tdt, $izm, $_POST['dateyvki'], $_POST['na']);
				header('Location: index.php?c=obsledovanie');
				die();
		}				
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'priz' => $this->priz, 'id_num' => $this->id_num, 'vsablon' => $this->vsablon, 'sablon' => $this->sablon, 'state' => $this->state, 'state2' => $this->state2);	
		$this->content = $this->Template('templates/v_editpage.php', $vars);
		parent::OnOutput();
	}		
}