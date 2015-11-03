<?php date_default_timezone_set('Asia/Krasnoyarsk');
//
// �������� �������������
//
class M_Users
{	
	private static $instance;	// ��������� ������
	private $msql;				// ������� ��
	private $sid;				// ������������� ������� ������
	private $uid;				// ������������� �������� ������������
	public $hostname;
	public $username;
	public $password;
	public $dbName;	
	//
	// ��������� ���������� ������
	// ���������	- ��������� ������ MSQL
	//
	public static function Instance()
	{
		if (self::$instance == null)
			self::$instance = new M_Users();
			
		return self::$instance;
	}

	//
	// �����������
	//
	public function __construct()
	{
		$db = implode('',file('db.txt'));
		$this->hostname = "localhost";
		$this->username = "med";
		$this->password = "med";
		$this->dbName   = $db;
		date_default_timezone_set('Asia/Krasnoyarsk');
		session_start();		
		$this->sid = null;
		$this->uid = null;
	}
	
	//
	// ������� �������������� ������
	// 
	public function ClearSessions()
	{
		try { 			
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$min = date('Y-m-d H:i:s', time() - 60 * 15);
			$t = "time_last < '%s'";
			$where = sprintf($t, $min);
			$sql = "DELETE FROM sessions WHERE $where";
			
			return $dbh->exec($sql);
			
			$dbh = NULL; // ��������� ����������	
			
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 		
	}

	//
	// �����������
	// $login 		- �����
	// $password 	- ������
	// $remember 	- ����� �� ��������� � �����
	// ���������	- true ��� false
	//
	public function Login($login, $password, $remember = true)
	{
		// ����������� ������������ �� �� 
		$user = $this->GetByLogin($login);

		if ($user == null)
			return false;
		
		$id_user = $user['id_user'];
				
		// ��������� ������
		if ($user['password'] != md5($password))
			return false;
				
		// ���������� ��� � md5(������)
		if ($remember)
		{
			$expire = time() + 3600 * 24 * 100;
			setcookie('login', $login, $expire);
			setcookie('password', md5($password), $expire);
		}		
				
		// ��������� ������ � ���������� SID
		$this->sid = $this->OpenSession($id_user);
		
		return true;
	}
	
	//
	// �����
	//
	public function Logout()
	{
		setcookie('login', '', time() - 1);
		setcookie('password', '', time() - 1);
		unset($_COOKIE['login']);
		unset($_COOKIE['password']);
		unset($_SESSION['sid']);		
		$this->sid = null;
		$this->uid = null;
	}
						
	//
	// ��������� ������������
	// $id_user		- ���� �� ������, ����� ��������
	// ���������	- ������ ������������
	//
	public function Get($id_user = null)
	{
		try {	
			// ���� id_user �� ������, ����� ��� �� ������� ������.
			if ($id_user == null)
				$id_user = $this->GetUid();
				
			if ($id_user == null)
				return null;
				
			// � ������ ������ ���������� ������������ �� id_user.
			$dbh = new PDO("mysql:host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT * FROM users WHERE id_user = '$id_user'";
			
			return $dbh->query($sql)->fetch();
			
			$dbh = NULL; // ��������� ����������	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}
	
	//
	// �������� ������������ �� ������
	//
	public function GetByLogin($login)
	{	
		try {
		$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
		$sql = "SELECT * FROM users WHERE login = '$login'";
			
		return $dbh->query($sql)->fetch();
			
		$dbh = NULL; // ��������� ����������
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 						
	}
	
	public function Loging($id_user)
	{	
		try {
		$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
		$sql = "SELECT * FROM users WHERE id_user <> '$id_user'";
			
		return $dbh->query($sql);
			
		$dbh = NULL; // ��������� ����������
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 						
	}	
	
	public function GetLogin($id_user)
	{
		try {	

				
			// � ������ ������ ���������� ������������ �� id_user.
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT COUNT(*) FROM users WHERE login = '$id_user'";
			
			return $dbh->query($sql)->fetch();
			
			$dbh = NULL; // ��������� ����������	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}	
			
	//
	// �������� ������� ����������
	// $priv 		- ��� ����������
	// $id_user		- ���� �� ������, ������, ��� ��������
	// ���������	- true ��� false
	//
	public function Can($id_user = null)
	{		
		try {	
			// ���� id_user �� ������, ����� ��� �� ������� ������.
			if ($id_user == null)
				$id_user = $this->GetUid();
				
			if ($id_user == null)
				return null;
				
			// � ������ ������ ���������� ������������ �� id_user.
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT COUNT(*) AS count, id_user FROM sessions GROUP BY id_user ORDER BY id_user";
			
			return $dbh->query($sql);
			
			$dbh = NULL; // ��������� ����������	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}

	//
	// �������� ���������� ������������
	// $id_user		- �������������
	// ���������	- true ���� online
	//
	public function IsOnline($id_user = null)
	{		
		try {	
			// ���� id_user �� ������, ����� ��� �� ������� ������.
			if ($id_user == null)
				$id_user = $this->GetUid();
				
			if ($id_user == null)
				return null;
				
			// � ������ ������ ���������� ������������ �� id_user.
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			//$sql = "SELECT users.login, sessions.id_user FROM users, sessions WHERE users.id_user = sessions.id_user GROUP BY users.login HAVING sessions.id_user > '0'";
			$sql = "SELECT n.id_user , c.id_user, c.login, c.avatar, c.name FROM sessions n INNER JOIN users c ON n.id_user = c.id_user WHERE n.id_user <> '$id_user' GROUP BY n.id_user ORDER BY n.id_user ";
			
			return $dbh->query($sql);
			
			$dbh = NULL; // ��������� ����������	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}
		
	//
	// ��������� id �������� ������������
	// ���������	- UID
	//
	public function GetUid()
	{
		try {	
			// �������� ����.
			if ($this->uid != null)
				return $this->uid;	
	
			// ����� �� ������� ������.
			$sid = $this->GetSid();
					
			if ($sid == null)
				return null;
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT id_user FROM sessions WHERE sid = '$sid'";
				
			$result = $dbh->query($sql)->fetch();	
					
			// ���� ������ �� ����� - ������ ������������ �� �����������.
			if (count($result) == 0)
				return null;
				
			// ���� ����� - �������� ��.
			$this->uid = $result['id_user'];

			return $this->uid;
			
			$dbh = NULL; // ��������� ����������	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 			
	}

	//
	// ������� ���������� ������������� ������� ������
	// ���������	- SID
	//
	private function GetSid()
	{
		try {
			// �������� ����.
			if ($this->sid != null)
				return $this->sid;
		
			// ���� SID � ������.
			$sid = @$_SESSION['sid'];
									
		// ���� �����, ��������� �������� time_last � ����. 
		// ������ � ��������, ���� �� ������ ���.
		if ($sid != null)
		{
			$session = array();
			$session = date('Y-m-d H:i:s'); 			
			$t = "sid = '%s'";
			//$affected_rows = $this->msql->Update('sessions', $session, $where);
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
		
			$sql = "UPDATE sessions
	        SET time_last=?
	        WHERE sid=?";
			
			$q = $dbh->prepare($sql);
			$q->execute(array($session,$sid));
			
			$affected_rows = $q->rowCount();
			
			$dbh = NULL; // ��������� ����������	

			if ($affected_rows == 0)
			{
			//	$t = "SELECT count(*) FROM sessions WHERE sid = '%s'";		
			////	$query = sprintf($t, mysql_real_escape_string($sid));
				//$result = $this->msql->Select($query);
				
				$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));

				$sql = "SELECT count(*) FROM sessions WHERE sid = '$sid'";
		
				$result = $dbh->query($sql)->fetch();
			
				$dbh = NULL; // ��������� ����������	
				
				if ($result['count(*)'] == 0)
					$sid = null;			
			}			
		}		
			
			// ��� ������? ���� ����� � md5(������) � �����.
			// �.�. ������� ����������������.
			if ($sid == null && isset($_COOKIE['login']))
			{
				$user = $this->GetByLogin($_COOKIE['login']);
				
				if ($user != null && $user['password'] == $_COOKIE['password'])
					$sid = $this->OpenSession($user['id_user']);
			}
			
			// ���������� � ���.
			if ($sid != null)
				$this->sid = $sid;
			
			// ����������, �������, SID.
			return $sid;	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 		
	}
	
	//
	// �������� ����� ������
	// ���������	- SID
	//
	private function OpenSession($id_user)
	{
		// ���������� SID
		$sid = $this->GenerateStr(10);
				
		// ��������� SID � ��
		$now = date('Y-m-d H:i:s'); 
		$session = array();
		$session['id_user'] = $id_user;
		$session['sid'] = $sid;
		$session['time_start'] = $now;
		$session['time_last'] = $now;
		$session['online'] = "online";				

		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "INSERT INTO sessions (id_user, sid, time_start, time_last, online) VALUES ('$id_user','$sid','$now','$now', 'online')";
			$q = $dbh->exec($sql);
			
			$dbh = NULL; // ��������� ����������	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 		
		//$this->msql->Insert('sessions', $session); 
				
		// ������������ ������ � PHP ������
		$_SESSION['sid'] = $sid;				
				
		// ���������� SID
		return $sid;	
	}

	//
	// ��������� ��������� ������������������
	// $length 		- �� �����
	// ���������	- ��������� ������
	//
	private function GenerateStr($length = 10) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
		$code = "";
		$clen = strlen($chars) - 1;  

		while (strlen($code) < $length) 
            $code .= $chars[mt_rand(0, $clen)];  

		return $code;
	}
		
	public function Message($id_user = null)
	{		
		try {	
			// ���� id_user �� ������, ����� ��� �� ������� ������.
			if ($id_user == null)
				$id_user = $this->GetUid();
				
			if ($id_user == null)
				return null;
				
			// � ������ ������ ���������� ������������ �� id_user.
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			//$sql = "SELECT users.login, sessions.id_user FROM users, sessions WHERE users.id_user = sessions.id_user GROUP BY users.login HAVING sessions.id_user > '0' ORDER BY id_message ASC";
			$sql = "SELECT * FROM messages, users WHERE id_user_take = '$id_user' AND id_user = id_user_send ORDER BY id_message DESC";

			return $dbh->query($sql);
					
			$dbh = NULL; // ��������� ���������� 	
		}		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}
	
	public function Message2($id_user = null)
	{		
		try {	
			// ���� id_user �� ������, ����� ��� �� ������� ������.
			if ($id_user == null)
				$id_user = $this->GetUid();
				
			if ($id_user == null)
				return null;
				
			// � ������ ������ ���������� ������������ �� id_user.
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			//$sql = "SELECT users.login, sessions.id_user FROM users, sessions WHERE users.id_user = sessions.id_user GROUP BY users.login HAVING sessions.id_user > '0' ORDER BY id_message ASC";
			$sql = "SELECT * FROM messages, users WHERE id_user_send = '$id_user' AND id_user = id_user_take ORDER BY id_message DESC";

			return $dbh->query($sql);
					
			$dbh = NULL; // ��������� ���������� 	
		}		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}	
	
	public function message_count($id_user = null)
	{		
		try {	
			// ���� id_user �� ������, ����� ��� �� ������� ������.
			if ($id_user == null)
							
				$id_user = $this->GetUid();
				
			// � ������ ������ ���������� ������������ �� id_user.
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			//$sql = "SELECT users.login, sessions.id_user FROM users, sessions WHERE users.id_user = sessions.id_user GROUP BY users.login HAVING sessions.id_user > '0'";
			$sql = "SELECT DISTINCT COUNT(id_user_take) AS count FROM messages, users WHERE id_user_take = '$id_user' AND id_user = '$id_user'";
	
		    return $dbh->query($sql);
					
			$dbh = NULL; // ��������� ����������	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}	
	
	public function message_select($id_message)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));

			$sql = "SELECT * FROM messages, users WHERE id_message='$id_message' AND id_user = id_user_send";
		
			return $dbh->query($sql);
			
			$dbh = NULL; // ��������� ����������	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}
	
	public function message_delete($id_message)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));

			$sql = "DELETE FROM messages WHERE id_message = ?";
			$q = $dbh->prepare($sql);
			$q->execute(array($id_message));
			//return $count;
			
			$dbh = NULL; // ��������� ����������	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}	
	
	public function message_insert($id_user_send, $id_user_take, $content, $title, $send_count, $take_count)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$date = date('Y-m-d H:i:s'); 
			
			$sql = "INSERT INTO messages (id_user_send, id_user_take, date, content, title, send_count, take_count) VALUES ('$id_user_send','$id_user_take','$date','$content','$title', '$send_count', '$take_count')";
			$q = $dbh->exec($sql);
			
			$dbh = NULL; // ��������� ����������	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 		
	}	

	public function user_insert($login, $password, $name)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$avatar = "3.jpg"; 
			
			$sql = "INSERT INTO users (login, password, name, avatar) VALUES ('$login','$password','$name','$avatar')";
			$q = $dbh->exec($sql);
			
			$dbh = NULL; // ��������� ����������	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 		
	}		
}			