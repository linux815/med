<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');
include_once('include/functions.php');

class C_Find extends C_Base
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
		
		$find = $_GET['q'];	
		$field = $_GET['f'];
		$c = Convert($_GET['from']);
		$po = Convert($_GET['to']);
		
		if ($find == "Отработка") $find = "otrabotka";
		if ($find == "Утвердить") $find = "ytverdit";
		if ($find == "Жалоба") $find = "galoba";
		if ($find == "Контроль") $find = "control";
		if ($find == "Консультация") $find = "konsult";
		if ($find == "Возврат") $find = "vozvrat";
		
		if ($_GET['w'] == "otrabotka")
		{
			$this->priz = $database->priz_find_otrabotka($field, $find, $this->user['id_user']); 
			$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch(); 
		}
		
		if ($_GET['w'] == "data")
		{
			$this->priz = $database->priz_find_data($field, $find, $c, $po, $this->user['id_user']);
		//	echo "<pre>"; echo print_r($this->priz); echo "</pre>";
		//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'], $c, $po)->fetch(); 
		}		
		
		if ($_GET['w'] == "page")
		{
			$this->priz = $database->priz_find_page($field, $find, $this->user['id_user']); 
		//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch(); 			
		}
		
		if ($_GET['w'] == "page" and $this->user['login'] == "med1")
		{
			$this->priz = $database->priz_find_page22($field, $find, $this->user['id_user']); 
		//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch(); 			
		}	

		if ($_GET['w'] == "page" and $this->user['login'] == "med2")
		{
			$this->priz = $database->priz_find_page3($field, $find, $this->user['id_user']);
			//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch();
		}		
		
		if ($_GET['w'] == "vozvrat")
		{
			$this->priz = $database->priz_find_vozvrat($field, $find, $this->user['id_user']); 
		//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch(); 			
		}	
		
		if ($_GET['w'] == "vozvrat" and $this->user['login'] == "med3")
		{
			$this->priz = $database->priz_find_vozvrat2($field, $find, $this->user['id_user']);
			//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch();
		}		

		if ($_GET['w'] == "obsledovanie")
		{
			$this->priz = $database->priz_find_obsledovanie($field, $find, $this->user['id_user']); 
		//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch(); 			
		}	

		if ($_GET['w'] == "protocol")
		{
			$this->priz = $database->priz_find_protocol($field, $find, $this->user['id_user']); 
		//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch(); 			
		}	

		if ($_GET['w'] == "zaloby")
		{
			$this->priz = $database->priz_find_protocol($field, $find, $this->user['id_user']);
		//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch();
		}	

		if ($_GET['w'] == "vozvrat_osp")
		{
			$this->priz = $database->priz_find_protocol($field, $find, $this->user['id_user']);
			//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch();
		}		
		
		if (!isset($_GET['w']))
		{
			$this->priz = $database->priz_find_otrabotka($field, $find, $this->user['id_user']); 
		//	$this->counti = $database->priz_find_count($field, $find, $this->user['id_user'], $_GET['w'])->fetch(); 			
		}	

	//	if (isset($_GET['med']))
//{
	//		$this->priz = $database->priz_find2($field, $find);
	//	}
	//	elseif (isset($_GET['p']))  $this->priz = $database->protocol_find($field, $find);
		
		if (isset($_POST['edit']))
		{
			header('Location: index.php?c=editpage&find=1&id='.$_POST['id']);
			die();
		}
		
		if (isset($_POST['control']))
		{
			header('Location: index.php?c=control&id='.$_POST['id']);
			die();
		}			

		if (isset($_POST['print']))
		{
			header('Location: index.php?c=printlist&id='.$_POST['id']);
			die();
		}		

		
		if (isset($_POST['ytverdit']))
		{
			$type = "ytverdit";
			$database->update_ytverdit($type, $_POST['id']);
			header('Location: index.php?c=otrabotka');
			die();
		}		
		
		if (isset($_POST['delete']))
		{
			$database->delete_priz($_POST['id']);
			header('Location: index.php?c=otrabotka');
		}

		if (isset($_GET['delete']))
		{
			$database->delete_priz($_GET['delete']);
			header('Location: index.php?c=page');
			die();
		}		
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('page' => $this->page, 'priz' => $this->priz, 'user' => $this->user, 'counti'=>$this->counti);	
		$this->content = $this->Template('templates/v_find.php', $vars);
		parent::OnOutput();
	}		
}