<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_Zaloby extends C_Base
{
	private $news, $priz;
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

		$this->priz = $database->selectzaloby($this->user['id_user']);
		
		if (isset($_POST['list']))
		{
			header('Location: index.php?c=addpage');
			die();
		}
		
		if (isset($_POST['vivod']))
		{
			header('Location: index.php?c=findprotocol&vivod_godnost='.$_POST['vivod_godnost']);
			die();
		}	

		if (isset($_POST['vivod2']))
		{
			header('Location: index.php?c=findprotocol&voenkomat='.$_POST['otpravitel']);
			die();
		}		
		
		if (isset($_POST['list2']))
		{
			header('Location: index.php?c=editprotocol');
			die();
		}
		
		if (isset($_POST['protocol']))
		{
			header('Location: index.php?c=protocol');
			die();
		}
		
		if (isset($_POST['vipiska']))
		{
			header('Location: index.php?c=vipiska&id='.$_POST['id']);
			die();
		}

	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('news' => $this->news, 'priz' => $this->priz);	
		$this->content = $this->Template('templates/v_zaloby.php', $vars);
		parent::OnOutput();
	}		
}