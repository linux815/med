<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');
include_once 'include/functions.php';

class C_Control extends C_Base
{
	public $error, $next, $diag;
	public $fio, $priz;
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
			$id_user = $this->user['id_user'];
			$type = "control";
			if ($_POST['datecontroly'] == "") $a = "";
			else $a = Convert($_POST['datecontroly']);
			$database->update_control($a, $type, $_POST['id']);
			header('Location: index.php?c=otrabotka');
			die();	
			
		}
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'priz' => $this->priz);	
		$this->content = $this->Template('templates/v_control.php', $vars);
		parent::OnOutput();
	}		
}