<?php

class ConnectDatabase{
	
	private  $host = "mysql:host=localhost";
	private  $dbname = "dbname=db_minimart";
	private  $root = "root";
	private  $pass = "";
	protected $conn;

    public function GetConnection(){	
		try {
			$this->conn = new PDO($this->host .";". $this->dbname, $this->root, $this->pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn->exec('SET NAMES "utf8"');
			return $this->conn;
		}
		catch(PDOException $e)
		{
			return false;
		}   
	}

	public function CreateDatabase(){	
		try {
			$this->conn = new PDO($this->host, $this->root,$this->pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn->exec('SET NAMES "utf8"');
			$sql = "CREATE DATABASE IF NOT EXISTS `db_minimart` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci";
    		$this->conn->exec($sql);
			return $this->conn;
		}
		catch(PDOException $e)
		{
			return false;
		}   
	}
}
?>