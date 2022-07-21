<?php 
	require("../models/PartylistModel.php");

	class PartylistController extends PartylistModel{
		public function del($ID, $Logo){
			$model = new PartylistModel();
			return $model->dels($ID,$Logo);
		}
	}

	function collectionFunctions(){

		$controller = new PartylistController();

		if($_POST['method'] == "del"){
			echo $controller->del($_POST['id'] , $_POST['logo']);
		}

	}
	collectionFunctions();

?>