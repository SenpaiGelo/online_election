<?php
session_start();
if(!isset($_SESSION['students'])){
	header("location: index.php");
}

//unset($_SESSION['students']);
echo $_SESSION['students'];
?>