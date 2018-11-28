<?php
	include("includes/connection.php");
	$videoURL = $_POST['videoURL'];
	$id = $_POST['id'];
	$action = $_POST["action_type"];
	// print_r($_POST);
	if($action == "addVideo") {
		$a = new Video;
		
		if($id != null && $id != "" && $id != "/") {
			$result = $a->updateVideo($videoURL, $id);
		}else {
			// create
			$result = $a->createVideo($videoURL);
			
		}
		if($result == 'true')  {
			echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_video.php';</script>");
			
		}else {
			echo "Error: $result";
		}
	}else if($action == "Delete") {
		$a = new Video;
		$result = $a->deleteVideo($id);
		
		
		
		if($result == 'true')  {
			
			header("location: ".$GLOBALS['ADMIN_URL']."manage_video.php");
			// echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."manage_power_tools.php';</script>");
		}else {
			echo "Error: $result";
		}
	}
?>