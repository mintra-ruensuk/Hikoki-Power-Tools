<?php include ('common/config/connection.php'); ?>
<?php 
    $language = "en";
    $a = new About;
    $about = $a->getAbout();
    if ($language == "en") {
        $company = "Hikoki Power Tools (Thailand)";
        $contact = "Contact us";
        $aboutus = "About us";
        $office = "Our office";
    }else {
        $company = "ไฮโคคิ พาวเวอร์ ทูลส์ (ประเทศไทย)";
        $contact = "ติดต่อเรา";
        $aboutus = "เกี่ยวกับเรา";
        $office = "สำนักงาน";
    }
?>
<!DOCTYPE html>
<html>
<head>

    <!--#include virtual="common/inc/head_start.html" -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">

    <title>Contact: Hikoki Power Tools (Thailand)</title>

    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- OGP -->
    <meta property="og:locale" content="en_TH">
    <meta property="og:title" content="">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:site_name" content="">
    <meta property="og:description" content="">

    <!-- Can not edit for framework. -->
    <link href="common/css/fw.css" rel="stylesheet">

    <!-- Can not edit for module. -->
    <link href="common/css/module.css" rel="stylesheet">

    <!-- Please set appropriate font for each country. -->
    <link href="common/css/font.css" rel="stylesheet">

    <!-- Please create a css file for each page. -->
    <!-- <link href="common/css/page/***.css" rel="stylesheet"> -->

    <!--#include virtual="common/inc/head_end.html" -->


</head>

<body class="fw">

    <!--#include virtual="common/inc/body_start.html" -->

    <!--#include virtual="common/inc/header.html" -->
    <?php include ('common/inc/header.html'); ?>


    <h1 class="a-ttl_bgimg a-ttl_h1" style="background-image:url(common/images/home/category_bg.jpg);">
        <span class="f-inner">
            <span class="a-ttl_txt">
                <?php echo $contact; ?>
            </span>
            <span>
                <?php echo $company;?>
            </span>
        </span>
    </h1>

    <div id="container">

        <div class="f-inner">

            <main id="contents" class="f-max">

                <div class="f-section f-pt0">

                    <h2 class="a-ttl_h2 a-ttl_border a-ttl_border_bg a-ttl_main">
                        <?php echo $aboutus; ?>
                        <span class="a-ttl_txt"><?php echo $company; ?></span>
                    </h2>

                    <div class="f-section_s">
                        <?php 
                        if(isset($about["description_" . $language])) {
                            echo $about["description_" . $language];
                        }
                    ?>
                    </div>
                    <!-- /.f-section_s -->

                </div>
                <!-- /.f-section -->

                <div class="f-section">

                    <h2 class="a-ttl_h2 a-ttl_border a-ttl_border_bg a-ttl_main">
                        <?php echo $office; ?>
                        <!-- <span class="a-ttl_txt">Dummy Text Dummy Text Dummy Text Dummy Text</span> -->
                    </h2>

                    <div class="f-section_s">
                        <?php 
                            if(isset($about["user_image_dir"])) {
                                echo "<img style=\"max-width: 80%\" src='".$about["user_image_dir"]."' />";
                            }
                        ?>
                    </div>
                    <!-- /.f-section_s -->

                </div>
                <!-- /.f-section -->


            </main>
            <!-- /#contents -->

        </div>

    </div>
    <!-- /#container -->

    <footer id="footer">

        <nav class="footer-breadcrumb footer-section">
            <div class="f-inner">
                <ul>
                    <li><a href="/">TOP</a></li>
                    <li id="target">Contact</li>
                </ul>
            </div>
        </nav>
        <!-- /.footer-breadcrumb -->

        <!--#include virtual="common/inc/footer.html" -->
    <?php include ('common/inc/footer.html'); ?>

    </footer>
    <!-- /footer -->

    <!-- Can not edit for module. -->
    <script src="common/js/main.js"></script>

    <!-- Please create a javascript file for each page. -->
    <!-- <script src="common/js/***.js"></script> -->

    <!--#include virtual="common/inc/body_end.html" -->

</body>

</html>
