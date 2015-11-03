<?php 

class Database
{
	public $hostname;
	public $username;
	public $password;
	public $dbName;
	
	public function __construct()
	{
		$db = implode('',file('db.txt'));
		$this->hostname = "localhost";
		$this->username = "med";
		$this->password = "med";
		$this->dbName   = $db;
		date_default_timezone_set('Asia/Krasnoyarsk');
		
	}
	
	public function addpriz($date, $vx_st, $fio, $daterogdenia, $type, $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $datecontroly, $dateyvki, $control, $id_user, $godnost, $graf, $id_num, $tdt, $izm, $dateyvki2, $sablon, $na)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			//$date = date('d.m.Y'); 
			
			$sql = "INSERT INTO `priz` (`id`, `date`, `vx_st`, `fio`, `daterogdenia`, `type`, `voenkomat`, `otpravitel`, `ispolnitel`, `zaloby`, `anamnez`, `doi`, `rsi`, `diagnoz`, `isx_st`, `datecontroly`, `dateyvki`, `control`, `id_user`, `godnost`, `graf`, `id_num`, `tdt`, `izm`, `dateyvki2`, `sablon`, `na`) VALUES (NULL, :date, :vx_st, :fio, :daterogdenia, :type, :voenkomat, :otpravitel, :ispolnitel, :zaloby, :anamnez, :doi, :rsi, :diagnoz, :isx_st, :datecontroly, :dateyvki, :control, :id_user, :godnost, :graf, :id_num, :tdt, :izm, :dateyvki2, :sablon, :na);";
			$q = $dbh->prepare($sql);
			$q->execute(array(':vx_st'=>$vx_st,
							  ':date'=>$date,
						      ':fio'=>$fio,
							  ':daterogdenia'=>$daterogdenia,
							  ':type'=>$type,
							  ':voenkomat'=>$voenkomat,
					     	  ':otpravitel'=>$otpravitel,
							  ':ispolnitel'=>$ispolnitel,
							  ':zaloby'=>$zaloby,
							  ':anamnez'=>$anamnez,
							  ':doi'=>$doi,
							  ':rsi'=>$rsi,
							  ':diagnoz'=>$diagnoz,
							  ':isx_st'=>$isx_st,
					    	  ':datecontroly'=>$datecontroly,
							  ':dateyvki'=>$dateyvki,
							  ':control'=>$control,
							  ':id_user'=>$id_user,
							  ':godnost'=>$godnost,
							  ':graf'=>$graf,
							  ':id_num'=>$id_num,
							  ':tdt'=>$tdt,
							  ':izm'=>$izm,
							  ':dateyvki2'=>$dateyvki2,
							  ':sablon'=>$sablon,
							  ':na'=>$na));
			$dbh = NULL;	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}
	
	public function addsablon($date, $vx_st, $fio, $daterogdenia, $type, $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $datecontroly, $control, $id_user, $godnost, $graf, $id_num, $tdt, $izm, $dateyvki2)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			//$date = date('d.m.Y'); 
			
			$sql = "INSERT INTO `galoba` (`id`, `date`, `vx_st`, `fio`, `daterogdenia`, `type`, `voenkomat`, `otpravitel`, `ispolnitel`, `zaloby`, `anamnez`, `doi`, `rsi`, `diagnoz`, `isx_st`, `datecontroly`, `control`, `id_user`, `godnost`, `graf`) VALUES (NULL, :date, :vx_st, :fio, :daterogdenia, :type, :voenkomat, :otpravitel, :ispolnitel, :zaloby, :anamnez, :doi, :rsi, :diagnoz, :isx_st, :datecontroly, :control, :id_user, :godnost, :graf);";
			$q = $dbh->prepare($sql);
			$q->execute(array(':vx_st'=>$vx_st,
							  ':date'=>$date,
						      ':fio'=>$fio,
							  ':daterogdenia'=>$daterogdenia,
							  ':type'=>$type,
							  ':voenkomat'=>$voenkomat,
					     	  ':otpravitel'=>$otpravitel,
							  ':ispolnitel'=>$ispolnitel,
							  ':zaloby'=>$zaloby,
							  ':anamnez'=>$anamnez,
							  ':doi'=>$doi,
							  ':rsi'=>$rsi,
							  ':diagnoz'=>$diagnoz,
							  ':isx_st'=>$isx_st,
					    	  ':datecontroly'=>$datecontroly,
							  ':control'=>$control,
							  ':id_user'=>$id_user,
							  ':godnost'=>$godnost,
							  ':graf'=>$graf));
			$dbh = NULL;	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}	
	
	public function addstate($vx_st, $isx_st, $id_user, $text)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			//$date = date('d.m.Y');
				
			$sql = "INSERT INTO `state` (`vx_st`, `isx_st`, `id_user`, `text`) VALUES (:vx_st, :isx_st, :id_user, :text);";
			$q = $dbh->prepare($sql);
			$q->execute(array(':vx_st'=>$vx_st,
					':isx_st'=>$isx_st,
					':id_user'=>$id_user,
					':text'=>$text));
			$dbh = NULL;
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	

	public function addgaloba($vx_st, $fio, $daterogdenia, $type, $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $datecontroly, $control, $id_user, $godnost, $graf,$vx_diagnoz, $vx_godnost, $protocol_numb, $protocol_numb2, $date_protocol, $date_protocol2, $mail)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$date = date('Y-m-d');
				
			$sql = "INSERT INTO `protocol` (`id`, `date`, `vx_st`, `fio`, `daterogdenia`, `type`, `voenkomat`, `otpravitel`, `ispolnitel`, `zaloby`, `anamnez`, `doi`, `rsi`, `diagnoz`, `isx_st`, `datecontroly`, `control`, `id_user`, `godnost`, `graf`,`vx_diagnoz`, `vx_godnost`, `protocol_numb`, `protocol_numb2`, `date_protocol`, `date_protocol2`, `mail`) VALUES (NULL, :date, :vx_st, :fio, :daterogdenia, :type, :voenkomat, :otpravitel, :ispolnitel, :zaloby, :anamnez, :doi, :rsi, :diagnoz, :isx_st, :datecontroly, :control, :id_user, :godnost, :graf, :vx_diagnoz, :vx_godnost, :protocol_numb, :protocol_numb2, :date_protocol, :date_protocol2, :mail);";
			$q = $dbh->prepare($sql);
			$q->execute(array(':vx_st'=>$vx_st,
					':date'=>$date,
					':fio'=>$fio,
					':daterogdenia'=>$daterogdenia,
					':type'=>$type,
					':voenkomat'=>$voenkomat,
					':otpravitel'=>$otpravitel,
					':ispolnitel'=>$ispolnitel,
					':zaloby'=>$zaloby,
					':anamnez'=>$anamnez,
					':doi'=>$doi,
					':rsi'=>$rsi,
					':diagnoz'=>$diagnoz,
					':isx_st'=>$isx_st,
					':datecontroly'=>$datecontroly,
					':control'=>$control,
					':id_user'=>$id_user,
					':godnost'=>$godnost,
					':graf'=>$graf,
					':vx_diagnoz'=>$vx_diagnoz,
					':vx_godnost'=>$vx_godnost,
					':protocol_numb'=>$protocol_numb,
					':protocol_numb2'=>$protocol_numb2,
					':date_protocol'=>$date_protocol,
					':date_protocol2'=>$date_protocol2,
					':mail'=>$mail));
			$dbh = NULL;
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function addprotocol($vx_st, $fio, $daterogdenia, $type, $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $datecontroly, $control, $id_user, $godnost, $graf, $vx_diagnoz, $vx_godnost, $protocol_numb, $protocol_numb2, $date_protocol, $date_protocol2, $mail)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$date = date('Y-m-d'); 
			
			$sql = "INSERT INTO `protocol` (`id`, `date`, `vx_st`, `fio`, `daterogdenia`, `type`, `voenkomat`, `otpravitel`, `ispolnitel`, `zaloby`, `anamnez`, `doi`, `rsi`, `diagnoz`, `isx_st`, `datecontroly`, `control`, `id_user`, `godnost`, `graf`, `vx_diagnoz`, `vx_godnost`, `protocol_numb`, `protocol_numb2`, `date_protocol`, `date_protocol2`, `mail`) VALUES (NULL, :date, :vx_st, :fio, :daterogdenia, :type, :voenkomat, :otpravitel, :ispolnitel, :zaloby, :anamnez, :doi, :rsi, :diagnoz, :isx_st, :datecontroly, :control, :id_user, :godnost, :graf, :vx_diagnoz, :vx_godnost, :protocol_numb, :protocol_numb2, :date_protocol, :date_protocol2, :mail);";
			$q = $dbh->prepare($sql);
			$q->execute(array(':vx_st'=>$vx_st,
							  ':date'=>$date,
						      ':fio'=>$fio,
							  ':daterogdenia'=>$daterogdenia,
							  ':type'=>$type,
							  ':voenkomat'=>$voenkomat,
					     	  ':otpravitel'=>$otpravitel,
							  ':ispolnitel'=>$ispolnitel,
							  ':zaloby'=>$zaloby,
							  ':anamnez'=>$anamnez,
							  ':doi'=>$doi,
							  ':rsi'=>$rsi,
							  ':diagnoz'=>$diagnoz,
							  ':isx_st'=>$isx_st,
					    	  ':datecontroly'=>$datecontroly,
							  ':control'=>$control,
							  ':id_user'=>$id_user,
							  ':godnost'=>$godnost,
							  ':graf'=>$graf,
							  ':vx_diagnoz'=>$vx_diagnoz,
							  ':vx_godnost'=>$vx_godnost,
							  ':protocol_numb'=>$protocol_numb,
							  ':protocol_numb2'=>$protocol_numb2,
							  ':date_protocol'=>$date_protocol,
							  ':date_protocol2'=>$date_protocol2,
							  ':mail'=>$mail));
			$dbh = NULL;	
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}
		
	public function addvozvrat($vx_st, $fio, $daterogdenia, $type, $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $datecontroly, $control, $id_user, $godnost, $graf, $vx_diagnoz, $vx_godnost, $protocol_numb, $protocol_numb2, $date_protocol, $date_protocol2, $mail)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$date = date('Y-m-d');
				
			$sql = "INSERT INTO `protocol` (`id`, `date`, `vx_st`, `fio`, `daterogdenia`, `type`, `voenkomat`, `otpravitel`, `ispolnitel`, `zaloby`, `anamnez`, `doi`, `rsi`, `diagnoz`, `isx_st`, `datecontroly`, `control`, `id_user`, `godnost`, `graf`, `vx_diagnoz`, `vx_godnost`, `protocol_numb`, `protocol_numb2`, `date_protocol`, `date_protocol2`, `mail`) VALUES (NULL, :date, :vx_st, :fio, :daterogdenia, :type, :voenkomat, :otpravitel, :ispolnitel, :zaloby, :anamnez, :doi, :rsi, :diagnoz, :isx_st, :datecontroly, :control, :id_user, :godnost, :graf, :vx_diagnoz, :vx_godnost, :protocol_numb, :protocol_numb2, :date_protocol, :date_protocol2, :mail);";
			$q = $dbh->prepare($sql);
			$q->execute(array(':vx_st'=>$vx_st,
					':date'=>$date,
					':fio'=>$fio,
					':daterogdenia'=>$daterogdenia,
					':type'=>$type,
					':voenkomat'=>$voenkomat,
					':otpravitel'=>$otpravitel,
					':ispolnitel'=>$ispolnitel,
					':zaloby'=>$zaloby,
					':anamnez'=>$anamnez,
					':doi'=>$doi,
					':rsi'=>$rsi,
					':diagnoz'=>$diagnoz,
					':isx_st'=>$isx_st,
					':datecontroly'=>$datecontroly,
					':control'=>$control,
					':id_user'=>$id_user,
					':godnost'=>$godnost,
					':graf'=>$graf,
					':vx_diagnoz'=>$vx_diagnoz,
					':vx_godnost'=>$vx_godnost,
					':protocol_numb'=>$protocol_numb,
					':protocol_numb2'=>$protocol_numb2,
					':date_protocol'=>$date_protocol,
					':date_protocol2'=>$date_protocol2,
					':mail'=>$mail));
			$dbh = NULL;
		}
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}
	

	public function selectpriz_id($id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT *, DATE_FORMAT(datecontroly,'%d.%m.%Y') as datecontroly, DATE_FORMAT(date,'%d.%m.%Y') as date, DATE_FORMAT(dateyvki,'%d.%m.%Y') as dateyvki FROM priz WHERE id = '$id'";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}


	public function selectsablon_id($id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM galoba WHERE id = '$id'";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}
	
	public function selectstate($id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT * FROM state WHERE vx_st = '1' and id_user = '$id' GROUP BY text ORDER BY text ASC";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}

	public function selectstate2($id)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT * FROM state WHERE isx_st = '1' and id_user = '$id' GROUP BY text ORDER BY text ASC";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}
	
	
	public function select_q($id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT MAX(id_num) as max, id_user, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE id_user = '$id' and (type = 'galoba' or type = 'consult')";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}	
	
	public function select_q_otrabotka($id_user)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT MAX(id_num) as max, id_user, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE id_user = '$id_user' and (type = 'control' or type = 'otrabotka' or type = 'ytverdit')";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}

	public function select_q_konsult($id_user)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT MAX(id_num) as max, id_user, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE id_user = '$id_user' and (type = 'galoba' or type = 'konsult')";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function select_q_obsledovanie($id_user)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT MAX(id_num) as max, id_user, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE id_user = '$id_user' and (type = 'obsledovanie' or type = 'obs')";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
		
	public function selectprotocol_id($id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, DATE_FORMAT(dateyvki,'%d.%m.%Y') as dateyvki  FROM priz WHERE id = '$id'";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}	

	public function selectprotocol_id2($id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE id = '$id'";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectprotocol3()
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT DISTINCT *, id, DATE_FORMAT(date,'%d.%m.%Y') as date, SUM(CASE WHEN trim(protocol_numb2) THEN 0+1 ELSE 0 END) as count, SUM(CASE WHEN vx_godnost != godnost THEN 1 ELSE 0 END) as pomenyli, SUM(CASE WHEN godnost = 'А' THEN 1 ELSE 0 END) as A, SUM(CASE WHEN godnost = 'Б' THEN 1 ELSE 0 END) as B FROM protocol where (type = 'control' or type = '' or type is NULL) and id_user='2' GROUP BY trim(protocol_numb2) ORDER BY id";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}
	
	public function selectprotocol33($id_user)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, SUM(CASE WHEN isx_st = '66в' or isx_st = '66 в' or isx_st = '66в%' THEN 0+1 ELSE 0 END) as st66, SUM(CASE WHEN isx_st = '68в' or isx_st = '68 в' or isx_st = '68в%' THEN 0+1 ELSE 0 END) as st68, SUM(CASE WHEN isx_st = '72в' or isx_st = '72 в' or isx_st = '72в%' THEN 0+1 ELSE 0 END) as st72, SUM(CASE WHEN isx_st = '43в' or isx_st = '43 в' or isx_st = '43в%' THEN 0+1 ELSE 0 END) as st43, SUM(CASE WHEN isx_st = '52в' or isx_st = '52 в' or isx_st = '52в%' THEN 0+1 ELSE 0 END) as st52, SUM(CASE WHEN isx_st = '58в' or isx_st = '58 в' or isx_st = '58в%' THEN 0+1 ELSE 0 END) as st58, SUM(CASE WHEN type = 'control' or type = 'otrabotka' or type = 'ytverdit' THEN 0+1 ELSE 0 END) as count, SUM(CASE WHEN isx_st = '25в' or isx_st = '25 в' or isx_st = '25в%' THEN 0+1 ELSE 0 END) as st25, SUM(CASE WHEN type = 'ytverdit' THEN 0+1 ELSE 0 END) as ytver, SUM(CASE WHEN type = 'control' THEN 0+1 ELSE 0 END) as contr, SUM(CASE WHEN type = 'control' and control = 'yes' THEN 0+1 ELSE 0 END) as contrPrib, SUM(CASE WHEN (type = 'control' and (control = 'no' or control is NULL)) THEN 0+1 ELSE 0 END) as contrNoPrib, SUM(CASE WHEN type = 'otrabotka' THEN 0+1 ELSE 0 END) as otrab, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as godnA, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as godnB, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as godnV, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as godnG, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as godnD, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as godnO, SUM(CASE WHEN ((type = 'control') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as contrA, SUM(CASE WHEN ((type = 'control') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as contrB, SUM(CASE WHEN ((type = 'control') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as contrV, SUM(CASE WHEN ((type = 'control') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as contrG, SUM(CASE WHEN ((type = 'control') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as contrD, SUM(CASE WHEN ((type = 'control') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as contrO, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as ytverA, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as ytverB, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as ytverV, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as ytverG, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as ytverD, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as ytverO, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as otrabA, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as otrabB, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as otrabV, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as otrabG, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as otrabD, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as otrabO FROM priz where id_user='$id_user'";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}	
	
	public function selectprotocol333($id_user, $vremy, $vremy2)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, SUM(CASE WHEN isx_st = '66в' or isx_st = '66 в' or isx_st = '66в%' THEN 0+1 ELSE 0 END) as st66, SUM(CASE WHEN isx_st = '68в' or isx_st = '68 в' or isx_st = '68в%' THEN 0+1 ELSE 0 END) as st68, SUM(CASE WHEN isx_st = '72в' or isx_st = '72 в' or isx_st = '72в%' THEN 0+1 ELSE 0 END) as st72, SUM(CASE WHEN isx_st = '43в' or isx_st = '43 в' or isx_st = '43в%' THEN 0+1 ELSE 0 END) as st43, SUM(CASE WHEN isx_st = '52в' or isx_st = '52 в' or isx_st = '52в%' THEN 0+1 ELSE 0 END) as st52, SUM(CASE WHEN isx_st = '58в' or isx_st = '58 в' or isx_st = '58в%' THEN 0+1 ELSE 0 END) as st58, SUM(CASE WHEN type = 'control' or type = 'otrabotka' or type = 'ytverdit' THEN 0+1 ELSE 0 END) as count, SUM(CASE WHEN isx_st = '25в' or isx_st = '25 в' or isx_st = '25в%' THEN 0+1 ELSE 0 END) as st25, SUM(CASE WHEN type = 'ytverdit' THEN 0+1 ELSE 0 END) as ytver, SUM(CASE WHEN type = 'control' THEN 0+1 ELSE 0 END) as contr, SUM(CASE WHEN type = 'control' and control = 'yes' THEN 0+1 ELSE 0 END) as contrPrib, SUM(CASE WHEN (type = 'control' and (control = 'no' or control is NULL)) THEN 0+1 ELSE 0 END) as contrNoPrib, SUM(CASE WHEN type = 'otrabotka' THEN 0+1 ELSE 0 END) as otrab, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as godnA, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as godnB, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as godnV, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as godnG, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as godnD, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as godnO, SUM(CASE WHEN ((type = 'control') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as contrA, SUM(CASE WHEN ((type = 'control') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as contrB, SUM(CASE WHEN ((type = 'control') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as contrV, SUM(CASE WHEN ((type = 'control') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as contrG, SUM(CASE WHEN ((type = 'control') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as contrD, SUM(CASE WHEN ((type = 'control') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as contrO, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as ytverA, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as ytverB, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as ytverV, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as ytverG, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as ytverD, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as ytverO, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as otrabA, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as otrabB, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as otrabV, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as otrabG, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as otrabD, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as otrabO FROM priz where id_user='$id_user' and (ispolnitel = '$vremy' or ispolnitel = '$vremy2')";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectprotocol44($id_user)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, SUM(CASE WHEN type = 'galoba' or type = 'konsult' or type = 'no' THEN 0+1 ELSE 0 END) as count, SUM(CASE WHEN type = 'galoba' THEN 0+1 ELSE 0 END) as galob, SUM(CASE WHEN type = 'konsult' THEN 0+1 ELSE 0 END) as kons, SUM(CASE WHEN type = 'no' THEN 0+1 ELSE 0 END) as no, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as godnA, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as godnB, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as godnV, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as godnG, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as godnD, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as godnO, SUM(CASE WHEN ((type = 'control') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as contrA, SUM(CASE WHEN ((type = 'control') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as contrB, SUM(CASE WHEN ((type = 'control') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as contrV, SUM(CASE WHEN ((type = 'control') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as contrG, SUM(CASE WHEN ((type = 'control') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as contrD, SUM(CASE WHEN ((type = 'control') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as contrO, SUM(CASE WHEN ((type = 'galoba') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as galobA, SUM(CASE WHEN ((type = 'galoba') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as galobB, SUM(CASE WHEN ((type = 'galoba') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as galobV, SUM(CASE WHEN ((type = 'galoba') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as galobG, SUM(CASE WHEN ((type = 'galoba') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as galobD, SUM(CASE WHEN ((type = 'galoba') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as galobO, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as otrabA, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as otrabB, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as otrabV, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as otrabG, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as otrabD, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as otrabO FROM priz where id_user='$id_user'";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectprotocol55($id_user)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, SUM(CASE WHEN type = 'vozvrat' THEN 0+1 ELSE 0 END) as count, SUM(CASE WHEN type = 'galoba' THEN 0+1 ELSE 0 END) as galob, SUM(CASE WHEN type = 'konsult' THEN 0+1 ELSE 0 END) as kons, SUM(CASE WHEN type = 'no' THEN 0+1 ELSE 0 END) as no, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as godnA, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as godnB, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as godnV, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as godnG, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as godnD, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as godnO, SUM(CASE WHEN ((type = 'control') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as contrA, SUM(CASE WHEN ((type = 'control') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as contrB, SUM(CASE WHEN ((type = 'control') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as contrV, SUM(CASE WHEN ((type = 'control') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as contrG, SUM(CASE WHEN ((type = 'control') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as contrD, SUM(CASE WHEN ((type = 'control') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as contrO, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as ytverA, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as ytverB, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as ytverV, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as ytverG, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as ytverD, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as ytverO, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as otrabA, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as otrabB, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as otrabV, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as otrabG, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as otrabD, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as otrabO FROM priz where id_user='$id_user'";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectprotocol66($id_user)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, SUM(CASE WHEN type = 'obsledovanie' THEN 0+1 ELSE 0 END) as count, SUM(CASE WHEN type = 'galoba' THEN 0+1 ELSE 0 END) as galob, SUM(CASE WHEN type = 'konsult' THEN 0+1 ELSE 0 END) as kons, SUM(CASE WHEN type = 'no' THEN 0+1 ELSE 0 END) as no, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as godnA, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as godnB, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as godnV, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as godnG, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as godnD, SUM(CASE WHEN ((type = 'control' or type = 'otrabotka' or type = 'ytverdit') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as godnO, SUM(CASE WHEN ((type = 'control') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as contrA, SUM(CASE WHEN ((type = 'control') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as contrB, SUM(CASE WHEN ((type = 'control') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as contrV, SUM(CASE WHEN ((type = 'control') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as contrG, SUM(CASE WHEN ((type = 'control') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as contrD, SUM(CASE WHEN ((type = 'control') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as contrO, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as ytverA, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as ytverB, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as ytverV, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as ytverG, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as ytverD, SUM(CASE WHEN ((type = 'ytverdit') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as ytverO, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'А' or godnost = 'А1' or godnost = 'А2' or godnost = 'А3' or godnost = 'А4')) THEN 0+1 ELSE 0 END) as otrabA, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Б' or godnost = 'Б1' or godnost = 'Б2' or godnost = 'Б3' or godnost = 'Б4')) THEN 1 ELSE 0 END) as otrabB, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'В')) THEN 0+1 ELSE 0 END) as otrabV, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Г')) THEN 0+1 ELSE 0 END) as otrabG, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'Д')) THEN 0+1 ELSE 0 END) as otrabD, SUM(CASE WHEN ((type = 'otrabotka') and (godnost = 'О')) THEN 0+1 ELSE 0 END) as otrabO FROM priz where id_user='$id_user'";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}

	public function selectprotocol_p()
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, SUM(CASE WHEN type = 'control' or type is NULL THEN 0+1 ELSE 0 END) as count_protocol, SUM(CASE WHEN godnost = 'А' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrA, SUM(CASE WHEN godnost = 'Б' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrB, SUM(CASE WHEN godnost = 'В' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrV,  SUM(CASE WHEN godnost = 'Г' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrG,  SUM(CASE WHEN godnost = 'Д' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrD, SUM(CASE WHEN vx_godnost = 'В' and godnost = 'А' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrBA, SUM(CASE WHEN vx_godnost = 'В' and godnost = 'Б' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrBB, SUM(CASE WHEN vx_godnost = 'В' and godnost = 'В' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrBV, SUM(CASE WHEN vx_godnost = 'В' and godnost = 'Г' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrBG, SUM(CASE WHEN vx_godnost = 'В' and godnost = 'Д' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrBD, SUM(CASE WHEN vx_godnost = 'Г' and godnost = 'А' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrGA, SUM(CASE WHEN vx_godnost = 'Г' and godnost = 'Б' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrGB, SUM(CASE WHEN vx_godnost = 'Г' and godnost = 'В' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrGV, SUM(CASE WHEN vx_godnost = 'Г' and godnost = 'Г' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrGG, SUM(CASE WHEN vx_godnost = 'Г' and godnost = 'Д' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrGD, SUM(CASE WHEN vx_godnost = 'Д' and godnost = 'Д' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrDD FROM protocol";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}

	public function selectprotocol_g()
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, SUM(CASE WHEN type = 'gal' THEN 0+1 ELSE 0 END) as count_protocol, SUM(CASE WHEN godnost = 'А' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrA, SUM(CASE WHEN godnost = 'Б' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrB, SUM(CASE WHEN godnost = 'В' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrV,  SUM(CASE WHEN godnost = 'Г' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrG,  SUM(CASE WHEN godnost = 'Д' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrD, SUM(CASE WHEN vx_godnost = 'А' and godnost = 'А' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrAA, SUM(CASE WHEN vx_godnost = 'А' and godnost = 'Б' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrAB, SUM(CASE WHEN vx_godnost = 'А' and godnost = 'В' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrAV, SUM(CASE WHEN vx_godnost = 'А' and godnost = 'Г' and (type = 'control' or type is NULL) THEN 0+1 ELSE 0 END) as contrAG, SUM(CASE WHEN vx_godnost = 'А' and godnost = 'Д' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrAD, SUM(CASE WHEN vx_godnost = 'Б' and godnost = 'А' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrBA, SUM(CASE WHEN vx_godnost = 'Б' and godnost = 'Б' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrBB, SUM(CASE WHEN vx_godnost = 'Б' and godnost = 'В' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrBV, SUM(CASE WHEN vx_godnost = 'Б' and godnost = 'Г' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrBG, SUM(CASE WHEN vx_godnost = 'Б' and godnost = 'Д' and (type = 'gal') THEN 0+1 ELSE 0 END) as contrBD FROM protocol";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	

	public function selectvozvrat()
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol where type = 'voz' ORDER BY id DESC";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	

	public function selectzaloby($id_user)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE type='gal' and id_user = '$id_user' ORDER BY id DESC";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	

	public function selectprotocol2($id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE id = '$id'";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}		

	public function selectprotocol($id, $s, $m)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE (type = 'control' or type = '' or type is NULL) ORDER BY id DESC LIMIT $s, $m";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectprotocol22($id, $s, $m)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol ORDER BY id DESC";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectpriz($id_user, $type=null)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			if ($type != null)
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE type = '$type' ORDER BY id DESC";
			else	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE id_user = '$id_user' ORDER BY id DESC";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}	
	
	public function selectpriz_control()
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (type = 'control' and control = 'yes') or (type = 'obsledovanie' and control = 'yes') ORDER BY id DESC";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}

	public function selectpriz_controlL($s, $m)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT * FROM priz WHERE (type = 'control' and control = 'yes') or (type = 'obsledovanie' and control = 'yes') ORDER BY date DESC LIMIT $s, $m";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}
	
	public function select_control($id_user)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (id_user = '$id_user' and (type = 'galoba' or type = 'konsult' or type = 'no')) ORDER BY id_num DESC";
			
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectpriz2($id_user)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE id_user = '$id_user' and control = 'yes'";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}
	
	public function aaa($year)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "CREATE DATABASE  `$year` ;
					SET SQL_MODE='NO_AUTO_VALUE_ON_ZERO';


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных
--

-- --------------------------------------------------------

--
-- Структура таблицы `galoba`
--

CREATE TABLE IF NOT EXISTS `$year`.`galoba` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `vx_st` varchar(255) DEFAULT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `daterogdenia` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `voenkomat` varchar(255) DEFAULT NULL,
  `otpravitel` varchar(255) DEFAULT NULL,
  `ispolnitel` varchar(255) DEFAULT NULL,
  `zaloby` text,
  `anamnez` text,
  `doi` text,
  `rsi` text,
  `diagnoz` text,
  `isx_st` varchar(255) DEFAULT NULL,
  `datecontroly` varchar(255) DEFAULT NULL,
  `control` varchar(3) DEFAULT NULL,
  `id_user` varchar(2) DEFAULT NULL,
  `godnost` varchar(2) DEFAULT NULL,
  `graf` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Дамп данных таблицы `galoba`
--

INSERT INTO `$year`.`galoba` (`id`, `date`, `vx_st`, `fio`, `daterogdenia`, `type`, `voenkomat`, `otpravitel`, `ispolnitel`, `zaloby`, `anamnez`, `doi`, `rsi`, `diagnoz`, `isx_st`, `datecontroly`, `control`, `id_user`, `godnost`, `graf`) VALUES
(2, '', '', 'ÐŸÐ¾Ð½Ð¸Ð¶ÐµÐ½Ð½Ð¾Ðµ Ð¿Ð¸Ñ‚Ð°Ð½Ð¸Ðµ', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½ÐµÑ‚', 'Ð‘ÐµÐ· Ð¾ÑÐ¾Ð±ÐµÐ½Ð½Ð¾ÑÑ‚ÐµÐ¹.', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐŸÐ¸Ñ‚Ð°Ð½Ð¸Ðµ ÑÐ½Ð¸Ð¶ÐµÐ½Ð¾.\r\nÐ Ð¾ÑÑ‚          ÑÐ¼.\r\nÐ’ÐµÑ            ÐºÐ³.\r\nÐ˜ÐœÐ¢\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.', '', 'ÐŸÐ¾Ð½Ð¸Ð¶ÐµÐ½Ð½Ð¾Ðµ Ð¿Ð¸Ñ‚Ð°Ð½Ð¸Ðµ.										', '', NULL, 'no', '6', 'Ð', 'I'),
(3, '', '', 'Ð¯Ð·Ð²ÐµÐ½Ð½Ð°Ñ Ð±Ð¾Ð»ÐµÐ·Ð½ÑŒ', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½Ð° Ð¿ÐµÑ€Ð¸Ð¾Ð´Ð¸Ñ‡ÐµÑÐºÐ¸ Ð¸Ð·Ð¶Ð¾Ð³Ñƒ, Ð³Ð¾Ð»Ð¾Ð´Ð½Ñ‹Ðµ Ð±Ð¾Ð»Ð¸ Ð² ÑÐ¿Ð¸Ð³Ð°ÑÑ‚Ñ€Ð¸Ð¸.', '', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐšÐ¾Ð¶Ð½Ñ‹Ðµ Ð¿Ð¾ÐºÑ€Ð¾Ð²Ñ‹ Ñ‡Ð¸ÑÑ‚Ñ‹Ðµ. Ð¢Ð¾Ð½Ñ‹ ÑÐµÑ€Ð´Ñ†Ð° ÑÑÐ½Ñ‹Ðµ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ. Ð”Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð² Ð»ÐµÐ³ÐºÐ¸Ñ… Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚. Ð–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, ÑƒÐ¼ÐµÑ€ÐµÐ½Ð½Ð¾ Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹ Ð² ÑÐ¿Ð¸Ð³Ð°ÑÑ‚Ñ€Ð¸Ð¸, Ð¿ÐµÑ‡ÐµÐ½ÑŒ Ð½Ðµ ÑƒÐ²ÐµÐ»Ð¸Ñ‡ÐµÐ½Ð°. ÐÐ”   Ð¼Ð¼.Ñ€Ñ‚.ÑÑ‚.', 'Ð¤Ð“Ð”Ð¡ Ð¾Ñ‚      Ð³.. ÐÐ°    ÑÑ‚ÐµÐ½ÐºÐµ Ð»ÑƒÐºÐ¾Ð²Ð¸Ñ†Ñ‹ 12-Ð¿ÐµÑ€ÑÑ‚Ð½Ð¾Ð¹ ÐºÐ¸ÑˆÐºÐ¸   Ñ€ÑƒÐ±Ñ‡Ð¸Ðº Ñ ÐºÐ¾Ð½Ð²ÐµÑ€Ð³ÐµÐ½Ñ†Ð¸ÐµÐ¹ ÑÐºÐ»Ð°Ð´Ð¾Ðº.  Ð—Ð°ÐºÐ»ÑŽÑ‡ÐµÐ½Ð¸Ðµ: Ð³Ð°ÑÑ‚Ñ€Ð¾Ð´ÑƒÐ¾Ð´ÐµÐ½Ð¸Ñ‚, Ð´ÐµÑ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð»ÑƒÐºÐ¾Ð²Ð¸Ñ†Ñ‹ 12-Ð¿ÐµÑ€ÑÑ‚Ð½Ð¾Ð¹ ÐºÐ¸ÑˆÐºÐ¸, Ð´ÑƒÐ¾Ð´ÐµÐ½Ð¾-Ð³Ð°ÑÑ‚Ñ€Ð°Ð»ÑŒÐ½Ñ‹Ð¹  Ñ€ÐµÑ„Ð»ÑŽÐºÑ, Ð»Ð¸Ð½ÐµÐ¹Ð½Ñ‹Ð¹ Ñ€ÐµÑ„Ð»ÑŽÐºÑ - ÑÐ·Ð¾Ñ„Ð°Ð³Ð¸Ñ‚.\r\nR-Ð¶ÐµÐ»ÑƒÐ´ÐºÐ° Ð¾Ñ‚    Ð³. Ð—Ð°ÐºÐ»ÑŽÑ‡ÐµÐ½Ð¸Ðµ:    . Ð”ÐµÑ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð»ÑƒÐºÐ¾Ð²Ð¸Ñ†Ñ‹ 12-Ð¿ÐµÑ€ÑÑ‚Ð½Ð¾Ð¹ ÐºÐ¸ÑˆÐºÐ¸. ', 'Ð¯Ð·Ð²ÐµÐ½Ð½Ð°Ñ Ð±Ð¾Ð»ÐµÐ·Ð½ÑŒ Ð´Ð²ÐµÐ½Ð°Ð´Ñ†Ð°Ñ‚Ð¸Ð¿ÐµÑ€ÑÑ‚Ð½Ð¾Ð¹ ÐºÐ¸ÑˆÐºÐ¸ . Ð´ÐµÑ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ñ Ð»ÑƒÐºÐ¾Ð²Ð¸Ñ†Ñ‹ 12-Ð¿ÐµÑ€ÑÑ‚Ð½Ð¾Ð¹ ÐºÐ¸ÑˆÐºÐ¸ Ñ Ð½ÐµÐ·Ð½Ð°Ñ‡Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ñ‹Ð¼ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸ÐµÐ¼ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¹ Ð¸ Ñ€ÐµÐ´ÐºÐ¸Ð¼Ð¸ Ð¾Ð±Ð¾ÑÑ‚Ñ€ÐµÐ½Ð¸ÑÐ¼Ð¸.												', '', NULL, 'no', '6', 'Ð', 'I'),
(4, '', '', 'Ð¥Ñ€Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð¿Ð¸ÐµÐ»Ð¾Ð½ÐµÑ„Ñ€Ð¸Ñ‚', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð¢ÑƒÐ¿Ñ‹Ðµ Ð±Ð¾Ð»Ð¸ Ð² Ð¿Ð¾ÑÑÐ½Ð¸Ñ‡Ð½Ð¾Ð¹ Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸.', 'ÐžÐ±ÑÐ»ÐµÐ´Ð¾Ð²Ð°Ð½ Ð²       . \r\nÐŸÐ¾ Ð°Ð¼Ð±ÑƒÐ»Ð°Ñ‚Ð¾Ñ€Ð½Ð¾Ð¹ ÐºÐ°Ñ€Ñ‚Ðµ ', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ.\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹. ÐŸÐ¾ÑÑÐ½Ð¸Ñ‡Ð½Ð°Ñ Ð¾Ð±Ð»Ð°ÑÑ‚ÑŒ    \r\n', 'Ð£Ð—Ð˜ Ð¿Ð¾Ñ‡ÐµÐº \r\nÐ­ÐºÑÐºÑ€ÐµÑ‚Ð¾Ñ€Ð½Ð°Ñ ÑƒÑ€Ð¾Ð³Ñ€Ð°Ñ„Ð¸Ñ Ð¾Ñ‚     \r\nÐžÐ±Ñ‰Ð¸Ð¹ Ð°Ð½Ð°Ð»Ð¸Ð· Ð¼Ð¾Ñ‡Ð¸: ÑƒÐ´ÐµÐ»ÑŒÐ½Ñ‹Ð¹ Ð²ÐµÑ    , Ð±ÐµÐ»Ð¾Ðº      , Ð»ÐµÐ¹ÐºÐ¾Ñ†Ð¸Ñ‚Ñ‹      , ÑÑ€Ð¸Ñ‚Ñ€Ð¾Ñ†Ð¸Ñ‚Ñ‹    .\r\nÐŸÑ€Ð¾Ð±Ð° ÐÐµÑ‡Ð¸Ð¿Ð¾Ñ€ÐµÐ½ÐºÐ¾: Ð»ÐµÐ¹ÐºÐ¾Ñ†Ð¸Ñ‚Ñ‹    , ÑÑ€Ð¸Ñ‚Ñ€Ð¾Ñ†Ð¸Ñ‚Ñ‹      ,Ñ†Ð¸Ð»Ð¸Ð½Ð´Ñ€Ñ‹ .\r\nÐŸÑ€Ð¾Ð±Ð° Ð—Ð¸Ð¼Ð½Ð¸Ñ†ÐºÐ¾Ð³Ð¾: ÑƒÐ´ÐµÐ»ÑŒÐ½Ñ‹Ð¹ Ð²ÐµÑ    , Ð´Ð½ÐµÐ²Ð½Ð¾Ð¹ Ð´Ð¸ÑƒÑ€ÐµÐ· , Ð½Ð¾Ñ‡Ð½Ð¾Ð¹ Ð´Ð¸ÑƒÑ€ÐµÐ· .', 'Ð¥Ñ€Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð¿Ð¸ÐµÐ»Ð¾Ð½ÐµÑ„Ñ€Ð¸Ñ‚.Ð¥ÐŸÐ 0.										', '', NULL, 'no', '6', 'Ð', 'I'),
(5, '', '', 'Ð¥Ñ€Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð³ÐµÐ¿Ð°Ñ‚Ð¸Ñ‚', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'ÐÐ° Ñ‚ÑƒÐ¿Ñ‹Ðµ Ð±Ð¾Ð»Ð¸ Ð² Ð¿Ñ€Ð°Ð²Ð¾Ð¼ Ð¿Ð¾Ð´Ñ€ÐµÐ±ÐµÑ€ÑŒÐµ.', ' ', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐšÐ¾Ð¶Ð½Ñ‹Ðµ Ð¿Ð¾ÐºÑ€Ð¾Ð²Ñ‹ Ñ‡Ð¸ÑÑ‚Ñ‹Ðµ,     Ð¾ÐºÑ€Ð°ÑÐºÐ¸.\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ Ð¾ÑÑ‚    ÑÐ¼.\r\nÐ’ÐµÑ      ÐºÐ³.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚., Ð§Ð¡Ð¡     ÑƒÐ´. Ð² Ð¼Ð¸Ð½.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹. ÐŸÐµÑ‡ÐµÐ½ÑŒ Ð½Ðµ ÑƒÐ²ÐµÐ»Ð¸Ñ‡ÐµÐ½Ð°, Ð¿Ð¾ ÐºÑ€Ð°ÑŽ Ñ€ÐµÐ±ÐµÑ€Ð½Ð¾Ð¹ Ð´ÑƒÐ³Ð¸.', 'Ð‘Ð¸Ð¾Ñ…Ð¸Ð¼Ð¸Ñ ÐºÑ€Ð¾Ð²Ð¸: Ð±Ð¸Ð»Ð¸Ñ€ÑƒÐ±Ð¸Ð½ Ð¾Ð±Ñ‰Ð¸Ð¹   Ð¼ÐºÐ¼Ð¾Ð»ÑŒ\\Ð» , Ð¿Ñ€ÑÐ¼Ð¾Ð¹     Ð¼ÐºÐ¼Ð¾Ð»ÑŒ\\Ð», Ð½ÐµÐ¿Ñ€ÑÐ¼Ð¾Ð¹   Ð¼ÐºÐ¼Ð¾Ð»ÑŒ\\Ð». Ð¢Ð¸Ð¼Ð¾Ð»Ð¾Ð²Ð°Ñ Ð¿Ñ€Ð¾Ð±Ð°    , ÐÐ›Ð¢  , ÐÐ¡Ð¢  ;\r\nÐœÐ°Ñ€ÐºÐµÑ€Ñ‹ Ð³ÐµÐ¿Ð°Ñ‚Ð¸Ñ‚Ð°         ;\r\nÐ£Ð·Ð¸ Ð¿ÐµÑ‡ÐµÐ½Ð¸-- Ð´Ð¸Ñ„Ñ„ÑƒÐ·Ð½Ñ‹Ðµ Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ñ Ð¿Ð°Ñ€ÐµÐ½Ñ…Ð¸Ð¼Ñ‹ Ð¿ÐµÑ‡ÐµÐ½Ð¸', 'Ð¥Ñ€Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð³ÐµÐ¿Ð°Ñ‚Ð¸Ñ‚    Ñ ÑƒÐ¼ÐµÑ€ÐµÐ½Ð½Ñ‹Ð¼ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸ÐµÐ¼ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¹. 								', '', NULL, 'no', '6', 'Ð', 'I'),
(6, '', '', 'Ð¡Ð¸Ð½Ð´Ñ€Ð¾Ð¼ WPW', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'ÐÐµÑ‚.', 'Ð‘ÐµÐ· Ð¾ÑÐ¾Ð±ÐµÐ½Ð½Ð¾ÑÑ‚ÐµÐ¹.  ', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ.\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚., Ð§Ð¡Ð¡     ÑƒÐ´. Ð² Ð¼Ð¸Ð½.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.', 'Ð­ÐšÐ“ â€“ Ñ€Ð¸Ñ‚Ð¼ ÑÐ¸Ð½ÑƒÑÐ¾Ð²Ñ‹Ð¹,    Ð² Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ. Ð£ÐºÐ¾Ñ€Ð¾Ñ‡Ð½Ð¸Ðµ Ð¸Ð½Ñ‚ÐµÑ€Ð²Ð°Ð»Ð° pQ-- Ð¼Ð¼;\r\nÐ¥Ð¾Ð»Ñ‚ÐµÑ€Ð¾Ð²ÑÐºÐ¾Ðµ Ð¼Ð¾Ð½Ð¸Ñ‚Ð¾Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ Ð¾Ñ‚ ', 'Ð¡Ð¸Ð½Ð´Ñ€Ð¾Ð¼ Ð’Ð¾Ð»ÑŒÑ„Ð°-ÐŸÐ°Ñ€ÐºÐ¸Ð½ÑÐ¾Ð½Ð°-Ð£Ð°Ð¹Ñ‚Ð°. 								', '', NULL, 'no', '6', 'Ð', 'I'),
(7, '', '', 'ÐŸÑ€Ð¾Ð»Ð°Ð¿Ñ ÐœÐš', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½ÐµÑ‚', 'Ð‘ÐµÐ· Ð¾ÑÐ¾Ð±ÐµÐ½Ð½Ð¾ÑÑ‚ÐµÐ¹. ', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐŸÐ¸Ñ‚Ð°Ð½Ð¸Ðµ   .\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÑÐ¸ÑÑ‚Ð¾Ð»Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ ÑˆÑƒÐ¼ Ð½Ð° Ð²ÐµÑ€Ñ…ÑƒÑˆÐºÐµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.', 'Ð­Ñ…Ð¾ÐºÐ°Ñ€Ð´Ð¸Ð¾ÑÐºÐ¾Ð¿Ð¸Ñ Ð¾Ñ‚   -- Ð¿Ð¾Ð»Ð¾ÑÑ‚Ð¸ ÑÐµÑ€Ð´Ñ†Ð° Ð½Ðµ ÑƒÐ²ÐµÐ»Ð¸Ñ‡ÐµÐ½Ñ‹, ÑÑ‚ÐµÐ½ÐºÐ¸ Ð½Ðµ ÑƒÑ‚Ð¾Ð»Ñ‰ÐµÐ½Ñ‹;Ð¿Ñ€Ð¾Ð»Ð°Ð±Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ    ÑÑ‚Ð²Ð¾Ñ€ÐºÐ¸ Ð¼Ð¸Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð³Ð¾ ÐºÐ»Ð°Ð¿Ð°Ð½Ð° 1 ÑÑ‚ÐµÐ¿ÐµÐ½Ð¸, Ñ€ÐµÐ³ÑƒÑ€Ð³Ð¸Ñ‚Ð°Ñ†Ð¸Ñ  ÑÑ‚ÐµÐ¿ÐµÐ½Ð¸. Ð¤ÑƒÐ½ÐºÑ†Ð¸Ñ Ð²Ñ‹Ð±Ñ€Ð¾ÑÐ°    %.\r\nÐ­ÐšÐ“-- Ñ€Ð¸Ñ‚Ð¼ ÑÐ¸Ð½ÑƒÑÐ¾Ð²Ñ‹Ð¹,Ð§Ð¡Ð¡    Ð² Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ.ÐÐµÐ¿Ð¾Ð»Ð½Ð°Ñ Ð±Ð»Ð¾ÐºÐ°Ð´Ð° Ð¿Ñ€Ð°Ð²Ð¾Ð¹ Ð½Ð¾Ð¶ÐºÐ¸ Ð¿ÑƒÑ‡ÐºÐ° Ð“Ð¸ÑÐ°.', 'ÐŸÑ€Ð¾Ð»Ð°Ð¿Ñ Ð¼Ð¸Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð³Ð¾ ÐºÐ»Ð°Ð¿Ð°Ð½Ð° ÑÐµÑ€Ð´Ñ†Ð° Ñ Ð±ÐµÑÑÐ¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ð½Ð¾Ð¹ Ð´Ð¸ÑÑ„ÑƒÐ½ÐºÑ†Ð¸ÐµÐ¹ Ð»ÐµÐ²Ð¾Ð³Ð¾ Ð¶ÐµÐ»ÑƒÐ´Ð¾Ñ‡ÐºÐ°. ÐÐš 0.										', '', NULL, 'no', '6', 'Ð', 'I'),
(8, '', '', 'ÐŸÑ€Ð¾Ð»Ð°Ð¿Ñ ÐœÐš Ñ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸ÐµÐ¼ Ñ€Ð¸Ñ‚Ð¼Ð°', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'ÐÐ° Ð¿ÐµÑ€ÐµÐ±Ð¾Ð¸ Ð² Ñ€Ð°Ð±Ð¾Ñ‚Ðµ ÑÐµÑ€Ð´Ñ†Ð°.', 'Ð¡Ñ‡Ð¸Ñ‚Ð°ÐµÑ‚ ÑÐµÐ±Ñ Ð±Ð¾Ð»ÑŒÐ½Ñ‹Ð¼ Ñ    . ', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐŸÐ¸Ñ‚Ð°Ð½Ð¸Ðµ   .\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÑÐ¸ÑÑ‚Ð¾Ð»Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ ÑˆÑƒÐ¼ Ð½Ð° Ð²ÐµÑ€Ñ…ÑƒÑˆÐºÐµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚., Ð§Ð¡Ð¡     ÑƒÐ´. Ð² Ð¼Ð¸Ð½.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.', 'Ð­ÐšÐ“ â€“ Ñ€Ð¸Ñ‚Ð¼ ÑÐ¸Ð½ÑƒÑÐ¾Ð²Ñ‹Ð¹, Ð§Ð¡Ð¡  Ð² Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ. Ð­ÐšÐ“ Ð±ÐµÐ· Ð¿Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ð¸.\r\nÐ¥Ð¾Ð»Ñ‚ÐµÑ€Ð¾Ð²ÑÐºÐ¾Ðµ Ð¼Ð¾Ð½Ð¸Ñ‚Ð¾Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ Ð¾Ñ‚   --\r\nÐ­Ñ…Ð¾ÑÐºÐ°Ñ€Ð´Ð¸Ð¾ÑÐºÐ¾Ð¿Ð¸Ñ Ð¾Ñ‚  --', 'ÐŸÑ€Ð¾Ð»Ð°Ð¿Ñ Ð¼Ð¸Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð³Ð¾ ÐºÐ»Ð°Ð¿Ð°Ð½Ð° ÑÐ¾ ÑÑ‚Ð¾Ð¹ÐºÐ¸Ð¼ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸ÐµÐ¼ Ñ€Ð¸Ñ‚Ð¼Ð° ÑÐµÑ€Ð´Ñ†Ð° Ð² Ð²Ð¸Ð´Ðµ 						', '', NULL, 'no', '6', 'Ð', 'I'),
(9, '', '', 'ÐŸÐ‘ÐŸÐÐŸÐ“', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½Ð° ÐºÐ¾Ð»ÑŽÑ‰Ð¸Ðµ Ð±Ð¾Ð»Ð¸ Ð² Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸ ÑÐµÑ€Ð´Ñ†Ð° , Ð¿ÐµÑ€ÐµÐ±Ð¾Ð¸ Ð² Ñ€Ð°Ð±Ð¾Ñ‚Ðµ ÑÐµÑ€Ð´Ñ†Ð° ', 'Ð‘Ð¾Ð»ÐµÐ½ Ñ         ', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐÐ¾Ñ€Ð¼Ð¾ÑÑ‚ÐµÐ½Ð¸Ðº. Ð/Ð” 115/70 Ð¼Ð¼.Ñ€Ñ‚.ÑÑ‚. Ð¢Ð¾Ð½Ñ‹ ÑÐµÑ€Ð´Ñ†Ð° Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ, Ð¿Ñ€Ð¸Ð³Ð»ÑƒÑˆÐµÐ½Ñ‹, Ð§Ð¡Ð¡ 78 Ð² 1â€˜. Ð”Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð²  Ð½ÐµÑ‚. Ð–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹. ÐŸÐµÑ‡ÐµÐ½ÑŒ Ð¿Ð¾ ÐºÑ€Ð°ÑŽ Ñ€ÐµÐ±ÐµÑ€Ð½Ð¾Ð¹ Ð´ÑƒÐ³Ð¸.', 'Ð¡ÑƒÑ‚Ð¾Ñ‡Ð½Ð¾Ðµ Ð¼Ð¾Ð½Ð¸Ñ‚Ð¾Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ Ð­ÐšÐ“ Ð¾Ñ‚ 22.09.2011Ð³. - ÑÐ¸Ð½ÑƒÑÐ¾Ð²Ñ‹Ð¹ Ñ€Ð¸Ñ‚Ð¼, Ð§Ð¡Ð¡ 77 Ð² 1â€˜, Ð¼Ð¸Ð½Ð¸Ð¼Ð°Ð»ÑŒÐ½Ñ‹Ð¹ 52 Ð² 1â€˜, Ð¼Ð°ÐºÑÐ¸Ð¼Ð°Ð»ÑŒÐ½Ñ‹Ð¹ 192 Ð² 1â€˜. ÐŸÑ€Ð¸Ð·Ð½Ð°ÐºÐ¸ Ð¿Ð¾Ð»Ð½Ð¾Ð¹ Ð±Ð»Ð¾ÐºÐ°Ð´Ñ‹ Ð¿Ñ€Ð°Ð²Ð¾Ð¹ Ð½Ð¾Ð¶ÐºÐ¸ Ð¿ÑƒÑ‡ÐºÐ° Ð“Ð¸ÑÐ°. \r\nÐ£Ð—Ð˜ ÑÐµÑ€Ð´Ñ†Ð° â€“ Ñ‚Ð¾Ð»Ñ‰Ð¸Ð½Ð° ÑÑ‚ÐµÐ½Ð¾Ðº Ð¸ Ñ€Ð°Ð·Ð¼ÐµÑ€Ñ‹ Ð¿Ð¾Ð»Ð¾ÑÑ‚ÐµÐ¹ ÑÐµÑ€Ð´Ñ†Ð° Ð² Ð½Ð¾Ñ€Ð¼Ðµ.\r\nÐžÐÐš, ÐžÐÐœ â€“ Ð² Ð½Ð¾Ñ€Ð¼Ðµ.\r\nÐ­ÐšÐ“- ÑÐ¸Ð½ÑƒÑÐ¾Ð²Ñ‹Ð¹ Ñ€Ð¸Ñ‚Ð¼, Ð§Ð¡Ð¡ 72 ÑƒÐ´ Ð² Ð¼Ð¸Ð½. ÐŸÐ¾Ð»Ð½Ð°Ñ Ð±Ð»Ð¾ÐºÐ°Ð´Ð° Ð¿Ñ€Ð°Ð²Ð¾Ð¹ Ð½Ð¾Ð¶ÐºÐ¸ Ð¿ÑƒÑ‡ÐºÐ° Ð“Ð¸ÑÐ°.', 'Ð¡Ñ‚Ð¾Ð¹ÐºÐ¾Ðµ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¾Ð²Ð¾Ð´Ð¸Ð¼Ð¾ÑÑ‚Ð¸ ÑÐµÑ€Ð´Ñ†Ð°:\r\n. ÐŸÐ¾Ð»Ð½Ð°Ñ Ð±Ð»Ð¾ÐºÐ°Ð´Ð° Ð¿Ñ€Ð°Ð²Ð¾Ð¹ Ð½Ð¾Ð¶ÐºÐ¸ Ð¿ÑƒÑ‡ÐºÐ° Ð“Ð¸ÑÐ°. ÐÐšÐ¾.										', '', NULL, 'no', '6', 'Ð', 'I'),
(10, '', '', 'ÐžÐ¶Ð¸Ñ€ÐµÐ½Ð¸Ðµ 3 ÑÑ‚ÐµÐ¿ÐµÐ½Ð¸', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½ÐµÑ‚', 'Ð›Ð¸ÑˆÐ½Ð¸Ð¹ Ð²ÐµÑ Ñ ', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐŸÐ¸Ñ‚Ð°Ð½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‹ÑˆÐµÐ½Ð¾. ÐšÐ¾Ð¶Ð½Ñ‹Ðµ Ð¿Ð¾ÐºÑ€Ð¾Ð²Ñ‹ Ñ‡Ð¸ÑÑ‚Ñ‹Ðµ, Ð¾Ð±Ñ‹Ñ‡Ð½Ð¾Ð¾Ð¹ Ð¾ÐºÑ€Ð°ÑÐºÐ¸.\r\nÐ Ð¾ÑÑ‚          ÑÐ¼.\r\nÐ’ÐµÑ            ÐºÐ³.\r\nÐ˜ÐœÐ¢\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.', '', 'ÐžÐ¶Ð¸Ñ€ÐµÐ½Ð¸Ðµ 3 ÑÑ‚ÐµÐ¿ÐµÐ½Ð¸, Ð°Ð»Ð¸Ð¼ÐµÐ½Ñ‚Ð°Ñ€Ð½Ð¾Ðµ.										', '', NULL, 'no', '6', 'Ð', 'I'),
(11, '', '', 'ÐžÐ¶Ð¸Ñ€ÐµÐ½Ð¸Ðµ', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½ÐµÑ‚', 'Ð‘ÐµÐ· Ð¾ÑÐ¾Ð±ÐµÐ½Ð½Ð¾ÑÑ‚ÐµÐ¹.', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐŸÐ¸Ñ‚Ð°Ð½Ð¸Ðµ Ð¿Ð¾Ð²Ñ‹ÑˆÐµÐ½Ð¾. ÐšÐ¾Ð¶Ð½Ñ‹Ðµ Ð¿Ð¾ÐºÑ€Ð¾Ð²Ñ‹ Ñ‡Ð¸ÑÑ‚Ñ‹Ðµ, Ð¾Ð±Ñ‹Ñ‡Ð½Ð¾Ð¹ Ð¾ÐºÑ€Ð°ÑÐºÐ¸.\r\nÐ Ð¾ÑÑ‚          ÑÐ¼.\r\nÐ’ÐµÑ            ÐºÐ³.\r\nÐ˜ÐœÐ¢\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.', '', 'ÐžÐ¶Ð¸Ñ€ÐµÐ½Ð¸Ðµ 2 ÑÑ‚ÐµÐ¿ÐµÐ½Ð¸, Ð°Ð»Ð¸Ð¼ÐµÐ½Ñ‚Ð°Ñ€Ð½Ð¾Ðµ.								', '', NULL, 'no', '6', 'Ð', 'I'),
(12, '', '', 'ÐÐ¦Ð” Ð¿Ð¾ ÐºÐ°Ñ€Ð´Ð¸Ð°Ð»ÑŒÐ½Ð¾Ð¼Ñƒ Ñ‚Ð¸Ð¿Ñƒ', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½Ð° ÐºÐ¾Ð»ÑŽÑ‰Ð¸Ðµ Ð±Ð¾Ð»Ð¸ Ð² Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸ ÑÐµÑ€Ð´Ñ†Ð°.', 'Ð‘ÐµÐ· Ð¾ÑÐ¾Ð±ÐµÐ½Ð½Ð¾ÑÑ‚ÐµÐ¹.', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. \r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚. Ð§Ð¡Ð¡    ÑƒÐ´Ð°Ñ€Ð¾Ð² Ð² Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ.', 'Ð­ÐšÐ“ Ð¾Ñ‚     : Ñ€Ð¸Ñ‚Ð¼ ÑÐ¸Ð½ÑƒÑÐ¾Ð²Ñ‹Ð¹.\r\nÐ¥Ð¾Ð»Ñ‚ÐµÑ€Ð¾Ð²ÑÐºÐ¾Ðµ Ð¼Ð¾Ð½Ð¸Ñ‚Ð¾Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ Ð¾Ñ‚ \r\nÐ£Ð—Ð˜ ÑÐµÑ€Ð´Ñ†Ð° Ð¾Ñ‚  --Ð¿Ð¾Ð»Ð¾ÑÑ‚Ð¸ ÑÐµÑ€Ð´Ñ†Ð° Ð½Ðµ Ñ€Ð°ÑÑˆÐ¸Ñ€ÐµÐ½Ñ‹, ÑÑ‚ÐµÐ½ÐºÐ¸ Ð½Ðµ ÑƒÑ‚Ð¾Ð»Ñ‰ÐµÐ½Ñ‹. ÐšÐ»Ð°Ð¿Ð°Ð½Ñ‹ Ð¸Ð½Ñ‚Ð°ÐºÑ‚Ð½Ñ‹.', 'ÐÐµÐ¹Ñ€Ð¾Ñ†Ð¸Ñ€ÐºÑƒÐ»ÑÑ‚Ð¾Ñ€Ð½Ð°Ñ Ð°ÑÑ‚ÐµÐ½Ð¸Ñ Ð¿Ð¾ ÐºÐ°Ñ€Ð´Ð¸Ð°Ð»ÑŒÐ½Ð¾Ð¼Ñƒ Ñ‚Ð¸Ð¿Ñƒ ÑÐ¾ ÑÑ‚Ð¾Ð¹ÐºÐ¸Ð¼Ð¸ ÑƒÐ¼ÐµÑ€ÐµÐ½Ð½Ð¾ Ð²Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð½Ñ‹Ð¼Ð¸ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸ÑÐ¼Ð¸. ÐÐšÐ¾.								', '', NULL, 'no', '6', 'Ð', 'I'),
(13, '', '', 'ÐÐ¦Ð” Ð¿Ð¾ Ð³Ð¸Ð¿ÐµÑ€Ñ‚Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¾Ð¼Ñƒ Ñ‚Ð¸Ð¿Ñƒ', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'ÐÐ° Ñ‡Ð°ÑÑ‚Ñ‹Ðµ Ð³Ð¾Ð»Ð¾Ð²Ð½Ñ‹Ðµ Ð±Ð¾Ð»Ð¸.', 'Ð‘ÐµÐ· Ð¾ÑÐ¾Ð±ÐµÐ½Ð½Ð¾ÑÑ‚ÐµÐ¹.', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. \r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚. Ð§Ð¡Ð¡    ÑƒÐ´Ð°Ñ€Ð¾Ð² Ð² Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.', 'Ð”Ð¸Ð½Ð°Ð¼Ð¸ÐºÐ° Ð°Ñ€Ñ‚ÐµÑ€Ð¸Ð°Ð»ÑŒÐ½Ð¾Ð³Ð¾ Ð´Ð°Ð²Ð»ÐµÐ½Ð¸Ñ: \r\nÐ¡ÐœÐÐ” Ð¾Ñ‚  --\r\nÐ³Ð»Ð°Ð·Ð½Ð¾Ðµ Ð´Ð½Ð¾--', 'ÐÐµÐ¹Ñ€Ð¾Ñ†Ð¸Ñ€ÐºÑƒÐ»ÑÑ‚Ð¾Ñ€Ð½Ð°Ñ Ð°ÑÑ‚ÐµÐ½Ð¸Ñ Ð¿Ð¾ Ð³Ð¸Ð¿ÐµÑ€Ñ‚Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¾Ð¼Ñƒ Ñ‚Ð¸Ð¿Ñƒ ÑÐ¾ ÑÑ‚Ð¾Ð¹ÐºÐ¸Ð¼Ð¸ ÑƒÐ¼ÐµÑ€ÐµÐ½Ð½Ð¾ Ð²Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð½Ñ‹Ð¼Ð¸ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸ÑÐ¼Ð¸. ÐÐšÐ¾.												', '', NULL, 'no', '6', 'Ð', 'I'),
(14, '', '', 'ÐÐµÐ´Ð¾ÑÑ‚Ð°Ñ‚Ð¾Ñ‡Ð½Ð¾ÑÑ‚ÑŒ Ð¿Ð¸Ñ‚Ð°Ð½Ð¸Ñ', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½ÐµÑ‚', 'Ð‘ÐµÐ· Ð¾ÑÐ¾Ð±ÐµÐ½Ð½Ð¾ÑÑ‚ÐµÐ¹.', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐŸÐ¸Ñ‚Ð°Ð½Ð¸Ðµ ÑÐ½Ð¸Ð¶ÐµÐ½Ð¾.\r\nÐ Ð¾ÑÑ‚          ÑÐ¼.\r\nÐ’ÐµÑ            ÐºÐ³.\r\nÐ˜ÐœÐ¢\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.', 'Ð¤Ð¸Ð·Ð¸Ñ‡ÐµÑÐºÐ°Ñ Ñ€Ð°Ð±Ð¾Ñ‚Ð¾ÑÐ¿Ð¾ÑÐ¾Ð±Ð½Ð¾ÑÑ‚ÑŒ:\r\nÐ¾ÐºÑ€ÑƒÐ¶Ð½Ð¾ÑÑ‚ÑŒ Ð¿Ñ€Ð°Ð²Ð¾Ð³Ð¾ Ð¿Ð»ÐµÑ‡Ð° Ð² ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ñ‚Ñ€ÐµÑ‚Ð¸--  ÑÐ¼,\r\nÐ¿Ñ€Ð¸ÑÐµÐ´Ð°Ð½Ð¸Ñ--   Ñ€Ð°Ð· Ð·Ð° 60 ÑÐµÐºÑƒÐ½Ð´,\r\nÐ¾Ñ‚Ð¶Ð¸Ð¼Ð°Ð½Ð¸Ñ--    Ñ€Ð°Ð· Ð·Ð° 30 ÑÐµÐºÑƒÐ½Ð´.\r\nÐ’ÐµÐ»Ð¾ÑÑ€Ð³Ð¾Ð¼ÐµÑ‚Ñ€Ð¸Ñ Ð¾Ñ‚  :\r\nÐ¤Ð“Ð”Ð¡ Ð¾Ñ‚     Ð³.: Ñ…Ñ€Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð³Ð°ÑÑ‚Ñ€Ð¾Ð´ÑƒÐ¾Ð´ÐµÐ½Ð¸Ñ‚.\r\nÐ£Ð—Ð˜ Ð¾Ñ€Ð³Ð°Ð½Ð¾Ð² Ð±Ñ€ÑŽÑˆÐ½Ð¾Ð¹ Ð¿Ð¾Ð»Ð¾ÑÑ‚Ð¸ Ð±ÐµÐ· Ð¿Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ð¸.\r\nÐ£Ð—Ð˜ Ñ‰Ð¸Ñ‚Ð¾Ð²Ð¸Ð´Ð½Ð¾Ð¹ Ð¶ÐµÐ»ÐµÐ·Ñ‹ Ð±ÐµÐ· Ð¿Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ð¸.\r\nÐžÐÐš, ÐžÐÐœ Ð±ÐµÐ· Ð¿Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ð¸.\r\nÐšÐ°Ð» Ð½Ð° ÑÐ¹Ñ†Ð° Ð³Ð»Ð¸ÑÑ‚Ð¾Ð² - Ð¾Ñ‚Ñ€Ð¸Ñ†Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð¾.', 'ÐÐµÐ´Ð¾ÑÑ‚Ð°Ñ‚Ð¾Ñ‡Ð½Ð¾ÑÑ‚ÑŒ Ð¿Ð¸Ñ‚Ð°Ð½Ð¸Ñ.		', '', NULL, 'no', '6', 'Ð', 'I'),
(15, '', '', 'Ð“Ð¸Ð¿Ð¾Ñ‚Ð°Ð»Ð°Ð¼Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ ÑÐ¸Ð½Ð´Ñ€Ð¾Ð¼', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½Ð° Ð¾Ð´Ñ‹ÑˆÐºÑƒ Ð¿Ñ€Ð¸ Ð½ÐµÐ±Ð¾Ð»ÑŒÑˆÐ¾Ð¹ Ñ„Ð¸Ð·Ð¸Ñ‡ÐµÑÐºÐ¾Ð¹ Ð½Ð°Ð³Ñ€ÑƒÐ·ÐºÐµ, ÑÐ»Ð°Ð±Ð¾ÑÑ‚ÑŒ, Ð³Ð¾Ð»Ð¾Ð²Ð½Ñ‹Ðµ Ð±Ð¾Ð»Ð¸.', 'Ð’ÐµÑ Ð½Ð°Ñ‡Ð°Ð» ÑƒÐ²ÐµÐ»Ð¸Ñ‡Ð¸Ð²Ð°Ñ‚ÑŒÑÑ         Ð½Ð°Ð·Ð°Ð´. ÐÐ°Ð±Ð»ÑŽÐ´Ð°Ð»ÑÑ Ñƒ ÑÐ½Ð´Ð¾ÐºÑ€Ð¸Ð½Ð¾Ð»Ð¾Ð³Ð°. \r\nÐ”Ð¸Ð½Ð°Ð¼Ð¸ÐºÐ° ÐÐ” Ð² Ð°Ð¼Ð±ÑƒÐ»Ð°Ñ‚Ð¾Ñ€Ð½Ð¾Ð¹ ÐºÐ°Ñ€Ñ‚Ðµ:', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ.\r\nÐŸÐ¾Ð²Ñ‹ÑˆÐµÐ½Ð½Ð¾Ðµ Ð¿Ð¸Ñ‚Ð°Ð½Ð¸Ðµ. Ð Ð¾ÑÑ‚     ÑÐ¼, Ð²ÐµÑ      ÐºÐ³,  Ð˜ÐœÐ¢  . ÐÐ° ÐºÐ¾Ð¶Ðµ Ð±Ð¾ÐºÐ¾Ð²Ñ‹Ñ… Ð¿Ð¾Ð²ÐµÑ€Ñ…Ð½Ð¾ÑÑ‚ÐµÐ¹ Ð¶Ð¸Ð²Ð¾Ñ‚Ð°, Ð²Ð½ÑƒÑ‚Ñ€ÐµÐ½Ð½Ð¸Ñ… Ð¿Ð¾Ð²ÐµÑ€Ñ…Ð½Ð¾ÑÑ‚ÑÑ… Ð¿Ð»ÐµÑ‡ÐµÐ¹ Ð±Ð»ÐµÐ´Ð½Ð¾-Ñ€Ð¾Ð·Ð¾Ð²Ñ‹Ðµ \r\nÑÑ‚Ñ€Ð¸Ð¸ ÑˆÐ¸Ñ€Ð¸Ð½Ð¾Ð¹ 5-7Ð¼Ð¼, Ð´Ð»Ð¸Ð½Ð½Ð¾Ð¹ 10-12ÑÐ¼. Ð”Ð²ÑƒÑÑ‚Ð¾Ñ€Ð¾Ð½Ð½ÑÑ Ð³Ð¸Ð½ÐµÐºÐ¾Ð¼Ð°ÑÑ‚Ð¸Ñ.\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ â€“ Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ. Ð¯ÑÐ½Ñ‹Ðµ. Ð§Ð¡Ð¡    ÑƒÐ´. Ð² Ð¼Ð¸Ð½. ÐÐ”        Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹. ÐŸÐµÑ‡ÐµÐ½ÑŒ Ð¿Ð¾ ÐºÑ€Ð°ÑŽ Ñ€ÐµÐ±ÐµÑ€Ð½Ð¾Ð¹ Ð´ÑƒÐ³Ð¸.', 'Ð¡ÑƒÑ‚Ð¾Ñ‡Ð½Ð¾Ðµ Ð¼Ð¾Ð½Ð¸Ñ‚Ð¾Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ ÐÐ”:\r\nÐ“Ð¾Ñ€Ð¼Ð¾Ð½Ñ‹:\r\nÐŸÑ€Ð¾Ð»Ð°ÐºÑ‚Ð¸Ð½             ,ÐºÐ¾Ñ€Ñ‚Ð¸Ð·Ð¾Ð»       , Ð¢Ð¢Ð“       , Ð¸Ð½ÑÑƒÐ»Ð¸Ð½    .\r\nÐ£Ð—Ð˜ Ð³Ñ€ÑƒÐ´Ð½Ñ‹Ñ… Ð¶ÐµÐ»ÐµÐ·: ÑƒÐ²ÐµÐ»Ð¸Ñ‡ÐµÐ½Ð¸Ðµ Ð³Ñ€ÑƒÐ´Ð½Ñ‹Ñ… Ð¶ÐµÐ»ÐµÐ· Ð·Ð° ÑÑ‡ÐµÑ‚ Ð¶Ð¸Ñ€Ð¾Ð²Ð¾Ð¹ Ñ‚ÐºÐ°Ð½Ð¸.\r\nÐ¢ÐµÑÑ‚ Ñ‚Ð¾Ð»ÐµÑ€Ð°Ð½Ñ‚Ð½Ð¾ÑÑ‚Ð¸ Ðº Ð³Ð»ÑŽÐºÐ¾Ð·Ðµ:\r\nÐ‘Ð¸Ð¾Ñ…Ð¸Ð¼Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð°Ð½Ð°Ð»Ð¸Ð· ÐºÑ€Ð¾Ð²Ð¸:', 'Ð“Ð¸Ð¿Ð¾Ñ‚Ð°Ð»Ð°Ð¼Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ ÑÐ¸Ð½Ð´Ñ€Ð¾Ð¼, Ð½ÐµÐ¹Ñ€Ð¾ÑÐ½Ð´Ð¾ÐºÑ€Ð¸Ð½Ð½Ð°Ñ Ñ„Ð¾Ñ€Ð¼Ð°. ÐžÐ¶Ð¸Ñ€ÐµÐ½Ð¸Ðµ        ÑÑ‚ÐµÐ¿ÐµÐ½Ð¸.														', '', NULL, 'no', '6', 'Ð', 'I'),
(16, '', '', 'Ð“Ð¸Ð¿ÐµÑ€Ñ‚Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ°Ñ Ð±Ð¾Ð»ÐµÐ·Ð½ÑŒ 1 ÑÑ‚Ð°Ð´Ð¸Ð¸', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½Ð° Ð³Ð¾Ð»Ð¾Ð²Ð½Ñ‹Ðµ Ð±Ð¾Ð»Ð¸ Ð²                   , Ð½Ð¾ÑÐ¾Ð²Ñ‹Ðµ ÐºÑ€Ð¾Ð²Ð¾Ñ‚ÐµÑ‡ÐµÐ½Ð¸Ñ.', 'ÐŸÐ¾ Ð°Ð¼Ð±ÑƒÐ»Ð°Ñ‚Ð¾Ñ€Ð½Ð¾Ð¹ ÐºÐ°Ñ€Ñ‚Ðµ â€“ Ð½Ð°Ð±Ð»ÑŽÐ´Ð°ÐµÑ‚ÑÑ     Ð»ÐµÑ‚.\r\nÐ”Ð¸Ð½Ð°Ð¼Ð¸ÐºÐ° ÐÐ” Ð² ÐºÐ°Ñ€Ñ‚Ðµ: ', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ .                    Ð¿Ð¸Ñ‚Ð°Ð½Ð¸Ñ. ÐÐ”             Ð¼Ð¼.Ñ€Ñ‚.ÑÑ‚. Ð¢Ð¾Ð½Ñ‹ ÑÐµÑ€Ð´Ñ†Ð° Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ, Ñ‡ÑÑ       Ð² Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ, ÑÐ¸ÑÑ‚Ð¾Ð»Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ ÑˆÑƒÐ¼ Ð½Ð° Ð²ÐµÑ€Ñ…ÑƒÑˆÐºÐµ. Ð”Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð² Ð»ÐµÐ³ÐºÐ¸Ñ… Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ. Ð–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹,  Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹, Ð¿ÐµÑ‡ÐµÐ½ÑŒ Ð¿Ð¾ ÐºÑ€Ð°ÑŽ Ñ€ÐµÐ±ÐµÑ€Ð½Ð¾Ð¹ Ð´ÑƒÐ³Ð¸.', 'Ð­Ð¥ÐžÐšÐ“ Ð¾Ñ‚            . Ð—Ð°ÐºÐ»ÑŽÑ‡ÐµÐ½Ð¸Ðµ: Ð¿Ð¾Ð»Ð¾ÑÑ‚Ð¸ ÑÐµÑ€Ð´Ñ†Ð° Ð½Ðµ Ñ€Ð°ÑÑˆÐ¸Ñ€ÐµÐ½Ñ‹, ÑÑ‚ÐµÐ½ÐºÐ¸ Ð½Ðµ ÑƒÑ‚Ð¾Ð»Ñ‰ÐµÐ½Ñ‹. Ð”Ð¸Ð°ÑÑ‚Ð¾Ð»Ð¸Ñ‡ÐµÑÐºÐ°Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ñ Ð»ÐµÐ²Ð¾Ð³Ð¾ Ð¶ÐµÐ»ÑƒÐ´Ð¾Ñ‡ÐºÐ° Ð½Ðµ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð°.\r\nÐ¡ÑƒÑ‚Ð¾Ñ‡Ð½Ð¾Ðµ Ð¼Ð¾Ð½Ð¸Ñ‚Ð¾Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð¸Ðµ ÐÐ”  Ð¾Ñ‚    --Ð¼Ð°ÐºÑÐ¸Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ ÐÐ” Ð´ÐµÐ½ÑŒ Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐœÐ°ÐºÑÐ¸Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ ÐÐ” Ð½Ð¾Ñ‡ÑŒ  Ð¼Ð¼.Ñ€Ñ‚.ÑÑ‚.\r\n Ð”Ð½ÐµÐ¼ Ð¸Ð½Ð´ÐµÐºÑ Ð²Ñ€ÐµÐ¼ÐµÐ½Ð¸ Ð¡ÐÐ”  , Ð”ÐÐ”  , Ð½Ð¾Ñ‡ÑŒÑŽ Ð˜Ð’ Ð¡ÐÐ”  , Ð˜Ð’ Ð”ÐÐ”   \r\nÐ“Ð»Ð°Ð·Ð½Ð¾Ðµ Ð´Ð½Ð¾:Ð´Ð¸ÑÐºÐ¸ Ð·Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ñ‹Ñ… Ð½ÐµÑ€Ð²Ð¾Ð² Ð±Ð»ÐµÐ´Ð½Ð¾-Ñ€Ð¾Ð·Ð¾Ð²Ñ‹Ðµ, ÐºÐ¾Ð½Ñ‚ÑƒÑ€Ñ‹ Ñ‡ÐµÑ‚ÐºÐ¸Ðµ. ÐÑ€Ñ‚ÐµÑ€Ð¸Ð¸ ÑÑƒÐ¶ÐµÐ½Ñ‹, Ð¿Ñ€ÑÐ¼Ñ‹Ðµ, Ð²ÐµÐ½Ñ‹ Ñ€Ð°ÑÑˆÐ¸Ñ€ÐµÐ½Ñ‹, Ð¿Ð¾Ð»Ð½Ð¾ÐºÑ€Ð¾Ð²Ð½Ñ‹Ðµ, Ð¸Ð·Ð²Ð¸Ñ‚Ñ‹Ðµ. ÐÑ€Ñ‚ÐµÑ€Ð¸Ð¸\\Ð²ÐµÐ½Ñ‹--    . ÐŸÐµÑ€Ð¸Ñ„ÐµÑ€Ð¸Ñ Ð±ÐµÐ· Ð¾ÑÐ¾Ð±ÐµÐ½Ð½Ð¾ÑÑ‚ÐµÐ¹.\r\nÐ’ÐµÐ»Ð¾ÑÑ€Ð³Ð¾Ð¼ÐµÑ‚Ñ€Ð¸Ñ Ð¾Ñ‚ 03.11.2011Ð³. Ð—Ð°ÐºÐ»ÑŽÑ‡ÐµÐ½Ð¸Ðµ: Ñ‚Ð¾Ð»ÐµÑ€Ð°Ð½Ñ‚Ð½Ð¾ÑÑ‚ÑŒ Ðº Ð½Ð°Ð³Ñ€ÑƒÐ·ÐºÐµ Ð²Ñ‹ÑÐ¾ÐºÐ°Ñ. Ð ÐµÐ°ÐºÑ†Ð¸Ñ Ð³ÐµÐ¼Ð¾Ð´Ð¸Ð½Ð°Ð¼Ð¸ÐºÐ¸ Ð½Ð° Ð½Ð°Ð³Ñ€ÑƒÐ·ÐºÑƒ Ð¿Ð¾ Ð³Ð¸Ð¿ÐµÑ€Ñ‚Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¾Ð¼Ñƒ Ñ‚Ð¸Ð¿Ñƒ.\r\nÐžÐ±Ñ‰Ð¸Ð¹ Ð°Ð½Ð°Ð»Ð¸Ð· Ð¼Ð¾Ñ‡Ð¸-- ÑƒÐ´ÐµÐ»ÑŒÐ½Ñ‹Ð¹ Ð²ÐµÑ  , Ð±ÐµÐ»Ð¾Ðº  , Ð»ÐµÐ¹ÐºÐ¾Ñ†Ð¸Ñ‚Ñ‹ Ð² Ð¿Ð¾Ð»Ðµ Ð·Ñ€ÐµÐ½Ð¸Ñ , ÑÑ€Ð¸Ñ‚Ñ€Ð¾Ñ†Ð¸Ñ‚Ñ‹  Ð² Ð¿Ð¾Ð»Ðµ Ð·Ñ€ÐµÐ½Ð¸Ñ.\r\nÐ‘Ð¸Ð¾Ñ…Ð¸Ð¼Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð°Ð½Ð°Ð»Ð¸Ð· ÐºÑ€Ð¾Ð²Ð¸: Ñ…Ð¾Ð»ÐµÑÑ‚ÐµÑ€Ð¸Ð½  Ð¼ÐºÐ¼Ð¾Ð»ÑŒ\\Ð», Ñ‚Ñ€Ð¸Ð³Ð»Ð¸Ñ†ÐµÑ€Ð¸Ð´Ñ‹  , Ð±Ð¸Ð»Ð¸Ñ€ÑƒÐ±Ð¸Ð½ Ð¾Ð±Ñ‰Ð¸Ð¹  Ð¼ÐºÐ¼Ð¾Ð»ÑŒ\\Ð», Ð¿Ñ€ÑÐ¼Ð¾Ð¹  Ð¼ÐºÐ¼Ð¾Ð»ÑŒ\\Ð» , Ð½ÐµÐ¿Ñ€ÑÐ¼Ð¾Ð¹  Ð¼ÐºÐ¼Ð¾Ð»ÑŒ\\Ð», ÐÐ›Ð¢ , ÐÐ¡Ð¢ \r\nÑÑƒÑ‚Ð¾Ñ‡Ð½Ð°Ñ Ð¿Ñ€Ð¾Ñ‚ÐµÐ¸Ð½ÑƒÑ€Ð¸Ñ-- ', 'Ð“Ð¸Ð¿ÐµÑ€Ñ‚Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ°Ñ Ð±Ð¾Ð»ÐµÐ·Ð½ÑŒ 1 ÑÑ‚Ð°Ð´Ð¸Ð¸. ÐÐš 0.																								', '', NULL, 'no', '6', 'Ð', 'I'),
(17, '', '', 'Ð’ÐŸÐ¡', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'ÐžÐ´Ñ‹ÑˆÐºÐ° Ð¿Ñ€Ð¸ Ñ„Ð¸Ð·Ð¸Ñ‡ÐµÑÐºÐ¾Ð¹ Ð½Ð°Ð³Ñ€ÑƒÐ·ÐºÐµ.', 'Ð‘Ð¾Ð»ÐµÐ½ Ñ Ð´ÐµÑ‚ÑÑ‚Ð²Ð°.\r\nÐžÐ±ÑÐ»ÐµÐ´Ð¾Ð²Ð°Ð½ Ð²    ', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ.\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ,      , ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚. ,Ð§Ð¡Ð¡  Ð² Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹. ', 'Ð­Ñ…Ð¾ÐºÐ°Ñ€Ð´Ð¸Ð¾ÑÐºÐ¾Ð¿Ð¸Ñ  Ð¾Ñ‚  ', 'Ð’Ñ€Ð¾Ð¶Ð´ÐµÐ½Ð½Ñ‹Ð¹ Ð¿Ð¾Ñ€Ð¾Ðº ÑÐµÑ€Ð´Ñ†Ð°: 										', '', NULL, 'no', '6', 'Ð', 'I'),
(18, '', '', 'Ð‘Ñ€Ð¾Ð½Ñ…Ð¸Ð°Ð»ÑŒÐ½Ð°Ñ Ð°ÑÑ‚Ð¼Ð°', '', 'obsledovanie', '', 'Ð‘Ð°Ð³Ð°Ð½ÑÐºÐ¸Ð¹', 'Ð²ÐµÑÐ½Ð° 2013Ð³.', 'Ð½Ð° ÐºÐ°ÑˆÐµÐ»ÑŒ, Ð¿Ñ€Ð¸ÑÑ‚ÑƒÐ¿Ñ‹ Ð·Ð°Ñ‚Ñ€ÑƒÐ´Ð½ÐµÐ½Ð½Ð¾Ð³Ð¾ Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ñ.', 'Ð¡Ð¾ÑÑ‚Ð¾Ð¸Ñ‚ Ð½Ð° â€œÐ”â€ ÑƒÑ‡ÐµÑ‚Ðµ Ð¿Ð¾ Ð°Ð¼Ð±ÑƒÐ»Ð°Ñ‚Ð¾Ñ€Ð½Ð¾Ð¹ ÐºÐ°Ñ€Ñ‚Ðµ.', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ.  Ð’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚. Ð§Ð”Ð” 17 Ð² Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ. Ð¡ÐµÑ€Ð´Ñ†Ðµ - Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ, ÑÑÐ½Ñ‹Ðµ, Ð§Ð¡Ð¡ 72 ÑƒÐ´Ð°Ñ€Ð° Ð² Ð¼Ð¸Ð½ÑƒÑ‚Ñƒ.\r\nÐÐ”     Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.', 'Ð¡Ð¿Ð¸Ñ€Ð¾Ð³Ñ€Ð°Ñ„Ð¸Ñ Ð¾Ñ‚      :   Ð²ÐµÐ½Ñ‚Ð¸Ð»ÑÑ†Ð¸Ð¾Ð½Ð½Ð°Ñ ÑÐ¿Ð¾ÑÐ¾Ð±Ð½Ð¾ÑÑ‚ÑŒ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð½Ðµ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð°. ÐŸÑ€Ð¾Ð±Ð° Ñ Ð±Ñ€Ð¾Ð½Ñ…Ð¾Ð»Ð¸Ñ‚Ð¸ÐºÐ¾Ð¼ Ð¿Ð¾Ð»Ð¾Ð¶Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ.\r\nÐÐ»Ð»ÐµÑ€Ð³Ð¾Ð¿Ñ€Ð¾Ð±Ñ‹ Ð¾Ñ‚    : Ð²Ñ‹ÑÐ²Ð»ÐµÐ½Ð° ÑÐµÐ½ÑÐ¸Ð±Ð¸Ð»Ð¸Ð·Ð°Ñ†Ð¸Ñ Ðº \r\nÐžÐ±Ñ‰Ð¸Ð¹ Ð°Ð½Ð°Ð»Ð¸Ð· ÐºÑ€Ð¾Ð²Ð¸:\r\nÐ¤Ð›Ð“ Ð¾Ñ‚', 'Ð‘Ñ€Ð¾Ð½Ñ…Ð¸Ð°Ð»ÑŒÐ½Ð°Ñ Ð°ÑÑ‚Ð¼Ð°        , Ð»ÐµÐ³ÐºÐ¾Ð¹ ÑÑ‚ÐµÐ¿ÐµÐ½Ð¸ Ñ‚ÑÐ¶ÐµÑÑ‚Ð¸. Ð”ÐÐ¾.		', '', NULL, 'no', '6', 'Ð', 'I'),
(20, NULL, '', 'Ð¿ÑÐ¾Ñ€Ð¸Ð°Ð·', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð½Ð° Ð²Ñ‹ÑÑ‹Ð¿Ð°Ð½Ð¸Ñ , Ð½ÐµÐ·Ð½Ð°Ñ‡Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ñ‹Ð¹ Ð·ÑƒÐ´ Ð½Ð° ÐºÐ¾Ð¶Ðµ Ñ‚ÑƒÐ»Ð¾Ð²Ð¸Ñ‰Ð° , ÐºÐ¾Ð½ÐµÑ‡Ð½Ð¾ÑÑ‚ÐµÐ¹.', 'Ð¡Ð¾ ÑÐ»Ð¾Ð² Ð±Ð¾Ð»ÐµÐ½ Ð¾ÐºÐ¾Ð»Ð¾    Ð»ÐµÑ‚.\r\nÐÐ°Ð±Ð»ÑŽÐ´Ð°Ð»ÑÑ Ð¸ Ð»ÐµÑ‡Ð¸Ð»ÑÑ Ñƒ Ð´ÐµÑ€Ð¼Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð°.\r\nÐžÐ±Ð¾ÑÑ‚Ñ€ÐµÐ½Ð¸Ñ Ð±Ð¾Ð»ÐµÐµ 2 Ñ€Ð°Ð· Ð² Ð³Ð¾Ð´.', 'ÐÐ° ÐºÐ¾Ð¶Ðµ Ð»Ð¾ÐºÑ‚ÐµÐ²Ñ‹Ñ… , ÐºÐ¾Ð»ÐµÐ½Ð½Ñ‹Ñ… ÑÐ³Ð¸Ð±Ð¾Ð² , Ð²Ð¾Ð»Ð¾ÑÐ¸ÑÑ‚Ð¾Ð¹ Ñ‡Ð°ÑÑ‚Ð¸ Ð³Ð¾Ð»Ð¾Ð²Ñ‹ - Ð¿Ð°Ð¿ÑƒÐ»Ñ‹ , Ð±Ð»ÑÑˆÐºÐ¸ Ð¸Ð½Ñ„Ð¸Ð»ÑŒÑ‚Ñ€Ð°Ñ†Ð¸Ð¸ Ñ ÑÐµÑ€ÐµÐ±Ñ€Ð¸ÑÑ‚Ñ‹Ð¼Ð¸ Ñ‡ÐµÑˆÑƒÐ¹ÐºÐ°Ð¼Ð¸\r\nÐ¢Ñ€Ð¸Ð°Ð´Ð° ÐÑƒÑÐ¿Ð¸Ñ†Ð° Ð¿Ð¾Ð»Ð¾Ð¶Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð°.', '', 'Ñ€Ð°ÑÐ¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÐµÐ½Ð½Ñ‹Ð¹ Ð²ÑƒÐ»ÑŒÐ³Ð°Ñ€Ð½Ñ‹Ð¹ Ð¿ÑÐ¾Ñ€Ð¸Ð°Ð·, Ð¿Ñ€Ð¾Ð³Ñ€ÐµÑÑÐ¸Ð²Ð½Ð¾ - ÑÑ‚Ð°Ñ†Ð¸Ð¾Ð½Ð°Ñ€Ð½Ð°Ñ ÑÑ‚Ð°Ð´Ð¸Ñ.		', '62-Ð±', NULL, 'no', '11', 'Ð’', NULL),
(21, NULL, '', 'ÑÐºÐ·ÐµÐ¼Ð°', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð½Ð° Ð·ÑƒÐ´ ,Ð²Ñ‹ÑÑ‹Ð¿Ð°Ð½Ð¸Ñ Ð½Ð° ÐºÐ¾Ð¶Ðµ', 'Ð¡Ð¾ ÑÐ»Ð¾Ð² , Ð±Ð¾Ð»ÐµÐ½ Ð¾ÐºÐ¾Ð»Ð¾    Ð»ÐµÑ‚.\r\nÐÐ°Ð±Ð»ÑŽÐ´Ð°Ð»ÑÑ Ð¸ Ð»ÐµÑ‡Ð¸Ð»ÑÑ Ñƒ Ð´ÐµÑ€Ð¼Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð°.\r\nÐžÐ±Ð¾ÑÑ‚Ñ€ÐµÐ½Ð¸Ñ Ð±Ð¾Ð»ÐµÐµ 2 Ñ€Ð°Ð· Ð² Ð³Ð¾Ð´.\r\n', 'ÐÐ° ÐºÐ¾Ð¶Ðµ ÐºÐ¸ÑÑ‚ÐµÐ¹ ( Ñ‚Ñ‹Ð»ÑŒÐ½Ð°Ñ Ð¿Ð¾Ð²ÐµÑ€Ñ…Ð½Ð¾ÑÑ‚ÑŒ , Ð±Ð¾ÐºÐ¾Ð²Ð°Ñ Ð¿Ð¾Ð²ÐµÑ€Ñ…Ð½Ð¾ÑÑ‚ÑŒ Ñ„Ð°Ð»Ð°Ð½Ð³ ), Ð³Ð¾Ð»ÐµÐ½ÐµÐ¹ (Ñ‚Ñ‹Ð»ÑŒÐ½Ð°Ñ Ð¿Ð¾Ð²ÐµÑ€Ñ…Ð½Ð¾ÑÑ‚ÑŒ)-Ð½ÐµÑ‡ÐµÑ‚ÐºÐ¸Ðµ Ð¾Ñ‡Ð°Ð³Ð¾ ÑÑ€Ð¸Ñ‚ÐµÐ¼Ñ‹, Ñ Ð¸Ð½Ñ„Ð¸Ð»ÑŒÑ‚Ñ€Ð°Ñ†Ð¸ÐµÐ¹ , ÑˆÐµÐ»ÑƒÑˆÐµÐ½Ð¸Ð½Ð¼, Ð¿Ð°Ð¿ÑƒÐ»Ð°Ð¼Ð¸ , Ð²ÐµÐ·Ð¸ÐºÑƒÐ»Ð°Ð¼Ð¸ , Ð¼Ð¾ÐºÐ½ÑƒÑ‚Ð¸ÐµÐ¼, ÐºÐ¾Ñ€Ð¾Ñ‡ÐºÐ°Ð¼Ð¸ ÑÐµÑ€Ð¾Ð·Ð½Ð¾-Ð³ÐµÐ¼Ð¾Ñ€Ñ€Ð°Ð³Ð¸Ñ‡ÐµÑÐºÐ¾Ð³Ð¾ Ñ…Ð°Ñ€Ð°ÐºÑ‚ÐµÑ€Ð°.\r\nÐ”ÐµÑ€Ð¼Ð¾Ð³Ñ€Ð°Ñ„Ð¸Ð·Ð¼ Ð² Ð¾Ñ‡Ð°Ð³Ðµ ÑÐ¼ÐµÑˆÐ°Ð½Ð½Ñ‹Ð¹ ÑÑ‚Ð¾Ð¹ÐºÐ¸Ð¹.', '', 'Ñ€Ð°ÑÐ¿Ñ€Ð¾ÑÑ‚Ñ€Ð°Ð½ÐµÐ½Ð½Ð°Ñ Ñ…Ñ€Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ°Ñ ÑÐºÐ·ÐµÐ¼Ð°, Ð¿Ð¾Ð´Ð¾ÑÑ‚Ñ€Ð¾Ðµ Ñ‚ÐµÑ‡ÐµÐ½Ð¸Ðµ.		', '62-Ð±', NULL, 'no', '11', 'Ð’', NULL),
(22, NULL, '', 'Ð°Ñ‚Ð¾Ð¿Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð´ÐµÑ€Ð¼Ð°Ñ‚Ð¸Ñ‚', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð½Ð° Ð·ÑƒÐ´ , Ð²Ñ‹ÑÑ‹Ð¿Ð°Ð½Ð¸Ñ Ð½Ð° ÐºÐ¾Ð¶Ðµ', 'Ð¡Ð¾ ÑÐ»Ð¾Ð² , Ð±Ð¾Ð»ÐµÐ½ Ð¾ÐºÐ¾Ð»Ð¾    Ð»ÐµÑ‚.\r\nÐÐ°Ð±Ð»ÑŽÐ´Ð°Ð»ÑÑ Ð¸ Ð»ÐµÑ‡Ð¸Ð»ÑÑ Ñƒ Ð´ÐµÑ€Ð¼Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð°.\r\nÐžÐ±Ð¾ÑÑ‚Ñ€ÐµÐ½Ð¸Ñ Ð±Ð¾Ð»ÐµÐµ 2 Ñ€Ð°Ð· Ð² Ð³Ð¾Ð´.', 'ÐÐ° ÐºÐ¾Ð¶Ðµ Ð² Ð»Ð¾ÐºÑ‚ÐµÐ²Ñ‹Ñ… Ð¸ ÐºÐ¾Ð»ÐµÐ½Ð½Ñ‹Ñ… ÑÐ³Ð¸Ð±Ð¾Ð² ÑÑ€Ð¸Ñ‚ÐµÐ¼Ð°, Ð»Ð¸Ñ…ÐµÐ½Ð¸Ñ„Ð¸ÐºÐ°Ñ†Ð¸Ñ, ÑˆÐµÐ»ÑƒÑˆÐµÐ½Ð¸Ðµ, Ð¿Ð°Ð¿ÑƒÐ»ÐµÐ·Ð½Ñ‹Ðµ ÑÐ»ÐµÐ¼ÐµÐ½Ñ‚Ñ‹ , Ñ‚Ñ€ÐµÑ‰Ð¸Ð½ÐºÐ¸.\r\nÐ”ÐµÑ€Ð¼Ð¾Ð³Ñ€Ð°Ñ„Ð¸Ð·Ð¼ Ð² Ð¾Ñ‡Ð°Ð³Ð°Ñ… Ð±ÐµÐ»Ñ‹Ð¹ , ÑÑ‚Ð¾Ð¹ÐºÐ¸Ð¹.\r\n', '', 'Ð°Ñ‚Ð¾Ð¿Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð´ÐµÑ€Ð¼Ð°Ñ‚Ð¸Ñ‚, Ñ Ð¾Ñ‡Ð°Ð³Ð¾Ð²Ð¾Ð¹ Ð»Ð¸Ñ…ÐµÐ½Ð¸Ñ„Ð¸ÐºÐ°Ñ†Ð¸ÐµÐ¹ ÐºÐ¾Ð¶Ð½Ñ‹Ñ… Ð¿Ð¾ÐºÑ€Ð¾Ð²Ð¾Ð², Ð¿Ð¾Ð´Ð¾ÑÑ‚Ñ€Ð¾Ðµ Ñ‚ÐµÑ‡ÐµÐ½Ð¸Ðµ.		', '62Ð±', NULL, 'no', '11', 'Ð’', NULL),
(24, NULL, '', 'Ð’ÐµÐ³ÐµÑ‚Ð°Ñ‚Ð¸Ð²Ð½Ð¾-ÑÐ¾ÑÑƒÐ´Ð¸ÑÑ‚Ð°Ñ Ð´Ð¸ÑÑ‚Ð¾Ð½Ð¸Ñ Ð¿Ð¾ ÑÐ¼ÐµÑˆÐ°Ð½Ð½Ð¾Ð¼Ñƒ Ñ‚Ð¸Ð¿Ñƒ Ñ Ð°Ð½Ð³Ð¸Ð¾Ð´Ð¸ÑÑ‚Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¾Ð¹ Ñ†ÐµÑ„Ð°Ð»Ð³Ð¸ÐµÐ¹. Ð‘ÐµÐ· Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¹ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹.', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð“Ð¾Ð»Ð¾Ð²Ð½Ñ‹Ðµ Ð±Ð¾Ð»Ð¸, Â«Ñ€ÑÐ±ÑŒ Ð² Ð³Ð»Ð°Ð·Ð°Ñ…Â», Ð¾Ð½ÐµÐ¼ÐµÐ½Ð¸Ðµ Ð»ÐµÐ²Ð¾Ð¹ Ð¿Ð¾Ð»Ð¾Ð²Ð¸Ð½Ñ‹ ÑÐ·Ñ‹ÐºÐ° Ð¸ Ð³ÑƒÐ±Ñ‹, Ñ€ÑƒÐºÐ°, Ð¸Ð½Ð¾Ð³Ð´Ð° Ñ‚Ð¾ÑˆÐ½Ð¾Ñ‚Ð°, Ñ€Ð²Ð¾Ñ‚Ð°, Ð¿Ñ€Ð¸ Ð½Ð°ÐºÐ»Ð¾Ð½Ðµ Ñ‚ÐµÐ»Ð° ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÑ…ÑƒÐ´ÑˆÐ°ÐµÑ‚ÑÑ.', '', 'Ð¡Ð¾Ð·Ð½Ð°Ð½Ð¸Ðµ: ÑÑÐ½Ð¾Ðµ. Ð¡Ñ‚ÐµÐ¿ÐµÐ½ÑŒ Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ð¾ÑÑ‚Ð¸, Ð°Ð´ÐµÐºÐ²Ð°Ñ‚Ð½Ð¾ÑÑ‚Ð¸: Ð°Ð´ÐµÐºÐ²Ð°Ñ‚ÐµÐ½, Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½. ÐœÐµÐ½Ð¸Ð½Ð³ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ ÑÐ¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹: Ð½ÐµÑ‚. Ð§ÐµÑ€ÐµÐ¿Ð½Ð¾-Ð¼Ð¾Ð·Ð³Ð¾Ð²Ñ‹Ðµ Ð½ÐµÑ€Ð²Ñ‹: I Ð¿Ð°Ñ€Ð°: Ð¾Ð±Ð¾Ð½ÑÐ½Ð¸Ðµ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. II Ð¿Ð°Ñ€Ð°: Ð·Ñ€ÐµÐ½Ð¸Ðµ Ð½Ð¾Ñ€Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ. III-IV Ð¿Ð°Ñ€Ð°: Ð³Ð»Ð°Ð·Ð½Ñ‹Ðµ Ñ‰ÐµÐ»Ð¸ S=D, Ð·Ñ€Ð°Ñ‡ÐºÐ¸ - D=S, Ñ„Ð¾Ñ‚Ð¾Ñ€ÐµÐ°ÐºÑ†Ð¸Ñ Ð¶Ð¸Ð²Ð°Ñ. Ð”Ð²Ð¸Ð¶ÐµÐ½Ð¸Ñ Ð³Ð»Ð°Ð·Ð½Ñ‹Ñ… ÑÐ±Ð»Ð¾Ðº: ÐºÐ¾Ð½Ð²ÐµÑ€Ð³ÐµÐ½Ñ†Ð¸Ñ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð°. ÐÐ¸ÑÑ‚Ð°Ð³Ð¼Ð° Ð½ÐµÑ‚. V Ð¿Ð°Ñ€Ð°: ÐºÐ¾Ñ€Ð½ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾ÑÑ‚ÑŒ ÐºÐ¾Ð¶Ð¸ Ð»Ð¸Ñ†Ð° ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð°. VII Ð¿Ð°Ñ€Ð°: Ð»Ð¸Ñ†Ð¾ ÑÐ¸Ð¼Ð¼ÐµÑ‚Ñ€Ð¸Ñ‡Ð½Ð¾. VIII Ð¿Ð°Ñ€Ð°: ÑÐ»ÑƒÑ… Ð² Ð½Ð¾Ñ€Ð¼Ðµ. IX-X Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ð¹. XI Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð²Ñ‹Ð¿Ð°Ð´ÐµÐ½Ð¸Ð¹. XII Ð¿Ð°Ñ€Ð°: ÑÐ·Ñ‹Ðº Ð¿Ð¾ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð»Ð¸Ð½Ð¸Ð¸. Ð ÐµÑ„Ð»ÐµÐºÑÑ‹: Ð´Ð²ÑƒÐ³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° S=D, ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸,  Ñ‚Ñ€Ñ‘Ñ…Ð³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° S=D, ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐšÐ°Ñ€Ð¿Ð¾Ñ€Ð°Ð´Ð¸Ð°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ S=D, ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐšÐ¾Ð»ÐµÐ½Ð½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸, D=S. ÐÑ…Ð¸Ð»Ð»Ð¾Ð²Ñ‹ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐŸÐ¾Ð´Ð¾ÑˆÐ²ÐµÐ½Ð½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. Ð‘Ñ€ÑŽÑˆÐ½Ñ‹Ðµ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐŸÐ°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð·Ð½Ð°ÐºÐ¸: Ð½ÐµÑ‚. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð¾Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð³Ð¾ Ð°Ð²Ñ‚Ð¾Ð¼Ð°Ñ‚Ð¸Ð·Ð¼Ð°: Ð½ÐµÑ‚. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð½Ðµ Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð°. Ð“Ð»ÑƒÐ±Ð¾ÐºÐ¾Ðµ Ñ‡ÑƒÐ²ÑÑ‚Ð²Ð¾: ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. Ð”Ð²Ð¸Ð³Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ð¹ Ð½ÐµÑ‚. Ð”Ð²Ð¸Ð¶ÐµÐ½Ð¸Ñ Ð² Ð¿Ð¾Ð·Ð²Ð¾Ð½Ð¾Ñ‡Ð½Ð¸ÐºÐµ: Ð² Ð¿Ð¾Ð»Ð½Ð¾Ð¼ Ð¾Ð±ÑŠÑ‘Ð¼Ðµ. Ð¡Ð¸Ð»Ð° - 5 Ð±Ð°Ð»Ð»Ð¾Ð². ÐœÑ‹ÑˆÐµÑ‡Ð½Ñ‹Ð¹ Ñ‚Ð¾Ð½ÑƒÑ: Ð½Ðµ Ð¸Ð·Ð¼ÐµÐ½Ñ‘Ð½. ÐŸÐ°Ð»ÑŒÐ¿Ð°Ñ†Ð¸Ñ Ð¾ÑÑ‚Ð¸ÑÑ‚Ñ‹Ñ… Ð¾Ñ‚Ñ€Ð¾ÑÑ‚ÐºÐ¾Ð² Ð¿Ð¾Ð·Ð²Ð¾Ð½ÐºÐ¾Ð²: Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð½Ð°Ñ‚ÑÐ¶ÐµÐ½Ð¸Ñ: Ð¾Ñ‚ÑÑƒÑ‚ÑÑ‚Ð²ÑƒÑŽÑ‚. Ð¡Ñ‚Ð°Ñ‚Ð¾ÐºÐ¾Ð¾Ñ€Ð´Ð¸Ð½Ð°Ñ‚Ð¾Ñ€Ð½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð² Ð¿Ð¾Ð·Ðµ Ð Ð¾Ð¼Ð±ÐµÑ€Ð³Ð° ÑƒÑÑ‚Ð¾Ð¹Ñ‡Ð¸Ð², Ð¿Ð°Ð»ÑŒÑ†ÐµÐ½Ð¾ÑÐ¾Ð²ÑƒÑŽ Ð¿Ñ€Ð¾Ð±Ñƒ Ð²Ñ‹Ð¿Ð¾Ð»Ð½ÑÐµÑ‚ ÑƒÐ²ÐµÑ€ÐµÐ½Ð½Ð¾, Ñ‚Ñ€ÐµÐ¼Ð¾Ñ€Ð° Ð²ÐµÐº Ð¸ Ñ€ÑƒÐº Ð½ÐµÑ‚. ', 'ÐœÐ Ð¢ Ð¾Ñ‚ 04.05.2012Ð³. â€“ Ð¿Ñ€Ð¸Ð·Ð½Ð°ÐºÐ¸ Ð¼Ð¸Ð½Ð¸Ð¼Ð°Ð»ÑŒÐ½Ñ‹Ñ… Ð³Ð»Ð¸Ð¾Ð·Ð½Ñ‹Ñ… Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ð¹ Ð² Ð¿Ð°Ñ€Ð°Ð²ÐµÐ½Ñ‚Ñ€Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ð¼ Ð±ÐµÐ»Ð¾Ð¼ Ð²ÐµÑ‰ÐµÑÑ‚Ð²Ðµ Ð¿Ñ€Ð°Ð²Ð¾Ð¹ Ð²Ð¸ÑÐ¾Ñ‡Ð½Ð¾-Ð·Ð°Ñ‚Ñ‹Ð»Ð¾Ñ‡Ð½Ð¾Ð¹  Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸. ÐÑÐ¸Ð¼Ð¼ÐµÑ‚Ñ€Ð¸Ñ Ð²ÐµÐ½Ð¾Ð·Ð½Ð¾Ð³Ð¾ Ð¾Ñ‚Ñ‚Ð¾ÐºÐ°.\r\nÐ­Ð­Ð“ Ð¾Ñ‚20.09.2011Ð³. â€“ Ð¿Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð¾Ñ‡Ð°Ð³ Ð½Ðµ Ð¾Ð¿Ñ€ÐµÐ´ÐµÐ»ÑÐµÑ‚ÑÑ. Ð­Ð¿Ð¸Ð°ÐºÑ‚Ð¸Ð²Ð½Ð¾ÑÑ‚ÑŒ Ð­Ð­Ð“ Ð½Ðµ Ð·Ð°Ñ€ÐµÐ³Ð¸ÑÑ‚Ñ€Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð°.\r\nÐ Ð­Ð“ Ð¾Ñ‚ 20.09.2011Ð³. â€“ Ð¿Ñ€Ð¸Ð·Ð½Ð°ÐºÐ¸ ÑÐ¾ÑÑƒÐ´Ð¸ÑÑ‚Ð¾Ð¹ Ð´Ð¸ÑÑ‚Ð¾Ð½Ð¸Ð¸ Ð¿Ð¾ ÑÐ¼ÐµÑˆÐ°Ð½Ð½Ð¾Ð¼Ñƒ Ñ‚Ð¸Ð¿Ñƒ.\r\n', '	Ð’ÐµÐ³ÐµÑ‚Ð°Ñ‚Ð¸Ð²Ð½Ð¾-ÑÐ¾ÑÑƒÐ´Ð¸ÑÑ‚Ð°Ñ Ð´Ð¸ÑÑ‚Ð¾Ð½Ð¸Ñ Ð¿Ð¾ ÑÐ¼ÐµÑˆÐ°Ð½Ð½Ð¾Ð¼Ñƒ Ñ‚Ð¸Ð¿Ñƒ Ñ Ð°Ð½Ð³Ð¸Ð¾Ð´Ð¸ÑÑ‚Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¾Ð¹ Ñ†ÐµÑ„Ð°Ð»Ð³Ð¸ÐµÐ¹. Ð‘ÐµÐ· Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¹ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹.	', '', NULL, 'no', '1', 'Ð', NULL);
INSERT INTO `$year`.`galoba` (`id`, `date`, `vx_st`, `fio`, `daterogdenia`, `type`, `voenkomat`, `otpravitel`, `ispolnitel`, `zaloby`, `anamnez`, `doi`, `rsi`, `diagnoz`, `isx_st`, `datecontroly`, `control`, `id_user`, `godnost`, `graf`) VALUES
(25, NULL, '', 'Ð¿Ð»Ð¾ÑÐºÐ¾ÑÑ‚Ð¾Ð¿Ð¸Ðµ II ÑÑ‚ÐµÐ¿ÐµÐ½Ð¸ Ð±ÐµÐ· Ð°Ñ€Ñ‚Ñ€Ð¾Ð·Ð° Ñ‚Ð°Ñ€Ð°Ð½Ð½Ð¾Ð»Ð°Ð´ÑŒÐµÐ²Ð¸Ð´Ð½Ð¾Ð³Ð¾ ÑÑƒÑÑ‚Ð°Ð²Ð°', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð½Ð° Ð±Ð¾Ð»Ð¸ Ð² ÑÑ‚Ð¾Ð¿Ð°Ñ… Ð¿Ð¾ÑÐ»Ðµ Ñ„Ð¸Ð·Ð¸Ñ‡ÐµÑÐºÐ¾Ð¹ Ð½Ð°Ð³Ñ€ÑƒÐ·ÐºÐ¸', 'Ð±Ð¾Ð»ÐµÐµÑ‚ Ñ‚Ñ€Ð¸ Ð³Ð¾Ð´Ð°, Ð½Ðµ Ð»ÐµÑ‡Ð¸Ð»ÑÑ, Ð½Ðµ Ð½Ð°Ð±Ð»ÑŽÐ´Ð°Ð»ÑÑ', 'Ð¡Ð¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ, Ñ‚ÐµÐ»Ð¾ÑÐ»Ð¾Ð¶ÐµÐ½Ð¸Ðµ Ð½Ð¾Ñ€Ð¼Ð¾ÑÑ‚ÐµÐ½Ð¸Ñ‡ÐµÑÐºÐ¾Ðµ, ÑÑ‚Ð¾Ð¿Ñ‹ ÑƒÐ¼ÐµÑ€ÐµÐ½Ð½Ð¾ ÑƒÐ¿Ð»Ð¾Ñ‰ÐµÐ½Ñ‹ Ð² Ð¿Ñ€Ð¾Ð´Ð¾Ð»ÑŒÐ½Ð¾Ð¼ Ð½Ð°Ð¿Ñ€Ð°Ð²Ð»ÐµÐ½Ð¸Ð¸, Ð´ÐµÑ„Ð¾Ñ€Ð¼Ð°Ñ†Ð¸Ð¸ Ñ‚Ñ‹Ð»Ð° Ð¾Ð±ÐµÐ¸Ñ…  ÑÑ‚Ð¾Ð¿ Ð½ÐµÑ‚, Ð¿ÐµÑ€ÐµÐ´Ð½Ð¸Ðµ Ð¾Ñ‚Ð´ÐµÐ»Ñ‹ ÑÑ‚Ð¾Ð¿ Ð½Ðµ Ñ€Ð°ÑÐ¿Ð»Ð°ÑÑ‚Ð°Ð½Ñ‹, Ð¿Ð°Ð»ÑŒÐ¿Ð°Ñ†Ð¸Ñ Ð² Ñ‚Ð¸Ð¿Ð¸Ñ‡Ð½Ñ‹Ñ… Ð±Ð¾Ð»ÐµÐ²Ñ‹Ñ… Ñ‚Ð¾Ñ‡ÐºÐ°Ñ… Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ð°, Ð¿Ñ€Ð¾Ð±Ð° Ð²Ð¾Ð´ÑÐ½Ð½Ð¾Ð¹ Ð¿Ð»Ð°Ð½Ñ‚Ð¾ÑÐºÐ¾Ð¿Ð¸Ð¸ ÑÐ»Ð°Ð±Ð¾Ð¿Ð¾Ð»Ð¾Ð¶Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð°, Ð´Ð²Ð¸Ð¶ÐµÐ½Ð¸Ñ Ð² Ð³Ð¾Ð»ÐµÐ½Ð¾ÑÑ‚Ð¾Ð¿Ð½Ñ‹Ñ… ÑÑƒÑÑ‚Ð°Ð²Ð°Ñ… Ð² Ð¿Ð¾Ð»Ð½Ð¾Ð¼ Ð¾Ð±ÑŠÐµÐ¼Ðµ, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹', '', '								', '', NULL, 'no', '5', 'Ð', NULL),
(26, NULL, '', 'Ð½ÐµÐ²ÑƒÑ', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð½Ð° Ð¾Ð±Ñ€Ð°Ð·Ð¾Ð²Ð°Ð½Ð¸Ñ Ð½Ð° ÐºÐ¾Ð¶Ðµ , Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ð¾ÑÑ‚ÑŒ Ð¿Ñ€Ð¸ ÐºÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ðµ Ñ Ð¾Ð´ÐµÐ¶Ð´Ð¾Ð¹', 'Ð¡Ð¾ ÑÐ»Ð¾Ð² Ð¾Ð±Ñ€Ð°Ð·Ð¾Ð²Ð°Ð½Ð¸Ñ Ñ Ñ€Ð°Ð½Ð½ÐµÐ³Ð¾ Ð´ÐµÑ‚ÑÑ‚Ð²Ð° .\r\nÐ¡ Ð²Ð¾Ð·Ñ€Ð°ÑÑ‚Ð¾Ð¼ Ñ€Ð°Ð·Ð¼ÐµÑ€ Ð¸ ÐºÐ¾Ð»Ð¸Ñ‡ÐµÑÑ‚Ð²Ð¾ ÑƒÐ²ÐµÐ»Ð¸Ñ‡Ð¸Ð²Ð°Ð»Ð¾ÑÑŒ.                                                  ', 'ÐÐ° ÐºÐ¾Ð¶Ðµ Ð² Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸      Ñ€ÐµÐ»ÑŒÐµÑ„Ð½Ñ‹Ðµ Ð¾Ð±Ñ€Ð°Ð·Ð¾Ð²Ð°Ð½Ð¸Ñ Ð¾ÐºÑ€ÑƒÐ³Ð»Ð¾Ð¹ Ñ„Ð¾Ñ€Ð¼Ñ‹ , ÐºÐ¾Ñ€Ð¸Ñ‡Ð½ÐµÐ²Ð¾Ð³Ð¾ Ñ†Ð²ÐµÑ‚Ð° , Ñ€Ð°Ð·Ð¼ÐµÑ€Ð°Ð¼Ð¸ Ð¾ÐºÐ¾Ð»Ð¾ 1, 5 Ð½Ð° 1, 5 ÑÐ°Ð½Ñ‚Ð¸Ð¼ÐµÑ‚Ñ€Ð¾Ð² , Ð²Ð¾Ð·Ð²Ñ‹ÑˆÐ°ÑŽÑ‰Ð¸ÐµÑÑ Ð½Ð°Ð´ ÑƒÑ€Ð¾Ð²Ð½ÐµÐ¼ ÐºÐ¾Ð¶Ð¸ Ð½Ð° 0, 7 ÑÐ°Ð½Ñ‚Ð¸Ð¼ÐµÑ‚Ñ€Ð°., Ð² Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸ ÐºÐ¾Ð½Ñ‚Ð°ÐºÑ‚Ð° Ñ Ð²Ð¾ÐµÐ½Ð½Ñ‹Ð¼ ÑÐ½Ð°Ñ€ÑÐ¶ÐµÐ½Ð¸ÐµÐ¼.', '', 'Ð¿Ð¸Ð³Ð¼ÐµÐ½Ñ‚Ð½Ñ‹Ð¹ Ð½ÐµÐ²ÑƒÑ , Ð·Ð°Ñ‚Ñ€ÑƒÐ´Ð½ÑÑŽÑ‰Ð¸Ð¹ Ð½Ð¾ÑˆÐµÐ½Ð¸Ðµ Ð²Ð¾ÐµÐ½Ð½Ð¾Ð¹ Ñ„Ð¾Ñ€Ð¼Ñ‹ Ð¾Ð´ÐµÐ¶Ð´Ñ‹, ÑÐ½Ð°Ñ€ÑÐ¶ÐµÐ½Ð¸Ñ.		', '10Ð±', NULL, 'no', '11', 'Ð’', NULL),
(27, NULL, '', 'Ð”Ð¸Ð·Ð°Ð³Ñ€ÐµÐ³Ð°Ñ†Ð¸Ð¾Ð½Ð½Ð°Ñ Ñ‚Ñ€Ð¾Ð¼Ð±Ð¾Ñ†Ð¸Ñ‚Ð¾Ð¿Ð°Ñ‚Ð¸Ñ.', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð½Ð° Ð½Ð¾ÑÐ¾Ð²Ñ‹Ðµ ÐºÑ€Ð¾Ð²Ð¾Ñ‚ÐµÑ‡ÐµÐ½Ð¸Ñ', ' ÐÐ°Ð±Ð»ÑŽÐ´Ð°ÐµÑ‚ÑÑ Ñ Ð´ÐµÑ‚ÑÑ‚Ð²Ð°', 'ÐžÐ±Ñ‰ÐµÐµ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ðµ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ. ÐŸÐ¸Ñ‚Ð°Ð½Ð¸Ðµ  Ð½Ð¾Ñ€Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ. ÐšÐ¾Ð¶Ð½Ñ‹Ðµ Ð¿Ð¾ÐºÑ€Ð¾Ð²Ñ‹ Ñ‡Ð¸ÑÑ‚Ñ‹Ðµ, Ð¾Ð±Ñ‹Ñ‡Ð½Ð¾Ð¹ Ð¾ÐºÑ€Ð°ÑÐºÐ¸.\r\nÐ’ Ð»ÐµÐ³ÐºÐ¸Ñ… Ð´Ñ‹Ñ…Ð°Ð½Ð¸Ðµ Ð²ÐµÐ·Ð¸ÐºÑƒÐ»ÑÑ€Ð½Ð¾Ðµ, Ñ…Ñ€Ð¸Ð¿Ð¾Ð² Ð½ÐµÑ‚.\r\nÐ¡ÐµÑ€Ð´Ñ†Ðµ- Ñ‚Ð¾Ð½Ñ‹ Ñ€Ð¸Ñ‚Ð¼Ð¸Ñ‡Ð½Ñ‹Ðµ,ÑÑÐ½Ñ‹Ðµ, ÐÐ”              Ð¼Ð¼ Ñ€Ñ‚. ÑÑ‚.\r\nÐ–Ð¸Ð²Ð¾Ñ‚ Ð¼ÑÐ³ÐºÐ¸Ð¹, Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹Ð¹.\r\n		', 'ÐžÐÐš Ð¾Ñ‚    -- Ð³ÐµÐ¼Ð¾Ð³Ð»Ð¾Ð±Ð¸Ð½   Ð³\\Ð», ÑÑ€Ð¸Ñ‚Ñ€Ð¾Ñ†Ð¸Ñ‚Ñ‹    *10^12\\Ð», Ð»ÐµÐ¹ÐºÐ¾Ñ†Ð¸Ñ‚Ñ‹   *10^9\\Ð», Ñ‚Ñ€Ð¾Ð¼Ð±Ð¾Ñ†Ð¸Ñ‚Ñ‹   *10^9\\Ð» , Ð»ÐµÐ¹ÐºÐ¾Ñ†Ð¸Ñ‚Ð°Ñ€Ð½Ð°Ñ Ñ„Ð¾Ñ€Ð¼ÑƒÐ»Ð°: Ð½ÐµÐ¹Ñ‚Ñ€Ð¾Ñ„Ð¸Ð»Ñ‹ Ð¿Ð°Ð»Ð¾Ñ‡ÐºÐ¾ÑÐ´ÐµÑ€Ð½Ñ‹Ðµ  , Ð½ÐµÐ¹Ñ‚Ñ€Ð¾Ñ„Ð¸Ð»Ñ‹ ÑÐµÐ³Ð¼ÐµÐ½Ñ‚Ð¾ÑÐ´ÐµÑ€Ð½Ñ‹Ðµ  , ÑÐ¾Ð·Ð¸Ð½Ð¾Ñ„Ð¸Ð»Ñ‹  , Ð±Ð°Ð·Ð¾Ñ„Ð¸Ð»Ñ‹  , Ð»Ð¸Ð¼Ñ„Ð¾Ñ†Ð¸Ñ‚Ñ‹  , Ð¼Ð¾Ð½Ð¾Ñ†Ð¸Ñ‚Ñ‹  . Ð¡ÐžÐ­  Ð¼Ð¼\\Ñ‡.', 'Ð”Ð¸Ð·Ð°Ð³Ñ€ÐµÐ³Ð°Ñ†Ð¸Ð¾Ð½Ð½Ð°Ñ Ñ‚Ñ€Ð¾Ð¼Ð±Ð¾Ñ†Ð¸Ñ‚Ð¾Ð¿Ð°Ñ‚Ð¸Ñ	.													', '11Ð²', NULL, 'no', '6', 'Ð', NULL),
(28, NULL, '', '25Ð³ Ð‘ - 4 -  Ð³Ð¾Ð´ÐµÐ½ Ðº Ð²Ð¾ÐµÐ½Ð½Ð¾Ð¹ ÑÐ»ÑƒÐ¶Ð±Ðµ Ñ Ð½ÐµÐ·Ð½Ð°Ñ‡Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ñ‹Ð¼Ð¸ Ð¾Ð³Ñ€Ð°Ð½Ð¸Ñ‡ÐµÐ½Ð¸ÑÐ¼Ð¸ ', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð“Ð¾Ð»Ð¾Ð²Ð½Ñ‹Ðµ Ð±Ð¾Ð»Ð¸, Ð³Ð¾Ð»Ð¾Ð²Ð¾ÐºÑ€ÑƒÐ¶ÐµÐ½Ð¸Ñ, ÑÐ»Ð°Ð±Ð¾ÑÑ‚ÑŒ\r\n', 'ÐŸÐ¾ÑÑ‚Ð¾ÑÐ½Ð½Ð¾ Ð½Ð°Ð±Ð»ÑŽÐ´Ð°Ð»ÑÑ Ñƒ Ð½ÐµÐ²Ñ€Ð¾Ð»Ð¾Ð³Ð° Ñ Ð¿Ð¾ÑÐ»ÐµÐ´ÑÑ‚Ð²Ð¸ÑÐ¼Ð¸ Ð¿ÐµÑ€Ð¸Ð½Ð°Ñ‚Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð¿Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ð¸ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹ Ð¸ Ð²ÐµÐ³ÐµÑ‚Ð°Ñ‚Ð¸Ð²Ð½Ð¾-ÑÐ¾ÑÑƒÐ´Ð¸ÑÑ‚Ð¾Ð¹ Ð´Ð¸ÑÑ‚Ð¾Ð½Ð¸ÐµÐ¹. Ð¡Ð¾ÑÑ‚Ð¾Ð¸Ñ‚ Ð½Ð° Â«Ð”Â» ÑƒÑ‡Ñ‘Ñ‚Ðµ Ñƒ Ð½ÐµÐ²Ñ€Ð¾Ð»Ð¾Ð³Ð°. ', 'Ð¡Ð¾Ð·Ð½Ð°Ð½Ð¸Ðµ: ÑÑÐ½Ð¾Ðµ. Ð¡Ñ‚ÐµÐ¿ÐµÐ½ÑŒ Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ð¾ÑÑ‚Ð¸, Ð°Ð´ÐµÐºÐ²Ð°Ñ‚Ð½Ð¾ÑÑ‚Ð¸: Ð°Ð´ÐµÐºÐ²Ð°Ñ‚ÐµÐ½, Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½. ÐœÐµÐ½Ð¸Ð½Ð³ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ ÑÐ¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹: Ð½ÐµÑ‚. Ð§ÐµÑ€ÐµÐ¿Ð½Ð¾-Ð¼Ð¾Ð·Ð³Ð¾Ð²Ñ‹Ðµ Ð½ÐµÑ€Ð²Ñ‹: I Ð¿Ð°Ñ€Ð°: Ð¾Ð±Ð¾Ð½ÑÐ½Ð¸Ðµ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. II Ð¿Ð°Ñ€Ð°: Ð·Ñ€ÐµÐ½Ð¸Ðµ Ð½Ð¾Ñ€Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ. III-IV Ð¿Ð°Ñ€Ð°: Ð³Ð»Ð°Ð·Ð½Ñ‹Ðµ Ñ‰ÐµÐ»Ð¸ D=S, Ð·Ñ€Ð°Ñ‡ÐºÐ¸ - D=S, Ñ„Ð¾Ñ‚Ð¾Ñ€ÐµÐ°ÐºÑ†Ð¸Ñ Ð¶Ð¸Ð²Ð°Ñ. Ð”Ð²Ð¸Ð¶ÐµÐ½Ð¸Ñ Ð³Ð»Ð°Ð·Ð½Ñ‹Ñ… ÑÐ±Ð»Ð¾Ðº: ÐºÐ¾Ð½Ð²ÐµÑ€Ð³ÐµÐ½Ñ†Ð¸Ñ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð°. ÐÐ¸ÑÑ‚Ð°Ð³Ð¼Ð° Ð½ÐµÑ‚. V Ð¿Ð°Ñ€Ð°: ÐºÐ¾Ñ€Ð½ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ Ð¶Ð¸Ð²Ñ‹Ðµ. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾ÑÑ‚ÑŒ ÐºÐ¾Ð¶Ð¸ Ð»Ð¸Ñ†Ð° ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð°. VII Ð¿Ð°Ñ€Ð°: ÑÐ¸Ð¼Ð¼ÐµÑ‚Ñ€Ð¸Ñ‡Ð½Ð¾. VIII Ð¿Ð°Ñ€Ð°: ÑÐ»ÑƒÑ… Ð² Ð½Ð¾Ñ€Ð¼Ðµ. IX-X Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ð¹. XI Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð²Ñ‹Ð¿Ð°Ð´ÐµÐ½Ð¸Ð¹. XII Ð¿Ð°Ñ€Ð°: ÑÐ·Ñ‹Ðº Ð¿Ð¾ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð»Ð¸Ð½Ð¸Ð¸. Ð ÐµÑ„Ð»ÐµÐºÑÑ‹: Ð´Ð²ÑƒÐ³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° D=S, ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸,  Ñ‚Ñ€Ñ‘Ñ…Ð³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° D=S, ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐšÐ°Ñ€Ð¿Ð¾Ñ€Ð°Ð´Ð¸Ð°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D=S, ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐšÐ¾Ð»ÐµÐ½Ð½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐÑ…Ð¸Ð»Ð»Ð¾Ð²Ñ‹ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D=S ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐŸÐ¾Ð´Ð¾ÑˆÐ²ÐµÐ½Ð½Ñ‹Ðµ  Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D=S ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. Ð‘Ñ€ÑŽÑˆÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐŸÐ°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð·Ð½Ð°ÐºÐ¸: Ð½ÐµÑ‚. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð¾Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð³Ð¾ Ð°Ð²Ñ‚Ð¾Ð¼Ð°Ñ‚Ð¸Ð·Ð¼Ð°: Ð½ÐµÑ‚. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð½Ðµ Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð°. Ð“Ð»ÑƒÐ±Ð¾ÐºÐ¾Ðµ Ñ‡ÑƒÐ²ÑÑ‚Ð²Ð¾: ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. Ð”Ð²Ð¸Ð³Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ð¹ Ð½ÐµÑ‚. Ð”Ð²Ð¸Ð¶ÐµÐ½Ð¸Ñ Ð² Ð¿Ð¾Ð·Ð²Ð¾Ð½Ð¾Ñ‡Ð½Ð¸ÐºÐµ: Ð² Ð¿Ð¾Ð»Ð½Ð¾Ð¼ Ð¾Ð±ÑŠÑ‘Ð¼Ðµ. Ð¡Ð¸Ð»Ð° - 5 Ð±Ð°Ð»Ð»Ð¾Ð². ÐœÑ‹ÑˆÐµÑ‡Ð½Ñ‹Ð¹ Ñ‚Ð¾Ð½ÑƒÑ: Ð½Ðµ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½. ÐŸÐ°Ð»ÑŒÐ¿Ð°Ñ†Ð¸Ñ Ð¾ÑÑ‚Ð¸ÑÑ‚Ñ‹Ñ… Ð¾Ñ‚Ñ€Ð¾ÑÑ‚ÐºÐ¾Ð² Ð¿Ð¾Ð·Ð²Ð¾Ð½ÐºÐ¾Ð²: Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð½Ð°Ñ‚ÑÐ¶ÐµÐ½Ð¸Ñ: Ð¾Ñ‚ÑÑƒÑ‚ÑÑ‚Ð²ÑƒÑŽÑ‚. Ð¡Ñ‚Ð°Ñ‚Ð¾ÐºÐ¾Ð¾Ñ€Ð´Ð¸Ð½Ð°Ñ‚Ð¾Ñ€Ð½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð² Ð¿Ð¾Ð·Ðµ Ð Ð¾Ð¼Ð±ÐµÑ€Ð³Ð° ÑƒÑÑ‚Ð¾Ð¹Ñ‡Ð¸Ð², Ð¿Ð°Ð»ÑŒÑ†ÐµÐ½Ð¾ÑÐ¾Ð²ÑƒÑŽ Ð¿Ñ€Ð¾Ð±Ñƒ Ð²Ñ‹Ð¿Ð¾Ð»Ð½ÑÐµÑ‚ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾, Ñ‚Ñ€ÐµÐ¼Ð¾Ñ€Ð° Ñ€ÑƒÐº Ð¸ Ð²ÐµÐº Ð½ÐµÑ‚. ', '', 'ÐŸÐ¾ÑÐ»ÐµÐ´ÑÑ‚Ð²Ð¸Ñ Ð¿ÐµÑ€Ð¸Ð½Ð°Ñ‚Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð¿Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ð¸ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹, Ð²ÐµÐ³ÐµÑ‚Ð°Ñ‚Ð¸Ð²Ð½Ð¾-ÑÐ¾ÑÑƒÐ´Ð¸ÑÑ‚Ð°Ñ Ð´Ð¸ÑÑ„ÑƒÐ½ÐºÑ†Ð¸Ñ Ð±ÐµÐ· Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¹ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹.		', '', NULL, 'no', '1', NULL, NULL),
(29, NULL, '', '25Ð² Ð’ -  Ð¾Ð³Ñ€Ð°Ð½Ð¸Ñ‡ÐµÐ½Ð½Ð¾ Ð³Ð¾Ð´ÐµÐ½ Ðº Ð²Ð¾ÐµÐ½Ð½Ð¾Ð¹ ÑÐ»ÑƒÐ¶Ð±Ðµ', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð“Ð¾Ð»Ð¾Ð²Ð½Ð°Ñ Ð±Ð¾Ð»ÑŒ, Ñ€Ð°ÑÑÐµÑÐ½Ð½Ð¾ÑÑ‚ÑŒ, ÑƒÑ‚Ð¾Ð¼Ð»ÑÐµÐ¼Ð¾ÑÑ‚ÑŒ.', 'Ð’ Ð¾ÐºÑ‚ÑÐ±Ñ€Ðµ 2009Ð³. â€“ ÑÐ¾Ñ‚Ñ€ÑÑÐµÐ½Ð¸Ñ Ð³Ð¾Ð»Ð¾Ð²Ð½Ð¾Ð³Ð¾ Ð¼Ð¾Ð·Ð³Ð°. Ð›ÐµÑ‡Ð¸Ð»ÑÑ Ð°Ð¼Ð±ÑƒÐ»Ð°Ñ‚Ð¾Ñ€Ð½Ð¾. Ð’ ÑÐµÐ½Ñ‚ÑÐ±Ñ€Ðµ 2012Ð³., Ñ ÑƒÑ…ÑƒÐ´ÑˆÐµÐ½Ð¸ÐµÐ¼ ÑÐ¾ÑÑ‚Ð¾ÑÐ½Ð¸Ñ, Ð¾Ð±Ñ€Ð°Ñ‚Ð¸Ð»ÑÑ Ðº Ð½ÐµÐ²Ñ€Ð¾Ð»Ð¾Ð³Ñƒ, Ð´Ð¸Ð°Ð³Ð½Ð¾Ð·: Ñ‚Ñ€Ð°Ð²Ð¼Ð°Ñ‚Ð¸Ñ‡ÐµÑÐºÐ°Ñ Ð±Ð¾Ð»ÐµÐ·Ð½ÑŒ Ð³Ð¾Ð»Ð¾Ð²Ð½Ð¾Ð³Ð¾ Ð¼Ð¾Ð·Ð³Ð°, Ð°ÑÑ‚ÐµÐ½Ð¾Ð²ÐµÐ³ÐµÑ‚Ð°Ñ‚Ð¸Ð²Ð½Ñ‹Ð¹ ÑÐ¸Ð½Ð´Ñ€Ð¾Ð¼. Ð›ÐµÑ‡ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¾Ð´Ð¾Ð»Ð¶Ð°ÐµÑ‚ Ð¿Ð¾ Ð½Ð°ÑÑ‚Ð¾ÑÑ‰ÐµÐµ Ð²Ñ€ÐµÐ¼Ñ. Ð­Ñ„Ñ„ÐµÐºÑ‚ Ð¾Ñ‚ Ð»ÐµÑ‡ÐµÐ½Ð¸Ñ ÐºÑ€Ð°Ñ‚ÐºÐ¾Ð²Ñ€ÐµÐ¼ÐµÐ½Ð½Ñ‹Ð¹. ', 'Ð¡Ð¾Ð·Ð½Ð°Ð½Ð¸Ðµ: ÑÑÐ½Ð¾Ðµ. Ð¡Ñ‚ÐµÐ¿ÐµÐ½ÑŒ Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ð¾ÑÑ‚Ð¸, Ð°Ð´ÐµÐºÐ²Ð°Ñ‚Ð½Ð¾ÑÑ‚Ð¸: Ð°Ð´ÐµÐºÐ²Ð°Ñ‚ÐµÐ½, Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½. Ð‘Ñ‹ÑÑ‚Ñ€Ð¾ Ð¸ÑÑ‚Ð¾Ñ‰Ð°ÐµÑ‚ÑÑ. ÐÑÑ‚ÐµÐ½Ð¸Ð·Ð¸Ñ€Ð¾Ð²Ð°Ð½. ÐœÐµÐ½Ð¸Ð½Ð³ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ ÑÐ¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹: Ð½ÐµÑ‚. Ð§ÐµÑ€ÐµÐ¿Ð½Ð¾-Ð¼Ð¾Ð·Ð³Ð¾Ð²Ñ‹Ðµ Ð½ÐµÑ€Ð²Ñ‹: I Ð¿Ð°Ñ€Ð°: Ð¾Ð±Ð¾Ð½ÑÐ½Ð¸Ðµ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. II Ð¿Ð°Ñ€Ð°: Ð·Ñ€ÐµÐ½Ð¸Ðµ Ð½Ð¾Ñ€Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ. III-IV Ð¿Ð°Ñ€Ð°: Ð³Ð»Ð°Ð·Ð½Ñ‹Ðµ Ñ‰ÐµÐ»Ð¸ S=D, Ð·Ñ€Ð°Ñ‡ÐºÐ¸ - D=S, Ñ„Ð¾Ñ‚Ð¾Ñ€ÐµÐ°ÐºÑ†Ð¸Ñ Ð²ÑÐ»Ð°Ñ. Ð”Ð²Ð¸Ð¶ÐµÐ½Ð¸Ñ Ð³Ð»Ð°Ð·Ð½Ñ‹Ñ… ÑÐ±Ð»Ð¾Ðº: ÐºÐ¾Ð½Ð²ÐµÑ€Ð³ÐµÐ½Ñ†Ð¸Ñ Ð¾ÑÐ»Ð°Ð±Ð»ÐµÐ½Ð°. ÐÐ¸ÑÑ‚Ð°Ð³Ð¼ ÑƒÑÑ‚Ð°Ð½Ð¾Ð²Ð¾Ñ‡Ð½Ñ‹Ð¹, Ð¼ÐµÐ»ÐºÐ¾Ñ€Ð°Ð·Ð¼Ð°ÑˆÐ¸ÑÑ‚Ñ‹Ð¹. V Ð¿Ð°Ñ€Ð°: ÐºÐ¾Ñ€Ð½ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÐ½Ð¸Ð¶ÐµÐ½Ñ‹. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾ÑÑ‚ÑŒ ÐºÐ¾Ð¶Ð¸ Ð»Ð¸Ñ†Ð° ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð°. VII Ð¿Ð°Ñ€Ð°: ÑÐ³Ð»Ð°Ð¶ÐµÐ½Ð° Ð»ÐµÐ²Ð°Ñ Ð½Ð¾ÑÐ¾Ð³ÑƒÐ±Ð½Ð°Ñ ÑÐºÐ»Ð°Ð´ÐºÐ°. VIII Ð¿Ð°Ñ€Ð°: ÑÐ»ÑƒÑ… Ð² Ð½Ð¾Ñ€Ð¼Ðµ. IX-X Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ð¹. XI Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð²Ñ‹Ð¿Ð°Ð´ÐµÐ½Ð¸Ð¹. XII Ð¿Ð°Ñ€Ð°: ÑÐ·Ñ‹Ðº Ð¿Ð¾ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð»Ð¸Ð½Ð¸Ð¸. Ð ÐµÑ„Ð»ÐµÐºÑÑ‹: Ð´Ð²ÑƒÐ³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° â€“ D=S,  Ñ‚Ñ€Ñ‘Ñ…Ð³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° â€“ D=S ÑÐ½Ð¸Ð¶ÐµÐ½Ñ‹. ÐšÐ°Ñ€Ð¿Ð¾Ñ€Ð°Ð´Ð¸Ð°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D=S ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐšÐ¾Ð»ÐµÐ½Ð½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ S=D Ð¾Ð¶Ð¸Ð²Ð»ÐµÐ½Ñ‹. ÐÑ…Ð¸Ð»Ð»Ð¾Ð²Ñ‹ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ S=D, Ð¾Ð¶Ð¸Ð²Ð»ÐµÐ½Ñ‹. ÐŸÐ¾Ð´Ð¾ÑˆÐ²ÐµÐ½Ð½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D=S, Ð·Ð½Ð°Ñ‡Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾ ÑÐ½Ð¸Ð¶ÐµÐ½Ñ‹. Ð‘Ñ€ÑŽÑˆÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ Ð¾Ð¶Ð¸Ð²Ð»ÐµÐ½Ñ‹.  ÐŸÐ°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð·Ð½Ð°ÐºÐ¸: Ð½ÐµÑ‚. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð¾Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð³Ð¾ Ð°Ð²Ñ‚Ð¾Ð¼Ð°Ñ‚Ð¸Ð·Ð¼Ð°: ÑÐ¸Ð¼Ð¿Ñ‚Ð¾Ð¼ ÐœÐ°Ñ€Ð¸Ð½ÐµÑÐºÐ¾-Ð Ð°Ð´Ð¾Ð²Ð¸Ñ‡Ð¸ ÑÐ»ÐµÐ²Ð°. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð½Ðµ Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð°. Ð“Ð»ÑƒÐ±Ð¾ÐºÐ¾Ðµ Ñ‡ÑƒÐ²ÑÑ‚Ð²Ð¾: ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. Ð”Ð²Ð¸Ð³Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð² Ð¿Ð¾Ð»Ð½Ð¾Ð¼ Ð¾Ð±ÑŠÑ‘Ð¼Ðµ. Ð¡Ð¸Ð»Ð° - 5 Ð±Ð°Ð»Ð»Ð¾Ð². ÐœÑ‹ÑˆÐµÑ‡Ð½Ñ‹Ð¹ Ñ‚Ð¾Ð½ÑƒÑ: Ð½Ðµ Ð¸Ð·Ð¼ÐµÐ½Ñ‘Ð½. ÐŸÐ°Ð»ÑŒÐ¿Ð°Ñ†Ð¸Ñ Ð¾ÑÑ‚Ð¸ÑÑ‚Ñ‹Ñ… Ð¾Ñ‚Ñ€Ð¾ÑÑ‚ÐºÐ¾Ð² Ð¿Ð¾Ð·Ð²Ð¾Ð½ÐºÐ¾Ð²: Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð½Ð°Ñ‚ÑÐ¶ÐµÐ½Ð¸Ñ: Ð¾Ñ‚ÑÑƒÑ‚ÑÑ‚Ð²ÑƒÑŽÑ‚. Ð¡Ñ‚Ð°Ñ‚Ð¾ÐºÐ¾Ð¾Ñ€Ð´Ð¸Ð½Ð°Ñ‚Ð¾Ñ€Ð½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð² Ð¿Ð¾Ð·Ðµ Ð Ð¾Ð¼Ð±ÐµÑ€Ð³Ð° ÑƒÑÑ‚Ð¾Ð¹Ñ‡Ð¸Ð², Ð¿Ð°Ð»ÑŒÑ†ÐµÐ½Ð¾ÑÐ¾Ð²ÑƒÑŽ Ð¿Ñ€Ð¾Ð±Ñƒ Ð²Ñ‹Ð¿Ð¾Ð»Ð½ÑÐµÑ‚ Ð½Ðµ ÑƒÐ²ÐµÑ€ÐµÐ½Ð½Ð¾, Ñ Ð²Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð½Ñ‹Ð¼ Ñ‚Ñ€ÐµÐ¼Ð¾Ñ€Ð¾Ð¼ Ñ€ÑƒÐº Ð¸ Ð²ÐµÐº. Ð’Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð½Ñ‹Ð¹ Ð¿ÐµÑ€Ð¸Ñ„ÐµÑ€Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð³Ð¸Ð¿ÐµÑ€Ð³Ð¸Ð´Ñ€Ð¾Ð·, ÐºÑ€Ð°ÑÐ½Ñ‹Ð¹ Ð´ÐµÑ€Ð¼Ð¾Ð³Ñ€Ð°Ñ„Ð¸Ð·Ð¼.\r\n', 'ÐœÐ Ð¢ Ð¾Ñ‚ 09.11.2012Ð³. â€“ ÐµÐ´Ð¸Ð½Ð¸Ñ‡Ð½Ñ‹Ðµ Ð¼ÐµÐ»ÐºÐ¾Ð¾Ñ‡Ð°Ð³Ð¾Ð²Ñ‹Ðµ Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ñ Ð²ÐµÑ‰ÐµÑÑ‚Ð²Ð° Ð»Ð¾Ð±Ð½Ñ‹Ñ… Ð´Ð¾Ð»ÐµÐ¹ Ð³Ð¾Ð»Ð¾Ð²Ð½Ð¾Ð³Ð¾ Ð¼Ð¾Ð·Ð³Ð° (ÑÐ¾ÑÑƒÐ´Ð¸ÑÑ‚Ð¾â€“Ð´Ð¸ÑÐ¼ÐµÑ‚Ð°Ð±Ð¾Ð»Ð¸Ñ‡ÐµÑÐºÐ¾Ð³Ð¾ Ð³ÐµÐ½ÐµÐ·Ð°). ÐŸÑ€Ð¸Ð·Ð½Ð°ÐºÐ¸ Ð½Ð°Ñ€ÑƒÐ¶Ð½Ð¾Ð¹ Ð¸ Ð²Ð½ÑƒÑ‚Ñ€ÐµÐ½Ð½ÐµÐ¹ Ð°ÑÐ¸Ð¼Ð¼ÐµÑ‚Ñ€Ð¸Ñ‡Ð½Ð¾Ð¹ (Ð½Ð° ÑƒÑ€Ð¾Ð²Ð½Ðµ Ð·Ð°Ð´Ð½Ð¸Ñ… Ñ€Ð¾Ð³Ð¾Ð²) Ð½ÐµÐ¾ÐºÐºÐ»ÑŽÐ·Ð¸Ð¾Ð½Ð½Ð¾Ð¹ Ð³Ð¸Ð´Ñ€Ð¾Ñ†ÐµÑ„Ð°Ð»Ð¸Ð¸, ÐºÐ¸ÑÑ‚Ð¾Ð·Ð½Ð¾Ðµ Ñ€Ð°ÑÑˆÐ¸Ñ€ÐµÐ½Ð¸Ðµ Ð´Ð¾Ñ€Ð·Ð°Ð»ÑŒÐ½Ñ‹Ñ… Ð¾Ñ‚Ð´ÐµÐ»Ð¾Ð² Ð¿Ñ€Ð¾Ð·Ñ€Ð°Ñ‡Ð½Ð¾Ð¹ Ð¿ÐµÑ€ÐµÐ³Ð¾Ñ€Ð¾Ð´ÐºÐ¸. ÐŸÑ€Ð¸Ð·Ð½Ð°ÐºÐ¸ Ð²Ð½ÑƒÑ‚Ñ€Ð¸Ñ‡ÐµÑ€ÐµÐ¿Ð½Ð¾Ð¹ Ð³Ð¸Ð¿ÐµÑ€Ñ‚ÐµÐ½Ð·Ð¸Ð¸ Ñ Ð»Ð¸ÐºÐ²Ð¾Ñ€Ð¾Ð´Ð¸Ð½Ð°Ð¼Ð¸Ñ‡ÐµÑÐºÐ¸Ð¼Ð¸ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸ÑÐ¼Ð¸ Ð½Ð° ÑƒÑ€Ð¾Ð²Ð½Ðµ Ð‘Ð—Ðž (Ð½Ð° Ñ„Ð¾Ð½Ðµ ÑÑƒÐ±Ð²ÐºÐ»Ð¸Ð½Ð¸Ð²Ð°Ð½Ð¸Ñ Ð¼Ð¸Ð½Ð´Ð°Ð»Ð¸Ð½ Ð¼Ð¾Ð·Ð¶ÐµÑ‡ÐºÐ° Ð² Ð‘Ð—Ðž), Ð°ÑÐ¸Ð¼Ð¼ÐµÑ‚Ñ€Ð¸Ñ Ð±Ð¾ÐºÐ¾Ð²Ñ‹Ñ… Ð¶ÐµÐ»ÑƒÐ´Ð¾Ñ‡ÐºÐ¾Ð² Ð½Ð° ÑƒÑ€Ð¾Ð²Ð½Ðµ Ð·Ð°Ð´Ð½Ð¸Ñ… Ñ€Ð¾Ð³Ð¾Ð², Ð¸Ð·Ð²Ð¸Ñ‚Ð¾ÑÑ‚ÑŒ Ð¸Ð½Ñ‚Ñ€Ð°ÐºÑ€Ð°Ð½Ð¸Ð°Ð»ÑŒÐ½Ñ‹Ñ… ÑÐµÐ³Ð¼ÐµÐ½Ñ‚Ð¾Ð² Ð¿Ð¾Ð·Ð²Ð¾Ð½Ð¾Ñ‡Ð½Ñ‹Ñ… Ð°Ñ€Ñ‚ÐµÑ€Ð¸Ð¹.', 'ÐŸÐ¾ÑÐ»ÐµÐ´ÑÑ‚Ð²Ð¸Ñ Ñ‡ÐµÑ€ÐµÐ¿Ð½Ð¾-Ð¼Ð¾Ð·Ð³Ð¾Ð²Ð¾Ð¹ Ñ‚Ñ€Ð°Ð²Ð¼Ñ‹, Ñ€Ð°ÑÑÐµÑÐ½Ð½Ð°Ñ Ð½ÐµÐ²Ñ€Ð¾Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ°Ñ ÑÐ¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ð°Ñ‚Ð¸ÐºÐ°, Ð»Ð¸ÐºÐ²Ð¾Ñ€Ð¾Ð´Ð¸Ð½Ð°Ð¼Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ñ, ÑÑ‚Ð¾Ð¹ÐºÐ¸Ð¹ Ñ†ÐµÑ€ÐµÐ±Ñ€Ð¾ÑÑ‚ÐµÐ½Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ ÑÐ¸Ð½Ð´Ñ€Ð¾Ð¼, Ñ†ÐµÑ„Ð°Ð»Ð³Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ ÑÐ¸Ð½Ð´Ñ€Ð¾Ð¼ ÑÐ»Ð¾Ð¶Ð½Ð¾Ð³Ð¾ Ð³ÐµÐ½ÐµÐ·Ð°. ÐÐµÐ·Ð½Ð°Ñ‡Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾Ðµ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ðµ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¹ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹.		', '', NULL, 'no', '1', NULL, NULL),
(30, NULL, '', '25Ð³ Ð‘ - 4 -  Ð³Ð¾Ð´ÐµÐ½ Ðº Ð²Ð¾ÐµÐ½Ð½Ð¾Ð¹ ÑÐ»ÑƒÐ¶Ð±Ðµ Ñ Ð½ÐµÐ·Ð½Ð°Ñ‡Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ñ‹Ð¼Ð¸ Ð¾Ð³Ñ€Ð°Ð½Ð¸Ñ‡ÐµÐ½Ð¸ÑÐ¼Ð¸ ', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð“Ð¾Ð»Ð¾Ð²Ð½Ñ‹Ðµ Ð±Ð¾Ð»Ð¸, Ð³Ð¾Ð»Ð¾Ð²Ð¾ÐºÑ€ÑƒÐ¶ÐµÐ½Ð¸Ñ, ÑÐ»Ð°Ð±Ð¾ÑÑ‚ÑŒ\r\n', 'ÐŸÐ¾ÑÑ‚Ð¾ÑÐ½Ð½Ð¾ Ð½Ð°Ð±Ð»ÑŽÐ´Ð°Ð»ÑÑ Ñƒ Ð½ÐµÐ²Ñ€Ð¾Ð»Ð¾Ð³Ð° Ñ Ð¿Ð¾ÑÐ»ÐµÐ´ÑÑ‚Ð²Ð¸ÑÐ¼Ð¸ Ð¿ÐµÑ€Ð¸Ð½Ð°Ñ‚Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð¿Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ð¸ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹ Ð¸ Ð²ÐµÐ³ÐµÑ‚Ð°Ñ‚Ð¸Ð²Ð½Ð¾-ÑÐ¾ÑÑƒÐ´Ð¸ÑÑ‚Ð¾Ð¹ Ð´Ð¸ÑÑ‚Ð¾Ð½Ð¸ÐµÐ¹. Ð¡Ð¾ÑÑ‚Ð¾Ð¸Ñ‚ Ð½Ð° Â«Ð”Â» ÑƒÑ‡Ñ‘Ñ‚Ðµ Ñƒ Ð½ÐµÐ²Ñ€Ð¾Ð»Ð¾Ð³Ð°. ', 'Ð¡Ð¾Ð·Ð½Ð°Ð½Ð¸Ðµ: ÑÑÐ½Ð¾Ðµ. Ð¡Ñ‚ÐµÐ¿ÐµÐ½ÑŒ Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ð¾ÑÑ‚Ð¸, Ð°Ð´ÐµÐºÐ²Ð°Ñ‚Ð½Ð¾ÑÑ‚Ð¸: Ð°Ð´ÐµÐºÐ²Ð°Ñ‚ÐµÐ½, Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½. ÐœÐµÐ½Ð¸Ð½Ð³ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ ÑÐ¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹: Ð½ÐµÑ‚. Ð§ÐµÑ€ÐµÐ¿Ð½Ð¾-Ð¼Ð¾Ð·Ð³Ð¾Ð²Ñ‹Ðµ Ð½ÐµÑ€Ð²Ñ‹: I Ð¿Ð°Ñ€Ð°: Ð¾Ð±Ð¾Ð½ÑÐ½Ð¸Ðµ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. II Ð¿Ð°Ñ€Ð°: Ð·Ñ€ÐµÐ½Ð¸Ðµ Ð½Ð¾Ñ€Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ. III-IV Ð¿Ð°Ñ€Ð°: Ð³Ð»Ð°Ð·Ð½Ñ‹Ðµ Ñ‰ÐµÐ»Ð¸ D=S, Ð·Ñ€Ð°Ñ‡ÐºÐ¸ - D=S, Ñ„Ð¾Ñ‚Ð¾Ñ€ÐµÐ°ÐºÑ†Ð¸Ñ Ð¶Ð¸Ð²Ð°Ñ. Ð”Ð²Ð¸Ð¶ÐµÐ½Ð¸Ñ Ð³Ð»Ð°Ð·Ð½Ñ‹Ñ… ÑÐ±Ð»Ð¾Ðº: ÐºÐ¾Ð½Ð²ÐµÑ€Ð³ÐµÐ½Ñ†Ð¸Ñ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð°. ÐÐ¸ÑÑ‚Ð°Ð³Ð¼Ð° Ð½ÐµÑ‚. V Ð¿Ð°Ñ€Ð°: ÐºÐ¾Ñ€Ð½ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ Ð¶Ð¸Ð²Ñ‹Ðµ. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾ÑÑ‚ÑŒ ÐºÐ¾Ð¶Ð¸ Ð»Ð¸Ñ†Ð° ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð°. VII Ð¿Ð°Ñ€Ð°: ÑÐ¸Ð¼Ð¼ÐµÑ‚Ñ€Ð¸Ñ‡Ð½Ð¾. VIII Ð¿Ð°Ñ€Ð°: ÑÐ»ÑƒÑ… Ð² Ð½Ð¾Ñ€Ð¼Ðµ. IX-X Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ð¹. XI Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð²Ñ‹Ð¿Ð°Ð´ÐµÐ½Ð¸Ð¹. XII Ð¿Ð°Ñ€Ð°: ÑÐ·Ñ‹Ðº Ð¿Ð¾ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð»Ð¸Ð½Ð¸Ð¸. Ð ÐµÑ„Ð»ÐµÐºÑÑ‹: Ð´Ð²ÑƒÐ³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° D=S, ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸,  Ñ‚Ñ€Ñ‘Ñ…Ð³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° D=S, ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐšÐ°Ñ€Ð¿Ð¾Ñ€Ð°Ð´Ð¸Ð°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D=S, ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐšÐ¾Ð»ÐµÐ½Ð½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐÑ…Ð¸Ð»Ð»Ð¾Ð²Ñ‹ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D=S ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐŸÐ¾Ð´Ð¾ÑˆÐ²ÐµÐ½Ð½Ñ‹Ðµ  Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D=S ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. Ð‘Ñ€ÑŽÑˆÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð¶Ð¸Ð²Ð¾ÑÑ‚Ð¸. ÐŸÐ°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð·Ð½Ð°ÐºÐ¸: Ð½ÐµÑ‚. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð¾Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð³Ð¾ Ð°Ð²Ñ‚Ð¾Ð¼Ð°Ñ‚Ð¸Ð·Ð¼Ð°: Ð½ÐµÑ‚. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð½Ðµ Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð°. Ð“Ð»ÑƒÐ±Ð¾ÐºÐ¾Ðµ Ñ‡ÑƒÐ²ÑÑ‚Ð²Ð¾: ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. Ð”Ð²Ð¸Ð³Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ð¹ Ð½ÐµÑ‚. Ð”Ð²Ð¸Ð¶ÐµÐ½Ð¸Ñ Ð² Ð¿Ð¾Ð·Ð²Ð¾Ð½Ð¾Ñ‡Ð½Ð¸ÐºÐµ: Ð² Ð¿Ð¾Ð»Ð½Ð¾Ð¼ Ð¾Ð±ÑŠÑ‘Ð¼Ðµ. Ð¡Ð¸Ð»Ð° - 5 Ð±Ð°Ð»Ð»Ð¾Ð². ÐœÑ‹ÑˆÐµÑ‡Ð½Ñ‹Ð¹ Ñ‚Ð¾Ð½ÑƒÑ: Ð½Ðµ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½. ÐŸÐ°Ð»ÑŒÐ¿Ð°Ñ†Ð¸Ñ Ð¾ÑÑ‚Ð¸ÑÑ‚Ñ‹Ñ… Ð¾Ñ‚Ñ€Ð¾ÑÑ‚ÐºÐ¾Ð² Ð¿Ð¾Ð·Ð²Ð¾Ð½ÐºÐ¾Ð²: Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð½Ð°Ñ‚ÑÐ¶ÐµÐ½Ð¸Ñ: Ð¾Ñ‚ÑÑƒÑ‚ÑÑ‚Ð²ÑƒÑŽÑ‚. Ð¡Ñ‚Ð°Ñ‚Ð¾ÐºÐ¾Ð¾Ñ€Ð´Ð¸Ð½Ð°Ñ‚Ð¾Ñ€Ð½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð² Ð¿Ð¾Ð·Ðµ Ð Ð¾Ð¼Ð±ÐµÑ€Ð³Ð° ÑƒÑÑ‚Ð¾Ð¹Ñ‡Ð¸Ð², Ð¿Ð°Ð»ÑŒÑ†ÐµÐ½Ð¾ÑÐ¾Ð²ÑƒÑŽ Ð¿Ñ€Ð¾Ð±Ñƒ Ð²Ñ‹Ð¿Ð¾Ð»Ð½ÑÐµÑ‚ ÑƒÐ´Ð¾Ð²Ð»ÐµÑ‚Ð²Ð¾Ñ€Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾, Ñ‚Ñ€ÐµÐ¼Ð¾Ñ€Ð° Ñ€ÑƒÐº Ð¸ Ð²ÐµÐº Ð½ÐµÑ‚.\r\n', '', 'ÐŸÐ¾ÑÐ»ÐµÐ´ÑÑ‚Ð²Ð¸Ñ Ð¿ÐµÑ€Ð¸Ð½Ð°Ñ‚Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð¿Ð°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ð¸ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹, Ð²ÐµÐ³ÐµÑ‚Ð°Ñ‚Ð¸Ð²Ð½Ð¾-ÑÐ¾ÑÑƒÐ´Ð¸ÑÑ‚Ð°Ñ Ð´Ð¸ÑÑ„ÑƒÐ½ÐºÑ†Ð¸Ñ Ð±ÐµÐ· Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ñ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¹ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹.						', '', NULL, 'no', '1', NULL, NULL),
(31, NULL, '', '25 Ð² Ð’ â€“ Ð¾Ð³Ñ€Ð°Ð½Ð¸Ñ‡ÐµÐ½Ð½Ð¾ Ð³Ð¾Ð´ÐµÐ½ Ðº Ð²Ð¾ÐµÐ½Ð½Ð¾Ð¹ ÑÐ»ÑƒÐ¶Ð±Ðµ.', NULL, 'obsledovanie', NULL, NULL, NULL, 'Ð“Ð¾Ð»Ð¾Ð²Ð¾ÐºÑ€ÑƒÐ¶ÐµÐ½Ð¸Ðµ Ð¿Ñ€Ð¸ Ð¿ÐµÑ€ÐµÐ¼ÐµÐ½Ðµ Ð¿Ð¾Ð»Ð¾Ð¶ÐµÐ½Ð¸Ñ, Ñ Ñ‚Ð¾ÑˆÐ½Ð¾Ñ‚Ð¾Ð¹, Ð³Ð¾Ð»Ð¾Ð²Ð½Ñ‹Ðµ Ð±Ð¾Ð»Ð¸ Ð² Ð²Ð¸ÑÐ¾Ñ‡Ð½Ð¾-Ñ‚ÐµÐ¼ÐµÐ½Ð½Ð¾Ð¹ Ð¾Ð±Ð»Ð°ÑÑ‚Ð¸, Ð´Ð°Ð²ÑÑ‰ÐµÐ³Ð¾ Ñ…Ð°Ñ€Ð°ÐºÑ‚ÐµÑ€Ð°, ÑÐ»Ð°Ð±Ð¾ÑÑ‚ÑŒ, Ð¿Ð¾Ñ‚Ð»Ð¸Ð²Ð¾ÑÑ‚ÑŒ.', 'Ð’ Ð´ÐµÑ‚ÑÑ‚Ð²Ðµ Ð½ÐµÐ¾Ð´Ð½Ð¾ÐºÑ€Ð°Ñ‚Ð½Ð¾ Ñ‡ÐµÑ€ÐµÐ¿Ð½Ð¾-Ð¼Ð¾Ð·Ð³Ð¾Ð²Ñ‹Ðµ Ñ‚Ñ€Ð°Ð²Ð¼Ñ‹. Ð›ÐµÑ‡Ð¸Ð»ÑÑ Ð°Ð¼Ð±ÑƒÐ»Ð°Ñ‚Ð¾Ñ€Ð½Ð¾ Ð¸ Ð² ÑÑ‚Ð°Ñ†Ð¸Ð¾Ð½Ð°Ñ€Ðµ Ñ Ð´Ð¸Ð°Ð³Ð½Ð¾Ð·Ð¾Ð¼: ÑÐ¾Ñ‚Ñ€ÑÑÐµÐ½Ð¸Ðµ Ð³Ð¾Ð»Ð¾Ð²Ð½Ð¾Ð³Ð¾ Ð¼Ð¾Ð·Ð³Ð°. ÐÐ° Â«Ð”Â» ÑƒÑ‡Ñ‘Ñ‚Ðµ Ñƒ Ð½ÐµÐ²Ñ€Ð¾Ð»Ð¾Ð³Ð° Ñ 1998Ð³., ÐµÐ¶ÐµÐ³Ð¾Ð´Ð½Ð¾, Ð°Ð¼Ð±ÑƒÐ»Ð°Ñ‚Ð¾Ñ€Ð½Ð¾ Ð¿Ð¾Ð»ÑƒÑ‡Ð°ÐµÑ‚ Ð¿Ñ€Ð¾Ñ‚Ð¸Ð²Ð¾Ñ€ÐµÑ†Ð¸Ð´Ð¸Ð²Ð½Ð¾Ðµ Ð»ÐµÑ‡ÐµÐ½Ð¸Ðµ. ÐŸÐ¾ÑÐ»ÐµÐ´Ð½Ð¸Ðµ Ð³Ð¾Ð´Ñ‹ Ð¾Ñ‚Ð¼ÐµÑ‡Ð°ÐµÑ‚ ÑƒÑ…ÑƒÐ´ÑˆÐµÐ½Ð¸Ðµ â€“ ÑƒÑ‡Ð°ÑÑ‚Ð¸Ð»Ð¸ÑÑŒ Ð¸ ÑƒÑÐ¸Ð»Ð¸Ð»Ð¸ÑÑŒ Ð³Ð¾Ð»Ð¾Ð²Ð½Ñ‹Ðµ Ð±Ð¾Ð»Ð¸. ÐŸÐ¾ÑÑ‚Ð¾ÑÐ½Ð½Ð¾ Ð»ÐµÑ‡Ð¸Ñ‚ÑÑ Ñƒ Ð½ÐµÐ²Ñ€Ð¾Ð»Ð¾Ð³Ð°. Ð­Ñ„Ñ„ÐµÐºÑ‚ Ð¾Ñ‚ Ð»ÐµÑ‡ÐµÐ½Ð¸Ñ ÐºÑ€Ð°Ñ‚ÐºÐ¾Ð²Ñ€ÐµÐ¼ÐµÐ½Ð½Ñ‹Ð¹.', 'Ð¡Ð¾Ð·Ð½Ð°Ð½Ð¸Ðµ: ÑÑÐ½Ð¾Ðµ. Ð¡Ñ‚ÐµÐ¿ÐµÐ½ÑŒ Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½Ð½Ð¾ÑÑ‚Ð¸, Ð°Ð´ÐµÐºÐ²Ð°Ñ‚Ð½Ð¾ÑÑ‚Ð¸: Ð°Ð´ÐµÐºÐ²Ð°Ñ‚ÐµÐ½, Ð¾Ñ€Ð¸ÐµÐ½Ñ‚Ð¸Ñ€Ð¾Ð²Ð°Ð½. Ð‘Ñ‹ÑÑ‚Ñ€Ð¾ Ð¸ÑÑ‚Ð¾Ñ‰Ð°ÐµÑ‚ÑÑ. ÐœÐµÐ½Ð¸Ð½Ð³ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ ÑÐ¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹: Ð½ÐµÑ‚. Ð§ÐµÑ€ÐµÐ¿Ð½Ð¾-Ð¼Ð¾Ð·Ð³Ð¾Ð²Ñ‹Ðµ Ð½ÐµÑ€Ð²Ñ‹: I Ð¿Ð°Ñ€Ð°: Ð¾Ð±Ð¾Ð½ÑÐ½Ð¸Ðµ ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. II Ð¿Ð°Ñ€Ð°: Ð·Ñ€ÐµÐ½Ð¸Ðµ Ð½Ð¾Ñ€Ð¼Ð°Ð»ÑŒÐ½Ð¾Ðµ. III-IV Ð¿Ð°Ñ€Ð°: Ð³Ð»Ð°Ð·Ð½Ñ‹Ðµ Ñ‰ÐµÐ»Ð¸ S=D, Ð·Ñ€Ð°Ñ‡ÐºÐ¸ - D=S, Ñ„Ð¾Ñ‚Ð¾Ñ€ÐµÐ°ÐºÑ†Ð¸Ñ Ð¶Ð¸Ð²Ð°Ñ. Ð”Ð²Ð¸Ð¶ÐµÐ½Ð¸Ñ Ð³Ð»Ð°Ð·Ð½Ñ‹Ñ… ÑÐ±Ð»Ð¾Ðº: ÐºÐ¾Ð½Ð²ÐµÑ€Ð³ÐµÐ½Ñ†Ð¸Ñ Ð¾ÑÐ»Ð°Ð±Ð»ÐµÐ½Ð°. ÐÐ¸ÑÑ‚Ð°Ð³Ð¼Ð° Ð½ÐµÑ‚. V Ð¿Ð°Ñ€Ð°: ÐºÐ¾Ñ€Ð½ÐµÐ°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ ÑÐ½Ð¸Ð¶ÐµÐ½Ñ‹. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾ÑÑ‚ÑŒ ÐºÐ¾Ð¶Ð¸ Ð»Ð¸Ñ†Ð° ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð°. VII Ð¿Ð°Ñ€Ð°: ÑÐ³Ð»Ð°Ð¶ÐµÐ½Ð° Ð¿Ñ€Ð°Ð²Ð°Ñ Ð½Ð¾ÑÐ¾Ð³ÑƒÐ±Ð½Ð°Ñ ÑÐºÐ»Ð°Ð´ÐºÐ°. VIII Ð¿Ð°Ñ€Ð°: ÑÐ»ÑƒÑ… Ð² Ð½Ð¾Ñ€Ð¼Ðµ. IX-X Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ð¹. XI Ð¿Ð°Ñ€Ð°: Ð±ÐµÐ· Ð²Ñ‹Ð¿Ð°Ð´ÐµÐ½Ð¸Ð¹. XII Ð¿Ð°Ñ€Ð°: ÑÐ·Ñ‹Ðº Ð¿Ð¾ ÑÑ€ÐµÐ´Ð½ÐµÐ¹ Ð»Ð¸Ð½Ð¸Ð¸. Ð ÐµÑ„Ð»ÐµÐºÑÑ‹: Ð´Ð²ÑƒÐ³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° â€“ D < S,  Ñ‚Ñ€Ñ‘Ñ…Ð³Ð»Ð°Ð²Ð°Ñ Ð¼Ñ‹ÑˆÑ†Ð° Ð¿Ð»ÐµÑ‡Ð° â€“ D < S Ð²Ñ‹ÑÐ¾ÐºÐ¸Ðµ. ÐšÐ°Ñ€Ð¿Ð¾Ñ€Ð°Ð´Ð¸Ð°Ð»ÑŒÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D < S Ð²Ñ‹ÑÐ¾ÐºÐ¸Ðµ. ÐšÐ¾Ð»ÐµÐ½Ð½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ S < D Ð¾Ð¶Ð¸Ð²Ð»ÐµÐ½Ñ‹. ÐÑ…Ð¸Ð»Ð»Ð¾Ð²Ñ‹ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D < S, Ð²Ñ‹ÑÐ¾ÐºÐ¸Ðµ. ÐŸÐ¾Ð´Ð¾ÑˆÐ²ÐµÐ½Ð½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ D < S, Ð²Ñ‹ÑÐ¾ÐºÐ¸Ðµ. Ð‘Ñ€ÑŽÑˆÐ½Ñ‹Ðµ Ñ€ÐµÑ„Ð»ÐµÐºÑÑ‹ Ð·Ð½Ð°Ñ‡Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð¾ ÑÐ½Ð¸Ð¶ÐµÐ½Ñ‹.  ÐŸÐ°Ñ‚Ð¾Ð»Ð¾Ð³Ð¸Ñ‡ÐµÑÐºÐ¸Ðµ Ð·Ð½Ð°ÐºÐ¸: Ð½ÐµÑ‚. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð¾Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð³Ð¾ Ð°Ð²Ñ‚Ð¾Ð¼Ð°Ñ‚Ð¸Ð·Ð¼Ð°: ÑÐ¸Ð¼Ð¿Ñ‚Ð¾Ð¼ ÐœÐ°Ñ€Ð¸Ð½ÐµÑÐºÐ¾-Ð Ð°Ð´Ð¾Ð²Ð¸Ñ‡Ð¸ Ñ Ð´Ð²ÑƒÑ… ÑÑ‚Ð¾Ñ€Ð¾Ð½. Ð§ÑƒÐ²ÑÑ‚Ð²Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð½Ðµ Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð°. Ð“Ð»ÑƒÐ±Ð¾ÐºÐ¾Ðµ Ñ‡ÑƒÐ²ÑÑ‚Ð²Ð¾: ÑÐ¾Ñ…Ñ€Ð°Ð½ÐµÐ½Ð¾. Ð”Ð²Ð¸Ð³Ð°Ñ‚ÐµÐ»ÑŒÐ½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸Ð¹ Ð½ÐµÑ‚. Ð¡Ð¸Ð»Ð° - 5 Ð±Ð°Ð»Ð»Ð¾Ð². ÐœÑ‹ÑˆÐµÑ‡Ð½Ñ‹Ð¹ Ñ‚Ð¾Ð½ÑƒÑ: Ð½Ðµ Ð¸Ð·Ð¼ÐµÐ½Ñ‘Ð½. ÐŸÐ°Ð»ÑŒÐ¿Ð°Ñ†Ð¸Ñ Ð¾ÑÑ‚Ð¸ÑÑ‚Ñ‹Ñ… Ð¾Ñ‚Ñ€Ð¾ÑÑ‚ÐºÐ¾Ð² Ð¿Ð¾Ð·Ð²Ð¾Ð½ÐºÐ¾Ð²: Ð±ÐµÐ·Ð±Ð¾Ð»ÐµÐ·Ð½ÐµÐ½Ð½Ñ‹. Ð¡Ð¸Ð¼Ð¿Ñ‚Ð¾Ð¼Ñ‹ Ð½Ð°Ñ‚ÑÐ¶ÐµÐ½Ð¸Ñ: Ð¾Ñ‚ÑÑƒÑ‚ÑÑ‚Ð²ÑƒÑŽÑ‚. Ð¡Ñ‚Ð°Ñ‚Ð¾ÐºÐ¾Ð¾Ñ€Ð´Ð¸Ð½Ð°Ñ‚Ð¾Ñ€Ð½Ð°Ñ ÑÑ„ÐµÑ€Ð°: Ð² Ð¿Ð¾Ð·Ðµ Ð Ð¾Ð¼Ð±ÐµÑ€Ð³Ð° Ð½Ðµ ÑƒÑÑ‚Ð¾Ð¹Ñ‡Ð¸Ð², Ð¿Ð°Ð»ÑŒÑ†ÐµÐ½Ð¾ÑÐ¾Ð²ÑƒÑŽ Ð¿Ñ€Ð¾Ð±Ñƒ Ð²Ñ‹Ð¿Ð¾Ð»Ð½ÑÐµÑ‚ Ñ Ð¼Ð¸Ð¼Ð¾ Ð¿Ð¾Ð¿Ð°Ð´Ð°Ð½Ð¸ÐµÐ¼ Ð»ÐµÐ²Ð¾Ð¹ Ñ€ÑƒÐºÐ¾Ð¹. ÐŸÐµÑ€Ð¸Ñ„ÐµÑ€Ð¸Ñ‡ÐµÑÐºÐ¸Ð¹ Ð³Ð¸Ð¿ÐµÑ€Ð³Ð¸Ð´Ñ€Ð¾Ð·.\r\n\r\n', 'ÐœÐ Ð¢ Ð¾Ñ‚ 10.09.2012Ð³. â€“ ÐŸÑ€Ð¸Ð·Ð½Ð°ÐºÐ¸ Ð²Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð½Ð¾Ð¹ Ð½Ð°Ñ€ÑƒÐ¶Ð½Ð¾Ð¹ Ð¾Ñ‚ÐºÑ€Ñ‹Ñ‚Ð¾Ð¹ Ð³Ð¸Ð´Ñ€Ð¾Ñ†ÐµÑ„Ð°Ð»Ð¸Ð¸, Ð²Ð½ÑƒÑ‚Ñ€Ð¸Ñ‡ÐµÑ€ÐµÐ¿Ð½Ð¾Ð¹ Ð³Ð¸Ð¿ÐµÑ€Ñ‚ÐµÐ½Ð·Ð¸Ð¸.\r\nÐ­Ð­Ð“ Ð¾Ñ‚ 10.09.2012Ð³. â€“ Ð²Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð½Ñ‹Ðµ Ð¸Ð·Ð¼ÐµÐ½ÐµÐ½Ð¸Ñ Ð±Ð¸Ð¾ÑÐ»ÐµÐºÑ‚Ñ€Ð¸Ñ‡ÐµÑÐºÐ¾Ð¹ Ð°ÐºÑ‚Ð¸Ð²Ð½Ð¾ÑÑ‚Ð¸ Ð³Ð¾Ð»Ð¾Ð²Ð½Ð¾Ð³Ð¾ Ð¼Ð¾Ð·Ð³Ð°. Ð”Ð¸ÑÑ„ÑƒÐ½ÐºÑ†Ð¸Ñ ÑÑ€ÐµÐ´Ð¸Ð½Ð½Ñ‹Ñ… Ð½ÐµÑÐ¿ÐµÑ†Ð¸Ñ„Ð¸Ñ‡ÐµÑÐºÐ¸Ñ… ÑÑ‚Ñ€ÑƒÐºÑ‚ÑƒÑ€ Ð¼Ð¾Ð·Ð³Ð°. \r\n', 'ÐžÑ‚Ð´Ð°Ð»Ñ‘Ð½Ð½Ñ‹Ðµ Ð¿Ð¾ÑÐ»ÐµÐ´ÑÑ‚Ð²Ð¸Ñ Ñ‡ÐµÑ€ÐµÐ¿Ð½Ð¾-Ð¼Ð¾Ð·Ð³Ð¾Ð²Ñ‹Ñ… Ñ‚Ñ€Ð°Ð²Ð¼, ÑÑ‚Ð¾Ð¹ÐºÐ¸Ð¹ Ð²Ñ‹Ñ€Ð°Ð¶ÐµÐ½Ð½Ñ‹Ð¹ Ð°ÑÑ‚ÐµÐ½Ð¾Ð²ÐµÐ³ÐµÑ‚Ð°Ñ‚Ð¸Ð²Ð½Ñ‹Ð¹ ÑÐ¸Ð½Ð´Ñ€Ð¾Ð¼, Ð¿Ñ€Ð°Ð²Ð¾ÑÑ‚Ð¾Ñ€Ð¾Ð½Ð½ÑÑ Ð¿Ð¸Ñ€Ð°Ð¼Ð¸Ð´Ð½Ð°Ñ Ð½ÐµÐ´Ð¾ÑÑ‚Ð°Ñ‚Ð¾Ñ‡Ð½Ð¾ÑÑ‚ÑŒ, Ð³Ð¸Ð´Ñ€Ð¾Ñ†ÐµÑ„Ð°Ð»Ð¸Ñ Ñ  ÑÐ¸Ð½Ð´Ñ€Ð¾Ð¼Ð¾Ð¼ Ñ…Ñ€Ð¾Ð½Ð¸Ñ‡ÐµÑÐºÐ¾Ð¹ Ñ†ÐµÑ€Ð²Ð¸ÐºÐ°Ð»Ð³Ð¸Ð¸ Ñ Ð½ÐµÐ·Ð½Ð°Ñ‡Ð¸Ñ‚ÐµÐ»ÑŒÐ½Ñ‹Ð¼ Ð½Ð°Ñ€ÑƒÑˆÐµÐ½Ð¸ÐµÐ¼ Ñ„ÑƒÐ½ÐºÑ†Ð¸Ð¹ Ñ†ÐµÐ½Ñ‚Ñ€Ð°Ð»ÑŒÐ½Ð¾Ð¹ Ð½ÐµÑ€Ð²Ð½Ð¾Ð¹ ÑÐ¸ÑÑ‚ÐµÐ¼Ñ‹.		', '', NULL, 'no', '1', NULL, NULL);
-- Структура таблицы `priz`
--

CREATE TABLE IF NOT EXISTS `$year`.`priz` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `vx_st` varchar(255) DEFAULT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `daterogdenia` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `voenkomat` varchar(255) DEFAULT NULL,
  `otpravitel` varchar(255) DEFAULT NULL,
  `ispolnitel` varchar(255) DEFAULT NULL,
  `zaloby` text,
  `anamnez` text,
  `doi` text,
  `rsi` text,
  `diagnoz` text,
  `isx_st` varchar(255) DEFAULT NULL,
  `datecontroly` varchar(255) DEFAULT NULL,
  `dateyvki` varchar(255) DEFAULT NULL,
  `control` varchar(3) DEFAULT NULL,
  `id_user` varchar(2) DEFAULT NULL,
  `godnost` varchar(255) DEFAULT NULL,
  `graf` varchar(255) DEFAULT NULL,
  `id_num` int(255) DEFAULT NULL,
  `tdt` varchar(255) DEFAULT NULL,
  `izm` text,
  `dateyvki2` varchar(255) DEFAULT NULL,
  `sablon` varchar(255) DEFAULT NULL,
  `na` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1685 ;

--
-- Структура таблицы `protocol`
--

CREATE TABLE IF NOT EXISTS `$year`.`protocol` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `date` varchar(255) DEFAULT NULL,
  `vx_st` varchar(255) DEFAULT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `daterogdenia` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `voenkomat` varchar(255) DEFAULT NULL,
  `otpravitel` text,
  `ispolnitel` varchar(255) DEFAULT NULL,
  `zaloby` text,
  `anamnez` text,
  `doi` text,
  `rsi` text,
  `diagnoz` text,
  `isx_st` varchar(255) DEFAULT NULL,
  `datecontroly` varchar(255) DEFAULT NULL,
  `control` varchar(3) DEFAULT NULL,
  `id_user` varchar(2) DEFAULT NULL,
  `godnost` varchar(2) DEFAULT NULL,
  `graf` varchar(255) DEFAULT NULL,
  `vx_diagnoz` text,
  `vx_godnost` varchar(255) DEFAULT NULL,
  `protocol_numb` varchar(255) DEFAULT NULL,
  `protocol_numb2` varchar(255) DEFAULT NULL,
  `date_protocol` varchar(255) DEFAULT NULL,
  `date_protocol2` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=445 ;

--
-- Структура таблицы `sessions`
--

CREATE TABLE IF NOT EXISTS `$year`.`sessions` (
  `id_session` int(255) NOT NULL AUTO_INCREMENT,
  `id_user` int(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `time_start` datetime NOT NULL,
  `time_last` datetime NOT NULL,
  `online` varchar(255) NOT NULL,
  PRIMARY KEY (`id_session`),
  UNIQUE KEY `sid` (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3272 ;

--
-- Структура таблицы `state`
--

CREATE TABLE IF NOT EXISTS `$year`.`state` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `vx_st` varchar(255) DEFAULT NULL,
  `isx_st` varchar(255) DEFAULT NULL,
  `id_user` int(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Дамп данных таблицы `state`
--

INSERT INTO `$year`.`state` (`id`, `vx_st`, `isx_st`, `id_user`, `text`) VALUES
(108, '0', '1', 5, '61Ð±'),
(109, '0', '1', 5, '10Ð³'),
(111, '0', '1', 5, '61'),
(112, '1', '0', 1, '21Ð°'),
(113, '0', '1', 1, '21Ð°'),
(114, '1', '0', 1, '28'),
(115, '0', '1', 1, '28'),
(116, '0', '1', 5, '66Ð±'),
(117, '1', '0', 1, '25Ð²'),
(118, '0', '1', 1, '24Ð²'),
(119, '0', '1', 5, '86'),
(120, '0', '1', 5, '68Ð³'),
(121, '0', '1', 1, '25Ð²'),
(122, '0', '1', 11, '62Ð²'),
(123, '1', '0', 11, '62Ð²'),
(124, '0', '1', 6, '13Ð´'),
(125, '1', '0', 6, '13Ð²'),
(126, '0', '1', 5, '66Ð²'),
(127, '0', '1', 11, '10Ð±'),
(128, '1', '0', 11, '10Ð±'),
(129, '0', '1', 6, '48'),
(130, '0', '1', 11, '62Ð²'),
(131, '1', '0', 11, '62Ð²'),
(132, '0', '1', 5, '68Ð²'),
(133, '0', '1', 6, '13Ð´'),
(134, '1', '0', 1, '25Ð²'),
(135, '1', '0', 11, '62Ð²'),
(136, '0', '1', 11, '6'),
(137, '0', '1', 5, '45Ð³'),
(138, '0', '1', 5, '66Ð³'),
(139, '0', '1', 5, '82Ð²'),
(140, '0', '1', 6, '48'),
(141, '0', '1', 6, '13Ð³'),
(142, '0', '1', 5, '84Ð²'),
(143, '0', '1', 6, '11Ð²'),
(144, '0', '1', 6, '58Ð²'),
(145, '0', '1', 5, '65Ð²'),
(146, '0', '1', 6, '58Ð²'),
(147, '1', '0', 5, '82Ð²'),
(148, '0', '1', 5, '86'),
(149, '0', '1', 6, '13Ð´'),
(151, '1', '0', 5, '68Ð²'),
(152, '1', '0', 5, '65Ð²'),
(153, '0', '1', 5, '65Ð³'),
(154, '1', '0', 5, '66Ð²'),
(155, '1', '0', 5, '60Ð±'),
(156, '0', '1', 6, '61'),
(157, '0', '1', 5, '60Ð²'),
(158, '0', '1', 1, '23Ð²'),
(159, '0', '1', 6, '61'),
(160, '0', '1', 5, '66Ð²'),
(161, '0', '1', 6, '58Ð²'),
(162, '0', '1', 5, '80Ð²'),
(163, '0', '1', 6, '58Ð²'),
(164, '1', '0', 1, '23Ð²,22Ð²'),
(165, '0', '1', 6, '43Ð²'),
(166, '0', '1', 1, '25Ð²,22Ð²'),
(167, '0', '1', 6, '61'),
(168, '0', '1', 5, '66Ð²,84Ð²'),
(169, '1', '0', 5, '57Ð²'),
(170, '0', '1', 5, '57Ð²'),
(171, '0', '1', 5, '60Ð±'),
(172, '0', '1', 6, '58Ð²'),
(173, '0', '1', 5, '10Ð±'),
(174, '0', '1', 5, '67Ð°'),
(175, '1', '0', 7, '86'),
(176, '0', '1', 6, '13Ð³'),
(177, '0', '1', 5, '80Ð³, 72Ð³'),
(178, '0', '1', 6, '43Ð³'),
(179, '0', '1', 5, '68Ð±'),
(180, '0', '1', 6, '13Ð³'),
(181, '0', '1', 5, '86'),
(182, '0', '1', 6, '13Ð´'),
(183, '0', '1', 6, '52Ð²'),
(184, '0', '1', 6, '43Ð²'),
(185, '0', '1', 6, '13Ð´,59Ð²'),
(186, '1', '0', 1, '25Ð°'),
(187, '1', '0', 1, '22Ð²'),
(188, '1', '0', 1, '22Ð²'),
(189, '1', '0', 1, '89Ð°'),
(190, '1', '0', 6, '25Ð²'),
(191, '1', '0', 10, '19Ð±'),
(192, '1', '0', 1, '89Ð°,25Ð±'),
(193, '0', '1', 10, '19Ð±'),
(194, '1', '0', 10, '20Ð±'),
(195, '0', '1', 10, '20Ð±'),
(196, '1', '0', 10, '20Ð±'),
(197, '1', '0', 10, '20Ð±'),
(198, '1', '0', 10, '14Ð±'),
(199, '0', '1', 10, '14Ð±'),
(200, '0', '1', 1, '89Ð°,25Ð±'),
(201, '0', '1', 1, '89Ð°'),
(202, '1', '0', 10, '20Ð°'),
(203, '0', '1', 1, '22Ð²'),
(204, '0', '1', 10, '20Ð°'),
(205, '0', '1', 1, '25Ð°'),
(206, '0', '1', 6, '47Ð±, 13Ð´'),
(207, '0', '1', 7, '56Ð±'),
(208, '1', '0', 6, '52Ð²'),
(209, '1', '0', 11, '62Ð±'),
(210, '0', '1', 6, ''),
(211, '1', '0', 6, '13Ð³'),
(212, '0', '1', 11, '62Ð±'),
(213, '0', '1', 5, '66Ð³,65Ð³'),
(214, '0', '1', 5, '65Ð³'),
(215, '0', '1', 5, '65Ð³'),
(216, '0', '1', 5, '66Ð³,65Ð³'),
(217, '1', '0', 6, '58Ð²'),
(218, '1', '0', 10, '18Ð±'),
(219, '0', '1', 10, '18Ð±'),
(220, '0', '1', 5, '72Ð³'),
(221, '0', '1', 1, '24Ð²'),
(222, '1', '0', 8, '49Ð³,49Ð²'),
(223, '0', '1', 1, '25Ð³'),
(224, '0', '1', 8, '49Ð³,49Ð²'),
(225, '1', '0', 6, '71Ð±'),
(226, '1', '0', 10, '15'),
(227, '0', '1', 10, '15'),
(228, '1', '0', 1, '27Ð±'),
(229, '0', '1', 1, '27Ð±'),
(230, '0', '1', 6, '59Ð²'),
(231, '0', '1', 5, '88'),
(232, '1', '0', 6, '43Ð²'),
(233, '0', '1', 6, '48'),
(234, '1', '0', 6, '13Ð³,61'),
(235, '1', '0', 10, '17Ð±'),
(236, '0', '1', 10, '17Ð±'),
(237, '0', '1', 6, '13Ð´,59Ð²'),
(238, '1', '0', 1, '23Ð±'),
(239, '0', '1', 1, '23Ð±'),
(240, '1', '0', 1, '21Ð±'),
(241, '0', '1', 1, '21Ð±'),
(242, '1', '0', 1, '23Ð°'),
(243, '0', '1', 1, '23Ð°'),
(244, '1', '0', 1, '23Ð²'),
(245, '0', '1', 5, '78'),
(246, '1', '0', 8, '40Ð°'),
(247, '0', '1', 8, '40Ð°'),
(248, '0', '1', 5, '60Ð²'),
(249, '1', '0', 6, '42Ð²'),
(250, '1', '0', 1, '25Ð³'),
(251, '0', '1', 5, '66Ð±,60Ð²'),
(252, '1', '0', 6, '42Ð³, 59Ð²'),
(253, '0', '1', 5, '66Ð³,60Ð²'),
(254, '0', '1', 6, '59Ð², 42Ð³'),
(255, '0', '1', 10, '18Ð±'),
(256, '1', '0', 6, '11Ð²'),
(257, '0', '1', 6, '11Ð²'),
(258, '0', '1', 10, '18Ð±'),
(259, '0', '1', 5, '72Ð±'),
(260, '0', '1', 5, '48'),
(261, '0', '1', 6, '13Ð²'),
(262, '1', '0', 6, '59Ð²'),
(263, '0', '1', 5, '69Ð²'),
(264, '1', '0', 6, '13Ð´'),
(265, '0', '1', 6, '78'),
(266, '1', '0', 1, '24Ð²'),
(267, '0', '1', 5, '67Ð±'),
(268, '1', '0', 1, '25Ð±'),
(269, '0', '1', 1, '25Ð±'),
(270, '0', '1', 1, ''),
(271, '1', '0', 5, '66Ð³'),
(272, '1', '0', 1, '23Ð²,25Ð²'),
(273, '0', '1', 1, '23Ð²,25Ð²'),
(274, '0', '1', 6, '71Ð±'),
(275, '0', '1', 5, '66Ð³,65Ð³'),
(276, '1', '0', 6, '47Ð±'),
(277, '0', '1', 6, '47Ð±'),
(278, '1', '0', 1, '26Ð³'),
(279, '1', '0', 1, '26Ð³'),
(280, '1', '0', 6, '43Ð³'),
(281, '0', '1', 1, '26Ð³'),
(282, '0', '1', 6, '47Ð±, 47Ð±'),
(283, '0', '1', 6, '47Ð±,59Ð²'),
(284, '1', '0', 8, '53'),
(285, '0', '1', 8, '53'),
(286, '0', '1', 8, '53'),
(287, '1', '0', 5, '67Ð²'),
(288, '0', '1', 5, '67Ð³');

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `$year`.`users` (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `avatar` varchar(255) NOT NULL,
  `notice` int(1) NOT NULL DEFAULT '0',
  `money` double NOT NULL DEFAULT '500',
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `$year`.`users` (`id_user`, `login`, `password`, `id_role`, `name`, `surname`, `avatar`, `notice`, `money`) VALUES
(1, 'ivan.bazhenov@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'Ð®Ð¼Ð°ÐºÐ°ÐµÐ²Ð° Ð›.ÐŸ.', '1.jpg', 1, -3869),
(2, 'med1', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'Ð¡Ð¾Ñ€Ð¾ÐºÐ¸Ð½Ð° Ð›.Ð.', '2.jpg', 0, 500),
(3, 'med2', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'Ð‘Ð¾Ð³Ð¾Ð¼Ð¾Ð»Ð¾Ð²Ð° Ð˜.Ð.', '3.jpg', 0, 500),
(5, 'xirurg', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'ÐÐµÐ·Ð°Ð²Ð¸Ñ‚Ð¸Ð½ Ðž.Ð’.', '3.jpg', 0, 500),
(7, 'stomatolog', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'ÐšÐ¾Ñ€Ð¾Ñ‚ÐºÐ¾Ð² Ð’.Ð’.', '1.jpg', 0, 500),
(8, 'lor', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'Ð¢Ð¾Ð»ÑÑ‚Ð¾ÑƒÑ…Ð¾Ð² Ð’.Ð’.', '1.jpg', 0, 500),
(9, 'okylist', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'ÐšÐ¾Ð½Ð¾Ð¿ÐºÐ¸Ð½Ð° Ð.Ð’.', '1.jpg', 0, 500),
(10, 'psix', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'Ð­ÑÐµÐ±ÑƒÐ° Ðœ.Ðœ.', '1.jpg', 0, 500),
(11, 'dermatolog', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'Ð¡Ð»Ð¾Ð½Ð¾Ð²ÑÐºÐ¸Ð¹ Ð’.Ð˜.', '1.jpg', 0, 500),
(12, 'med3', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'Ð“ÑƒÐ»ÑÐµÐ²Ð° Ð. Ð®.', '1,jpg', 0, 500),
(6, 'terapevt', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'ÐšÑ€Ð°ÐµÐ²Ð° Ð¡.Ð’.', '1,jpg', 0, 500),
(13, 'admin', 'd41d8cd98f00b204e9800998ecf8427e', NULL, '$year', 'ÐÐ´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€', '1,jpg', 0, 500)					;					
					";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	

	public function priz_find_otrabotka($field, $find, $id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, DATE_FORMAT(datecontroly,'%d.%m.%Y') as datecontroly, DATE_FORMAT(dateyvki,'%d.%m.%Y') as dateyvki FROM priz where $field LIKE '%$find%' AND id_user = '$id' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')";
			} elseif ($field == "ispolnitel") 
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, DATE_FORMAT(datecontroly,'%d.%m.%Y') as datecontroly, DATE_FORMAT(dateyvki,'%d.%m.%Y') as dateyvki FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' and (type = 'control')";
			} else
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, DATE_FORMAT(datecontroly,'%d.%m.%Y') as datecontroly, DATE_FORMAT(dateyvki,'%d.%m.%Y') as dateyvki FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')";
			}
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function priz_find_vivod($godnost, $isx_godnost, $id_user)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	

			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE vx_godnost='$godnost' AND godnost='$isx_godnost' and id_user='$id_user' ORDER BY id DESC";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function priz_find_vivod2($godnost, $id_user)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	

			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE godnost='$godnost' AND id_user = '$id_user' ORDER BY id DESC";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}		
	
	public function priz_find_p($voenkomat)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE voenkomat='$voenkomat' AND (type = 'control' or type is NULL) ORDER BY id DESC";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function priz_find_g($voenkomat)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE voenkomat='$voenkomat' AND (type = 'gal') ORDER BY id DESC";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}
	
	public function priz_find_data($field, $find, $c, $po, $id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			if ($field == "date")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (date >= '$c' and date <= '$po' AND id_user = '$id') AND (type = 'otrabotka' or type = 'ytverdit' or type = 'control') ORDER BY id_num DESC";
			}
			
			if ($field == "dateyvki")
			{
				$sql = "SELECT *, DATE_FORMAT(dateyvki,'%d.%m.%Y') as dateyvki, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (dateyvki >= '$c' and dateyvki <= '$po' AND id_user = '$id') AND (type = 'otrabotka' or type = 'ytverdit' or type = 'control') ORDER BY id_num DESC";
			}

			if ($field == "datecontroly")
			{
				
				$sql = "SELECT *, DATE_FORMAT(datecontroly,'%d.%m.%Y') as datecontroly, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (datecontroly >= '$c' and datecontroly <= '$po' AND id_user = '$id') AND (type = 'otrabotka' or type = 'ytverdit' or type = 'control') ORDER BY id_num DESC";
			}	

			if ($field == "fio" or $field == "vx_st" or $field == "type" or $field == "isx_st")
			{		
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE $field LIKE '$find' AND (date >= '$c' and date <= '$po' AND id_user = '$id') AND (type = 'otrabotka' or type = 'ytverdit' or type = 'control') ORDER BY id_num DESC";
			}
			
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}		
	
	public function priz_find_page($field, $find, $id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' AND id_user = '$id' and (type = 'galoba' or type = 'konsult')";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' and (type = 'galoba' or type = 'konsult' or type = 'no')";
			}
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	

	public function priz_find_page22($field, $find, $id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' AND (type = 'control' and control = 'yes')";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE $field LIKE '$find%' and (type = 'control' and control = 'yes')";
			}
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function priz_find_page3($field, $find, $id)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' AND (type = 'galoba' and control = 'yes')";
			} else
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE $field LIKE '$find%' and (type = 'galoba' and control = 'yes')";
			}
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function priz_find_vozvrat($field, $find, $id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' AND id_user = '$id' and (type = 'vozvrat')";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' and (type = 'vozvrat')";
			}
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}

	public function priz_find_vozvrat2($field, $find, $id)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' and (type = 'vozvrat')";
			} else
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE $field LIKE '$find%' and (type = 'vozvrat')";
			}
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function priz_find_obsledovanie($field, $find, $id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			if ($field == "diagnoz")
			{
				$sql = "SELECT * FROM priz where $field LIKE '%$find%' AND id_user = '$id' and (type = 'obsledovanie')";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' and (type = 'obsledovanie')";
			}
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	

	public function priz_find_protocol($field, $find, $id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				

			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE $field LIKE '$find%'";

				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}			
	
	public function priz_find_count($field, $find, $id, $w, $c = NULL, $po = NULL)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			if ($w == "otrabotka")
			{		
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' AND id_user = '$id' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')";
				echo "1";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, COUNT(id) as count FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')";
			}
			}
			
			if ($w == "page")
			{		
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' AND id_user = '$id' snd (type = 'galoba' or type == 'konsult')";
				echo "1";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, COUNT(id) as count FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' snd (type = 'galoba' or type == 'konsult')";
			}
			}	

			if ($w == "vozvrat")
			{		
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' AND id_user = '$id' and (type = 'vozvrat')";
				echo "1";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, COUNT(id) as count FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' and (type = 'vozvrat')";
			}
			}	

			if ($w == "obsledovanie")
			{		
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' AND id_user = '$id' and (type = 'obsledovanie')";
				echo "1";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, COUNT(id) as count FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' and (type = 'obsledovanie')";
			}
			}	

			if ($w == "protocol")
			{		
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol where $field LIKE '%$find%' AND id_user = '$id'";
				echo "1";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, COUNT(id) as count FROM protocol WHERE $field LIKE '$find%' AND id_user = '$id'";
			}
			}	

			if ($w == "data")
			{
				if ($field == "diagnoz")
				{
					$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE $field LIKE '%$find%' AND (date >= '$c' and date <= '$po' AND id_user = '$id') AND (type = 'otrabotka' or type = 'ytverdit' or type = 'control')";
					echo "1";
				} else
				{
					$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, COUNT(id) as count FROM protocol WHERE $field LIKE '$find' AND (date >= '$c' and date <= '$po' AND id_user = '$id') AND (type = 'otrabotka' or type = 'ytverdit' or type = 'control')";
				}
			}			
			
			if ($w == "")
			{
			if ($field == "diagnoz")
			{
				$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz where $field LIKE '%$find%' AND id_user = '$id' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')";
				echo "1";
			} else 
			{
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date, COUNT(id) as count FROM priz WHERE $field LIKE '$find%' AND id_user = '$id' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')";
			}				
			}			
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	

	public function priz_find2($field, $find)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE $field LIKE '$find%' AND type = 'control'";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}
	
	public function protocol_find($field, $find)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol WHERE $field LIKE '$find%'";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}
	
	public function selectpriz_type($id_user)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (id_user = '$id_user' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')) ORDER BY id_num DESC";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}
	
	public function select_select($id_user, $s, $m)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (id_user = '$id_user' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')) ORDER BY id_num DESC LIMIT $s, $m";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	

	public function selectpriz_type_count($id_user)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
			
			$sql = "SELECT DISTINCT (fio), COUNT(fio) as count, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (id_user = '6' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')) ";
			
			return $dbh->query($sql);
			
			$dbh = NULL;
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 
	}

	public function count_table($id_user)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT COUNT(*) as count, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (id_user = '$id_user' and (type = 'otrabotka' or type = 'ytverdit' or type = 'control')) ";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}

	public function count_table_protocol($id_user)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT COUNT(*) as count, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (type = 'control' and control = 'yes') or (type = 'obsledovanie' and control = 'yes') ORDER BY id DESC ";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}

	public function count_table_protocol2($id_user)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT COUNT(*) as count, DATE_FORMAT(date,'%d.%m.%Y') as date FROM protocol ORDER BY id DESC ";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectpriz_type2($id_user, $type)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (id_user = '$id_user') and (type = '$type')";
				
			return $dbh->query($sql);
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}
	
	public function selectpriz_type22($id_user, $type)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (id_user = '$id_user') and (type = '$type') ORDER BY id DESC";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectpriz_vozvrat($id_user, $type)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE (id_user != '') and (type = '$type') ORDER BY id DESC";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectsablon($id_user)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM galoba WHERE id_user = '$id_user' ORDER BY id DESC";
				
			return $dbh->query($sql)->fetchALL();
				
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}

	public function selectsablon2($fio)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, users.id_user, users.surname FROM priz, users WHERE fio = '$fio' and priz.id_user = users.id_user and (control = 'yes' and type='control')";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectsablon3($fio)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, users.id_user, users.surname FROM priz, users WHERE fio = '$fio' and priz.id_user = users.id_user and (type='galoba')";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function selectpriz_obsledovanie($id_user, $type=null)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "SELECT *, DATE_FORMAT(date,'%d.%m.%Y') as date FROM priz WHERE id_user = '$id_user' and (type = 'obsledovanie') ORDER BY id_num DESC";
	
			return $dbh->query($sql);
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}		
	
	public function update_priz($date, $vx_st, $fio, $daterogdenia, $type, $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $datecontroly, $dateyvki, $control, $godnost, $graf, $id_num, $id, $tdt, $izm, $dateyvki2, $na)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
		
			//$date = date('d.m.Y'); 
			
			$sql = "UPDATE priz
	        SET date=?, vx_st=?, fio=?, daterogdenia=?, type=?, voenkomat=?, otpravitel=?, ispolnitel=?, zaloby=?, anamnez=?, doi=?, rsi=?, diagnoz=?, isx_st=?, datecontroly=?, dateyvki=?, control=?, godnost=?, graf=?, id_num=?, tdt=?, izm=?, dateyvki2=?, na=?
	        WHERE id=?";
			
			$q = $dbh->prepare($sql);
			$q->execute(array($date, $vx_st, $fio, $daterogdenia, $type, $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $datecontroly, $dateyvki, $control, $godnost, $graf, $id_num, $tdt, $izm, $dateyvki2, $na, $id));
		
			$dbh = NULL;	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}	

	public function update_sablon($fio, $zaloby, $anamnez, $doi, $rsi,$diagnoz,$id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
		
			//$date = date('d.m.Y'); 
			
			$sql = "UPDATE galoba
	        SET fio=?, zaloby=?, anamnez=?, doi=?, rsi=?, diagnoz=?
	        WHERE id=?";
			
			$q = $dbh->prepare($sql);
			$q->execute(array($fio, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $id));
		
			$dbh = NULL;	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}	
	
	
	public function update_ytverdit($type, $id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
		
			$date = date('Y-m-d'); 
			
			$sql = "UPDATE priz
	        SET type=?
	        WHERE id=?";
			
			$q = $dbh->prepare($sql);
			$q->execute(array($type,$id));
		
			$dbh = NULL;	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}	
	
	public function update_control($datecontrol, $type, $id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
				
			$sql = "UPDATE priz
	        SET type=?, datecontroly=?
	        WHERE id=?";
				
			$q = $dbh->prepare($sql);
			$q->execute(array($type,$datecontrol,$id));
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function updateprotocol($vx_st, $fio, $daterogdenia, $type, $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $datecontroly, $control, $id_user, $godnost, $graf, $vx_diagnoz, $vx_godnost, $protocol_numb, $protocol_numb2, $date_protocol, $date_protocol2, $mail, $id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
		
			$date = date('Y-m-d'); 
			$sql = "UPDATE protocol
	        SET vx_st=?, fio=?, daterogdenia=?, type=?, voenkomat=?, otpravitel=?, ispolnitel=?, zaloby=?, anamnez=?, doi=?, rsi=?, diagnoz=?, isx_st=?, datecontroly=?, control=?, id_user=?, godnost=?, graf=?, vx_diagnoz=?, vx_godnost=?, protocol_numb=?, protocol_numb2=?, date_protocol=?, date_protocol2=?, mail=?
	        WHERE id=?";
			$q = $dbh->prepare($sql);
			$q->execute(array($vx_st, $fio, $daterogdenia, $type, $voenkomat, $otpravitel, $ispolnitel, $zaloby, $anamnez, $doi, $rsi,$diagnoz, $isx_st, $datecontroly, $control, $id_user, $godnost, $graf, $vx_diagnoz, $vx_godnost, $protocol_numb, $protocol_numb2, $date_protocol, $date_protocol2, $mail, $id));
		
			$dbh = NULL;	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}

	public function delete_priz($id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));

			$sql = "DELETE FROM priz WHERE id = ?";
			$q = $dbh->prepare($sql);
			$q->execute(array($id));
			
			$dbh = NULL; 	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}		
	
	public function delete_sablon($id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));

			$sql = "DELETE FROM galoba WHERE id = ?";
			$q = $dbh->prepare($sql);
			$q->execute(array($id));
			
			$dbh = NULL; 	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}			
	
	public function delete_protocol($id)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));

			$sql = "DELETE FROM protocol WHERE id = ?";
			$q = $dbh->prepare($sql);
			$q->execute(array($id));
			
			$dbh = NULL; 	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}	
	
	public function update_otrabotka($id, $type, $control)
	{
		try {
			
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
		
			$date = date('Y-m-d'); 
			
			$sql = "UPDATE priz
	        SET type=?,control=?
	        WHERE id=?";
			
			$q = $dbh->prepare($sql);
			$q->execute(array($type,$control,$id));
		
			$dbh = NULL;	
		}
		
		catch (PDOException $e)
		{
			return $e->getMessage();
		} 	
	}
	
	public function update_user($surname, $id)
	{
		try {
				
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$date = date('Y-m-d');
				
			$sql = "UPDATE users
	        SET surname=?
	        WHERE id_user=?";
				
			$q = $dbh->prepare($sql);
			$q->execute(array($surname,$id));
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function update_user2($name)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$date = date('Y-m-d');
	
			$sql = "UPDATE users
	        SET name=?";
	
			$q = $dbh->prepare($sql);
			$q->execute(array($name));
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
	
	public function update_edit_sablon($sablon, $id)
	{
		try {
	
			$dbh = new PDO("mysql::host=$this->hostname;dbname=$this->dbName", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'latin1\''));
	
			$sql = "UPDATE priz
	        SET sablon=?
	        WHERE id=?";
	
			$q = $dbh->prepare($sql);
			$q->execute(array($sablon,$id));
	
			$dbh = NULL;
		}
	
		catch (PDOException $e)
		{
			return $e->getMessage();
		}
	}	
}