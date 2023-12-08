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

    <!-- //  double back  -->

    <link rel="shortcut icon" type="image/x-icon" href="../public/mainassets/images/favicon.png" />
    <link rel="stylesheet" href="../public/mainassets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/mainassets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../public/mainassets/css/flaticon.css" />
    <link rel="stylesheet" href="../public/mainassets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="../public/mainassets/css/owl.theme.css" />
    <link rel="stylesheet" href="../public/mainassets/css/magnific-popup.css" />
    <link rel="stylesheet" href="../public/mainassets/css/lightgallery.css" />
    <link rel="stylesheet" href="../public/mainassets/css/unilam-menu.css" />
    <link rel="stylesheet" href="../public/mainassets/css/custom.css" />

    <link rel="stylesheet" href="../public/mainassets/style.css" />
    <link rel="stylesheet" href="../public/mainassets/css/royal-preload.css" />
    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="../public/mainassets/plugins/revolution/revolution/css/settings.css">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="../public/mainassets/plugins/revolution/revolution/css/navigation.css">

    <link rel="stylesheet" href="../public/mainassets/css/jquery.mb.YTPlayer.min.css" type="text/css">
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
                                        <a href="<?= (!empty($productID)) ? '../home' : 'home' ?>">
                                            <img src="<?= (!empty($productID)) ? '../' : '' ?>public/mainassets/images/logo.svg " alt="UNILAM">
                                        </a>
                                    </div>
                                </div>
                                <div class="octf-col menu-col no-padding">
                                    <nav id="site-navigation" class="main-navigation">
                                        <ul class="menu">

                                            <li><a href="<?= (!empty($productID)) ? '../home' : 'home' ?>">HOME</a></li>
                                            <li><a href="<?= (!empty($productID)) ? '../about' : 'about' ?>">ABOUT</a></li>

                                            <li class="menu-item-has-children mega-dropdown"><a href="<?= (!empty($productID)) ? '../products' : 'products' ?>">PRODUCTS</a>
                                                <ul class="mega-sub-menu">
                                                    <li class="row">
                                                        <?php if (isset($navProducts) && !empty($navProducts)) : ?>
                                                            <?php foreach ($navProducts as $navProducts_row) :  ?>
                                                                <ul class="col">
                                                                    <li>
                                                                        <div class="nav-category-item d-flex">
                                                                            <div class="thumbnail">
                                                                                <div class="image">
                                                                                    <img src="<?= base_url() . '/' . $navProducts_row->productImageUrl ?>" alt="<?= $navProducts_row->productTitle ?>">
                                                                                </div>
                                                                                <a href="<?= (!empty($productID)) ? '' : 'products/' . $navProducts_row->productID ?>">
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
                                            <li class="menu-item-has-children"><a href="#">SERVICES</a>
                                                <ul class="sub-menu">
                                                    <?php if (isset($navService) && !empty($navService)) : ?>
                                                        <?php foreach ($navService as $navService_row) :  ?>
                                                            <li><a href="<?= (!empty($productID)) ? '../' : '' ?>services/<?= $navService_row->serviceID ?>"> <?= $navService_row->serviceTitle ?></a></li>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                            <li><a href="<?= (!empty($productID)) ? '../works' : 'works' ?>">OUR WORKS</a></li>
                                            <li><a href="<?= (!empty($productID)) ? '../contact' : 'contact' ?>">CONTACT US</a></li>
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
                                        <img src="<?= (!empty($productID)) ? '../public/mainassets/images/logo.svg' : 'public/mainassets/images/logo.svg'    ?> " alt="UNILAM">
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

                                                <li><a href="<?= (!empty($productID)) ? '../home' : 'home' ?>">HOME</a></li>
                                                <li><a href="<?= (!empty($productID)) ? '../about' : 'about' ?>">ABOUT</a></li>
                                                <li><a href="<?= (!empty($productID)) ? '../products' : 'products' ?>">PRODUCTS</a></li>


                                                <li class="menu-item-has-children"><a href="#">SERVICES</a>
                                                    <ul class="sub-menu">
                                                        <?php if (isset($navService) && !empty($navService)) : ?>
                                                            <?php foreach ($navService as $navService_row) :  ?>
                                                                <li>
                                                                    <a href="<?= (!empty($productID)) ? '../' : '' ?>services/<?= $navService_row->serviceID ?>">
                                                                        <?= $navService_row->serviceTitle ?>
                                                                    </a>
                                                                </li>
                                                            <?php endforeach ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </li>

                                                <li><a href="works">OUR WORKS</a></li>
                                                <li><a href="<?= (!empty($productID)) ? '../contact' : 'contact' ?>">CONTACT US</a></li>
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
            <div class="page-header dtable text-center header-transparent pheader-products" style="background-image: url(<?= (isset($productDetails['productBannerImageUrl']) && !empty($productDetails['productBannerImageUrl'])) ? base_url() . '/' . $productDetails['productBannerImageUrl'] : base_url() . '/' . 'public/mainassets/images/about-24.jpg' ?>);">
                <div class="dcell">
                    <?php if (isset($productDetails) && !empty($productDetails['productTitle'])) : ?>
                        <div class="container">
                            <h1 class="page-title">
                                <?= $productDetails['productTitle'] ?>
                            </h1>
                            <ul id="breadcrumbs" class="breadcrumbs none-style">
                                <li><a href="<?= (!empty($productID)) ? '../' : '' ?>home">Home</a></li>
                                <li><a href="<?= (!empty($productID)) ? '../' : '' ?>products">Products</a></li>
                                <li class="active">
                                    <?= $productDetails['productTitle'] ?>
                                </li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="shop-catalog">
            <div class="container-fluid px-0 px-xl-90">
                <div class=" row">
                    <div class="widget-area primary-sidebar col-lg-3 col-md-12 col-sm-12">
                        <aside class="widget widget_categories">
                            <ul>
                                <?php if (isset($allProducts) && !empty($allProducts)) : ?>
                                    <?php foreach ($allProducts as $allProducts_row) :  ?>
                                        <li>
                                            <a class="<?= ($allProducts_row->productID == $selectedProductID) ? 'active' : ''; ?>" href="<?= (!empty($productID)) ? $allProducts_row->productID : 'products/' . $allProducts_row->productID ?> ">
                                                <?= $allProducts_row->productTitle ?>
                                            </a>
                                        </li>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </ul>
                        </aside>
                    </div>
                    <div class="col-lg-9 col-md-12  mb-lg-0 mb-5">
                        <div class="single-team">
                            <div class="row p-0 align-items-center">
                                <?php if (isset($galleryImages) && !empty($galleryImages)) : ?>
                                    <div class="col-lg-6 col-md-12 pr-0 text-center align-self-center mb-5 mb-lg-0">
                                        <div class="simple-slide owl-theme owl-carousel">
                                            <?php foreach ($galleryImages as $galleryImages_row) :  ?>
                                                <div class="item">
                                                    <img src="<?= $galleryImages_row->gallaryImageUrl ?>" alt="Course images">
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (isset($productDetails) && !empty($productDetails)) : ?>
                                    <div class="col-lg-6 col-md-12 pl-0">
                                        <div class="team-member-info" style="background-color: black;">
                                            <h2> <?= $productDetails['productTitle'] ?></h2>
                                            <h5> <?= $productDetails['productDescription'] ?></h5>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="products-list" class="our-skill-3 pb-0">
            <section class="our-portfolio">
                <div class="container-fluid px-0 px-xl-90">
                    <div class="row">
                        <?php if (isset($productTypes) && !empty($productTypes)) : ?>
                            <div class="col-lg-12 text-center theratio-align-center">
                                <div class="project-filter-wrapper">
                                    <ul class="">
                                        <!-- <ul class="project_filters"> -->
                                        <li>
                                            <a href="../products?producttype=" data-filter="*" class="selected btn-details">All<span class="filter-count"></span></a>
                                        </li>
                                        <?php foreach ($productTypes as $productType_row) :  ?>
                                            <li>
                                                <a class="btn-details" href="<?= ((!empty($productID)) ? $selectedProductID : 'products/' . $selectedProductID) . '?producttype=' . $productType_row->productTypeID ?>" data-filter=".wood-category">
                                                    <?= $productType_row->typeTitle ?><span class="filter-count"></span>
                                                </a>
                                            </li>
                                        <?php endforeach ?>
                                    </ul>
                                    <?php if (isset($productTypeDetails) && !empty($productTypeDetails)) : ?>
                                        <div class="projects-grid pf_4_cols style-3 img-popup img-scale w-auto">
                                            <div class="grid-sizer"></div>
                                            <?php foreach ($productTypeDetails as $productTypeDetail_row) :  ?>
                                                <div class="project-item wood-category">
                                                    <div class="projects-box">
                                                        <div class="projects-thumbnail" data-src="<?= base_url() . '/' . $productTypeDetail_row->typeDetailImageUrl ?>">
                                                            <a href="<?= base_url() . '/' . $productTypeDetail_row->typeDetailImageUrl ?>">
                                                                <img src="<?= base_url() . '/' . $productTypeDetail_row->typeDetailImageUrl ?>" alt="">
                                                            </a>

                                                        </div>
                                                        <div class="portfolio-info">
                                                            <div class="portfolio-info-inner text-center">
                                                                <h5><a class="title-link" href=""> <?= $productTypeDetail_row->typeDetailTitle ?> </a></h5>

                                                            </div>
                                                            <a class="overlay" href=""></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        </section>

        <footer id="site-footer" class="site-footer">
            <div class="container-fluid px-0 px-xl-90">
                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-xl-0">
                        <div class="widget-footer">
                            <img src="<?= (!empty($productID)) ? '../' : '' ?>public/mainassets/images/logo-footer.svg" class="footer-logo" alt="">

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
                                <li><a href="<?= (!empty($productID)) ? '../home' : 'home' ?>">Home</a></li>
                                <li><a href="<?= (!empty($productID)) ? '../about' : 'about' ?>">About</a></li>
                                <li><a href="<?= (!empty($productID)) ? '../products' : 'products' ?>">Products</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="<?= (!empty($productID)) ? '../works' : 'works' ?>">Our Works</a></li>
                                <li><a href="<?= (!empty($productID)) ? '../contact' : 'contact' ?>">Contact Us</a></li>
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
                        <p>©2023 Unilam wood-category Industries LLC All rights reserved</p>
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

    <!-- double back -->

    <script src="../public/mainassets/js/jquery.min.js"></script>
    <script src="../public/mainassets/js/mousewheel.min.js"></script>
    <script src="../public/mainassets/js/lightgallery-all.min.js"></script>
    <script src="../public/mainassets/js/jquery.magnific-popup.min.js"></script>
    <script src="../public/mainassets/js/jquery.isotope.min.js"></script>
    <script src="../public/mainassets/js/owl.carousel.min.js"></script>
    <script src="../public/mainassets/js/easypiechart.min.js"></script>
    <script src="../public/mainassets/js/jquery.countdown.min.js"></script>
    <script src="../public/mainassets/js/scripts.js"></script>
    <script src="../public/mainassets/js/royal_preloader.min.js"></script>
    <!-- REVOLUTION JS FILES -->

    <script src="../public/mainassets/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="../public/mainassets/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="../public/mainassets/plugins/revolution/revolution/js/extensions/revolution-plugin.js"></script>

    <!-- REVOLUTION SLIDER SCRIPT FILES -->
    <script src="../public/mainassets/js/rev-script-1.js"></script>

    <script src="../public/mainassets/js/jquery.mb.YTPlayer.min.js"></script>

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