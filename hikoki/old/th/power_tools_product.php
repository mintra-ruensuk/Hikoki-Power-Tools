<?php $currentNavTop = "Power Tools" ?>
<?php include ('includes/header.php'); ?>
<?php include ('includes/connection.php'); ?>
<style type="text/css">
	table {
		width: 100% !important;
	}
</style>
<?php
	$a = new Product;
	if (isset($_GET['product_id'])) {
		$product = $a->getProductById($_GET['product_id']);
		$productType = $a->getPowerToolsTypeById($product['power_tools_type_id']);
		// print_r($product);
	}else {
		header("location: index.php");
	}
?>
<div id="TopicPath">
	<ul>
		<li class="FirstItem">
			<a href="index.php">Hitachi Power Tools (Thailand) Top</a>
		</li>
		<li>
			<a href="power_tools.php">เครื่องมือไฟฟ้า</a>
		</li>
		<li>
			<a href="power_tools_type?power_tools_type_id=<?php echo $productType["id"]; ?>">
				<?php echo $productType["type_name_th"]; ?>
			</a>
		</li>
		<li>
			<?php echo $product["product_name"]; ?>
		</li>
	</ul>
</div><!--/TopicPath-->

<div id="Contents">
	<div class="GridSet">
		<div class="Grid3">
			<div class="PageTitleStyle1">
				<h1>
					<a name="body" id="body">
						<?php echo $product['product_name']?>
					</a>
				</h1>
				<p class="SubTitle"><strong><?php echo $product['short_description_th']?></strong></p>
			</div>

			<div class="Section"> 
				<?php 
					if(isset($product['user_file_dir'])) {
						echo "<ul class=\"LinkListStyle2\">";
						echo "<li class=\"Pdf\">";
						echo "<a href='".$product['user_file_dir']."'' target=\"_blank\">PDF Leaflet</a>";
						echo "</li>";
						echo "</ul>";

					}
				?>
				<center>
					<img src="../<?php echo $product['user_image_dir']?>" />
				</center>
			</div>
			<br/>
			<div class="Section"> 
				<h2><span>Specifications</span></h2>
				<?php echo $product['specification_th'] ?>
			</div>



		</div><!--/Grid3-->
		<div class="Grid1">
			<div id="VerticalLocalNavi">
				<ul>
					<li class="FirstItem"><a href="power_tools.php">สินค้าใหม่</a></li>
					<?php
						$b = new PowerToolsType;
						$results = $b->getPowerToolsType();

						if (is_array($results) || is_object($results)){
							foreach ($results as $key=>$value) {
								// if($key == 0) {
								// 	echo "<li class='FirstItem'>";
								// }
								if($value["id"] == $productType["id"]) {
									echo "<li class=\"Current\">";
								}else {
									echo "<li>";
								}
								echo "<a href='power_tools_type.php?power_tools_type_id=".$value["id"]."'>";

								if($value["id"] == $productType["id"]) {
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