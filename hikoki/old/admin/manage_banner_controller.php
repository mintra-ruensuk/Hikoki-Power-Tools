<?php 
	include ('includes/header.php'); 
	include ('includes/connection.php'); 
?>
<?php
	ob_start();
	$target_dir = "../image/banner_uploads/";
	
	$target_file = $target_dir . basename($_FILES["bannerFile"]["name"]);
	$user_dir = "image/banner_uploads/" . basename($_FILES["bannerFile"]["name"]);
	if($_POST["action_type"] == "addNewBanner") {
		
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["bannerFile"]["tmp_name"]);
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
		if ($_FILES["bannerFile"]["size"] > 2000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
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
		    if (move_uploaded_file($_FILES["bannerFile"]["tmp_name"], $target_file)) {
		        // echo "The file ". basename( $_FILES["bannerFile"]["name"]). " has been uploaded.";
		    		// save image data to database
		    		$a = new newBannerForm;
		    		$response = $a->createBanner($target_file, $user_dir, $_POST['imageLink']);
		    		if($response == "true") {
		        	echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."index.php';</script>");
		        }else {
		        	echo "Sorry, can not save data.: $response" ;
		        }
		    } else {
		        echo "Sorry, there was an error uploading your file.";

		    }
		}
	}elseif($_POST["action_type"] == "deleteBanner") {

		$a = new newBannerForm;
		$response = $a->deleteBanner($_POST['imageid']);
		unlink($_POST["imagesrc"]);
		if($_POST["imagesrc"]) {
    	echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."index.php';</script>");
    }else {
    	echo "Sorry, can not delete banner.: $response" ;
    }
	}elseif($_POST["action_type"] == "updateBanner") {
		$a = new newBannerForm;
		$response = $a->updateBanner($_POST['image-link'], $_POST['imageid']);
		if($response == "true") {
			echo("<script>location.href = '".$GLOBALS['ADMIN_URL']."index.php';</script>");
		}else {
			echo "Sorry, can not update banner.: $response" ;
		}
	}
	
?>
<?php include ('includes/footer.php'); ?>