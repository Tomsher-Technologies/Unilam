  <?= $this->include('frontend/common/header') ?>

  <div id="content" class="site-content">

      <div class="page-header dtable text-center header-transparent service-1" style="background-image: url( ../<?= isset($serviceDetails) ? $serviceDetails['serviceBannerImageUrl'] : '' ?>);">
          <div class="dcell">
              <div class="container">
                  <?php if (isset($serviceDetails) && !empty($serviceDetails)) : ?>
                      <h1 class="page-title"><?= $serviceDetails['serviceTitle'] ?></h1>
                  <?php endif; ?>
                  <ul id="breadcrumbs" class="breadcrumbs none-style">
                      <li><a href="<?= base_url('home') ?>">Home</a></li>
                      <?php if (isset($serviceDetails) && !empty($serviceDetails)) : ?>
                          <li class="active"><?= $serviceDetails['serviceTitle'] ?></li>
                      <?php endif; ?>
                  </ul>
              </div>
          </div>
      </div>
  </div>
  <?php if (isset($serviceDetails) && !empty($serviceDetails)) : ?>
      <?php if (isset($serviceDetails['serviceHeadLine'])) : ?>
          <section class="services-single">
              <div class="container">
                  <div class="row">

                      <div class="col-lg-12 col-md-12">
                          <div class="services-detail-content">
                              <div class="ot-heading ">
                                  <h2 class="main-heading"><?= $serviceDetails['serviceHeadLine'] ?></h2>
                              </div>
                              <p>
                                  <?= $serviceDetails['serviceMainDescription'] ?>
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      <?php endif; ?>
      <?php if (isset($serviceDetails['serviceHeadLine2'])) : ?>
          <section class="skill-4 p-md-0 pb-0">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-xl-6 col-lg-12 col-md-12 bg2-aboutus align-self-center px-xl-0">
                          <div class="skill-content-4">
                              <div class="ot-heading is-dots">
                                  <h2 class="main-heading"><?= $serviceDetails['serviceHeadLine2'] ?></h2>
                              </div>
                              <div class="space-20"></div>
                              <div class="space-5"></div>
                              <p>
                                  <?= $serviceDetails['serviceMainDescription2'] ?>
                              </p>
                          </div>
                      </div>
                      <div class="col-xl-6 col-lg-12 col-md-12 p-lg-0 align-self-center">
                          <div class="skill-img-4 text-center">
                              <img src="<?= base_url($serviceDetails['serviceHeadLineImageUrl2']) ?>" alt="<?= $serviceDetails['serviceHeadLine2'] ?>">
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      <?php endif; ?>
  <?php endif; ?>
  <?php if (isset($serviceFeatures) && !empty($serviceFeatures)) : ?>
      <section class="process-area-5" style="    background-image: url(<?= base_url($serviceDetails['featureBannerImageUrl']) ?>);
                                                background-attachment: fixed;
                                                background-size: cover;
                                                padding: 120px 0 80px 0;
                            ">
          <div class="container">
              <div class="ot-process">
                  <ul class="process_nav unstyle">
                      <?php $rowNumber = 1; ?>
                      <?php foreach ($serviceFeatures as $serviceFeatures_row) :  ?>
                          <li class="mb-5 mb-lg-0">
                              <div class="icon-main">
                                  <span class="dcell"><i class="ot-flaticon-tip"></i></span>
                                  <span class="number-stroke">0<?= $rowNumber++; ?></span>
                              </div>
                              <h5><?= $serviceFeatures_row->featureTitle; ?></h5>
                              <div class="process-des">
                                  <p class="process-des-item">
                                      <?= $serviceFeatures_row->featureDescription; ?>
                                  </p>
                              </div>
                          </li>
                      <?php endforeach ?>
                  </ul>
              </div>
          </div>
      </section>
  <?php endif; ?>
  <?php if (isset($serviceDetails) && !empty($serviceDetails)) : ?>
      <?php if (isset($serviceDetails['serviceHeadLine3'])) : ?>
          <section class="testi-4 p-md-0">
              <div class="container-fluid">
                  <div class="row">
                      <div class="col-xl-6 col-lg-12 px-xl-0">
                          <div class="testi-img-3 text-center">
                              <img src="<?= base_url($serviceDetails['serviceHeadLineImageUrl3']) ?>" alt="<?= $serviceDetails['serviceHeadLine3'] ?>">
                              <div class="space-40 d-block d-md-none"></div>
                          </div>
                      </div>
                      <div class="col-xl-6 col-lg-12 px-xl-0 mb-xl-0 align-self-center">
                          <div class="testi-slide-block-4">
                              <div class="ot-heading is-dots">

                                  <h2 class="main-heading"><?= $serviceDetails['serviceHeadLine3'] ?></h2>
                              </div>
                              <div class="space-20"></div>
                              <div class="space-5"></div>
                              <p>
                                  <?= $serviceDetails['serviceMainDescription3'] ?>
                              </p>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      <?php endif; ?>
  <?php endif; ?>

  <?= $this->include('frontend/common/footer') ?>