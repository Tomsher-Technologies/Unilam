<footer id="site-footer" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-xl-0">
                <div class="widget-footer">
                    <img src="<?php echo base_url('public/mainassets/images/logo-footer.svg'); ?>" class="footer-logo" alt="">
                    <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                        <div class="footer-social list-social">
                            <ul>
                                <!--<li><a href="<?= $contactDetails['faceBookLink'] ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>-->
                                <!--<li><a href="<?= $contactDetails['twitterLink'] ?>" target="_blank"><i class="fab fa-twitter"></i></a>-->
                                </li>
                                <li><a href="<?= $contactDetails['linkedInLink'] ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="<?= $contactDetails['instagramLink'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
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
                            <?php if (isset($contactDetails['email2']) && !empty($contactDetails['email2'])) : ?>
                                <li class="footer-list-item">
                                    <span class="list-item-icon"><i class="ot-flaticon-mail"></i></span>
                                    <span class="list-item-text"><?= $contactDetails['email2'] ?></span>
                                </li>
                            <?php endif; ?>
                            <li class="footer-list-item">
                                <span class="list-item-icon"><i class="ot-flaticon-phone-call"></i></span>
                                <span class="list-item-text"><a href="tel:+971<?= $contactDetails['phone'] ?>">Phone: +971&nbsp;<?= $contactDetails['phone'] ?></a></span>
                            </li>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 mb-4 mb-md-0">
                <div class="widget-footer widget-contact">
                    <h6>Quick Links</h6>
                    <ul>
                        <li><a href="<?= base_url('home') ?>">Home</a></li>
                        <li><a href="<?= base_url('about') ?>">About</a></li>
                        <li><a href="<?= base_url('products') ?>">Products</a></li>
                        <!--<li><a href="">Services</a></li>-->
                        <li><a href="<?= base_url('works') ?>">Our Works</a></li>
                        <li><a href="<?= base_url('contact') ?>">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
                <div class="widget-footer footer-widget-subcribe">
                    <div class="widget-footer widget-contact">
                        <h6>Services</h6>
                        <ul>
                            <?php if (isset($navService) && !empty($navService)) : ?>
                                <?php foreach ($navService as $navService_row) :  ?>
                                    <li><a href="<?= base_url('services') ?>/<?= $navService_row->serviceID ?>"> <?= $navService_row->serviceTitle ?></a></li>
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
                <p>©<?= date('Y'); ?> Unilam Wood Industries LLC All rights reserved</p>
            </div>
            <div class="col-lg-5 col-md-12 align-self-center text-right">
                <p>Design By <a class="text-light" href="https://www.tomsher.com/" target="_blank">Tomsher</a></p>
            </div>
        </div>
    </div>
</div>
</div><!-- #page -->
<a id="back-to-top" href="#" class="show"><i class="ot-flaticon-left-arrow"></i></a>
<!-- jQuery -->
<script src="<?php echo base_url('public/mainassets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/js/mousewheel.min.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/js/lightgallery-all.min.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/js/jquery.magnific-popup.min.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/js/jquery.isotope.min.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/js/owl.carousel.min.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/js/easypiechart.min.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/js/jquery.countdown.min.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/js/scripts.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/js/royal_preloader.min.js'); ?>"></script>
<!-- REVOLUTION JS FILES -->

<script src="<?php echo base_url('public/mainassets/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js'); ?>"></script>
<script src="<?php echo base_url('public/mainassets/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js'); ?>"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="<?php echo base_url('public/mainassets/plugins/revolution/revolution/js/extensions/revolution-plugin.js'); ?>"></script>

<!-- REVOLUTION SLIDER SCRIPT FILES -->
<script src="<?php echo base_url('public/mainassets/js/rev-script-1.js'); ?>"></script>

<script src="<?php echo base_url('public/mainassets/js/jquery.mb.YTPlayer.min.js'); ?>"></script>
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