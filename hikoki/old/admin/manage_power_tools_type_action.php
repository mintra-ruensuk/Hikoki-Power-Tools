<?php
	include("includes/connection.php");
	include("includes/image_upload_check.php");

	$nameEnglish = $_POST['nameEnglish'];
	$nameThai = $_POST['nameThai'];
	$orderNumber = $_POST['orderNumber'];
	$id = $_POST['id'];
	$action = $_POST["action_type"];

	if($action == "addType") {
		$a = new PowerToolsType;
		if($orderNumber == "" && $orderNumber == null) {
			$orderNumber = 999;
		}
		$admin_dir = $user_dir = null;
		if($_FILES["bannerFile"]["name"] != null) {
				$admin_dir = "../image/power_tools_type/" . basename($_FILES["bannerFile"]["name"]);
				$user_dir = "image/power_tools_type/" . basename($_FILES["bannerFile"]["name"]);
		}
		if($id != null && $id != "") {
			// update
			$result = $a->updateType($nameEnglish, $nameThai, $orderNumber, $id, $admin_dir, $user_dir);
		}else {
			// create
			$result = $a->createType($nameEnglish, $nameThai, $orderNumber, $admin_dir, $user_dir);
			
		}
		if($result == 'true')  {
			if($_FILES["bannerFile"]["name"] != null) {
				checkUploadImage("../image/power_tools_type/", $_FILES["bannerFile"], "manage_power_tools_type.php", "");
			}else {
				echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_power_tools_type.php';</script>");
			}
		}else {
			echo "Error: $result";
		}
		
	}elseif($action == "Delete") {
		$a = new PowerToolsType;
		$result = $a->deleteType($id);
		if($result == 'true')  {
			if($_POST["imagesrc"] != "" && $_POST["imagesrc"] != "") {
				checkUploadImage("../image/power_tools_type/", $_POST["imagesrc"], "manage_power_tools_type.php", "Delete");
			}
			
			echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_power_tools_type.php';</script>");
		}else {
			echo "Error: $result";
		}

	}

?>