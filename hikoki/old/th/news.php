<?php $currentNavTop = "About" ?>
<?php include ('includes/header.php'); ?>
<?php include ('includes/connection.php'); ?>

<?php 
	$a = new News;
	$news = $a->getAllNews();
?>
<link rel="stylesheet" href="css/all.css" type="text/css" media="screen,print" />
<div id="TopicPath">
	<ul>
		<li class="FirstItem">
			<a href="index.php">Hitachi Power Tools (Thailand) Top</a>
		</li>
		<li>
			<a href="about.php">About Hitachi Power Tools (TH)</a>
		</li>
		<li>
			News
		</li>
	</ul>
</div><!--/TopicPath-->


<div id="Contents">
	<div class="GridSet">
		<div class="Grid3">
			<div class="PageTitleStyle1">
				<h1><a name="body" id="body">News</a></h1>
				
			</div>

			<div class="Section">
				<div class="main-content">
						<?php 
							if (is_array($news) || is_object($news)){
								foreach ($news as $key=>$value) {
									echo "<div class=\"subCategory-product-wrapper\">";
									echo "<div class=\"subCategory-product-image-wrapper\">";
									if($value["user_image_dir"] != null) {
										echo "<img src='../".$value["user_image_dir"]."' />";
									}else {
										echo "<img src='../image/default.png' />";
									}
									echo "</div>";
									echo "<div class=\"subCategory-content-wrapper\">";
									echo "<a href='news_detail.php?news_id=".$value["id"]."'><strong>".$value["news_date"]."</strong>";
									echo "</a>";
									echo "<div class=\"TextStyle1 News\" >".$value["news_en"]."</div>";
									
									echo "<ul class=\"LinkListStyle1\" style=\"margin-bottom: -30px;\">";
									echo "<li ><a href='news_detail.php?news_id=".$value["id"]."'>More</a>";
									echo "<ul><li>";

									echo "</div>";
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
				<ul>
					<li class="FirstItem"><a href="about.php">About</a></li>
					<li class="Current"><a href="news.php"><strong>News</strong></a></li>
				
				</ul>
			</div><!--/LocalNavi-->
		</div><!-- Grid1 -->
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