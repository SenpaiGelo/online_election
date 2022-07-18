<?php 
	session_start();
	require("../configuration/database.php");

	class AuthModel extends Database{

		protected function model_studentlogin($Email , $Password){
			$con = new Database();
			$email = mysqli_real_escape_string($con->connection(), $Email);
			$password = mysqli_real_escape_string($con->connection(), md5($Password));
			if($Email !="" && $Password != ""){
				if(stripos($Email, "@gmail.com")){
					
					$sql = "SELECT * FROM students WHERE `email` = '$email' AND `password` = '$password' ";
					$result = $con->connection()->query($sql);

					if($result->num_rows > 0){
						$row = $result->fetch_assoc();
						$_SESSION['students'] = $row['id'];
						return json_encode(array("status"=>"success" , "location"=>"./dashboard.php"));
					}
					else{
						return json_encode(array("status"=>"error" , "messages"=>"Email and Password are not matched."));
					}

				}
				else{
					return json_encode(array("status"=>"error" , "messages"=>"Please Input valid Email Address."));
				}
			}else{
				return json_encode(array("status"=>"error" , "messages"=>"Please Fill Requred Fields."));
			}

		}

	}

?>