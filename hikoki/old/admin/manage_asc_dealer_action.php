<?php
	include("includes/connection.php");

	$listEN = $_POST['editorEN'];
	$listTH = $_POST['editorTH'];
	$id = $_POST['id'];
	$regionID = $_POST['regionID'];
	$typeID = $_POST['serviceID'];

	$action = $_POST["action_type"];
	// print_r($_POST);

	if($action == "add") {
		$a = new ASCDealer;
		
		if(isset($id) && $id != null && $id != " " && $id != "/") {
			// update
			$result = $a->updateASCDealer($listEN, $listTH, $regionID,$typeID, $id);
		}else {
			// create
			$result = $a->createASCDealer($listEN, $listTH, $regionID,$typeID);
			
		}
		if($result == 'true')  {
			header("location: ".$GLOBALS['ADMIN_URL']."manage_asc_dealer.php");;
		}else {
			echo "Error: $result";
		}
		
	}else if ($action == "delete") {
		$a = new ASCDealer;
		$result = $a->deleteASCDealer($id);
		
		if($result == 'true')  {
			header("location: ".$GLOBALS['ADMIN_URL']."manage_asc_dealer.php");;
		}else {
			echo "Error: $result";
		}

	}
?>