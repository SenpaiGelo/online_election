<?php
	require '../models/AuthModel.php';

	class AuthController extends AuthModel{

		public function createStudent($Email , $SID , $FirstName , $LastName, $Password){
			$model = new AuthModel();
			return $model->createStudents($Email , $SID , $FirstName , $LastName, $Password);
		}

	}

	function collectionFunctions(){
		$controller = new AuthController();
		if($_POST['method'] == "create"){
			echo $controller->createStudent($_POST['email'] , $_POST['sid'] , $_POST['firstname'] , $_POST['lastname'] , $_POST['password'] );
		}
	}
	collectionFunctions();

?>