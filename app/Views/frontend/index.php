  <?= $this->include('frontend/common/header') ?>

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
                          <div class="about-content-1 ml-xl-50 ">
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
                          <div class="our-skill-content-3">
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
                                              <a href="<?= base_url('products') ?>/<?= $productDetails_row['productID'] ?>">
                                                  <img src="<?= $productDetails_row['productImageUrl'] ?>" alt="">
                                              </a>
                                          </div>
                                          <div class="portfolio-info">
                                              <div class="portfolio-info-inner">
                                                  <h5><a class="title-link" href=""><?= $productDetails_row['productTitle'] ?>
                                                      </a></h5>
                                                  <p class="portfolio-cates">
                                                      <a href="<?= base_url('products') ?>/<?= $productDetails_row['productID'] ?>"><?= $productDetails_row['materialName'] ?></a>
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
                          <div class="our-skill-content-3">
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
                                  <a href="<?= base_url('works') ?>" class="octf-btn octf-btn-light border-hover-light">View Projects</a>
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
                                              <h5><a href="" class="title-link"><?= $featuresDetails_row->featureTitle ?></a></h5>
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
                                  <a href="<?= base_url('projects-details') ?>/<?= $worksDetails_row->workID ?>">
                                      <img src="<?= $worksDetails_row->workImageUrl ?>" alt="">

                                  </a>

                              </div>
                              <div class="portfolio-info">
                                  <div class="portfolio-info-inner">
                                      <h5><a class="title-link" href="<?= base_url('projects-details') ?>/<?= $worksDetails_row->workID ?>"><?= $worksDetails_row->projectTitle ?></a></h5>
                                      <p class="portfolio-cates"><a href="<?= base_url('projects-details') ?>/<?= $worksDetails_row->workID ?>"><?= $worksDetails_row->categoryName ?></a></p>
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

  <script>
      document.addEventListener('DOMContentLoaded', function() {
          var sliderNav = document.querySelector('.tparrows');
          if (sliderNav && sliderNav.childElementCount === 0) {
              sliderNav.style.display = 'none';
          }
      });
  </script>

  <?= $this->include('frontend/common/footer') ?>