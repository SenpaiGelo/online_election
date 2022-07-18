<?php

	class database{
	    
	    public function connection(){
	    	private $dbHost = "localhost";
	    	private $dbUser = "root";
	    	private $dbPass = "";
	    	private $dbName = "election";

	    	$arr = array();

	    	$con = new mysqli($this->host , $this->dbUser , $this->dbPass);
	    	$showDb = $con->query("SHOW DATABASES");

	    	while($row=$showDb->fetch_assoc()){
	    		array_push($arr, $row['Database']);
	    	}

	    	if(array_search($this->dbname, $arr) != ""){

	    	}
	    	else{
	    		$con = new mysqli($this->host , $this->dbUser , $this->dbPass);
	    	}

	    }

	}

	$dbname = "demo";

	$mysqli = new mysqli("localhost", "root", "");
	$res = $mysqli->query("SHOW DATABASES");
	$arr = array();
	while ($row = $res->fetch_assoc()) {
    	array_push($arr, $row['Database']);
    	echo "<br>".$row['Database'];
	}

if(array_search($dbname, $arr) != ""){
	echo 'found';
}
else{
	echo 'not found';
}

echo array_search($dbname, $arr);

?>