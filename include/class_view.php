<?php 
		}	
		{
			$database->aaa($year);
			$content = $year;
			$f = fopen('db.txt','w+');
			fwrite($f,$content);
			fclose($f);
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
		}	
		{
			fwrite($f,$content);
			fclose($f);
			$database->update_user2($content, $this->user['id_user']);
			die();			