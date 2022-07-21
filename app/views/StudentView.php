<?php
	require("../models/StudentModel.php");

	class StudentView extends StudentModel{
		public function viewstudent($Show){
			$model = new StudentModel();
			return $model->viewstudents($Show);
		}

		public function searchstudent($Find){
			$model = new StudentModel();
			return $model->searchstudents($Find);
		}

	}

	function collectionFunctions(){
		$views = new StudentView();
		if( $_POST['method'] == "viewstudent"){
			echo $views->viewstudent($_POST['show']);
		}

		if( $_POST['method'] == "searchstudent"){
			echo $views->searchstudent($_POST['find']);
		}

	}collectionFunctions();
?>