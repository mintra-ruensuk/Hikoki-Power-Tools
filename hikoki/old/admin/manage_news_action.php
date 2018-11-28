<?php
	include("includes/connection.php");
	include("includes/image_upload_check.php");

	$desEN = $_POST['editorEN'];
	$desTH = $_POST['editorTH'];
	$newsDate = $_POST['newsDate'];
	$id = $_POST['id'];

	$action = $_POST["action_type"];
	// print_r($_POST);

	if($action == "add") {
		$a = new News;
		$admin_dir = $user_dir = null;

		if($_FILES["imageFile"]["name"] != null) {
				$admin_dir = "../image/news/" . basename($_FILES["imageFile"]["name"]);
				$user_dir = "image/news/" . basename($_FILES["imageFile"]["name"]);
		}
		
		if(isset($id) && $id != null && $id != " " && $id != "/") {
			// update
			$result = $a->updateNews($newsDate, $desEN, $desTH, $admin_dir,$user_dir, $id);
		}else {
			// create
			$result = $a->createNews($newsDate, $desEN, $desTH, $admin_dir,$user_dir);
			
		}
		if($result == 'true')  {
			$successUpload = false; 
			if($_FILES["imageFile"]["name"] == null ){
				$successUpload = true;
			}
			if($_FILES["imageFile"]["name"] != null) {
				$successUpload = checkUploadImage("../image/news/", $_FILES["imageFile"], "manage_news.php", false);	
			}
			if($successUpload == true) {
				echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_news.php';</script>");
			}
			else {
				echo "Sorry there was a problem while uploading image and file..";
			}
		}else {
			echo "Error: $result";
		}
	}else if ($action == "delete") {
		$a = new News;
		$news = $a->getNewsById($id);
		$result = $a->deleteNews($id);
		
		if($result == 'true')  {
			if($news["admin_image_dir"] != null){
				unlink($news["admin_image_dir"]);
			}
			if($news["admin_file_dir"] != null){
				unlink($news["admin_file_dir"]);
			}
			
			header("location: ".$GLOBALS['ADMIN_URL']."manage_news.php");
			// echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_power_tools.php';</script>");
		}else {
			echo "Error: $result";
		}

	}
?>