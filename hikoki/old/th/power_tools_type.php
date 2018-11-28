<?php $currentNavTop = "Power Tools" ?>
<?php include ('includes/header.php'); ?>
<?php include ('includes/connection.php'); ?>
<?php
	$a = new Product;
	$b = new PowerToolsOrderList;
	$productTypeEnName;
	$orderListDataDB = null;
	if (isset($_GET['power_tools_type_id'])) {
		$productType = $a->getPowerToolsTypeById($_GET['power_tools_type_id']);
		$productTypeEnName = $productType['type_name_th'];
		$orderListDataDB = $b->getOrdeListByTypeId($_GET['power_tools_type_id']);
	}else {
		header("location: index.php");
	}

       if (! function_exists('array_column')) {
    function array_column(array $input, $columnKey, $indexKey = null) {
        $array = array();
        foreach ($input as $value) {
            if ( !array_key_exists($columnKey, $value)) {
                trigger_error("Key \"$columnKey\" does not exist in array");
                return false;
            }
            if (is_null($indexKey)) {
                $array[] = $value[$columnKey];
            }
            else {
                if ( !array_key_exists($indexKey, $value)) {
                    trigger_error("Key \"$indexKey\" does not exist in array");
                    return false;
                }
                if ( ! is_scalar($value[$indexKey])) {
                    trigger_error("Key \"$indexKey\" does not contain scalar value");
                    return false;
                }
                $array[$value[$indexKey]] = $value[$columnKey];
            }
        }
        return $array;
    }
}
?>
<link rel="stylesheet" href="css/all.css" type="text/css" media="screen,print" />
<style type="text/css">
	span.new img {
		margin-top: 7px;
		padding-left: 10px;
	}
</style>
<div id="TopicPath">
	<ul>
		<li class="FirstItem">
			<a href="index.php">Hitachi Power Tools (Thailand) Top</a>
		</li>
		<li>
			<a href="power_tools.php">เครื่องมือไฟฟ้า</a>
		</li>
		<li><?php echo $productTypeEnName; ?></li>
	</ul>
</div><!--/TopicPath-->
<div id="Contents">
	<div class="GridSet">
		<div class="Grid3">
			<div class="PageTitleStyle1">
				<h1>
					<a name="body" id="body"><?php echo $productType['type_name_th']?></a>
				</h1>
			</div>

			<div class="Section">
				<div class="main-content">
						<?php
							if (isset($_GET['power_tools_type_id'])) {
								$products = $a->getProductsByTypeId($_GET['power_tools_type_id']);
								if($orderListDataDB != null) {
									$orderList = $orderListDataDB["order_list"];
									$orderListSplitArray = explode(",", $orderList);
									$sortedProducts = array();
									foreach ($orderListSplitArray as $item) {
										array_push($sortedProducts, $products[array_search(trim($item), array_column($products, 'product_name'))]);
									}
									if(count($sortedProducts) > 0) {
										$products = $sortedProducts;
									}
								}
								if (is_array($products) || is_object($products)){
									foreach ($products as $key=>$value) {
										echo "<div class=\"subCategory-product-wrapper\">";
										echo "<div class=\"subCategory-product-image-wrapper\">";
										echo "<a href='power_tools_product.php?product_id=".$value["id"]."'><img src='../".$value["user_image_dir"]."' /></a>";
										echo "</div>";
										echo "<div class=\"subCategory-content-wrapper\">";
										echo "<a href='power_tools_product.php?product_id=".$value["id"]."'><strong>".$value["product_name"]."</strong>";
										echo "</a>";
										if($value["is_new_product"]) {
											echo "<span class=\"new\"><img src='image/en/r1/icon/icon_new.gif' /></span>";
										}

										echo "<p class=\"TextStyle1\">".$value["short_description_th"]."</p>";

										echo "<ul class=\"LinkListStyle1\" style=\"margin-bottom: 0px;\">";
										echo "<li ><a href='power_tools_product.php?product_id=".$value["id"]."'>อ่านต่อ</a>";
										echo "<ul><li>";

										echo "</div>";
										echo "</div>";
									}
								}
							}
						?>
        </div>
			</div>



		</div><!--/Grid3-->

		<div class="Grid1">
			<div id="VerticalLocalNavi">
				<ul>
					<li class="FirstItem"><a href="power_tools.php">สินค้าใหม่</a></li>
					<?php
						$a = new PowerToolsType;
						$results = $a->getPowerToolsType();

						if (is_array($results) || is_object($results)){
							foreach ($results as $key=>$value) {
								// if($key == 0) {
								// 	echo "<li class='FirstItem'>";
								// }
								if($value["id"] == $_GET['power_tools_type_id']) {
									echo "<li class=\"Current\">";
								}else {
									echo "<li>";
								}
								echo "<a href='power_tools_type.php?power_tools_type_id=".$value["id"]."'>";

								if($value["id"] == $_GET['power_tools_type_id']) {
									echo "<strong>".$value["type_name_th"]."</strong>";
								}else {
									echo $value["type_name_th"];
								}

								echo "</a>";
								echo "</li>";
							}
						}
					?>

				</ul>
			</div><!--/LocalNavi-->

		</div> <!-- /Grid1-->
	</div><!--/GridSet-->
</div><!--/Contents-->


<?php include ('includes/footer.php'); ?>
