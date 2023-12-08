<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>UNILAM</title>
    <link rel="shortcut icon" type="image/x-icon" href="public/mainassets/images/favicon.png" />
    <link rel="stylesheet" href="public/mainassets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="public/mainassets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="public/mainassets/css/flaticon.css" />
    <link rel="stylesheet" href="public/mainassets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="public/mainassets/css/owl.theme.css" />
    <link rel="stylesheet" href="public/mainassets/css/magnific-popup.css" />
    <link rel="stylesheet" href="public/mainassets/css/lightgallery.css" />
    <link rel="stylesheet" href="public/mainassets/css/custom.css" />
    <link rel="stylesheet" href="public/mainassets/css/royal-preload.css" />
    <link rel="stylesheet" href="public/mainassets/style.css" />
    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="public/mainassets/plugins/revolution/revolution/css/settings.css">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="public/mainassets/plugins/revolution/revolution/css/navigation.css">
    <link rel="stylesheet" href="public/mainassets/css/jquery.mb.YTPlayer.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body>
    <div id="royal_preloader"></div>
    <div id="page" class="site">
        <header id="site-header" class="site-header header-transparent">
            <!-- Main Header start -->
            <div class="octf-main-header is-fixed">
                <div class="octf-area-wrap">
                    <div class="container-fluid octf-mainbar-container">
                        <div class="octf-mainbar">
                            <div class="octf-mainbar-row octf-row">
                                <div class="octf-col logo-col no-padding">
                                    <div id="site-logo" class="site-logo">
                                        <a href="home">
                                            <img src="public/mainassets/images/logo.svg" alt="UNILAM" class="">
                                        </a>
                                    </div>
                                </div>
                                <div class="octf-col menu-col no-padding">
                                    <nav id="site-navigation" class="main-navigation">
                                        <ul class="menu">

                                            <li><a href="home">HOME</a></li>
                                            <li><a href="about">ABOUT</a></li>
                                            <li class="menu-item-has-children mega-dropdown"><a href="products">PRODUCTS</a>
                                                <ul class="mega-sub-menu">
                                                    <li class="row">
                                                        <?php if (isset($navProducts) && !empty($navProducts)) : ?>
                                                            <?php foreach ($navProducts as $navProducts_row) :  ?>
                                                                <ul class="col">
                                                                    <li>
                                                                        <div class="nav-category-item d-flex">
                                                                            <div class="thumbnail">
                                                                                <div class="image"><img src="<?= $navProducts_row->productImageUrl ?>" alt="Course images"></div>
                                                                                <a href="products/<?= $navProducts_row->productID ?>">
                                                                                    <?= $navProducts_row->productTitle ?>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            <?php endforeach ?>
                                                        <?php endif; ?>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="menu-item-has-children"><a href="">SERVICES</a>
                                                <ul class="sub-menu">
                                                    <?php if (isset($navService) && !empty($navService)) : ?>
                                                        <?php foreach ($navService as $navService_row) :  ?>
                                                            <li><a href="services/<?= $navService_row->serviceID ?>"> <?= $navService_row->serviceTitle ?></a></li>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                            <li><a href="works">OUR WORKS</a></li>
                                            <li><a href="contact">CONTACT US</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="octf-col cta-col text-right no-padding">
                                    <!-- Call To Action -->
                                    <div class="octf-btn-cta">
                                        <div class="octf-sidepanel octf-cta-header">
                                            <div id="panel-btn" class="panel-btn octf-cta-icons"> <a href=""><i class="fa-solid fa-phone"></i></a></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header_mobile">
                <div class="container-fluid">
                    <div class="octf-mainbar-row octf-row">
                        <div class="octf-col">
                            <div class="mlogo_wrapper clearfix">
                                <div class="mobile_logo">
                                    <a href="home">
                                        <img src="public/mainassets/images/logo.svg" alt="UNILAM">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="octf-col justify-content-end">
                            <div class="octf-menu-mobile octf-cta-header">
                                <div id="mmenu-toggle" class="mmenu-toggle">
                                    <button><i class="ot-flaticon-menu"></i></button>
                                </div>
                                <div class="site-overlay mmenu-overlay"></div>
                                <div id="mmenu-wrapper" class="mmenu-wrapper on-right">
                                    <div class="mmenu-inner">
                                        <a class="mmenu-close" href="#"><i class="ot-flaticon-right-arrow"></i></a>
                                        <div class="mobile-nav">
                                            <ul id="menu-main-menu" class="mobile_mainmenu none-style">

                                                <li><a href="home">HOME</a></li>
                                                <li><a href="about">ABOUT</a></li>
                                                <li><a href="products">PRODUCTS</a></li>

                                                <li class="menu-item-has-children"><a href="#">SERVICES</a>
                                                    <ul class="sub-menu">
                                                        <?php if (isset($navService) && !empty($navService)) : ?>
                                                            <?php foreach ($navService as $navService_row) :  ?>
                                                                <li><a href="manufacturing"> <?= $navService_row->serviceTitle ?></a></li>
                                                            <?php endforeach ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </li>

                                                <li><a href="works">OUR WORKS</a></li>
                                                <li><a href="contact">CONTACT US</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <div id="content" class="site-content">
            <div id="works" class="p-0">
                <div id="rev_slider_one_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase" data-source="gallery">
                    <?php if (isset($worksDetails) && !empty($worksDetails)) : ?>
                        <div id="rev_slider_7" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                            <ul>
                                <?php $counter = 74; ?>
                                <?php foreach ($worksDetails as $worksDetails_row) :  ?>
                                    <li data-index="rs-<?php echo $counter; ?>" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="public/mainassets/images/projects/project4.jpg" data-rotate="0" data-saveperformance="off" data-title="" data-param1="1" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                                        <img src="<?= $worksDetails_row->workImageUrl ?>" data-bgcolor='#ffffff' style='' alt=" <?= $worksDetails_row->workTitle ?>" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="off" data-no-retina>

                                        <div class="tp-caption tp-resizeme tp-caption-main" id="slide-74-layer-1" data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']" data-y="['center','center','center','center']" data-voffset="['-55','-46','-45','-58']" data-fontsize="['90','72','55','46']" data-lineheight="['100','70','61','55']" data-color="['#fff','#fff','#fff','#fff']" data-fontweight="['200','200','200','200']" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"power3.inOut"}]' data-textAlign="['center','center','center','center']">
                                            <?= $worksDetails_row->workTitle ?>
                                        </div>

                                        <div class="banner-desc-2">
                                            <div class="ot-button text-center">
                                                <a href="projects-details/<?= $worksDetails_row->workID ?>" class="octf-btn octf-btn-light border-hover-light ">View Project</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php $counter++; ?>
                                <?php endforeach ?>
                            </ul>
                            <div class="tp-bannertimer"></div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div><!-- #page -->
    <!-- jQuery -->
    <script src="public/mainassets/js/jquery.min.js"></script>
    <script src="public/mainassets/js/mousewheel.min.js"></script>
    <script src="public/mainassets/js/lightgallery-all.min.js"></script>
    <script src="public/mainassets/js/jquery.magnific-popup.min.js"></script>
    <script src="public/mainassets/js/jquery.isotope.min.js"></script>
    <script src="public/mainassets/js/owl.carousel.min.js"></script>
    <script src="public/mainassets/js/easypiechart.min.js"></script>
    <script src="public/mainassets/js/jquery.countdown.min.js"></script>
    <script src="public/mainassets/js/scripts.js"></script>
    <script src="public/mainassets/js/royal_preloader.min.js"></script>
    <!-- REVOLUTION JS FILES -->

    <script src="public/mainassets/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="public/mainassets/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="public/mainassets/plugins/revolution/revolution/js/extensions/revolution-plugin.js"></script>

    <!-- REVOLUTION SLIDER SCRIPT FILES -->
    <script src="public/mainassets/js/rev-script-7.js"></script>
    <script>
        window.jQuery = window.$ = jQuery;
        (function($) {
            "use strict";
            //Preloader
            Royal_Preloader.config({
                mode: 'progress',
                background: '#1a1a1a',
            });
        })(jQuery);
    </script>
</body>

</html>