<?php
	require("../models/PartylistModel.php");

	class PartylistView extends PartylistModel{

		public function create($Partylist, $LogoTmp){
			$model = new PartylistModel();
			return $model->creates($Partylist, $LogoTmp);
		}

		public function view(){
			$model = new PartylistModel();
			return $model->views();
		}

	}

	function collectionFunctions(){

		$view = new PartylistView();

		if($_POST['method'] == "create"){
			echo $view->create($_POST['partylist-name'] , $_FILES['partylist-logo']['tmp_name']);
		}

		if($_POST['method'] == "view"){
			echo $view->view();
		}

	}
	collectionFunctions();

?>