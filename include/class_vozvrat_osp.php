<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_VozvratOsp extends C_Base
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

		$this->priz = $database->selectvozvrat();
		
		if (isset($_POST['list']))
		{
			header('Location: index.php?c=editprotocol');
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
		
		if (isset($_POST['vivod']))
		{
			header('Location: index.php?c=findprotocol&vivod_godnost='.$_POST['vivod_godnost']);
			die();
		}
		
		if (isset($_GET['delete']))
		{
			$database->delete_protocol($_GET['delete']);
			header('Location: index.php?c=vozvrat_osp');
			die();
		}
		
		if (isset($_POST['delete']))
		{
			$database->delete_protocol($_POST['id']);
			header('Location: index.php?c=vozvrat_osp');
		}

		if (isset($_POST['print']))
		{
			header('Location: index.php?c=printvozvrat&id='.$_POST['id']);
			die();
		}	

		if (isset($_POST['edit']))
		{
			header('Location: index.php?c=editprotocol2&id='.$_POST['id']);
			die();
		}	

		if (isset($_POST['mail']))
		{
			header('Location: index.php?c=mail2&id='.$_POST['id']);
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
		$this->content = $this->Template('templates/v_vozvrat_osp.php', $vars);
		parent::OnOutput();
	}		
}