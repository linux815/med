<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_Print_Table extends C_BasePrint
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

		$this->priz = $database->selectprotocol3();
	}
	
	protected function OnOutput()
	{
		$vars = array('priz' => $this->priz, 'user' => $this->user);	
		$this->content = $this->Template('templates/v_print_table.php', $vars);
		parent::OnOutput();
	}		
}