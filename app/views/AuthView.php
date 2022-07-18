<?php
	require("../models/AuthModel.php");

	class AuthView extends AuthModel{
	   
	   public function view_studentlogin($Email , $Password){
	   		$models = new AuthModel();
	   		return $models->model_studentlogin($Email , $Password);
	   }

	}

	function collectionFunctions(){
		$views = new AuthView();
		if( $_POST['method'] == "student"){
			echo $views->view_studentlogin($_POST['email'] , $_POST['password']);
		}
	}collectionFunctions();
	

?>