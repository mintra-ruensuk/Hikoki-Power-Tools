<?php $currentNavTop = "About" ?>
<?php include ('includes/header.php'); ?>
<?php include ('includes/connection.php'); ?>

<?php 
	$a = new News;
	if(!isset($_GET["news_id"])) {
		return;
	}else {
		$news = $a->getNewsById($_GET["news_id"]);	
	}
	
?>
<div id="TopicPath">
	<ul>
		<li class="FirstItem">
			<a href="index.php">Hitachi Power Tools (Thailand) Top</a>
		</li>
		<li>
			<a href="about.php">About Hitachi Power Tools (TH)</a>
		</li>
		<li>
			<a href="news.php">News</a>
		</li>
		<li>
			<?php echo $news["news_date"] ?>
		</li>
	</ul>
</div><!--/TopicPath-->


<div id="Contents">
	<div class="GridSet">
		<div class="Grid3">
			<div class="PageTitleStyle1">
				<h1><a name="body" id="body">News: <?php echo $news["news_date"] ?></a></h1>
				
			</div>

			<div class="Section">
				<center>
					<?php 
						if(isset($news["user_image_dir"])) {
                                                        echo "<img style='max-width: 80%' src='../".$news["user_image_dir"]."'  />";
						}
					?>
				</center>
				<p class="TextStyle1">
					<?php 
						if(isset($news["news_th"])) {
							echo $news["news_th"];
						}
					?>
				</p>
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