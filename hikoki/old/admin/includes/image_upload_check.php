<?php
	function checkUploadImage($target_dir, $filename, $redirectLocation, $isDelete){
		$target_file = $target_dir . basename($filename["name"]);
		$user_dir = "image/banner_uploads/" . basename($filename["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if($isDelete == "Delete") {
			unlink($target_file);
			return false;
		}

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($filename["tmp_name"]);
		    if($check !== false) {
		        // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		//if ($filename["size"] > 2000000) {
		//    echo "Sorry, your file is too large.";
		//    $uploadOk = 0;
		//}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($filename["tmp_name"], $target_file)) {
		       echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."$redirectLocation';</script>");
		    	return true;
		    } else {
		        echo "Sorry, there was an error uploading your file.";

		    }
		}
	}

	function checkUploadPDF($target_dir, $filename, $redirectLocation, $isDelete){
		$target_file = $target_dir . basename($filename["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if($isDelete == "Delete") {
			unlink($target_file);
			return false;
		}

		
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		//if ($filename["size"] > 2000000) {
		//    echo "Sorry, your file is too large.";
		//    $uploadOk = 0;
		//}
		// Allow certain file formats
		if($imageFileType != "pdf") {
		    echo "Sorry, only PDF file is allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($filename["tmp_name"], $target_file)) {
		       //echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."$redirectLocation';</script>");
		    	return true;
		    } else {
		        echo "Sorry, there was an error uploading your file.";

		    }
		}
	}
?>
