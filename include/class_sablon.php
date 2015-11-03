<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_Sablon extends C_Base
{
	protected $page;
	public $priz, $priz2, $counti, $alarm;
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

		$this->priz2 = $database->selectsablon($this->user['id_user']);
	//	$this->alarm = $database->selectpriz_type($this->user['id_user']);
		
		if (isset($_POST['list']))
		{
			header('Location: index.php?c=editsablon');
			die();
		}											
		
		if (isset($_POST['edit']))
		{
			header('Location: index.php?c=editsablon&id='.$_POST['id']);
			die();
		}
		


		
		
		
		if (isset($_POST['delete']))
		{
			$database->delete_sablon($_POST['id']);
			header('Location: index.php?c=sablon');
		}	
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('page' => $this->page, 'priz' => $this->priz, 'priz2'=>$this->priz2, 'counti'=>$this->counti, 'alarm'=>$this->alarm);	
		$this->content = $this->Template('templates/v_sablon.php', $vars);
		parent::OnOutput();
	}		
}