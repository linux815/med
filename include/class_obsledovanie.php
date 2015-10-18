<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_Obsledovanie extends C_Base
{
	protected $page;
	public $priz, $priz2, $alarm;
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

		$this->priz2 = $database->selectpriz_obsledovanie($this->user['id_user']);
		$this->alarm = $database->selectpriz_obsledovanie($this->user['id_user']);

		
		if (isset($_POST['list']))
		{
			header('Location: index.php?c=reg');
			die();
		}											
		
		if (isset($_POST['edit']))
		{
			header('Location: index.php?c=editpage&obs=1&id='.$_POST['id']);
			die();
		}
		
		if (isset($_POST['control']))
		{
			header('Location: index.php?c=control&id='.$_POST['id']);
			die();
		}			

		if (isset($_POST['print']))
		{
			header('Location: index.php?c=printlist&obs=1&id='.$_POST['id']);
			die();
		}		

		
		if (isset($_POST['ytverdit']))
		{
			$type = "ytverdit";
			$database->update_ytverdit($type, $_POST['id']);
			header('Location: index.php?c=otrabotka');
			die();
		}		
		
		if (isset($_POST['delete']))
		{
			$database->delete_priz($_POST['id']);
			header('Location: index.php?c=obsledovanie');
		}	
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('page' => $this->page, 'priz' => $this->priz, 'priz2'=>$this->priz2, 'alarm'=>$this->alarm);	
		$this->content = $this->Template('templates/v_obsledovanie.php', $vars);
		parent::OnOutput();
	}		
}