<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>UNILAM</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
                                                <li><a href="home">PRODUCTS</a></li>


                                                <li class="menu-item-has-children"><a href="#">SERVICES</a>
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
            <div class="page-header dtable text-center header-transparent service-1" style="background-image: url( <?= isset($contactDetails) ? base_url() . '/' . $contactDetails['bannerImageUrl'] : '' ?>);">
                <div class="dcell">
                    <div class="container">
                        <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                            <h1 class="page-title"><?= $contactDetails['bannerTitle'] ?></h1>
                        <?php endif; ?>
                        <ul id="breadcrumbs" class="breadcrumbs none-style">
                            <li><a href="home">Home</a></li>
                            <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                                <li class="active"><?= $contactDetails['bannerTitle'] ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                        <div class="contact-left">
                            <?php if (isset($_SESSION['successMessage']) && !empty($_SESSION['successMessage'])) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success</strong> - <?= $_SESSION['successMessage']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <h2>Get in Touch</h2>
                            <p class="font14">Your email address will not be published. Required fields are marked *</p>
                            <form id="ajax-form" name="ajax-form" action="contact" method="post" class="wpcf7">
                                <div class="main-form">
                                    <p>
                                        <label for="name"> <span class="error" id="err-name">please enter name</span></label>
                                        <input type="text" name="contactName" value="<?= isset($post['contactName']) ? $post['contactName'] : '' ?>" size="40" class="" aria-invalid="false" placeholder="Your Name *" required>
                                        <?php if (isset($validation) && isset($validation['contactName'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['contactName']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </p>
                                    <p>
                                        <label for="email">
                                            <span class="error" id="err-email">please enter e-mail</span>
                                            <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                                        </label>
                                        <input type="email" name="contactEmail" id="contactEmail" value="<?= isset($post['contactEmail']) ? $post['contactEmail'] : '' ?>" size="40" class="" aria-invalid="false" placeholder="Your Email *" required>
                                        <?php if (isset($validation) && isset($validation['contactEmail'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['contactEmail']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </p>
                                    <p>
                                        <label for="name"> <span class="error" id="err-contactPhone">please enter phone</span></label>
                                        <input type="number" name="contactPhone" value="<?= isset($post['contactPhone']) ? $post['contactPhone'] : '' ?>" size="40" class="" aria-invalid="false" placeholder="Your Phone *" required>
                                        <?php if (isset($validation) && isset($validation['contactPhone'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['contactPhone']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </p>
                                    <p>
                                        <label for="message"></label>
                                        <textarea name="message" value="<?= isset($post['message']) ? $post['message'] : '' ?>" id="message" cols="40" rows="10" class="" aria-invalid="false" placeholder="Message..." required></textarea>
                                    </p>
                                    <p><button type="submit" id="send" class="octf-btn">Send Message</button></p>
                                    <div class="clear"></div>
                                    <div class="error" id="err-form">There was a problem validating the form please
                                        check!</div>
                                    <div class="error" id="err-timedout">The connection to the server timed out!</div>
                                    <div class="error" id="err-state"></div>
                                </div>
                            </form>

                            <div class="clear"></div>
                            <div id="ajaxsuccess">Successfully sent!!</div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-right">
                            <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                                <div class="ot-heading">
                                    <span>[ our contact details ]</span>
                                    <h2 class="main-heading"><?= $contactDetails['contactTitle'] ?></h2>
                                </div>
                                <p><?= $contactDetails['contactDescription'] ?></p>
                                <div class="contact-info">
                                    <i class="ot-flaticon-place"></i>
                                    <div class="info-text">
                                        <h6>OUR ADDRESS:</h6>
                                        <p><?= $contactDetails['address'] . ',&nbsp;&nbsp;' . $contactDetails['zipcode'] ?></p>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <i class="ot-flaticon-mail"></i>
                                    <div class="info-text">
                                        <h6>OUR MAILBOX:</h6>
                                        <p><a href="mailto:info@unilam.ae"><?= $contactDetails['email'] ?></a></p>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <i class="ot-flaticon-phone-call"></i>
                                    <div class="info-text">
                                        <h6>OUR PHONE:</h6>
                                        <p>
                                            <a href="tel:+971 <?= $contactDetails['phone'] ?>">
                                                +971;&nbsp;<?= $contactDetails['phone'] ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="list-social">
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
                </div>
            </div>
        </section>
        <div class="contact-map">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28930.411792530886!2d55.101761!3d24.98987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f13938ae7901f%3A0x6a477486d9cc59d4!2sUnilam%20Wood%20Industries!5e0!3m2!1sen!2sus!4v1699972819321!5m2!1sen!2sus" height="522" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
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
                                <li><a href="#">Services</a></li>
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

    <script>
        // jQuery to handle the close button click event
        $(document).ready(function() {
            $(".alert .close").on('click', function() {
                $(this).parent().fadeOut('fast'); // Hide the alert element
            });
        });
    </script>
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