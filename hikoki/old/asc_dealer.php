<?php $currentNavTop = "ASCDealer" ?>
<?php include ('includes/header.php'); ?>
<?php include ('includes/connection.php'); ?>

<?php 
	$a = new ASCDealer;
	// $ascDealers = $a->getAllASCDealers();
	
	if (isset($_GET['type_id']) && isset($_GET['region_id'])) {
		$type_id = $_GET['type_id'];
		$region_id = $_GET['region_id'][0];
		$ascDealers = $a->getASCDealersByRegionAndType($type_id, $region_id);
	}else {
		header("location: index.php");
	}
	// print_r($ascDealers);
?>
<link rel="stylesheet" href="css/all.css" type="text/css" media="screen,print" />
<div id="TopicPath">
	<ul>
		<li class="FirstItem">
			<a href="index.php">Hitachi Power Tools (Thailand) Top</a>
		</li>
		<li>
			 <?php
				 if($type_id == "asc"){
				 	echo "Authorized Service Center";
				 }else {
				 	echo "Dealer";
				 }
			 ?>
		</li>
	</ul>
</div><!--/TopicPath-->


<div id="Contents">
	<div class="GridSet">
		<div class="Grid3">
			<div class="PageTitleStyle1">
				<h1><a name="body" id="body">
					 <?php
						 if($type_id == "asc"){
						 	echo "Authorized Service Center";
						 }else {
						 	echo "Dealer";
						 }
					 ?>
				</a></h1>
				
			</div>

			<div class="Section">
				<div class="main-content">
						<?php 
							if (is_array($ascDealers) || is_object($ascDealers)){
								foreach ($ascDealers as $key=>$value) {
									echo "<div class=\"subCategory-product-wrapper\">";
									//echo "<div class=\"subCategory-content-wrapper\">";
									echo "<div class=\"\" >".$value["list_en"]."</div>";

									//echo "</div>";
									echo "</div>";
								}
							}
							
						?>
        </div>
			</div>
			<div class="Section">
				<ul class="PageTop">
					<li><a href="#top">Page top</a></li>
				</ul>
			</div>
		</div><!-- Grid3 -->

		<div class="Grid1">
			<div id="VerticalLocalNavi">
				<h2><a href="#">Authorized Service Center</a></h2>
				<ul>
				<?php
					$b = new ASCDealer;
					$regions = $b->getRegions();
					if (is_array($regions) || is_object($regions)){
						foreach ($regions as $key=>$value) {
							if($value["id"] == $region_id && $type_id == "asc") {
								echo "<li class=\"Current\">";
							}else {
								echo "<li>";
							}
							echo "<a href=\"asc_dealer.php?type_id=asc&region_id=".$value["id"]."\">";

							if($value["id"] == $region_id && $type_id == "asc") {
								echo "<strong>".$value["region_en"]."</strong>";
							}else {
								echo $value["region_en"];
							}
							
							echo "</a>";
							echo "</li>";
						}
					}
				?>
				</ul>
			</div><!--/localNav-->

			<div id="VerticalLocalNavi">
				<h2><a href="#">Dealer</a></h2>
				<ul>
				<?php
					$b = new ASCDealer;
					$regions = $b->getRegions();
					if (is_array($regions) || is_object($regions)){
						foreach ($regions as $key=>$value) {
							if($value["id"] == $region_id && $type_id == "dealer") {
								echo "<li class=\"Current\">";
							}else {
								echo "<li>";
							}
							echo "<a href=\"asc_dealer.php?type_id=dealer&region_id=".$value["id"]."\">";

							if($value["id"] == $region_id && $type_id == "dealer") {
								echo "<strong>".$value["region_en"]."</strong>";
							}else {
								echo $value["region_en"];
							}
							
							echo "</a>";
							echo "</li>";
						}
					}
				?>
				</ul>
			</div><!--/localNav-->


		</div>
	</div><!--/GridSet-->
</div><!--/Contents-->

<script type="text/javascript">
	$(document).ready(function(){
  

		$(".News").each(function () {
		    text = $(this).text();
		    if (text.length > 200) {
		        $(this).html(text.substr(0, 186) + "...");
		    }else {
		    	$(this).html(text.substr(0, text.length));
		    }
		});
	});
</script>
<?php include ('includes/footer.php'); ?>
