<?php 
include_once('include/class_baseprint.php');
include_once('include/class_database.php');

class C_PrintList extends C_BasePrint
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

		$this->priz = $database->selectprotocol_id($_GET['id'])->fetch();
		
		if (isset($_POST['print']))
		{
			header('Location: index.php?c=otrabotka');
		}
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('news' => $this->news, 'priz' => $this->priz, 'user' => $this->user);	
		$this->content = $this->Template('templates/v_protocol.php', $vars);
		parent::OnOutput();
	}		
}