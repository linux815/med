<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');
include_once('include/functions.php');

class C_FindProtocol extends C_Base
{
	protected $page;
	public $priz, $counti;
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
		
		$find = $_GET['vivod_godnost'];
		
		if (isset($_GET['voenkomat']))
		{
			if ($this->user['login'] == "med1")
				$this->priz = $database->priz_find_p($_GET['voenkomat']);
			if ($this->user['login'] == "med2")
				$this->priz = $database->priz_find_g($_GET['voenkomat']);
		} 
		else {
		if ($find == "ВА") { $godnost = "В"; $isx_godnost = "А"; }
		if ($find == "ВБ") { $godnost = "В"; $isx_godnost = "Б"; }
		if ($find == "ВВ") { $godnost = "В"; $isx_godnost = "В"; }
		if ($find == "ВГ") { $godnost = "В"; $isx_godnost = "Г"; }
		if ($find == "ВД") { $godnost = "В"; $isx_godnost = "Д"; }
		if ($find == "ГБ") { $godnost = "Г"; $isx_godnost = "Б"; }
		if ($find == "ГВ") { $godnost = "Г"; $isx_godnost = "В"; }
		if ($find == "ГГ") { $godnost = "Г"; $isx_godnost = "Г"; }
		if ($find == "ДД") { $godnost = "Д"; $isx_godnost = "Д"; }	
		if ($find == "А")  { $godnost = "А";}	
		if ($find == "Б")  { $godnost = "Б";}	
		
		if ($find == "АА") { $godnost = "А"; $isx_godnost = "А"; }
		if ($find == "АБ") { $godnost = "А"; $isx_godnost = "Б"; }
		if ($find == "АВ") { $godnost = "А"; $isx_godnost = "В"; }
		if ($find == "АГ") { $godnost = "А"; $isx_godnost = "Г"; }
		if ($find == "БА") { $godnost = "Б"; $isx_godnost = "А"; }
		if ($find == "ББ") { $godnost = "Б"; $isx_godnost = "Б"; }
		if ($find == "БВ") { $godnost = "Б"; $isx_godnost = "В"; }
		if ($find == "БГ") { $godnost = "Б"; $isx_godnost = "Г"; }
		
		if ($find == "А" or $find == "Б")
			$this->priz = $database->priz_find_vivod2($godnost, $this->user['id_user']); 
		else	
			$this->priz = $database->priz_find_vivod($godnost, $isx_godnost, $this->user['id_user']); 
		//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch();
	
		if (isset($_GET['delete']))
		{
			$database->delete_protocol($_GET['id']);
			header('Location: index.php?c=protocol');
		}
		}
		
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('page' => $this->page, 'priz' => $this->priz, 'user' => $this->user, 'counti'=>$this->counti);	
		$this->content = $this->Template('templates/v_findprotocol.php', $vars);
		parent::OnOutput();
	}		
}