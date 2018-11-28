<?php $currentNavTop = "About" ?>
<?php include ('includes/header.php'); ?>
<?php include ('includes/connection.php'); ?>
<?php 
	$a = new About;
	$about = $a->getAbout();
?>

<div id="TopicPath">
	<ul>
		<li class="FirstItem">
			<a href="index.php">Hitachi Power Tools (Thailand) Top</a>
		</li>
		<li>
			About us
		</li>
	</ul>
</div><!--/TopicPath-->


<div id="Contents">
	<div class="GridSet">
		<div class="Grid3">
			<div class="PageTitleStyle1">
				<h1><a name="body" id="body">About Hitachi Power Tools (Thailand)</a></h1>
				
			</div>

			<div class="Section">
				<center>
					<?php 
						if(isset($about["user_image_dir"])) {
							echo "<img style=\"max-width: 80%\" src='".$about["user_image_dir"]."' />";
						}
					?>
				</center>
				<p class="TextStyle1">
					<?php 
						if(isset($about["description_en"])) {
							echo $about["description_en"];
						}
					?>
				</p>
			</div>
			<div class="Section">
				<ul class="PageTop">
					<li><a href="#top">Page top</a></li>
				</ul>
			</div>
		</div><!-- Grid4 -->
		<div class="Grid1">
			<div id="VerticalLocalNavi">
				<ul>
					<li class="FirstItem Current"><a href="about.php"><strong>About</strong></a></li>
					<li class=""><a href="news.php">News</a></li>
				
				</ul>
			</div><!--/LocalNavi-->
			
		</div><!-- Grid1 -->

	</div><!--/GridSet-->
</div><!--/Contents-->

<?php include ('includes/footer.php'); ?>