<?php
	class Database{
	
		private $dbHost = "localhost";
		private $dbUser = "root";
		private $dbPass = "";
		private $dbName = "election";

		protected function connection(){

			$con = new mysqli($this->dbHost , $this->dbUser , $this->dbPass, $this->dbName);
		
			if($con->connect_error){
				return $con->connect_error;
			}
			else{
				return $con;
			}
		}
	}
?>