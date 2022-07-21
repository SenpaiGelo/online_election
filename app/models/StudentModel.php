<?php
	require("../configuration/database.php");

	class StudentModel extends Database{

		protected function viewstudents($Show){
			$con = new Database();
			$show = mysqli_real_escape_string($con->connection(), $Show);
			$data = array();
			$sql = "SELECT * FROM students LIMIT ".$show;
			$result = $con->connection()->query($sql);

			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					if($row['profile'] == ""){
						array_push($data, "
							<tr>
                            	<td class='text-center' >
                                	<img src='./includes/images/student-profile/avatar.png' width='100px' width='100px' alt=''>
                            	</td>
                            	<td class='text-center fw-bold' >".$row['sid']."</td>
                            	<td class='text-center fw-bold' >".$row['firstname']."</td>
                            	<td class='text-center fw-bold' >".$row['lastname']."</td>
                        	</tr>
						");
					}
					else{
						array_push($data, "
							<tr>
                            	<td class='text-center' >
                                	<img class='shadow  rounded-circle' src='./includes/images/student-profile/".$row['profile']."' width='100px' width='100px' alt=''>
                            	</td>
                            	<td class='text-center fw-bold' >".$row['sid']."</td>
                            	<td class='text-center fw-bold' >".$row['firstname']."</td>
                            	<td class='text-center fw-bold' >".$row['lastname']."</td>
                        	</tr>
						");
					}
				}
				return json_encode($data);
			}
			else{
				return json_encode(array("status"=>"error" , "messages"=>"No data recoreded."));
			}
		}

		protected function searchstudents($Find){
			$con = new Database();
			$sid = mysqli_real_escape_string($con->connection(), $Find);
			$sql = "SELECT * FROM students WHERE `sid` = '$sid' ";
			$result = $con->connection()->query($sql);
			if($result->num_rows > 0){
				$row = $result->fetch_assoc();

				if($row['profile'] == ""){
					return json_encode(array("status"=>"success" , "messages"=>"
							<tr>
                            	<td class='text-center' >
                                	<img src='./includes/images/student-profile/avatar.png' width='100px' width='100px' alt=''>
                            	</td>
                            	<td class='text-center fw-bold' >".$row['sid']."</td>
                            	<td class='text-center fw-bold' >".$row['firstname']."</td>
                            	<td class='text-center fw-bold' >".$row['lastname']."</td>
                        	</tr>
						"));
					}
					else{
						return json_encode(array("status"=>"success" , "messages"=>"
							<tr>
                            	<td class='text-center' >
                                	<img class='shadow  rounded-circle' src='./includes/images/student-profile/".$row['profile']."' width='100px' width='100px' alt=''>
                            	</td>
                            	<td class='text-center fw-bold' >".$row['sid']."</td>
                            	<td class='text-center fw-bold' >".$row['firstname']."</td>
                            	<td class='text-center fw-bold' >".$row['lastname']."</td>
                        	</tr>
						"));
					}

			}
			else{
				return json_encode(array("status"=>"error" , "messages"=>"<tr>
                            	<td class='text-center text-danger' colspan='4' >No Data Recorded</td>
                        	</tr>"));
			}
		}

	}

?>