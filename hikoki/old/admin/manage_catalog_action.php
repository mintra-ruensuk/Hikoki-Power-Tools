<?php
	include("includes/connection.php");
	include("includes/image_upload_check.php");
	$id = $_POST['id'];
	$action = $_POST["action_type"];

	// print_r($_POST);
	if($action == "addCatalog") {
		$a = new Catalog;
		$admin_dir = $user_dir = null;
		if($_FILES["imageFile"]["name"] != null) {
				$admin_dir = "../image/catalog/" . basename($_FILES["imageFile"]["name"]);
				$user_dir = "image/catalog/" . basename($_FILES["imageFile"]["name"]);
		}
		if($_FILES["pdfFile"]["name"] != null) {
				$admin_file_dir = "../image/catalog/" . basename($_FILES["pdfFile"]["name"]);
				$user_file_dir = "image/catalog/" . basename($_FILES["pdfFile"]["name"]);
		}
		if($id != null && $id != "" && $id != "/") {
			$result = $a->updateCatalog($admin_dir,$user_dir, $admin_file_dir, $user_file_dir, $id);
		}else {
			// create
			$result = $a->createCatalog($admin_dir,$user_dir, $admin_file_dir, $user_file_dir);
			
		}
		if($result == 'true')  {
			$successUpload = false; 
			if($_FILES["imageFile"]["name"] == null && $_FILES["pdfFile"]["name"] == null){
				$successUpload = true;
			}
			if($_FILES["imageFile"]["name"] != null) {
				$successUpload = checkUploadImage("../image/catalog/", $_FILES["imageFile"], "manage_catalog.php", false);

				
			}
			if($_FILES["pdfFile"]["name"] != null) {
				$successUpload = checkUploadPDF("../image/catalog/", $_FILES["pdfFile"], "manage_catalog.php", false);
			}

			if($successUpload == true) {
				echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_catalog.php';</script>");
			}
			else {
				echo "Sorry there was a problem while uploading image and file..";
			}
		}else {
			echo "Error: $result";
		}
	}else if($action == "Delete") {
		$a = new Catalog;
		$product = $a->getCatalogById($id);
		$result = $a->deleteCatalog($id);
		
		
		
		if($result == 'true')  {
			if($product["admin_image"] != null){
				unlink($product["admin_image"]);
			}
			if($product["admin_file"] != null){
				unlink($product["admin_file"]);
			}
			
			header("location: ".$GLOBALS['ADMIN_URL']."manage_catalog.php");
			// echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_power_tools.php';</script>");
		}else {
			echo "Error: $result";
		}
	}
?>