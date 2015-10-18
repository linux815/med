<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');
include_once 'include/functions.php';

class C_RegKons extends C_Base
{
	public $error, $next, $diag, $sablon;
	public $fio, $id_num, $state, $state2;
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

		$q = $database->select_q_konsult($this->user['id_user'])->fetchAll();	
		$this->sablon = $database->selectsablon($this->user['id_user']);
		$this->id_num = $q[0][0] + 1;
		$this->state = $database->selectstate($this->user['id_user']);
		$this->state2 = $database->selectstate2($this->user['id_user']);
		
		if (isset($_POST['add']))
		{	
			$id_user = $this->user['id_user'];
			$type = "no";
			$sablon= $_POST['sablon'];
			$datecontroly="";
			$control="";$graf="";
			$database->addpriz(Convert($_POST['date']), $_POST['vx_st'], $_POST['fio'], $_POST['daterogdenia'], $type, $_POST['voenkomat'], $_POST['otpravitel'], $_POST['ispolnitel'], $_POST['zaloby'], $_POST['anamnez'], $_POST['doi'], $_POST['rsi'],$_POST['diagnoz'], $_POST['isx_st'], $datecontroly, "", $control, $id_user, $_POST['godnost'], $graf, $_POST['id_num'], "", "", "", $sablon, $_POST['na']);
			header('Location: index.php?c=page');
			die();	
		}
		
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'id_num' => $this->id_num, 'sablon' => $this->sablon, 'state' => $this->state, 'state2' => $this->state2);	
		$this->content = $this->Template('templates/v_regkons.php', $vars);
		parent::OnOutput();
	}		
}