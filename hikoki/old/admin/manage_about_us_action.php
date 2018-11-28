<?php
	include("includes/connection.php");
	include("includes/image_upload_check.php");

	$desEN = $_POST['editorEN'];
	$desTH = $_POST['editorTH'];
	$id = $_POST['id'];

	$action = $_POST["action_type"];

	if($action == "add") {
		$a = new About;
		$admin_dir = $user_dir = null;

		if($_FILES["imageFile"]["name"] != null) {
				$admin_dir = "../image/about/" . basename($_FILES["imageFile"]["name"]);
				$user_dir = "image/about/" . basename($_FILES["imageFile"]["name"]);
		}
		
		if(isset($id) && $id != null && $id != " " && $id != "/") {
			// update
			$result = $a->updateAbout($desEN, $desTH, $admin_dir,$user_dir, $id);
		}else {
			// create
			$result = $a->createAbout($desEN, $desTH, $admin_dir,$user_dir);
			
		}
		if($result == 'true')  {
			$successUpload = false; 
			if($_FILES["imageFile"]["name"] == null ){
				$successUpload = true;
			}
			if($_FILES["imageFile"]["name"] != null) {
				$successUpload = checkUploadImage("../image/about/", $_FILES["imageFile"], "manage_about_us.php", false);	
			}
			if($successUpload == true) {
				echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_about_us.php';</script>");
			}
			else {
				echo "Sorry there was a problem while uploading image and file..";
			}
		}else {
			echo "Error: $result";
		}
	}
?>