<?php include ('common/config/connection.php'); ?>

<?php 
    $language = "th";
    $a = new ASCDealer;
    // $ascDealers = $a->getAllASCDealers();
    
    if (isset($_GET['type_id']) && isset($_GET['region_id'])) {
        $type_id = $_GET['type_id'];
        $region_id = $_GET['region_id'][0];
        $ascDealers = $a->getASCDealersByRegionAndType($type_id, $region_id);
        $region_name = $a->getRegiontById($region_id)["region_" .$language];
    }else {
        header("location: index.php");
    }
    
    // print_r($ascDealers);
?>
<!DOCTYPE html>
<html>
<head>

    <!--#include virtual="common/inc/head_start.html" -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">

    <title>ASC & Dealer: Hikoki Power Tools (Thailand)</title>

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
                
            </span>
            <span>
                <?php
                    if($language == "en"){
                        if($type_id == "asc"){
                           echo "Authorized Service Center";
                        }else {
                           echo "Dealer";
                        }
                    }else if($language == "th") {
                        if($type_id == "asc"){
                           echo "ศูนย์บริการ";
                        }else {
                           echo "ตัวแทนจำหน่าย";
                        }
                    }
                 ?>
            </span>
        </span>
    </h1>

    <div id="container">

        <div class="f-inner">

            <main id="contents">

                <div class="f-section f-pt0">

                    <h2 class="a-ttl_h2 a-ttl_border a-ttl_border_bg a-ttl_main">
                        <?php echo $region_name; ?>
                        <!-- <span class="a-ttl_txt">Dummy Text Dummy Text Dummy Text Dummy Text</span> -->
                    </h2>

                    <div class="f-section_s">
                        <?php 
                            if (is_array($ascDealers) || is_object($ascDealers)){
                                foreach ($ascDealers as $key=>$value) {
                                    if($value["list_" . $language] == "") {
                                        echo "No information found.";
                                        break;
                                    }
                                    echo $value["list_" . $language];
                                }
                            }
                            
                        ?>
                    </div>
                    <!-- /.f-section_s -->

                </div>
                <!-- /.f-section -->

            </main>
            <!-- /#contents -->

            <aside id="side">

                <!--#include virtual="common/inc/side/powertools.html" -->
                <ul class="side-category side-section j-accordion j-navi_active">
                    <li class="j-navi_active_parent">
                        <a>
                            <?php 
                                if($language == "en"){
                                    echo "Authorized Service Center";
                                }else if($language == "th") {
                                    echo "ศูนย์บริการ";
                                }
                            ?>
                        </a>
                    </li>
                    <?php
                    $b = new ASCDealer;
                    $regions = $b->getRegions();
                    if (is_array($regions) || is_object($regions)){
                        foreach ($regions as $key=>$value) {
                            // if($value["id"] == $region_id && $type_id == "asc") {
                            //     echo "<li class=\"Current\">";
                            // }else {
                            //     echo "<li>";
                            // }
                            echo "<li class=\"j-navi_active_parent\">";
                            echo "<a href=\"dealer.php?type_id=asc&region_id=".$value["id"]."\">";

                            if($value["id"] == $region_id && $type_id == "asc") {
                                echo "<strong>".$value["region_" . $language]."</strong>";
                            }else {
                                echo $value["region_" . $language];
                            }
                            
                            echo "</a>";
                            echo "</li>";
                        }
                    }
                    ?>
                </ul>

                <ul class="side-category side-section j-accordion j-navi_active">
                    <li class="j-navi_active_parent">
                        <a>
                            <?php 
                            if($language == "en"){
                                echo "Dealer";
                            }else if($language == "th") {
                                echo "ตัวแทนจำหน่าย";
                            }
                            ?>
                        </a>
                    </li>
                    <?php
                    $b = new ASCDealer;
                    $regions = $b->getRegions();
                    if (is_array($regions) || is_object($regions)){
                        foreach ($regions as $key=>$value) {
                            // if($value["id"] == $region_id && $type_id == "dealer") {
                            //     echo "<li class=\"Current\">";
                            // }else {
                            //     echo "<li>";
                            // }
                            echo "<li class=\"j-navi_active_parent\">";

                            echo "<a href=\"dealer.php?type_id=dealer&region_id=".$value["id"]."\">";

                            if($value["id"] == $region_id && $type_id == "dealer") {
                                echo "<strong>".$value["region_" . $language]."</strong>";
                            }else {
                                echo $value["region_" . $language];
                            }
                            
                            echo "</a>";
                            echo "</li>";
                        }
                    }
                    ?>
                </ul>



            </aside>
            <!-- /#side -->

        </div>

    </div>
    <!-- /#container -->

    <footer id="footer">

        <nav class="footer-breadcrumb footer-section">
            <div class="f-inner">
                <ul>
                    <li><a href="/">TOP</a></li>
                    <li id="target">ASC & Dealer</li>
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
