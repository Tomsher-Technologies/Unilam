  <?= $this->include('frontend/common/header') ?>

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
                                                <a href="<?=base_url('projects-details')?>/<?= $worksDetails_row->workID ?>" class="octf-btn octf-btn-light border-hover-light ">View Project</a>
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
    <script src="<?php echo base_url('public/mainassets/js/rev-script-7.js'); ?>"></script>
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