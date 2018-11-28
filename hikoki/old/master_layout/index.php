<!DOCTYPE html>
<html lang="ja">
<head>

    <!--#include virtual="common/inc/head_start.html" -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="format-detection" content="telephone=no">

    <title>HIKOKI(Sample Pages: Top Page)</title>

    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- OGP -->
    <meta property="og:locale" content="ja_JP">
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
    <link href="common/css/pages/home.css" rel="stylesheet">

    <!--#include virtual="common/inc/head_end.html" -->

</head>

<body id="home" class="fw">

    <!--#include virtual="common/inc/body_start.html" -->

    <!--#include virtual="common/inc/header.html" -->
    <?php include ('common/inc/header.html'); ?>


    <div id="loading">
        <div class="loading-logo"></div>
        <div class="loading-ending"></div>
    </div>

    <div id="container">

        <main id="contents" class="f-max">

            <div id="visual">

                <div class="swiper-container">

                    <div class="swiper-wrapper">
                        <div class="swiper-slide"><a href="#" class="visual-img1"></a></div>
                        <div class="swiper-slide"><a href="#" class="visual-img2"></a></div>
                        <div class="swiper-slide"><div class="visual-img3"></div></div>
                        <div class="swiper-slide"><div class="visual-img4"></div></div>
                    </div>

                    <div class="swiper-pagination"></div>

                </div>

                <ul class="visual-info">
                    <li class="visual-info_inner">
                        <i class="a-icon a-icon-info"></i>
                        <div class="visual-info_label">重要なお知らせ：</div>
                        <p class="visual-info_txt">リンクなしの場合リンクなしの場合リンクなしの場合リンクなしの場合リンクなしの場合</p>
                    </li>
                    <li>
                        <a href="#" class="visual-info_inner">
                            <i class="a-icon a-icon-info"></i>
                            <div class="visual-info_label">重要なお知らせ：</div>
                            <p class="visual-info_txt">テキストが入ります。テキストが入ります。</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="visual-info_inner">
                            <i class="a-icon a-icon-info"></i>
                            <div class="visual-info_label">重要なお知らせ：</div>
                            <p class="visual-info_txt">長文が入ります。PCの場合は1行を超えた場合は省略されます。長文が入ります。PCの場合は1行を超えた場合は省略されます。長文が入ります。PCの場合は1行を超えた場合は省略されます。長文が入ります。PCの場合は1行を超えた場合は省略されます。</p>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- /#visual -->

            <div id="pickup" class="f-section">
                <div class="f-inner">

                    <div class="o-slider o-slider_border" data-slidesPerView="3" data-spaceBetween="0">

                        <div class="swiper-container">

                            <div class="swiper-wrapper">

                                <a href="#" class="swiper-slide">
                                    <figure>

                                        <div class="pickup-img"><img src="common/images/products/drill/wh36da_pickup.png" alt=""></div>
                                        <figcaption>
                                            <p class="a-label a-label_new">NEW</p>
                                            <p class="pickup-txt">製品名製品名製品名製品</p>
                                            <p class="pickup-model">製品NO製品NO</p>
                                        </figcaption>

                                    </figure>
                                </a>
                                <a href="#" class="swiper-slide">
                                    <figure>

                                        <div class="pickup-img"><img src="common/images/products/drill/ds36da_pickup.png" alt=""></div>
                                        <figcaption>
                                            <p class="pickup-txt">製品名製品名製品名製品</p>
                                            <p class="pickup-model">製品NO製品NO</p>
                                        </figcaption>

                                    </figure>
                                </a>
                                <a href="#" class="swiper-slide">
                                    <figure>

                                        <div class="pickup-img"><img src="common/images/products/grinder/g10bye_pickup.png" alt=""></div>
                                        <figcaption>
                                            <p class="a-label a-label_new">NEW</p>
                                            <p class="pickup-txt">製品名製品名製品名製品</p>
                                            <p class="pickup-model">製品NO製品NO</p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>

                    </div>
                    <!-- /.o-slider -->

                </div>

            </div>
            <!-- /#pickup -->

            <div id="banner-top" class="f-section">
                <div class="f-inner">
                    <div class="f-flex f-flex_mg0 f-flex_mg0_s">
                        <a class="f-flex6 f-flex12_s"><img src="common/images/home/bnr_top_img1.jpg" alt=""></a>
                        <a class="f-flex6 f-flex12_s"><img src="common/images/home/bnr_top_img2.jpg" alt=""></a>
                        <a class="f-flex6 f-flex12_s banner-txt" style="background-color: #000;"><i class="a-icon a-icon-contact"></i>製品についてのお問い合わせ</a>
                        <a class="f-flex6 f-flex12_s banner-txt" style="background-color: #000;"><i class="a-icon a-icon-maintenance"></i>WEB修理受付け</a>
                    </div>
                </div>
            </div>
            <!-- /#banner-top -->


            <section id="category" class="f-section">

                <div class="category-bg" style="background-image:url(common/images/home/category_bg.jpg);">

                    <h1 class="category-ttl a-ttl_bgimg a-ttl_h1">
                        <span class="f-inner">
                            <span class="a-ttl_txt">プロ用工具</span>
                            <span>製品カテゴリー</span>
                        </span>
                    </h1>

                    <div class="category-list">

                        <div class="category-more j-show_more"></div>

                        <div class="f-inner">

                            <div class="f-flex f-flex_mg0 f-flex_mg0_s f-flex_mb40 f-flex_mb20_s">

                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/li_ion.png" alt=""></div>
                                    <div class="category-name">テキストテキストテキストテキストテキスト（長文自動改行）</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/brushless.png" alt=""></div>
                                    <div class="category-name">テキストテキストテキスト<br>テキスト（任意改行）</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/mv.png" alt=""></div>
                                    <div class="category-name">製品名製品名製品名製品</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/drill.png" alt=""></div>
                                    <div class="category-name">製品名製品名製品</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/li_ion.png" alt=""></div>
                                    <div class="category-name">テキストテキストテキストテキストテキスト（長文自動改行）</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/brushless.png" alt=""></div>
                                    <div class="category-name">テキストテキストテキスト<br>テキスト（任意改行）</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/mv.png" alt=""></div>
                                    <div class="category-name">製品名製品名製品名製品</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/drill.png" alt=""></div>
                                    <div class="category-name">製品名製品名製品</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/li_ion.png" alt=""></div>
                                    <div class="category-name">テキストテキストテキストテキストテキスト（長文自動改行）</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/brushless.png" alt=""></div>
                                    <div class="category-name">テキストテキストテキスト<br>テキスト（任意改行）</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/mv.png" alt=""></div>
                                    <div class="category-name">製品名製品名製品名製品</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/drill.png" alt=""></div>
                                    <div class="category-name">製品名製品名製品</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/li_ion.png" alt=""></div>
                                    <div class="category-name">テキストテキストテキストテキストテキスト（長文自動改行）</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/brushless.png" alt=""></div>
                                    <div class="category-name">テキストテキストテキスト<br>テキスト（任意改行）</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/mv.png" alt=""></div>
                                    <div class="category-name">製品名製品名製品名製品</div>
                                </a>
                                <a href="#" class="f-flex3 f-flex6_s">
                                    <div class="category-img"><img src="common/images/products/category/drill.png" alt=""></div>
                                    <div class="category-name">製品名製品名製品</div>
                                </a>

                            </div>

                        </div>

                    </div>
                    <!-- /.category-list -->

                    <div class="category-list_bg f-section">

                        <div class="f-flex f-flex_mg0 f-flex_mg0_s">

                            <a href="#" class="f-flex3 f-flex6_s">
                                <div class="line1"><div class="line2"></div></div>
                                <div class="category-img" style="background-image: url(common/images/home/category_product1_bg.png);">
                                </div>
                                <div class="category-name">カテゴリーカテゴリー<br>カテゴリーカテゴリー</div>
                                <div class="category-txt">カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。</div>
                            </a>
                            <a href="#" class="f-flex3 f-flex6_s">
                                <div class="line1"><div class="line2"></div></div>
                                <div class="category-img" style="background-image: url(common/images/home/category_product2_bg.png);">
                                </div>
                                <div class="category-name">カテゴリーカテゴリー</div>
                                <div class="category-txt">カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。</div>
                            </a>
                            <a href="#" class="f-flex3 f-flex6_s">
                                <div class="line1"><div class="line2"></div></div>
                                <div class="category-img" style="background-image: url(common/images/home/category_product3_bg.png);">
                                </div>
                                <div class="category-name">カテゴリーカテゴリー<br>カテゴリーカテゴリー</div>
                                <div class="category-txt">カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。</div>
                            </a>
                            <a href="#" class="f-flex3 f-flex6_s">
                                <div class="line1"><div class="line2"></div></div>
                                <div class="category-img" style="background-image: url(common/images/home/category_product4_bg.png);">
                                </div>
                                <div class="category-name">カテゴリーカテゴリー</div>
                                <div class="category-txt">カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。カテゴリーの説明文が入ります。</div>
                            </a>

                        </div>

                    </div>
                    <!-- /.category-list_bg -->
                </div>

            </section>
            <!-- /#category -->

            <div id="banner-btm" class="f-section_l">
                <div class="f-inner">

                    <div class="o-slider" data-slidesPerView="3" data-spaceBetween="30">

                        <div class="swiper-container">

                            <div class="swiper-wrapper">

                                <a href="#" class="swiper-slide">
                                    <img src="common/images/sample/bnr_img.jpg" alt="">
                                </a>
                                <a href="#" class="swiper-slide">
                                    <img src="common/images/sample/bnr_img.jpg" alt="">
                                </a>
                                <a href="#" class="swiper-slide">
                                    <img src="common/images/sample/bnr_img.jpg" alt="">
                                </a>
                                <a href="#" class="swiper-slide">
                                    <img src="common/images/sample/bnr_img.jpg" alt="">
                                </a>
                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>

                    </div>
                    <!-- /.o-slider -->

                </div>

            </div>
            <!-- /#banner-btm -->

            <div id="news" class="f-section">
                <div class="f-inner">

                    <div class="m-list_newsbox">

                        <a href="#" class="a-ttl_h4 a-ttl_bar a-ttl_main a-ttl_bar_link">
                            HiKOKIからのお知らせ
                            <span class="a-ttl_bar_link_arrow">一覧へ</span>
                        </a>

                        <div class="m-list_newsbox_inner">

                            <ul class="m-list_newsbox_important">
                                <li>
                                    <p class="a-label a-label_main">重要なお知らせ</p>
                                    <p class="m-list_newsbox_txt"><a href="#">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</a></p>
                                </li>
                                <li>
                                    <p class="a-label a-label_sub">重要なお知らせ</p>
                                    <p class="m-list_newsbox_txt"><a href="#">テキストテキストテキストテキスト</a></p>
                                </li>
                            </ul>
                            <!-- /.m-list_newsbox_important -->

                            <ul class="m-list_newsbox_news">
                                <li>
                                    <div class="m-list_newsbox_date">
                                        2018年10月1日
                                        <p class="a-label a-label_new">NEW</p>
                                    </div>
                                    <p class="m-list_newsbox_txt"><a href="#">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</a></p>
                                </li>
                                <li>
                                    <div class="m-list_newsbox_date">2018年1月1日</div>
                                    <p class="m-list_newsbox_txt"><a href="#">テキストテキストテキストテキストテキストテキストテキスト</a></p>
                                </li>
                            </ul>
                            <!-- /.m-list_newsbox_news -->

                        </div>
                        <!-- /.m-list_newsbox_inner -->

                    </div>
                    <!-- /.m-list_newsbox -->

                </div>

            </div>
            <!-- /#news -->

        </main>
        <!-- /#contents -->

    </div>
    <!-- /#container -->

    <footer id="footer">

        <!--#include virtual="common/inc/footer.html" -->

    </footer>
    <!-- /footer -->

    <!-- Can not edit for module. -->
    <script src="common/js/main.js"></script>

    <!-- Please create a javascript file for each page. -->
    <!-- <script src="common/js/***.js"></script> -->

    <!--#include virtual="common/inc/body_end.html" -->

</body>

</html>
