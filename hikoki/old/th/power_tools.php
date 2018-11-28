<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $currentNavTop = "Power Tools" ?>
<?php include ('includes/header.php'); ?>
<?php include ('includes/connection.php'); ?>
<style type="text/css">
	.product-name {
		float: left;
    display: inline-block;
    margin: 20px 0 0px 0px;
    padding: 10px 0 10px 10px;
    font-size: 83%;
    font-weight: bold;
    color: #ffffff;
    background-color: #333333;
    width: 96%;
	}
	.product-name a:link {
		color: white;
	}
</style>

<div id="TopicPath">
	<ul>
		<li class="FirstItem"><a href="index.php">Hitachi Power Tools (Thailand) Top</a></li>
		<li >เครื่องมือไฟฟ้า</li>
	</ul>
</div><!--/TopicPath-->
<div id="Contents">
	<div class="GridSet">
		<div class="Grid4" id="body" name="body">



			<div class="Section"> 
				<h2><span>สินค้าใหม่</span></h2>
				<div class="ColumnSet">

					<?php
						$a = new Product;
						$results = $a->getNewPowerToolsProduct();
						if (is_array($results) || is_object($results)){
							foreach ($results as $key=>$value) {
								if($key % 4 ==0) {
									echo "<div class='Column1 FirstItem'>";
								}else {
									echo "<div class='Column1'>";
								}
								echo "<div class='product-name'>";
								echo "<a href='power_tools_product.php?product_id=".$value["id"]."'>".$value["product_name"]."</a>";
								echo "</div>";
								echo "<a href='power_tools_product.php?product_id=".$value["id"]."'><img src='../".$value["user_image_dir"]."' width='100%'></a>";
								echo "</div><!--/Column1-->";
							}
						}
					?>

				
				</div><!--/ColumnSet-->
			</div>

			


			<div class="Section" style="margin-top: 20px;"> 
				<h2><span>สินค้า</span></h2>
			</div><!--/Section-->
			<div class="Section">
				<div class="ColumnSet">
					<!-- <div class="Column1 FirstItem">
						
							<div class="product-name">
								<a href="#">Li-ion Cordless Tools</a>
							</div>
							<a href="#"><img src="image/power_tools_type/liion.jpg" width="100%"></a>
					</div><!--/Column1--> 

					<?php
						$a = new PowerToolsType;
						$results = $a->getPowerToolsType();
						if (is_array($results) || is_object($results)){
							foreach ($results as $key=>$value) {
								if($key % 4 ==0) {
									echo "<div class='Column1 FirstItem'>";
								}else {
									echo "<div class='Column1'>";
								}
								echo "<div class='product-name'>";
								echo "<a href='power_tools_type.php?power_tools_type_id=".$value["id"]."'>".$value["type_name_th"]."</a>";
								echo "</div>";
								echo "<a href='power_tools_type.php?power_tools_type_id=".$value["id"]."'><img src='../".$value["user_image_dir"]."' width='100%'></a>";
								echo "</div><!--/Column1-->";
							}
						}
					?>

				
				</div><!--/ColumnSet-->
			</div><!--/Section-->


		</div><!--/Grid4-->
	</div><!--/GridSet-->
</div><!--/Contents-->


<?php include ('includes/footer.php'); ?>