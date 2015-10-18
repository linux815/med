<?php 
include_once('include/class_base.php');
include_once('include/class_database.php');

class C_Otrabotka extends C_Base
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

//    $this->priz2 = $database->selectpriz_type($this->user['id_user']);
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
		
		if (isset($_POST['dolg']))
		{
			header('Location: index.php?c=dolg');
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
		

		// Извлекаем из URL текущую страницу
		$this->page = $_GET['page'];
		// Определяем общее число сообщений в базе данных
		// Количество тем
		$posts = $database->count_table($this->user['id_user'])->fetch();
		if ($posts[0] < 10) $this->num = $posts[0]; else $this->num = 20;
		// Находим общее число страниц
		$total = intval(($posts[0] - 1) / $this->num) + 1;
		// Определяем начало сообщений для текущей страницы
		$this->page = intval($this->page);
		// Если значение $page меньше единицы или отрицательно
		// переходим на первую страницу
		// А если слишком большое, то переходим на последнюю
		if(empty($this->page) or $this->page < 0) $this->page = 1;
		if($this->page > $total) $this->page = $total;
		// Вычисляем начиная к какого номера
		// следует выводить сообщения
		$start = $this->page * $this->num - $this->num;
		// Выбираем $num сообщений начиная с номера $start
		// В цикле переносим результаты запроса в массив $postrow
		
		// Выборка тем
		$this->priz2 = $database->select_select($this->user['id_user'], $start, $this->num)->fetchAll();
		// Проверяем нужны ли стрелки назад
		if ($this->page != 1) $this->pervpage = '<a href= index.php?c=otrabotka&id='.$_GET['id'].'&page=1><<</a>
                                     <a href= index.php?c=otrabotka&id='.$_GET['id'].'&page='. ($this->page - 1) .'><</a> ';
		// Проверяем нужны ли стрелки вперед
		if ($this->page != $total) $this->nextpage = ' <a href= index.php?c=otrabotka&id='.$_GET['id'].'&page='. ($this->page + 1) .'>></a>
        		                           <a href= index.php?c=otrabotka&id='.$_GET['id'].'&page=' .$total. '>>></a>';
		
		// Находим две ближайшие станицы с обоих краев, если они есть
		if($this->page - 2 > 0) $this->page2left = ' <a href= index.php?c=otrabotka&id='.$_GET['id'].'&page='. ($this->page - 2) .'>'. ($this->page - 2) .'</a> | ';
		if($this->page - 1 > 0) $this->page1left = '<a href= index.php?c=otrabotka&id='.$_GET['id'].'&page='. ($this->page - 1) .'>'. ($this->page - 1) .'</a> | ';
		if($this->page + 2 <= $total) $this->page2right = ' | <a href= index.php?c=otrabotka&id='.$_GET['id'].'&page='. ($this->page + 2) .'>'. ($this->page + 2) .'</a>';
		if($this->page + 1 <= $total) $this->page1right = ' | <a href= index.php?c=otrabotka&id='.$_GET['id'].'&page='. ($this->page + 1) .'>'. ($this->page + 1) .'</a>';
		
		
	}
	
	//
	// ����������� ��������� HTML.
	//	
	protected function OnOutput()
	{
		$vars = array('page' => $this->page, 'priz' => $this->priz, 'priz2'=>$this->priz2, 'counti'=>$this->counti, 'alarm'=>$this->alarm, 'num' => $this->num, 'pervpage' => $this->pervpage, 'page2left' => $this->page2left, 'page1left' => $this->page1left, 'page' => $this->page, 'page1right' => $this->page1right, 'page2right' => $this->page2right, 'nextpage' => $this->nextpage, 'last_post' => $this->last_post, 'posts' => $this->posts, 'count' => $this->count, 'array_threads'=>$this->array_threads);	
		$this->content = $this->Template('templates/v_otrabotka.php', $vars);
		parent::OnOutput();
	}		
}