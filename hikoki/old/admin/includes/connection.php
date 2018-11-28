<?php

	class dbConn {
		public $conn;
		public function __construct(){

			include 'config.php';
			// Connect to server and select database.
			$this->conn = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $username, $password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->conn->exec("set names utf8");
		}
	};

	class newBannerForm extends dbConn {
		public function updateBanner($imageLink, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("UPDATE banner_index SET image_link = :image_link WHERE id = :id");
				$stmt->bindParam(':image_link', $imageLink);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}
		public function deleteBanner($image_id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM banner_index WHERE id = :image_id");
				$stmt->bindParam(':image_id', $image_id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
		public function getBanners() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * FROM banner_index WHERE status = 'active'");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function createBanner($imagePath, $imageUserPath, $imageLink) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("INSERT INTO banner_index(admin_path, image_path, image_link, status) VALUES (:image_path, :user_path, :image_link, 'active')");
				$stmt->bindParam(':image_path', $imagePath);
				$stmt->bindParam(':user_path', $imageUserPath);
				$stmt->bindParam(':image_link', $imageLink);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}
	};

	class SocialItemForm extends dbConn {
		public function updateItem($imageLink, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("UPDATE middle_row_social SET image_link = :image_link WHERE id = :id");
				$stmt->bindParam(':image_link', $imageLink);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}
		public function deleteItem($image_id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM middle_row_social WHERE id = :image_id");
				$stmt->bindParam(':image_id', $image_id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
		public function getSocialItems() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * FROM middle_row_social ");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function createItem($imageAdminPath, $imageUserPath, $imageLink) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("INSERT INTO middle_row_social(image_admin_path, image_user_path, image_link) VALUES (:image_path, :user_path, :image_link)");
				$stmt->bindParam(':image_path', $imageAdminPath);
				$stmt->bindParam(':user_path', $imageUserPath);
				$stmt->bindParam(':image_link', $imageLink);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}

	}

	class PowerToolsType extends dbConn {
		public function createType($nameEnglish, $nameThai, $orderNumber, $adminImageDir, $userImageDir) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "INSERT INTO POWER_TOOLS_TYPE(type_name_en, type_name_th, order_id";
				if($adminImageDir == null || $userImageDir == null) {
					$query .= ") ";
				}else {
					$query .= ", admin_image_dir, user_image_dir)";
				}
				$query .= " VALUES (:type_name_en, :type_name_th, :order_id";
				if($adminImageDir == null || $userImageDir == null) {
					$query .= ")";
				}else {
					$query .= ", :admin_image_dir, :user_image_dir)";
				}
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':type_name_en', $nameEnglish);
				$stmt->bindParam(':type_name_th', $nameThai);
				$stmt->bindParam(':order_id', $orderNumber);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image_dir', $adminImageDir);
					$stmt->bindParam(':user_image_dir', $userImageDir);
				}
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}

		public function getTypes() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from POWER_TOOLS_TYPE order by order_id asc;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function updateType($nameEnglish, $nameThai, $orderNumber, $id, $adminImageDir, $userImageDir) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE POWER_TOOLS_TYPE SET type_name_en = :type_name_en, type_name_th = :type_name_th, order_id = :order_id";
				if($adminImageDir != null && $userImageDir != null) {
					$query .= ", admin_image_dir = :admin_image_dir, user_image_dir = :user_image_dir ";
				}
				$query .= " WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':type_name_en', $nameEnglish);
				$stmt->bindParam(':type_name_th', $nameThai);
				$stmt->bindParam(':order_id', $orderNumber);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image_dir', $adminImageDir);
					$stmt->bindParam(':user_image_dir', $userImageDir);
				}
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '' ? 'true' : $err );

			return $success;
		}

		public function deleteType($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM POWER_TOOLS_TYPE WHERE id = :id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
	}
	class OutdoorPowerType extends dbConn {
		public function createType($nameEnglish, $nameThai, $orderNumber, $adminImageDir, $userImageDir) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "INSERT INTO OUTDOOR_POWER_TYPE(type_name_en, type_name_th, order_id";
				if($adminImageDir == null || $userImageDir == null) {
					$query .= ") ";
				}else {
					$query .= ", admin_image_dir, user_image_dir)";
				}
				$query .= " VALUES (:type_name_en, :type_name_th, :order_id";
				if($adminImageDir == null || $userImageDir == null) {
					$query .= ")";
				}else {
					$query .= ", :admin_image_dir, :user_image_dir)";
				}
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':type_name_en', $nameEnglish);
				$stmt->bindParam(':type_name_th', $nameThai);
				$stmt->bindParam(':order_id', $orderNumber);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image_dir', $adminImageDir);
					$stmt->bindParam(':user_image_dir', $userImageDir);
				}
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}

		public function getTypes() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from OUTDOOR_POWER_TYPE order by order_id asc;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function updateType($nameEnglish, $nameThai, $orderNumber, $id, $adminImageDir, $userImageDir) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE OUTDOOR_POWER_TYPE SET type_name_en = :type_name_en, type_name_th = :type_name_th, order_id = :order_id";
				if($adminImageDir != null && $userImageDir != null) {
					$query .= ", admin_image_dir = :admin_image_dir, user_image_dir = :user_image_dir ";
				}
				$query .= " WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':type_name_en', $nameEnglish);
				$stmt->bindParam(':type_name_th', $nameThai);
				$stmt->bindParam(':order_id', $orderNumber);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image_dir', $adminImageDir);
					$stmt->bindParam(':user_image_dir', $userImageDir);
				}
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '' ? 'true' : $err );

			return $success;
		}

		public function deleteType($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM OUTDOOR_POWER_TYPE WHERE id = :id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
	}


	class PowerTools extends dbConn {
		public function createProduct($productName, $shortEN, $shortTH, $specEN, $specTH, $typeID, $isNewProduct, $adminImageDir, $userImageDir, $adminFileDir, $userFileDir) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "INSERT INTO POWER_TOOLS(product_name, short_description_en, short_description_th, specification_en, specification_th, power_tools_type_id, is_new_product";
				if($adminImageDir == null && $adminFileDir == null) {
					$query .= ") ";
				}else if($adminFileDir == null && $adminImageDir != null){
					$query .= ", admin_image_dir, user_image_dir)";
				}else if($adminImageDir == null && $adminFileDir != null){
					$query .= ", admin_file_dir, user_file_dir)";
				}else {
					$query .= ", admin_image_dir, user_image_dir, admin_file_dir, user_file_dir)";
				}
				$query .= " VALUES (:product_name, :short_description_en, :short_description_th, :specification_en, :specification_th, :power_tools_type_id, :is_new_product ";
				if($adminImageDir == null && $adminFileDir == null) {
					$query .= ")";
				}else if($adminFileDir == null && $adminImageDir != null){
					$query .= ", :admin_image_dir, :user_image_dir)";
				}else if($adminImageDir == null && $adminFileDir != null){
					$query .= ", :admin_file_dir, :user_file_dir)";
				}else {
					$query .= ", :admin_image_dir, :user_image_dir, :admin_file_dir, :user_file_dir)";
				}
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':product_name', $productName);
				$stmt->bindParam(':short_description_en', $shortEN);
				$stmt->bindParam(':short_description_th', $shortTH);
				$stmt->bindParam(':specification_en', $specEN);
				$stmt->bindParam(':specification_th', $specTH);
				$stmt->bindParam(':power_tools_type_id', $typeID);
				$stmt->bindParam(':is_new_product', $isNewProduct);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image_dir', $adminImageDir);
					$stmt->bindParam(':user_image_dir', $userImageDir);
				}
				if($adminFileDir != null && $userFileDir != null) {
					$stmt->bindParam(':admin_file_dir', $adminFileDir);
					$stmt->bindParam(':user_file_dir', $userFileDir);
				}
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}

		public function getTypes() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from POWER_TOOLS_TYPE order by order_id asc;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getTypeById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from POWER_TOOLS_TYPE where id=:id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getProducts() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from POWER_TOOLS");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getProductById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from POWER_TOOLS where id=:id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function updateProduct($productName, $shortEN, $shortTH, $specEN, $specTH, $typeID, $isNewProduct, $adminImageDir,$userImageDir, $adminFileDir, $userFileDir, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE POWER_TOOLS SET product_name = :product_name, short_description_en = :short_description_en, short_description_th = :short_description_th, specification_en = :specification_en, specification_th = :specification_th, power_tools_type_id = :power_tools_type_id, is_new_product = :is_new_product ";
				if($adminImageDir != null && $adminFileDir != null) {
					$query .= ", admin_image_dir = :admin_image_dir, user_image_dir = :user_image_dir, admin_file_dir = :admin_file_dir, user_file_dir = :user_file_dir ";
				}else if($adminFileDir == null && $adminImageDir != null){
					$query .= ", admin_image_dir = :admin_image_dir, user_image_dir = :user_image_dir";
				}else if($adminImageDir == null && $adminFileDir != null){
					$query .= ", admin_file_dir = :admin_file_dir, user_file_dir =  :user_file_dir ";
				}
				$query .= " WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':product_name', $productName);
				$stmt->bindParam(':short_description_en', $shortEN);
				$stmt->bindParam(':short_description_th', $shortTH);
				$stmt->bindParam(':specification_en', $specEN);
				$stmt->bindParam(':specification_th', $specTH);
				$stmt->bindParam(':power_tools_type_id', $typeID);
				$stmt->bindParam(':is_new_product', $isNewProduct);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image_dir', $adminImageDir);
					$stmt->bindParam(':user_image_dir', $userImageDir);
				}
				if($adminFileDir != null && $userFileDir != null) {
					$stmt->bindParam(':admin_file_dir', $adminFileDir);
					$stmt->bindParam(':user_file_dir', $userFileDir);
				}
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '' ? 'true' : $err );

			return $success;
		}

		public function deleteProduct($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM POWER_TOOLS WHERE id = :id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
	}

	class OutdoorPower extends dbConn {
		public function createProduct($productName, $shortEN, $shortTH, $specEN, $specTH, $typeID, $isNewProduct, $adminImageDir, $userImageDir, $adminFileDir, $userFileDir) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "INSERT INTO OUTDOOR_POWER(product_name, short_description_en, short_description_th, specification_en, specification_th, outdoor_power_type_id, is_new_product";
				if($adminImageDir == null && $adminFileDir == null) {
					$query .= ") ";
				}else if($adminFileDir == null && $adminImageDir != null){
					$query .= ", admin_image_dir, user_image_dir)";
				}else if($adminImageDir == null && $adminFileDir != null){
					$query .= ", admin_file_dir, user_file_dir)";
				}else {
					$query .= ", admin_image_dir, user_image_dir, admin_file_dir, user_file_dir)";
				}
				$query .= " VALUES (:product_name, :short_description_en, :short_description_th, :specification_en, :specification_th, :outdoor_power_type_id, :is_new_product ";
				if($adminImageDir == null && $adminFileDir == null) {
					$query .= ")";
				}else if($adminFileDir == null && $adminImageDir != null){
					$query .= ", :admin_image_dir, :user_image_dir)";
				}else if($adminImageDir == null && $adminFileDir != null){
					$query .= ", :admin_file_dir, :user_file_dir)";
				}else {
					$query .= ", :admin_image_dir, :user_image_dir, :admin_file_dir, :user_file_dir)";
				}
				//echo $query;
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':product_name', $productName);
				$stmt->bindParam(':short_description_en', $shortEN);
				$stmt->bindParam(':short_description_th', $shortTH);
				$stmt->bindParam(':specification_en', $specEN);
				$stmt->bindParam(':specification_th', $specTH);
				$stmt->bindParam(':outdoor_power_type_id', $typeID);
				$stmt->bindParam(':is_new_product', $isNewProduct);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image_dir', $adminImageDir);
					$stmt->bindParam(':user_image_dir', $userImageDir);
				}
				if($adminFileDir != null && $userFileDir != null) {
					$stmt->bindParam(':admin_file_dir', $adminFileDir);
					$stmt->bindParam(':user_file_dir', $userFileDir);
				}
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}

		public function getTypes() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from OUTDOOR_POWER_TYPE order by order_id asc;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getTypeById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from OUTDOOR_POWER_TYPE where id=:id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getProducts() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from OUTDOOR_POWER");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getProductById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from OUTDOOR_POWER where id=:id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function updateProduct($productName, $shortEN, $shortTH, $specEN, $specTH, $typeID, $isNewProduct, $adminImageDir,$userImageDir, $adminFileDir, $userFileDir, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE OUTDOOR_POWER SET product_name = :product_name, short_description_en = :short_description_en, short_description_th = :short_description_th, specification_en = :specification_en, specification_th = :specification_th, outdoor_power_type_id = :outdoor_power_type_id, is_new_product = :is_new_product ";
				if($adminImageDir != null && $adminFileDir != null) {
					$query .= ", admin_image_dir = :admin_image_dir, user_image_dir = :user_image_dir, admin_file_dir = :admin_file_dir, user_file_dir = :user_file_dir ";
				}else if($adminFileDir == null && $adminImageDir != null){
					$query .= ", admin_image_dir = :admin_image_dir, user_image_dir = :user_image_dir";
				}else if($adminImageDir == null && $adminFileDir != null){
					$query .= ", admin_file_dir = :admin_file_dir, user_file_dir =  :user_file_dir ";
				}
				$query .= " WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':product_name', $productName);
				$stmt->bindParam(':short_description_en', $shortEN);
				$stmt->bindParam(':short_description_th', $shortTH);
				$stmt->bindParam(':specification_en', $specEN);
				$stmt->bindParam(':specification_th', $specTH);
				$stmt->bindParam(':outdoor_power_type_id', $typeID);
				$stmt->bindParam(':is_new_product', $isNewProduct);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image_dir', $adminImageDir);
					$stmt->bindParam(':user_image_dir', $userImageDir);
				}
				if($adminFileDir != null && $userFileDir != null) {
					$stmt->bindParam(':admin_file_dir', $adminFileDir);
					$stmt->bindParam(':user_file_dir', $userFileDir);
				}
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '' ? 'true' : $err );

			return $success;
		}

		public function deleteProduct($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM OUTDOOR_POWER WHERE id = :id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
	}

	class About extends dbConn {

		public function getAbout() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from ABOUT limit 1;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function createAbout($description_en, $description_th, $imageAdminPath, $imageUserLink) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("INSERT INTO ABOUT(description_en,description_th, admin_image_dir, user_image_dir) VALUES (:description_en, :description_th, :admin_image_dir, :user_image_dir)");
				$stmt->bindParam(':description_en', $description_en);
				$stmt->bindParam(':description_th', $description_th);
				$stmt->bindParam(':admin_image_dir', $imageAdminPath);
				$stmt->bindParam(':user_image_dir', $imageUserLink);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}

		public function updateAbout($description_en, $description_th, $imageAdminPath, $imageUserLink, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE ABOUT SET description_en = :description_en, description_th = :description_th";

				if($imageAdminPath != null && $imageUserLink != null) {
					$query .= ", admin_image_dir = :admin_image_dir, user_image_dir = :user_image_dir ";
				}
				$query .= " WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':description_en', $description_en);
				$stmt->bindParam(':description_th', $description_th);
				if($imageAdminPath != null && $imageUserLink != null) {
					$stmt->bindParam(':admin_image_dir', $imageAdminPath);
					$stmt->bindParam(':user_image_dir', $imageUserLink);
				}
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}

	}

	class News extends dbConn {
		public function createNews($newsDate, $news_en, $news_th, $imageAdminPath, $imageUserLink) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("INSERT INTO NEWS(news_date, news_en,news_th, admin_image_dir, user_image_dir) VALUES (:news_date, :news_en, :news_th, :admin_image_dir, :user_image_dir)");
				$stmt->bindParam(':news_date', $newsDate);
				$stmt->bindParam(':news_en', $news_en);
				$stmt->bindParam(':news_th', $news_th);
				$stmt->bindParam(':admin_image_dir', $imageAdminPath);
				$stmt->bindParam(':user_image_dir', $imageUserLink);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}
		public function updateNews($newsDate, $news_en, $news_th, $imageAdminPath, $imageUserLink, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE NEWS set news_date = :news_date,  news_en = :news_en ,news_th = :news_th";
				if($imageAdminPath != null && $imageUserLink != null) {
					$query .= ", admin_image_dir = :admin_image_dir, user_image_dir = :user_image_dir ";
				}
				$query .= " WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':news_date', $newsDate);
				$stmt->bindParam(':news_en', $news_en);
				$stmt->bindParam(':news_th', $news_th);
				if($imageAdminPath != null && $imageUserLink != null) {
					$stmt->bindParam(':admin_image_dir', $imageAdminPath);
					$stmt->bindParam(':user_image_dir', $imageUserLink);
				}
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}

		public function getNews() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from NEWS order by news_date desc;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function getNewsById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from NEWS where id=:id ;");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function deleteNews($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM NEWS WHERE id = :id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
	}


	class ASCDealer extends dbConn {
		public function createASCDealer($listEN, $listTH, $regionID,$typeID) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("INSERT INTO service_center_list(list_en, list_th, region_id, service_type) VALUES (:list_en, :list_th, :region_id, :service_type)");
				$stmt->bindParam(':list_en', $listEN);
				$stmt->bindParam(':list_th', $listTH);
				$stmt->bindParam(':region_id', $regionID);
				$stmt->bindParam(':service_type', $typeID);
				$stmt->execute();

			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}
		public function updateASCDealer($listEN, $listTH, $regionID,$typeID, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE service_center_list set list_en = :list_en,  list_th = :list_th ,region_id = :region_id, service_type = :service_type  WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':list_en', $listEN);
				$stmt->bindParam(':list_th', $listTH);
				$stmt->bindParam(':region_id', $regionID);
				$stmt->bindParam(':service_type', $typeID);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}

		public function getASCDealers() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from service_center_list;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getRegions() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from region;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function getASCDealerById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from service_center_list where id=:id ;");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function deleteASCDealer($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM service_center_list WHERE id = :id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
	}



	class Catalog extends dbConn {
		public function createCatalog($adminImageDir, $userImageDir, $adminFileDir, $userFileDir) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "INSERT INTO catalog(";
				if($adminImageDir == null && $adminFileDir == null) {
					$query .= ") ";
				}else if($adminFileDir == null && $adminImageDir != null){
					$query .= "admin_image, user_image)";
				}else if($adminImageDir == null && $adminFileDir != null){
					$query .= "admin_file, user_file)";
				}else {
					$query .= "admin_image, user_image, admin_file, user_file)";
				}
				$query .= " VALUES ( ";
				if($adminImageDir == null && $adminFileDir == null) {
					$query .= ")";
				}else if($adminFileDir == null && $adminImageDir != null){
					$query .= ":admin_image, :user_image)";
				}else if($adminImageDir == null && $adminFileDir != null){
					$query .= ":admin_file, :user_file)";
				}else {
					$query .= ":admin_image, :user_image, :admin_file, :user_file)";
				}
				//echo $query;
				$stmt = $db->conn->prepare($query);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image', $adminImageDir);
					$stmt->bindParam(':user_image', $userImageDir);
				}
				if($adminFileDir != null && $userFileDir != null) {
					$stmt->bindParam(':admin_file', $adminFileDir);
					$stmt->bindParam(':user_file', $userFileDir);
				}
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};

			return $success;
		}

		public function getCatalogs() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from catalog;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}
		public function getTypeById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from OUTDOOR_POWER_TYPE where id=:id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function getCatalogById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from catalog where id=:id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function updateCatalog($adminImageDir,$userImageDir, $adminFileDir, $userFileDir, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE catalog SET ";
				if($adminImageDir != null && $adminFileDir != null) {
					$query .= "admin_image = :admin_image, user_image = :user_image, admin_file = :admin_file, user_file = :user_file ";
				}else if($adminFileDir == null && $adminImageDir != null){
					$query .= "admin_image = :admin_image, user_image = :user_image";
				}else if($adminImageDir == null && $adminFileDir != null){
					$query .= "admin_file = :admin_file, user_file =  :user_file ";
				}
				$query .= " WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				if($adminImageDir != null && $userImageDir != null) {
					$stmt->bindParam(':admin_image', $adminImageDir);
					$stmt->bindParam(':user_image', $userImageDir);
				}
				if($adminFileDir != null && $userFileDir != null) {
					$stmt->bindParam(':admin_file', $adminFileDir);
					$stmt->bindParam(':user_file', $userFileDir);
				}
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '' ? 'true' : $err );

			return $success;
		}

		public function deleteCatalog($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM catalog WHERE id = :id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
	}

	class Video extends dbConn {
		public function createVideo($URL) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("INSERT INTO video_youtube(url) VALUES (:url)");
				$stmt->bindParam(':url', $URL);
				$stmt->execute();

			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}
		public function updateVideo($URL, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE video_youtube set url = :url WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':url', $URL);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}

		public function getVideos() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from video_youtube order by id desc;");
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}


		public function getVideoById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from video_youtube where id=:id ;");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

		public function deleteVideo($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("DELETE FROM video_youtube WHERE id = :id");
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
				catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			$success = ($err == '') ? 'true' : $error;
			return $success;
		}
	}

	class PowerToolsOrderList extends dbConn {
		public function createOrderList($orderList, $typeId) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$stmt = $db->conn->prepare("INSERT INTO POWER_TOOLS_ORDERLIST(order_list, power_tools_type) VALUES (:order_list, :power_tools_type)");
				$stmt->bindParam(':order_list', $orderList);
				$stmt->bindParam(':power_tools_type', $typeId);
				$stmt->execute();

			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}
		public function updateOrderList($orderList, $typeId, $id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				// prepare sql and bind parameters
				$query = "UPDATE POWER_TOOLS_ORDERLIST set order_list = :order_list, power_tools_type = :power_tools_type WHERE id = :id";
				$stmt = $db->conn->prepare($query);
				$stmt->bindParam(':order_list', $orderList);
				$stmt->bindParam(':power_tools_type', $typeId);
				$stmt->bindParam(':id', $id);
				$stmt->execute();
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			//Determines returned value ('true' or error code)
			if ($err == '') {
				$success = 'true';
			}
			else {
				$success = $err;
			};
			return $success;
		}



		public function getOrdeListByTypeId($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from POWER_TOOLS_ORDERLIST where power_tools_type=:id ;");
				$stmt->bindParam(':id', $id);
				$stmt->execute();

				// Gets query result
				$results = $stmt->fetch(PDO::FETCH_ASSOC);
			}
			catch (PDOException $e) {
				$err = "Error: " . $e->getMessage();
			}
			$success = ($err == '' ? $results : $err );

			return $success;
		}

	}
		class OurdoorPowerToolsOrderList extends dbConn {
			public function createOrderList($orderList, $typeId) {
				include 'config.php';
				try {
					$db = new dbConn;
					$err = '';
					// prepare sql and bind parameters
					$stmt = $db->conn->prepare("INSERT INTO OUTDOOR_POWER_TOOLS_ORDERLIST(order_list, outdoor_power_tools_type) VALUES (:order_list, :outdoor_power_tools_type)");
					$stmt->bindParam(':order_list', $orderList);
					$stmt->bindParam(':outdoor_power_tools_type', $typeId);
					$stmt->execute();

				}
				catch (PDOException $e) {
					$err = "Error: " . $e->getMessage();
				}
				//Determines returned value ('true' or error code)
				if ($err == '') {
					$success = 'true';
				}
				else {
					$success = $err;
				};
				return $success;
			}
			public function updateOrderList($orderList, $typeId, $id) {
				include 'config.php';
				try {
					$db = new dbConn;
					$err = '';
					// prepare sql and bind parameters
					$query = "UPDATE OUTDOOR_POWER_TOOLS_ORDERLIST set order_list = :order_list WHERE outdoor_power_tools_type = :outdoor_power_tools_type";
					$stmt = $db->conn->prepare($query);
					$stmt->bindParam(':order_list', $orderList);
					$stmt->bindParam(':outdoor_power_tools_type', $typeId);
					$stmt->execute();
				}
				catch (PDOException $e) {
					$err = "Error: " . $e->getMessage();
				}
				//Determines returned value ('true' or error code)
				if ($err == '') {
					$success = 'true';
				}
				else {
					$success = $err;
				};
				return $success;
			}



			public function getOrdeListByTypeId($id) {
				include 'config.php';
				try {
					$db = new dbConn;
					$err = '';
					$stmt = $db->conn->prepare("select * from OUTDOOR_POWER_TOOLS_ORDERLIST where outdoor_power_tools_type=:id ;");
					$stmt->bindParam(':id', $id);
					$stmt->execute();

					// Gets query result
					$results = $stmt->fetch(PDO::FETCH_ASSOC);
				}
				catch (PDOException $e) {
					$err = "Error: " . $e->getMessage();
				}
				$success = ($err == '' ? $results : $err );

				return $success;
			}

	}
?>
