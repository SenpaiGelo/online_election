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

		protected function createStudents($Email , $SID , $FirstName , $LastName, $Password){
			$con = new Database();
			$email = mysqli_real_escape_string($con->connection(),$Email);
			$sid = mysqli_real_escape_string($con->connection(),$SID);
			$firstname = mysqli_real_escape_string($con->connection(),$FirstName);
			$lastname = mysqli_real_escape_string($con->connection(),$LastName);
			$password = mysqli_real_escape_string($con->connection(), md5($Password));
			
			if($Email != "" && $SID != "" && $FirstName != "" && $LastName != "" && $Password != ""){
				if(stripos($Email, "@gmail.com")){
					$checkEmail = "SELECT * FROM students WHERE `email` = '$email' ";
					$resultEmail = $con->connection()->query($checkEmail);

					if($resultEmail->num_rows > 0){
						return json_encode(array("status"=>"error" , "messages"=>"Email already use." ));
					}
					else{

						$checkSID = "SELECT * FROM students WHERE `sid` = '$sid' ";
						$resultSID = $con->connection()->query($checkSID);
						if($resultSID->num_rows > 0){
							return json_encode(array("status"=>"error" , "messages"=>"Student ID already use." ));
						}else{

							$sql = "INSERT INTO students(`email`,`sid` ,`firstname`, `lastname`, `password`)VALUES('$email', '$sid', '$firstname', '$lastname', '$password')";
							$result = $con->connection()->query($sql);
							return json_encode(array("status"=>"success" , "messages"=>"Created Successfully." ));

						}
					}

				}
				else{
					return json_encode(array("status"=>"error" , "messages"=> "Please input valid Email."));
				}
			}
			else{
				return json_encode(array("status"=>"error" , "messages"=> "Please Fill All Required Fields."));
			}
			$con->connection->close();
		}

	}

	// function test(){
	// 	$con = new mysqli("localhost" ,"root" , "", "election");
	// 	$sql = "INSERT INTO students (`email`, `sid` , `firstname`, `lastname` , `password`)VALUES('angeloryes90@gmail.com', '105863070031', 'angelo', 'reyes', 'ecf38a07a1509279e41a285179abc333') ";
	// 				$result = $con->query($sql);
	// 		if($result->error){
	// 			echo $result->error();
	// 		}
	// 		else{
	// 			echo "ok";
	// 		}

	// }
	// test();

?>