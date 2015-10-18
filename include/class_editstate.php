<?php 
include_once('include/class_baseprint.php');
include_once('include/class_database.php');

class C_EditState extends C_BasePrint
{
	public $error, $next, $diag;
	public $priz, $id_num;
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
		if (isset($_POST['first_area']))
		{
		$this->priz = $database->addstate("1", "0", $this->user['id_user'], $_POST['first_area']);
		echo $_POST['first_area'];
		unset($_POST['first_area']);
		}
		
		if (isset($_POST['second_area'])) {
			$this->priz = $database->addstate("0", "1", $this->user['id_user'], $_POST['second_area']);
			echo $_POST['second_area'];
			unset($_POST['second_area']);			
		}
		//echo "<pre>"; echo print_r($_POST); echo "</pre>";
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('error' => $this->error, 'next' => $this->next, 'diag' => $this->diag, 'user' => $this->user, 'priz' => $this->priz, 'id_num' => $this->id_num);	
		$this->content = $this->Template('templates/v_editstate.php', $vars);
		parent::OnOutput();
	}		
}