<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_Dolg extends C_Base
{
	private $page;
	public $priz, $priz2, $counti, $alarm;
    private $i; // Счетчик
    private $forum_id;
    private $count_thread;
    private $count_posts;
    private $num;
    private $pervpage;
    private $page2left;
    private $page1left;
    private $page1right;
    private $page2right;
    private $nextpage;  
    private $last_post;  
	private $post;
	private $array_forums;	// Массив форумов
	private $count;	//
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

    	$this->priz2 = $database->selectpriz_type($this->user['id_user']);
		$this->alarm = $database->selectpriz_type($this->user['id_user']);
		
		if (isset($_POST['list']))
		{
			header('Location: index.php?c=reg');
			die();
		}					

		if (isset($_POST['vivod']))
		{
	    	header('Location: index.php?c=find&w=data&q='.$_POST['find_text'].'&f='.$_POST['field'].'&from='.$_POST['from'].'&to='.$_POST['to']);
	    	die();
		}
		
		if (isset($_POST['edit']))
		{
			header('Location: index.php?c=editpage&id='.$_POST['id']);
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
		
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('page' => $this->page, 'priz' => $this->priz, 'priz2'=>$this->priz2, 'counti'=>$this->counti, 'alarm'=>$this->alarm, 'num' => $this->num, 'pervpage' => $this->pervpage, 'page2left' => $this->page2left, 'page1left' => $this->page1left, 'page' => $this->page, 'page1right' => $this->page1right, 'page2right' => $this->page2right, 'nextpage' => $this->nextpage, 'last_post' => $this->last_post, 'posts' => $this->posts, 'count' => $this->count, 'array_threads'=>$this->array_threads);	
		$this->content = $this->Template('templates/v_dolg.php', $vars);
		parent::OnOutput();
	}		
}