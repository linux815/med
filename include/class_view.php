<?php include_once('include/class_base.php');include_once('include/class_database.php');include_once('include/class_user.php');include_once('include/class_baseprint.php');//// ����������� �������� ������.//class C_View extends C_Base{	private $array_forums;	// ������ �������	public $user; // ������������	public $online, $priz, $priz1, $priz2, $priz3, $priz4, $protocol; // ���������� ������������� � ������	public $online_user; // ��� � ������    private $i; // �������    private $thread;	//	// �����������.	//	function __construct()	{		session_start();			}			//	// ����������� ���������� �������.	//	protected function OnInput()	{				$database = new Database();		parent::OnInput();			// ���������.		$mUsers = M_Users::Instance();						// ������� ������ ������.		$mUsers->ClearSessions();			// ������� ������������.		$this->user = $mUsers->Get();				$this->priz = $database->selectprotocol33($this->user['id_user']);		$this->priz1 = $database->selectprotocol44($this->user['id_user']);		$this->priz2 = $database->selectprotocol55($this->user['id_user']);		$this->priz3 = $database->selectprotocol66($this->user['id_user']);		$year = substr($this->user['name'],0, 4);   		$month = substr($this->user['name'],5, 6);	  		if ($month == "1") $month = "Весна";  		if ($month == "2") $month = "Осень";			  			   		$Vremy = $month." ".$year."г.";   		$a = mb_strtolower($month, 'UTF-8');   		$Vremy2 = $a." ".$year."г.";		$this->priz4 = $database->selectprotocol333($this->user['id_user'], $Vremy, $Vremy2);				if ($this->user['login'] == "med1")		{			$this->protocol = $database->selectprotocol_p();
		}					if ($this->user['login'] == "med2")		{			$this->protocol = $database->selectprotocol_g();		}					if ($this->user[0] == "")		{			header('Location: index.php?c=auth');			die();		}				if (isset($_POST['add2']))
		{			if ($_POST['m'] == "Весна") $m = "1";			if ($_POST['m'] == "Осень") $m = "2";			$year = $_POST['y']."-".$m;
			$database->aaa($year);
			$content = $year;
			$f = fopen('db.txt','w+');
			fwrite($f,$content);
			fclose($f);						// Записываем в начало файла			$a1="db_all.txt";
			$a2=fopen($a1,"r"); // открываем для чтения
			$text=fread($a2,filesize($a1)); //читаем
			fclose($a2);
			
			$what= $year."\r\n"; // строка
			$f=fopen("db_all.txt","w"); // открываем для записи
			// пишем нашу строку и к ней добавляем раннее содержимое файла
			fwrite($f,$what.$text);
			fclose($f);
			header('Location: index.php?c=view');
			die();
		}			if (isset($_POST['add3']))
		{			$content = $_POST['year1'];			$f = fopen('db.txt','w+');
			fwrite($f,$content);
			fclose($f);
			$database->update_user2($content, $this->user['id_user']);			header('Location: index.php');
			die();					}			}		//	// ����������� ��������� HTML.	//		protected function OnOutput()	{		$vars = array('user' => $this->user, 'priz' => $this->priz, 'priz1' => $this->priz1, 'priz2' => $this->priz2, 'priz3' => $this->priz3, 'priz4' => $this->priz4, 'protocol' => $this->protocol);			$this->content = $this->Template('templates/v_view.php', $vars);		parent::OnOutput();	}	}