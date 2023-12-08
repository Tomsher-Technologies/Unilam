<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>UNILAM</title>
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
                                        <a href="../home">
                                            <img src="../public/mainassets/images/logo.svg" alt="UNILAM" class="">
                                        </a>
                                    </div>
                                </div>
                                <div class="octf-col menu-col no-padding">
                                    <nav id="site-navigation" class="main-navigation">
                                        <ul class="menu">

                                            <li><a href="../home">HOME</a></li>
                                            <li><a href="../about">ABOUT</a></li>

                                            <li class="menu-item-has-children mega-dropdown"><a href="../products">PRODUCTS</a>
                                                <ul class="mega-sub-menu">
                                                    <li class="row">
                                                        <?php if (isset($navProducts) && !empty($navProducts)) : ?>
                                                            <?php foreach ($navProducts as $navProducts_row) :  ?>
                                                                <ul class="col">
                                                                    <li>
                                                                        <div class="nav-category-item d-flex">
                                                                            <div class="thumbnail">
                                                                                <div class="image">
                                                                                    <img src="../<?= $navProducts_row->productImageUrl ?>" alt="Course images">
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
                                                            <li><a href="<?= $navService_row->serviceID ?>"> <?= $navService_row->serviceTitle ?></a></li>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                            <li><a href="../works">OUR WORKS</a></li>
                                            <li><a href="../contact">CONTACT US</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="octf-col cta-col text-right no-padding">
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
                                    <a href="../home">
                                        <img src="../public/mainassets/images/logo.svg" alt="UNILAM">
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

                                                <li><a href="../home">HOME</a></li>
                                                <li><a href="../about">ABOUT</a></li>
                                                <li><a href="../home">PRODUCTS</a></li>


                                                <li class="menu-item-has-children"><a href="#">SERVICES</a>
                                                    <ul class="sub-menu">
                                                        <?php if (isset($navService) && !empty($navService)) : ?>
                                                            <?php foreach ($navService as $navService_row) :  ?>
                                                                <li><a href="manufacturing"> <?= $navService_row->serviceTitle ?></a></li>
                                                            <?php endforeach ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </li>

                                                <li><a href="../works">OUR WORKS</a></li>
                                                <li><a href="../contact">CONTACT US</a></li>
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
            <div class="page-header dtable text-center header-transparent pheader-portfolio-detail" style="background-image: url( ../<?= isset($projectsDetails) ? $projectsDetails['workBnnerImageUrl'] : '' ?>);">
                <div class="dcell">
                    <div class="container">
                        <?php if (isset($projectsDetails) && !empty($projectsDetails)) : ?>
                            <h1 class="page-title"><?= $projectsDetails['projectTitle'] ?></h1>
                        <?php endif; ?>
                        <ul id="breadcrumbs" class="breadcrumbs none-style">
                            <li><a href="../home">Home</a></li>
                            <li><a href="">Our Works</a></li>
                            <?php if (isset($projectsDetails) && !empty($projectsDetails)) : ?>
                                <li class="active"><?= $projectsDetails['projectTitle'] ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <section class="portfolio-detail p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="space-90"></div>
                            <div class="gallery-post img-slider owl-carousel owl-theme">
                                <?php if (isset($galleryImages) && !empty($galleryImages)) : ?>
                                    <?php foreach ($galleryImages as $galleryImages_row) :  ?>
                                        <div class="item-image">
                                            <img src="../<?= $galleryImages_row->gallaryImageUrl ?>" alt="">
                                        </div>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="space-60"></div>
                    </div>
                    <div class="row">
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['projectTitle'])) : ?>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                <div class="p-detail-info">
                                    <h6>Project:</h6>
                                    <p><?= $projectsDetails['projectTitle'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['projectLocation'])) : ?>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                <div class="p-detail-info">
                                    <h6>Location:</h6>
                                    <p><?= $projectsDetails['projectLocation'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['services'])) : ?>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                <div class="p-detail-info">
                                    <h6>Services:</h6>
                                    <p><?= $projectsDetails['services'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['projectType'])) : ?>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                <div class="p-detail-info">
                                    <h6>Project Type:</h6>
                                    <p><?= $projectsDetails['projectType'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['strategy'])) : ?>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                <div class="p-detail-info">
                                    <h6>Strategy:</h6>
                                    <p><?= $projectsDetails['strategy'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['projectDate'])) : ?>
                            <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                                <div class="p-detail-info">
                                    <h6>Date:</h6>
                                    <p><?= (new DateTime($projectsDetails['projectDate']))->format('F j, Y') ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="space-30"></div>
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['workDescription'])) : ?>
                            <div class="col-lg-12">
                                <p><span class="drop-cap"><span class="drop-cap-letter">Al</span></span>
                                    <?= $projectsDetails['workDescription'] ?></p>
                                <div class="space-20"></div>
                                <div class="space-5"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <h4>Design in Details</h4>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate animi deleniti
                                quisquam ipsum, voluptate vero ad sint tempora quos modi rerum dolorum voluptas eius
                                officiis numquam vitae officia, quidem maxime? Lorem ipsum dolor sit amet consectetur
                                adipisicing elit. Accusantium sed, sunt suscipit non dicta necessitatibus dignissimos?
                                Officiis id nulla exercitationem voluptatibus in fugiat cumque illum, doloribus
                                laboriosam similique amet porro!</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum possimus ratione
                                numquam tempore laborum, itaque sapiente provident pariatur officiis, quis unde fuga
                                aspernatur. Pariatur minus fugit unde nisi sint obcaecati. Lorem ipsum dolor sit amet
                                consectetur adipisicing elit. Iusto, illum? Deleniti sequi id ullam soluta ex
                                dignissimos est odit quae culpa. Deserunt provident voluptas est ipsum corrupti libero,
                                neque soluta?</p>
                            <div class="space-20"></div> -->

                            <div class="row">
                                <div class="col-md-12">
                                    <?php if (isset($projectsDetails) && !empty($projectsDetails['workLongDescription'])) : ?>
                                        <p>
                                            <?= $projectsDetails['workLongDescription'] ?></p>
                                        </p>
                                    <?php endif; ?>
                                    <div class="space-30"></div>
                                    <div class="share-portfolio">
                                        <?php if (isset($projectsDetails) && !empty($projectsDetails['twitterLink'])) : ?>
                                            <a class="twit" target="_blank" href="<?= $projectsDetails['twitterLink'] ?>" title="Twitter"><i class="fab fa-twitter"></i></a>
                                        <?php endif; ?>
                                        <?php if (isset($projectsDetails) && !empty($projectsDetails['faceBookLink'])) : ?>
                                            <a class="face" target="_blank" href="<?= $projectsDetails['faceBookLink'] ?>" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                        <?php endif; ?>
                                        <?php if (isset($projectsDetails) && !empty($projectsDetails['linkedInLink'])) : ?>
                                            <a class="pint" target="_blank" href="<?= $projectsDetails['linkedInLink'] ?>" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                                        <?php endif; ?>
                                        <?php if (isset($projectsDetails) && !empty($projectsDetails['pinterestLink'])) : ?>
                                            <a class="linked" target="_blank" href="<?= $projectsDetails['pinterestLink'] ?>" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="project-bottom">
                                <div class="single-portfolio-navigation post-nav clearfix">
                                    <?php if (isset($relatedProjects) && !empty($relatedProjects)) : ?>
                                        <div class="post-prev">
                                            <a href="<?= $relatedProjects[0]->workID ?>">
                                                <div class="thumb-post-prev">
                                                    <img src="../<?= $relatedProjects[0]->workImageUrl ?>" alt="">
                                                </div>
                                                <div class="info-post-prev">
                                                    <h6><span class="title-link"><?= $relatedProjects[0]->projectTitle ?></span></h6>
                                                    <span>[ <?= $relatedProjects[0]->categoryName ?> ]</span>
                                                </div>
                                            </a>
                                        </div>
                                        <?php if (isset($relatedProjects[1])) : ?>
                                            <div class="post-next">
                                                <a href="<?= $relatedProjects[1]->workID ?>">
                                                    <div class="thumb-post-next">
                                                        <img src="../<?= $relatedProjects[1]->workImageUrl ?>" alt="">
                                                    </div>
                                                    <div class="info-post-next">
                                                        <h6><span class="title-link"><?= $relatedProjects[1]->projectTitle ?></span></h6>
                                                        <span>[ <?= $relatedProjects[1]->categoryName ?> ]</span>
                                                    </div>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
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