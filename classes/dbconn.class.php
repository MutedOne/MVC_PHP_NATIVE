<?php
	
	class DbConn 
	{
		private $dbserver = 'localhost';
		private $username = 'root';
		private $dbpass = '';
		private $dbname = 'webstestdb';

		protected function dbconnect()
		{
			try{
				$conn = new PDO("mysql:host=".$this->dbserver.";dbname=".$this->dbname, $this->username, $this->dbpass);
				
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


				
				return $conn;
			}catch(PDOException $e){
				echo "Connected Failed" . $e->getMessage(); 
			}
		}

		public function trydb()
		{
			echo "This is database";
		}				
	}
?>