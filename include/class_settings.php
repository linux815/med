<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_Settings extends C_Base
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
		
		if (isset($_POST['add']))
		{	
			$database->update_user($_POST['surname'], $this->user['id_user']);
			header('Location: index.php');
			die();		
		}	
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'priz' => $this->priz);	
		$this->content = $this->Template('templates/v_settings.php', $vars);
		parent::OnOutput();
	}		
}