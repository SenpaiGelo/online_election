<?php
	require("../configuration/database.php");

	class PartylistModel extends Database{
		protected function creates($Partylist , $LogoTmp){
			$con = new Database();
			$partylist = mysqli_real_escape_string($con->connection(), $Partylist);
			if($Partylist != "" && $LogoTmp != "" ){
				$check = "SELECT * FROM `partylists` WHERE `partylist` = '$partylist' ";
				$rcheck = $con->connection()->query($check);
				if($rcheck->num_rows > 0){
					return json_encode(array("status"=>"error" , "messages"=>"Partylist already registered."));
				}
				else{
					$path = $partylist.".jpg";
					move_uploaded_file($LogoTmp, "../includes/images/partylist-logo/".$path);
					$sql = "INSERT INTO `partylists`(`partylist`,`logo`)VALUES('$partylist' , '$path')";
					$result = $con->connection()->query($sql);
					return json_encode(array("status"=>"success" , "messages"=>"Created Successfully."));
				}
			}
			else{
				return json_encode(array("status"=>"error" , "messages"=>"Please fill all required fields."));
			}
		}

		protected function views(){
			$con = new Database();
			$data = array();
			$sql = "SELECT * FROM `partylists` ";
			$result = $con->connection()->query($sql);
			if($result->num_rows > 0){
				while($row = $result->fetch_assoc()){
					array_push($data, "
							<tr>
                                <td class='text-center' >
                                	<img src='./includes/images/partylist-logo/".$row['logo']."' width='100px' height='100px' alt=''>
                                </td>
                                <td>".$row['partylist']."</td>
                                <td class='text-center' >
                                    <button  data-logo='".$row['logo']."' data-id='".$row['id']."' id='del-partylist' class='btn btn-danger fa fa-trash' ></button>
                                </td>
                            </tr>
						");
				}
				return json_encode($data);
			}
		}

		protected function dels($ID,$Logo){
			$con = new Database();
			$id = mysqli_real_escape_string($con->connection(), $ID);
			$sql = "DELETE FROM `partylists` WHERE `id` = '$id' ";
			$result = $con->connection()->query($sql);
			unlink("../includes/images/partylist-logo/".$Logo);
			return json_encode(array("status"=>"success","messages"=>"Deleted successfully."));
		}
	}
?>