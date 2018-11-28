<?php
	include("includes/connection.php");
	include("includes/image_upload_check.php");
	$productName = $_POST['productName'];
	$shortEN = $_POST['shortEN'];
	$shortTH = $_POST['shortTH'];
	$specEN = $_POST['editorEN'];
	$specTH = $_POST['editorTH'];
	$typeID = $_POST['typeID'];
	$isNewProduct = $_POST['isNewProduct'];
	$id = $_POST['id'];
	$action = $_POST["action_type"];
	if($isNewProduct == "on") {
		$isNewProduct = true;
	}
	// print_r($_POST);
	if($action == "addProduct") {
		$a = new OutdoorPower;
		$admin_dir = $user_dir = null;
		if($_FILES["imageFile"]["name"] != null) {
				$admin_dir = "../image/outdoor_power/" . basename($_FILES["imageFile"]["name"]);
				$user_dir = "image/outdoor_power/" . basename($_FILES["imageFile"]["name"]);
		}
		if($_FILES["pdfFile"]["name"] != null) {
				$admin_file_dir = "../image/outdoor_power/" . basename($_FILES["pdfFile"]["name"]);
				$user_file_dir = "image/outdoor_power/" . basename($_FILES["pdfFile"]["name"]);
		}
		if($id != null && $id != "" && $id != "/") {
			$result = $a->updateProduct($productName, $shortEN, $shortTH, $specEN, $specTH, $typeID, $isNewProduct, $admin_dir,$user_dir, $admin_file_dir, $user_file_dir, $id);
		}else {
			// create
			$result = $a->createProduct($productName, $shortEN, $shortTH, $specEN, $specTH, $typeID, $isNewProduct, $admin_dir,$user_dir, $admin_file_dir, $user_file_dir);
			
		}
		if($result == 'true')  {
			$successUpload = false; 
			if($_FILES["imageFile"]["name"] == null && $_FILES["pdfFile"]["name"] == null){
				$successUpload = true;
			}
			if($_FILES["imageFile"]["name"] != null) {
				$successUpload = checkUploadImage("../image/outdoor_power/", $_FILES["imageFile"], "manage_outdoor_power_tools.php", false);

				
			}
			if($_FILES["pdfFile"]["name"] != null) {
				$successUpload = checkUploadPDF("../image/outdoor_power/", $_FILES["pdfFile"], "manage_outdoor_power_tools.php", false);
			}

			if($successUpload == true) {
				echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_outdoor_power_tools.php';</script>");
			}
			else {
				echo "Sorry there was a problem while uploading image and file..";
			}
		}else {
			echo "Error: $result";
		}
	}else if($action == "Delete") {
		$a = new OutdoorPower;
		$product = $a->getProductById($id);
		$result = $a->deleteProduct($id);
		
		
		
		if($result == 'true')  {
			if($product["admin_image_dir"] != null){
				unlink($product["admin_image_dir"]);
			}
			if($product["admin_file_dir"] != null){
				unlink($product["admin_file_dir"]);
			}
			
			header("location: ".$GLOBALS['ADMIN_URL']."manage_outdoor_power_tools.php");
			// echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_power_tools.php';</script>");
		}else {
			echo "Error: $result";
		}
	}
?>