<?php

	class dbConn {
		public $conn;
		public function __construct(){

			include 'config.php';
			// Connect to server and select database.
			$this->conn = new PDO('mysql:host='.$host.';dbname='.$db_name.';charset=utf8', $username, $password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	};

	class indexPage extends dbConn {

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
	};

	class SocialItemForm extends dbConn {
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
	};
	class PowerToolsType extends dbConn {
		public function getPowerToolsType() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * from POWER_TOOLS_TYPE order by order_id asc; ");
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
	}
	class Product extends dbConn {
		public function getNewPowerToolsProduct() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * from POWER_TOOLS where is_new_product = 1 order by id desc; ");
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
		public function getPowerToolsTypeById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * from POWER_TOOLS_TYPE where id =:id; ");
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

		public function getProductsByTypeId($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from POWER_TOOLS where power_tools_type_id = :id order by id desc;");
				$stmt->bindParam(':id', $id);
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
	}

	class OutdoorToolsType extends dbConn {
		public function getPowerToolsType() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * from OUTDOOR_POWER_TYPE order by order_id asc; ");
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
	}
	class Outdoor extends dbConn {
		public function getNewToolsProduct() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * from OUTDOOR_POWER where is_new_product = 1 order by id desc; ");
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
		public function getToolsTypeById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("SELECT * from OUTDOOR_POWER_TYPE where id =:id; ");
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

		public function getProductsByTypeId($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from OUTDOOR_POWER where outdoor_power_type_id = :id;");
				$stmt->bindParam(':id', $id);
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
	}

	class News extends dbConn {
		public function getNews() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from NEWS order by news_date desc limit 10;");
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

		public function getAllNews() {
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
	}

	class ASCDealer extends dbConn {
		public function getAllASCDealers() {
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
		public function getRegiontById($id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from region where id=:id ;");
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

		public function getASCDealersByRegionAndType($type_id, $region_id) {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from service_center_list where service_type=:type_id and region_id = :region_id ;");
				$stmt->bindParam(':type_id', $type_id);
				$stmt->bindParam(':region_id', $region_id);
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
	}

	class Catalog extends dbConn {
		public function getCatalogs() {
			include 'config.php';
			try {
				$db = new dbConn;
				$err = '';
				$stmt = $db->conn->prepare("select * from catalog order by id desc;");
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
	}

	class Video extends dbConn {

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
	}

	class PowerToolsOrderList extends dbConn {
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
