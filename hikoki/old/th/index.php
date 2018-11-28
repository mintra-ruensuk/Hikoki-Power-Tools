<?php $currentNavTop = "" ?>

<?php include ('includes/header.php'); ?>
<?php include ('includes/connection.php'); ?>
<link rel="stylesheet" href="css/slick.css" type="text/css" media="screen,print" />
<link rel="stylesheet" href="css/slick-theme.css" type="text/css" media="screen,print" />
<link rel="stylesheet" href="css/en/r1/corporate.css" type="text/css" media="screen,print" />
<link rel="stylesheet" href="css/top.css" type="text/css" media="screen,print" />
<script type="text/javascript" src="js/slick.min.js"></script>


<div id="Contents">
	<div class="GridSet">
		<div class="Grid4" id="body" name="body">
		  <div class="ResponsiveBrandingImgStyle">
				<div id="BrandingImgStyle2" class="carouse">
					<div>
						<a href="$link$">
							<img class="Img" src="image/banner_uploads/brand.jpg" alt="Hitachi ABC IT Solutions Collaborative Innovation throught Advanced IT View Details" width="965" height="300" />
						</a>
					</div>
					<?php 
				  	$a = new indexPage;
				  	$banners = $a->getBanners();
				  	if (is_array($banners) || is_object($banners)){
							foreach ($banners as $result) {
								echo "<div><a href='". $result["image_link"]."'><img src='../". $result["image_path"] ."' ></a></div>";
							}
						}
				  ?>
				<!-- <div class="ResponsiveTextSet">
					<p class="TextStyle2">Hitachi ABC ITSolutions </p>
					<p class="TextStyle2 TopBorderSet"><strong>Collaborative Innovation</strong><br /><em>throught Advanced IT</em></p>
					<p class="ButtonStyle1"><a href="$link$">View Details </a></p>
				</div> -->
			</div><!--/BrandingImgStyle-->
			</div><!--/ResponsiveBrandingImgStyle-->


			<div class="Section">
				<ul class="ColumnSet Panel">
					<li class="Column1 FirstItem" >
						<div class="Inner">
								<img src="image/powertools.jpg" alt="Power Tools" width="100%" height="152" />
								<strong>เครื่องมือไฟฟ้า</strong>
							<div class="menu">
								<ul class="LinkListStyle1" style="padding-left: 15px;">
									<li><a href="power_tools.php">สินค้า</a></li>
									<li><a href="power_tools.php#top">สินค้าใหม่</a></li>
									<li><a href="https://devs.hitachi-koki.co.jp/ois/login.html?te-uniquekey=1470f5b54a3">Technical Service & Support</a></li>
								</ul>
							</div>
						</div>
					</li>

					<li class="Column1" >
						<div class="Inner">
								<img src="image/equipment.jpg" alt="Outdoor Power Equipment" width="100%" height="152" />
								<strong>เครื่องมือสำหรับงานสวนและงานเกษตร</strong>
							<div class="menu">
								<ul class="LinkListStyle1" style="padding-left: 15px;">
									<li><a href="outdoor_power_equipment.php">สินค้า</a></li>
									<li><a href="outdoor_power_equipment.php#top">สินค้าใหม่</a></li>
									<li><a href="https://devs.hitachi-koki.co.jp/ois/login.html?te-uniquekey=1470f5b54a3">Technical Service & Support</a></li>
								</ul>
							</div>
						</div>
					</li>

					<li class="Column1" >
						<div class="Inner">
								<img src="image/himac.jpg" alt="Centrifuges" width="100%" height="152" />
								<strong>Centrifuges</strong>
							<div class="menu">
								<ul class="LinkListStyle1" style="padding-left: 15px;">
									<li><a href="http://centrifuges.hitachi-koki.com/life.html">Life-Science</a></li>
									<li><a href="http://centrifuges.hitachi-koki.com/material.html">Material Science</a></li>
								</ul>
							</div>
						</div>
					</li>

					<li class="Column1" >
						<div class="Inner">
								<img src="image/about.jpg" alt="About Us" width="100%" height="152" />
								<strong>เกี่ยวกับเรา</strong>
							<div class="menu">
								<ul class="LinkListStyle1" style="padding-left: 15px;">
									<li><a href="about.php">ข้อมูลองค์กร</a></li>
									<li><a href="news.php">ข่าวสาร</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
					
			</div><!--/Section-->
			<div class="Section">
				<ul class="ColumnSet Panel">
					<?php 
				  	$b = new SocialItemForm;
				  	$socialItems = $b->getSocialItems();
				  	if (is_array($socialItems) || is_object($socialItems)){
							foreach($socialItems as $i => $result) {
								if($i == 0) {
									echo "<li class='Column1 FirstItem' >";
								}else if($i % 4 == 0) {
									echo "<li class='Column1 FirstItem' style='clear: both;' >";
								}else {
									echo "<li class='Column1' >";	
								}
								echo "<a href='". $result["image_link"]."' target='_blank'><img src='../". $result["image_user_path"] ."' width='100%'></a>";
								echo "</li>";
							}
						}
				  ?>
				</ul>
			</div>

			<div class="Section"> 
				<h2><span>ข่าว</span></h2>
				<?php 
					$n = new News;
					$news = $n->getNews();
					if (is_array($news) || is_object($news)){
						foreach($news as $key => $value) {
							echo "<div class=\"ClearFix\">";
							echo "<div class=\"ImgLeftAdjust\" style=\"height: 50px\">";
							echo "<p class=\"TextStyle1\" >";
							echo $value["news_date"];
							echo "</p></div>";
							echo "<div class=\"TextStyle1 News NewsId-".$value["id"]."\">";
							echo $value["news_th"];
							echo "</div></div>";

						}
					}
				?>
				<ul class="LinkListStyle1"> 
					<li><a href="news.php">ดูข่าวทั้งหมด </a></li>
				</ul>
				
			</div>

			<div class="Section">
				<h2><span>แคตตาล๊อกสินค้า</span></h2>

				
					<?php 
				  	$b = new Catalog;
				  	$catalog = $b->getCatalogs();
				  	if (is_array($catalog) || is_object($catalog)){
							foreach($catalog as $i => $result) {
								$mycount = $i + 1;
								if($i == 0 || $mycount %5==0) {
									echo "<ul class='ColumnSet Panel'>";
									echo "<li class='Column1 FirstItem' >";
								}else {
									echo "<li class='Column1' >";	
								}
								echo "<a href='../". $result["user_file"]."' target='_blank'><img style='max-height: 300px;' src='../". $result["user_image"] ."' width='100%'></a>";
								echo "</li>";
								if($i != 0 && $mycount % 4 == 0) {
									echo "</ul>";
								}
							}
						}
				  ?>
				
			</div>

			<div class="Section">
				<h2><span>วิดีโอ</span></h2>
					<?php 
				  	$b = new Video;
				  	$video = $b->getVideos();
				  	if (is_array($video) || is_object($video)){
							foreach($video as $i => $result) {
								$mycount = $i + 1;
								if($i == 0 || $mycount %5==0) {
									echo "<ul class='ColumnSet'>";
									echo "<li class='Column1 FirstItem' >";
								}else {
									echo "<li class='Column1' >";	
								}
								
								$youtubeUrl =  $result["url"];
								$videoId = explode("v=", $youtubeUrl);
								echo "<iframe type='text/html' width='100%' height='100%'  src='http://www.youtube.com/embed/".$videoId[1]."' frameborder='0' allowfullscreen></iframe>";
								echo "</li>";
								if($i != 0 && $mycount % 4 == 0) {
									echo "</ul>";
								}
							}
						}
				  ?>
			</div>

			<div class="Section">
				<ul class="ColumnSet Panel">

					<li class="Column1 FirstItem">
					<a href="http://www.hitachi-koki.com/powertools/products/features/features.html" target="_blank"><img src="image/index_below/features.jpg"  width="100%" height="50%"></a>
				</li>

					<li class="Column1">
					<script type="text/javascript">
				function WinOp(){
					window.open("http://www.hitachi-koki.com/powertools/battery/battery.html","","toolber=yes,width=570,height=800");
				}
					</script>
				<a href="JavaScript:WinOp();"><img src="image/index_below/battery_banner.jpg" width="100%" height="100" alt="Important notice on the batteries for the Hitachi cordless power tools" border="0"></a>
				</li>

				</ul>
			</div>
			<div class="Section">
				<ul class="PageTop">
					<li><a href="#top">Page top</a></li>
				</ul>
			</div>

		</div><!--/Grid4-->

	</div><!--/GridSet-->

</div><!--/Contents-->


<?php include ('includes/footer.php'); ?>
<script type="text/javascript">

$(document).ready(function(){
  $('.carouse').slick({
    autoplay: true,
    autoplaySpeed: 3500,
    dots: false,
    speed: 1000,
    infinite: true,
    prevArrow:"<img class='a-left control-c prev slick-prev arrow-click' src='image/left.png'>",
      nextArrow:"<img class='a-right control-c next slick-next arrow-click' src='image/right.png'>"
  });
  $(".News").each(function () {
	    var text = $(this).text();
	    var className = $(this).attr("class").split(" ");
	    var newsId = className[className.length-1].split("-");

	    if (text.length > 200) {
	        $(this).html(text.substr(0, 186) + "...");
	    }else {
	    	$(this).html(text.substr(0, text.length));
	    }
	    $(this).html($(this).html() + " <ul class=\"LinkListStyle1\"> <li><a href=\"news_detail.php?news_id=" + newsId[1] + "\">Read More </a></li></ul> ");
	});

	$(".arrow-click").click(function(e) {
		e.preventDefault();
		return false;

	});
});


</script>
