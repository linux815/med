<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');
include_once('include/class_user.php');

//
// ���������� �������� ��������������.
//
class C_Auth extends C_Base
{
	private $titl;  // ���������
	private $text;	// �����
	private $error;	// ��������� �� ������

	//
	// �����������.
	//
	function __construct()
	{	
		session_start();	
	}
	
	//
	// ����������� ���������� �������.
	//
	protected function OnInput()
	{
		parent::OnInput();
		
		$database = new Database();
		
		$this->title = $this->title . ' :: �����������';
		
		// ���������.
		$mUsers = M_Users::Instance();
		
		// ������� ������ ������.
		$mUsers->ClearSessions();
		
		// �����.
		$mUsers->Logout();
		
		// ��������� �������� �����.
		if (!empty($_POST))
		{
			if ($mUsers->Login($_POST['login'], 
			                   $_POST['password'], 
							   isset($_POST['remember'])))
			{
				header('Location: index.php');
				die();
			}
		}
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('id_article' => $this->id_article, 'text' => $this->text, 'error' => $this->error, 'titl' => $this->titl);	
		$this->content = $this->Template('templates/v_login.php', $vars);
		parent::OnOutput();
	}	
}
