<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_Vozvrat extends C_Base
{
	protected $page;
	public $priz;
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
		
		$type = "vozvrat";
		
		if ($this->user['login'] == "med3")
		{
			$this->priz = $database->selectpriz_vozvrat($this->user['id_user'], $type);
		} else {	
			$this->priz = $database->selectpriz_type22($this->user['id_user'], $type);
		}
		
		if (isset($_POST['add']))
		{
			header('Location: index.php?c=editprotocol&id='.$_POST['id']);
			die();
		}
		
		if (isset($_POST['list']))
		{
			header('Location: index.php?c=addpage');
			die();
		}
				
		
		if (isset($_POST['protocol']))
		{
			header('Location: index.php?c=protocol');
			die();
		}
		
		if (isset($_GET['delete']))
		{
			$database->delete_priz($_GET['delete']);
			header('Location: index.php?c=vozvrat');
			die();
		}

		if (isset($_POST['edit']))
		{
			header('Location: index.php?c=editpage&vozvrat&id='.$_POST['id']);
			die();
		}

		if (isset($_POST['delete']))
		{
			$database->delete_priz($_POST['id']);
			header('Location: index.php?c=vozvrat');
		}

		if (isset($_POST['print']))
		{
			header('Location: index.php?c=printlist&id='.$_POST['id']);
			die();
		}		
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('page' => $this->page, 'priz' => $this->priz, 'user' => $this->user);	
		$this->content = $this->Template('templates/v_vozvrat.php', $vars);
		parent::OnOutput();
	}		
}