<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_Mail extends C_BasePrint
{
	public $error, $next, $diag;
	public $fio, $priz;

	function __construct()
	{		
	}
	
	protected function OnInput()
	{
		parent::OnInput();
		
		$database = new Database();
		
		$mUsers = M_Users::Instance();
		
		$mUsers->ClearSessions();
		
		$this->user = $mUsers->Get();	

		$this->priz = $database->selectprotocol2($_GET['id'])->fetch();
	}
	
	protected function OnOutput()
	{
		$vars = array('priz' => $this->priz, 'user' => $this->user);	
		$this->content = $this->Template('templates/v_mail.php', $vars);
		parent::OnOutput();
	}		
}