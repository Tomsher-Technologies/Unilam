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
    <link rel="stylesheet" href="public/mainassets/css/unilam-menu.css" />
    <link rel="stylesheet" href="public/mainassets/css/custom.css" />

    <link rel="stylesheet" href="public/mainassets/style.css" />
    <link rel="stylesheet" href="public/mainassets/css/royal-preload.css" />
    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="public/mainassets/plugins/revolution/revolution/css/settings.css">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="public/mainassets/plugins/revolution/revolution/css/navigation.css">

    <link rel="stylesheet" href="public/mainassets/css/jquery.mb.YTPlayer.min.css" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
</head>

<body class="royal_preloader">
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
                                        <a href="index">
                                            <img src="public/mainassets/images/logo.svg" alt="UNILAM" class="">
                                        </a>
                                    </div>
                                </div>
                                <div class="octf-col menu-col no-padding">
                                    <nav id="site-navigation" class="main-navigation">
                                        <ul class="menu">

                                            <li><a href="">HOME</a></li>
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
                                                                                <div class="image">
                                                                                    <img src="<?= $navProducts_row->productImageUrl ?>" alt="<?= $navProducts_row->productTitle ?>">
                                                                                </div>
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
                                    <a href="index">
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

                                                <li><a href="index">HOME</a></li>
                                                <li><a href="about">ABOUT</a></li>
                                                <li><a href="products">PRODUCTS</a></li>


                                                <li class="menu-item-has-children"><a href="">SERVICES</a>
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
            <div class="p-0">
                <div class="grid-lines grid-lines-horizontal z-index-1">
                    <span class="g-line-horizontal line-bottom color-line-secondary"></span>
                </div>
                <div class="grid-lines grid-lines-vertical z-index-1">
                    <span class="g-line-vertical line-left color-line-secondary"></span>
                    <span class="g-line-vertical line-right color-line-secondary"></span>
                </div>

                <div id="rev_slider_one_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="mask-showcase" data-source="gallery">
                    <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
                    <div id="rev_slider_one" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.1">
                        <ul>
                            <?php if (isset($bannerDetails) && !empty($bannerDetails)) : ?>
                                <?php foreach ($bannerDetails as $bannerDetails_row) { ?>
                                    <!-- SLIDE 1 -->
                                    <?php if (!empty($bannerDetails_row['bannerUrl'])) : ?>
                                        <li data-index="rs-70" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="public/mainassets/images/vid-bg.jpg" data-rotate="0" data-saveperformance="off" data-title="" data-param1="1" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <div id="section-video-bg" class="full-height text-light flex-middle">
                                                <div class="de-video-container">

                                                    <!-- Video Background - Here you need to replace the videoURL with your youtube video URL -->
                                                    <a id="bgndVideo" class="player" data-property="{videoURL:'<?= $bannerDetails_row['bannerUrl']; ?>',containment:'#section-video-bg',autoPlay:true, mute:true, startAt:21, loop:true, useOnMobile:true, mobileFallbackImage: 'public/mainassets/images/vid-bg.jpg', coverImage: 'public/mainassets/images/vid-bg.jpg' }"></a>
                                                </div>
                                            </div>
                                            <!-- LAYER 1  right image overlay dark-->
                                            <!-- LAYER 3  Thin text title-->
                                            <div class="tp-caption tp-resizeme tp-caption-big" id="slide-70-layer-1" data-x="['center','center','center','center']" data-hoffset="['56','46','34','0']" data-y="['center','center','center','center']" data-voffset="['-64','-72','-65','-50']" data-fontsize="['206',150','0','0']" data-lineheight="['206','170','127','80']" data-letterspacing="['104','85','63','39']" data-fontweight="['900','900','900','900']" data-color="['transparent','transparent','transparent','transparent']" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":500,"split":"chars","splitdelay":0.1,"speed":500,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power4.inOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:50px;z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;","ease":"power3.inOut"}]' data-textAlign="['center','center','center','center']">
                                                <?= $bannerDetails_row['bannerHeading'] ?>
                                            </div>

                                            <!-- LAYER 4  Bold Title-->
                                            <div class="tp-caption tp-resizeme tp-caption-main" id="slide-70-layer-2" data-x="['center','center','center','center']" data-hoffset="['2','0','0','0']" data-y="['center','center','center','center']" data-voffset="['-56','-63','-60','-65']" data-fontsize="['93','72','55','40']" data-lineheight="['83','70','51','55']" data-color="['#fff','#fff','#fff','#fff']" data-fontweight="['200','200','200','200']" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:50px;opacity:0;","ease":"power3.inOut"}]' data-textAlign="['left','left','left','left']">
                                                <?= $bannerDetails_row['bannerTitle'] ?>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                    <!-- SLIDE 1 -->
                                    <?php if (!empty($bannerDetails_row['bannerFileUrl'])) : ?>
                                        <li data-index="rs-71" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="public/mainassets/images/slider/slider2-home1-1.jpg" data-rotate="0" data-saveperformance="off" data-title="" data-param1="1" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                            <!-- MAIN IMAGE -->
                                            <img src="<?= $bannerDetails_row['bannerFileUrl'] ?>" data-bgcolor='#ffffff' style='' alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-bgparallax="off" data-no-retina>


                                            <!-- LAYER 3  Thin text title-->
                                            <div class="tp-caption tp-resizeme tp-caption-big" id="slide-71-layer-1" data-x="['center','center','center','center']" data-hoffset="['56','46','34','0']" data-y="['center','center','center','center']" data-voffset="['-64','-72','-65','-50']" data-fontsize="['206',150','0','0']" data-lineheight="['206','170','127','80']" data-letterspacing="['104','85','63','39']" data-fontweight="['900','900','900','900']" data-color="['transparent','transparent','transparent','transparent']" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":500,"split":"chars","splitdelay":0.1,"speed":500,"frame":"0","from":"x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"power4.inOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:50px;z:0;rX:0deg;rY:0deg;rZ:0deg;sX:1;sY:1;skX:0;skY:0;","ease":"power3.inOut"}]' data-textAlign="['center','center','center','center']">
                                                <?= $bannerDetails_row['bannerHeading'] ?>
                                            </div>

                                            <!-- LAYER 4  Bold Title-->
                                            <div class="tp-caption tp-resizeme tp-caption-main" id="slide-71-layer-2" data-x="['center','center','center','center']" data-hoffset="['2','0','0','0']" data-y="['center','center','center','center']" data-voffset="['-56','-63','-60','-65']" data-fontsize="['93','72','55','40']" data-lineheight="['83','70','51','55']" data-color="['#fff','#fff','#fff','#fff']" data-fontweight="['200','200','200','200']" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"power3.inOut"},{"delay":"wait","speed":1000,"frame":"999","to":"x:50px;opacity:0;","ease":"power3.inOut"}]' data-textAlign="['left','left','left','left']">
                                                <?= $bannerDetails_row['bannerTitle'] ?>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                <?php } ?>
                            <?php endif; ?>
                        </ul>
                        <div class="tp-bannertimer"></div>

                    </div>
                </div>
                <div class="banner-desc-1">
                    <ul>
                        <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                            <li><a href="<?= $contactDetails['twitterLink'] ?>"><i class="fa-brands fa-x-twitter"></i></a></li>
                            <li><a href="<?= $contactDetails['faceBookLink'] ?>"><i class="fa-brands fa-facebook-f"></i></a></li>
                            <li><a href="<?= $contactDetails['linkedInLink'] ?>"><i class="fa-brands fa fa-linkedin-in"></i></a></li>
                            <li><a href="<?= $contactDetails['instagramLink'] ?>"><i class="fa-brands fa fa-instagram"></i></a></li>
                            <li><a href="<?= $contactDetails['youTubeLink'] ?>"><i class="fa-brands fa fa-youtube"></i></a></li>
                            <li><a href="<?= $contactDetails['whatsAppLink'] ?>"><i class="fa-brands fa fa-whatsapp"></i></a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>

            <?php if (isset($aboutDashboardDetails) && !empty($aboutDashboardDetails)) : ?>
                <section class="about-1" style="background-image: url(public/mainassets/images/about-bg.jpg); background-size: cover; background-position: right;">
                    <div class="grid-lines grid-lines-vertical">
                        <span class="g-line-vertical line-left color-line-default"></span>

                        <span class="g-line-vertical line-right color-line-default"></span>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 mb-5 mb-lg-0">
                                <div class="about-img-1">
                                    <img src="<?= $aboutDashboardDetails['aboutImageUrl'] ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 align-self-center">
                                <div class="about-content-1 ml-xl-50 mr-xl-70">
                                    <div class="ot-heading is-dots">
                                        <span>[ <?= $aboutDashboardDetails['aboutAuthorName'] ?> ]</span>
                                        <h2 class="main-heading"><?= $aboutDashboardDetails['aboutTitle'] ?></h2>
                                    </div>
                                    <p><?= $aboutDashboardDetails['aboutDescription'] ?></p>
                                    <div class="ot-button">
                                        <a href="about" class="octf-btn octf-btn-light border-hover-light">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (isset($productDetails) && !empty($productDetails)) : ?>
                <section class="our-skill-3 pb-0">
                    <div class="grid-lines grid-lines-vertical">
                        <span class="g-line-vertical line-left color-line-default"></span>
                        <span class="g-line-vertical line-right color-line-default"></span>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="our-skill-content-3 mr-xl-70">
                                    <div class="ot-heading text-center">
                                        <span>[ Our Products ]</span>
                                        <h2 class="main-heading">Premium Quality Products</h2>
                                    </div>
                                    <div class="space-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid px-0 px-xl-90">
                        <div class="project-slider-4item projects-grid style-2 no-gaps m-0 img-scale owl-theme ">
                            <div class="row">
                                <?php foreach ($productDetails as $productDetails_row) { ?>
                                    <div class="col-md-4 mb-3">
                                        <div class="project-items category-14 ">
                                            <div class="projects-box">
                                                <div class="projects-thumbnail">
                                                    <a href="acrylic_board">
                                                        <img src="<?= $productDetails_row['productImageUrl'] ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="portfolio-info">
                                                    <div class="portfolio-info-inner">
                                                        <h5><a class="title-link" href=""><?= $productDetails_row['productTitle'] ?>
                                                            </a></h5>
                                                        <p class="portfolio-cates">
                                                            <a href="#"><?= $productDetails_row['materialName'] ?></a>
                                                        </p>
                                                    </div>
                                                    <a class="overlay" href=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="space-30"></div>
                        </div>
                    </div>
                    <div class="space-50"></div>
                </section>
            <?php endif; ?>

            <?php if (isset($dashboardChooseDetails) && !empty($dashboardChooseDetails)) : ?>
                <section class="cta-2" style="background-image: url(<?= $dashboardChooseDetails['bannerImageUrl'] ?>);
                            background-position: center center;
                            background-repeat: no-repeat;
                            background-size: cover;
                            padding-bottom: 150px;
                            padding-top: 150px;
                            color: #fff;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-left">
                                <span>[ <?= $dashboardChooseDetails['aboutAuthorName'] ?> ]</span>
                                <h2><?= $dashboardChooseDetails['aboutTitle'] ?> </h2>
                                <p><?= $dashboardChooseDetails['aboutDescription'] ?></p>
                                <div class="ot-button">
                                    <a href="contact" class="octf-btn octf-btn-light border-hover-light">get in
                                        touch</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (isset($serviceDetails) && !empty($serviceDetails)) : ?>
                <section class="our-skill-3 pb-0" style="background: #FFDDCB;">
                    <div class="grid-lines grid-lines-vertical">
                        <span class="g-line-vertical line-left color-line-default"></span>
                        <span class="g-line-vertical line-right color-line-default"></span>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="our-skill-content-3 mr-xl-70">
                                    <div class="ot-heading text-center">
                                        <span>[ OUR SERVICES ]</span>
                                        <h2 class="main-heading">What Can We Offer</h2>
                                    </div>
                                    <div class="space-50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <?php $rowNumber = 1; ?>
                                <?php foreach ($serviceDetails as $serviceDetails_row) { ?>
                                    <div class="col-lg-4 col-md-6 px-0">
                                        <div class="cate-lines h-light">
                                            <div class="cate-item">
                                                <a href="#">
                                                    <img src="<?= $serviceDetails_row['serviceBannerImageUrl'] ?>" alt="">
                                                </a>
                                                <div class="cate-item_content">
                                                    <a href="#">
                                                        <h2><?= $serviceDetails_row['serviceTitle'] ?><span class="number-stroke"><?= $rowNumber++; ?></span></h2>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            <?php if (isset($dashboardProjectDetails) && isset($featuresDetails) && !empty($dashboardProjectDetails)) : ?>
                <section class="bg-black">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 mb-5 mb-lg-0">
                                <div class="benefits-desc-1">
                                    <div class="ot-heading">
                                        <span class="text-light">[ <?= $dashboardProjectDetails['aboutAuthorName'] ?> ]</span>
                                        <h2 class="main-heading"><?= $dashboardProjectDetails['aboutTitle'] ?></h2>
                                    </div>
                                    <div class="ot-button">
                                        <a href="projects" class="octf-btn octf-btn-light border-hover-light">View Projects</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-12">
                                <div class="row">
                                    <?php foreach ($featuresDetails as $featuresDetails_row) {  ?>
                                        <div class="col-lg-6 col-md-6 mb-5 mb-md-0">
                                            <div class="icon-box icon-box--classic icon-box--icon-top s-light">
                                                <div class="icon-main">

                                                    <img width="40" src="<?= $featuresDetails_row->featureIconUrl ?>" alt="">
                                                </div>
                                                <div class="content-box">
                                                    <h5><a href="#" class="title-link"><?= $featuresDetails_row->featureTitle ?></a></h5>
                                                    <p><?= $featuresDetails_row->featureDescription ?></p>
                                                </div>
                                            </div>
                                            <div class="d-none d-md-block space-40"></div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <?php if (isset($worksDetails) && !empty($worksDetails)) : ?>
                <section class="p-0">
                    <div class="projects-grid pf_4_cols style-2 p-info-s2 img-scale w-auto no-gaps mx-0">
                        <div class="grid-sizer"></div>
                        <?php foreach ($worksDetails as $worksDetails_row) : ?>
                            <div class="project-item category-19 thumb2x">
                                <div class="projects-box">
                                    <div class="projects-thumbnail">
                                        <a href="">
                                            <img src="<?= $worksDetails_row->workImageUrl ?>" alt="">

                                        </a>

                                    </div>
                                    <div class="portfolio-info">
                                        <div class="portfolio-info-inner">
                                            <h5><a class="title-link" href=""><?= $worksDetails_row->projectTitle ?></a></h5>
                                            <p class="portfolio-cates"><a href="#"><?= $worksDetails_row->categoryName ?></a></p>
                                        </div>
                                        <a class="overlay" href=""></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            <?php endif; ?>
            <section class="cta">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-4 mb-lg-0">
                            <h2 class="text-light mb-0">Building Dreams</h2>
                            <div class="space-5"></div>
                            <p class=" mb-0">At every stage, we could supervise your project</p>
                        </div>
                        <div class="col-lg-4 text-left text-lg-right align-self-center">
                            <div class="ot-button">
                                <a href="contact" class="octf-btn octf-btn-light border-hover-light">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <footer id="site-footer" class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-xl-0">
                        <div class="widget-footer">
                            <img src="public/mainassets/images/logo-footer.svg" class="footer-logo" alt="">
                            <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                                <div class="footer-social list-social">
                                    <ul>
                                        <li><a href="<?= $contactDetails['faceBookLink'] ?>" target="_self"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="<?= $contactDetails['twitterLink'] ?>" target="_self"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="<?= $contactDetails['linkedInLink'] ?>" target="_self"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="<?= $contactDetails['instagramLink'] ?>" target="_self"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-xl-0">
                            <div class="widget-footer">
                                <h6>Contacts</h6>
                                <ul class="footer-list">
                                    <li class="footer-list-item d-flex">
                                        <span class="list-item-icon"><i class="ot-flaticon-place"></i></span>
                                        <span class="list-item-text"><?= $contactDetails['address'] ?></span>
                                    </li>
                                    <li class="footer-list-item">
                                        <span class="list-item-icon"><i class="ot-flaticon-mail"></i></span>
                                        <span class="list-item-text"><?= $contactDetails['email'] ?></span>
                                    </li>
                                    <li class="footer-list-item">
                                        <span class="list-item-icon"><i class="ot-flaticon-phone-call"></i></span>
                                        <span class="list-item-text">+971 <?= $contactDetails['phone'] ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-md-0">
                        <div class="widget-footer widget-contact">
                            <h6>Quick Links</h6>
                            <ul>
                                <li><a href="home">Home</a></li>
                                <li><a href="about">About</a></li>
                                <li><a href="products">Products</a></li>
                                <li><a href="">Services</a></li>
                                <li><a href="ourworks">Our Works</a></li>
                                <li><a href="contactus">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="widget-footer footer-widget-subcribe">
                            <div class="widget-footer widget-contact">
                                <h6>Quick Links</h6>
                                <ul>
                                    <?php if (isset($navService) && !empty($navService)) : ?>
                                        <?php foreach ($navService as $navService_row) :  ?>
                                            <li><a href="services/<?= $navService_row->serviceID ?>"> <?= $navService_row->serviceTitle ?></a></li>
                                        <?php endforeach ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer><!-- #site-footer -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 mb-4 mb-lg-0">
                        <p>©2023 Unilam Wood Industries LLC All rights reserved</p>
                    </div>
                    <div class="col-lg-5 col-md-12 align-self-center text-right">
                        <p>Design By <a class="text-light" href="#">Tomsher</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- #page -->
    <a id="back-to-top" href="#" class="show"><i class="ot-flaticon-left-arrow"></i></a>
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
    <script src="public/mainassets/js/rev-script-1.js"></script>

    <script src="public/mainassets/js/jquery.mb.YTPlayer.min.js"></script>
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
    <script>
        (function($) {
            "use strict";
            jQuery(".player").YTPlayer();
        })(jQuery);
    </script>
</body>

</html>