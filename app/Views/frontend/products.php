  <?= $this->include('frontend/common/header') ?>

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
                                      <a class="<?= ($allProducts_row->productID == $selectedProductID) ? 'active' : ''; ?>" href="<?= (!empty($canonicalName) && (!empty($productID))) ? 'https://tomsher.co/UNL/products/'.$allProducts_row->canonicalName :  'https://tomsher.co/UNL/products/'. $allProducts_row->canonicalName ?> ">
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
                                              <img src="<?= base_url($galleryImages_row->gallaryImageUrl) ?>" alt="Course images">
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
                                      <div class="photos-sample-container">
                                          <div class="photos-sample"> For photos and samples</div>
                                          <div class="photos-sample-contact"><a href="<?= base_url('contact') ?>">Contact Us</a></div>
                                      </div>
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
                              <!-- <ul class=""> -->
                              <ul class="project_filters">
                                  <li>
                                      <a href="../products?producttype=" data-filter="*" class="selected btn-details">All<span class="filter-count"></span></a>
                                  </li>
                                  <?php foreach ($productTypes as $productType_row) :  ?>

                                      <li>
                                          <a class="btn-details" href="#" data-filter=".<?= $productType_row->productTypeID ?>">
                                              <?= $productType_row->typeTitle ?><span class="filter-count"></span>
                                          </a>
                                      </li>
                                  <?php endforeach ?>
                              </ul>
                              <?php if (isset($productTypeDetails) && !empty($productTypeDetails)) : ?>
                                  <div class="projects-grid pf_4_cols style-3 img-popup img-scale w-auto">
                                      <div class="grid-sizer"></div>
                                      <?php foreach ($productTypeDetails as $productTypeDetail_row) :  ?>
                                          <div class="project-item <?= $productTypeDetail_row->productTypeID ?>">
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

  <?= $this->include('frontend/common/footer') ?>