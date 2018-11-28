<?php
  session_start();
//PUT THIS HEADER ON TOP OF EACH UNIQUE PAGE
  $GLOBALS['ADMIN_URL'] = "/hitachi/admin/";
  if(!isset($_SESSION['username'])){
    header("location:login/main_login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin: Hitachi Power Tools (Thailand) </title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/sweet-alert.css">
		<link rel="stylesheet" type="text/css" href="css/sticky-footer-navbar.css">
		<link href="css/main.css" rel="stylesheet" media="screen">
		<script type="text/javascript" src="js/jquery-1.12.3.min.js"></script>
		<script type="text/javascript" src="js/sweet-alert.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>
	<body>
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href=<?php echo $GLOBALS['ADMIN_URL']?> >Hitachi Power Tools</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown ">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Main Page <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="manage_banner.php">Manage Banner</a></li>
            <li><a href="manage_social_middle.php">Manage Social Menu</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Power Tools <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="manage_power_tools_type.php">Manage Type</a></li>
            <li><a href="manage_power_tools.php">Manage Power Tools</a></li>
            <li><a href="manage_power_tools_orderlist.php">จัดเรียงสินค้า</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Outdoor Power Tools <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="manage_outdoor_power_type.php">Manage Type</a></li>
            <li><a href="manage_outdoor_power_tools.php">Manage Ourdoor Power Tools</a></li>
            <li><a href="manage_outdoor_power_tools_orderlist.php">จัดเรียงสินค้า</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Other <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="manage_about_us.php">Manage About</a></li>
            <li><a href="manage_news.php">Manage News</a></li>
            <li><a href="manage_asc_dealer.php">Manage ASC & Dealer</a></li>
            <li><a href="manage_catalog.php">Manage Catalog</a></li>
            <li><a href="manage_video.php">Manage Video</a></li>
          </ul>
        </li>

      </ul>

      <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profile <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="login/logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
