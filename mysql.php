<?php
class mySQL {
	var $host;
	var $user;
	var $password;
	var $database;
	var $lastId;
	var $affectedRows;
	var $numberLines;
	var $numberLinesUpdated;
	var $numberLinesDeleted;
	var $command;
	var $lastCommand;
	var $query;
	var $link = false;
	var $erroMessage;
	var $result;
	var $registros;
	var $teste;
	
	function MySQL($dbhost,$dbusername,$dbuserpassword,$dbname,$teste=false) {
		$this->host = $dbhost;
		$this->user = $dbusername;
		$this->password = $dbuserpassword;
		$this->database = $dbname;
		$this->teste = $teste;
		$this->connect();
	}
	
	function begin() {
		mysql_query("BEGIN",$this->link) or die("BEGIN ".mysql_error($this->link));
	}
	
	function commit() {
		mysql_query("COMMIT",$this->link) or die("COMMIT ".mysql_error($this->link));
	}
	
	function rollback() {
		mysql_query("ROLLBACK",$this->link) or die("ROLLBACK ".mysql_error($this->link));
	}

	function connect() {
		if (!$this->link) {
			$this->link = mysql_connect($this->host,$this->user,$this->password,true);
			if ($this->teste) echo "Host connect ",$this->host,"($this->database)","<br>";
			if(!mysql_select_db($this->database,$this->link)) {
				echo "O db $this->host($this->database) não pode ser selecionado 1!<br />";
				echo "ERRO: " . mysql_error();
				die();
			}
		}
		if(!$this->link) {
			echo "Falha na conexao com o SGBD $this->host ($this->user,$this->database)!<br />";
 			echo "ERRO: " . mysql_error();
			die();
		}
	}
	
	function selectDB() {
		if (true) ;
		elseif(!mysql_select_db($this->database,$this->link)) {
			if (mysql_errno() == 2006) {
				$this->link = mysql_connect($this->host,$this->user,$this->password,true);
				if(!$this->link) {
					echo "Falha na conexao com o SGBD $this->host ($this->user,$this->database)!<br />";
 					echo "ERRO: " . mysql_error();
					die();
				}
				elseif (!mysql_select_db($this->database,$this->link)) {
					echo "O db $this->host($this->database) não pode ser selecionado 1!<br />";
					echo "ERRO: " . mysql_error();
					die();
				}
			}
			else {
				echo "O db $this->host($this->database) não pode ser selecionado 2!<br />";
				echo "ERRO: " . mysql_error();
				die();
			}
		}
	}

	function executeQuery($query) {
		
		$this->query = trim($query);
		$this->connect();
		$this->result = mysql_query($this->query,$this->link) or ($this->erro($this->query));
		
		if ($this->result) {
			$this->command = explode(' ',$this->query);
			if(preg_match("/INSERT/i",$this->command[0])) {
				$this->lastId = mysql_insert_id($this->link);					//	o ultimo id inserido
				$this->affectedRows = 1;
				$this->lastCommand = "INSERT";
			}
			elseif(preg_match("/UPDATE/i",$this->command[0])) {
				$this->numberLinesUpdated = mysql_affected_rows($this->link);	//	quantidade de linhas atualizadas
				$this->affectedRows = $this->numberLinesUpdated;
				$this->lastCommand = "UPDATE";
			}
			elseif(preg_match("/DELETE/i",$this->command[0])) {
				$this->numberLinesDeleted = mysql_affected_rows($this->link);	//	quantidade de linhas excluídas
				$this->affectedRows = $this->numberLinesDeleted;
				$this->lastCommand = "DELETE";
			}
			elseif(preg_match("/SELECT/i",$this->command[0])) {
				$this->numberLines = mysql_num_rows($this->result);			//	quantidade de linhas selecionadas
				$this->affectedRows = $this->numberLines;
				$this->lastCommand = "SELECT";
			}
			else $this->lastCommand = "UNKNOWN";
		}
		else $this->erro($this->query);
		return $this->result;
	}
	
	function erro($query) {
		if (in_array(mysql_errno($this->link),array(1062,1451))) $this->erroMessage = mysql_error($this->link);	//	Duplicate entry or foreign key constraint fails 
		else trigger_error('ERRO: '.mysql_error($this->link).' '.$this->host.'('.$this->database.') '.' SQL: '.$query,E_USER_ERROR); 
	}

	function fetch_assoc() {
		$this->dados=array();
		while ($row=mysql_fetch_assoc($this->result)){
			array_push($this->dados,$row);
		}
		mysql_free_result($this->result);	 // Aqui eu já fiz push no array, logo eu posso dar um free para liberar alocação
		return $this->dados;
	}

	function fetch_array() {
		$this->dados=array();
		while ($row=mysql_fetch_array($this->result,MYSQL_ASSOC)){
			array_push($this->dados,$row);
		}
		mysql_free_result($this->result);	 // Aqui eu já fiz push no array, logo eu posso dar um free para liberar alocação
		return $this->dados;
	}

}
?>