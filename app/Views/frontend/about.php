  <?= $this->include('frontend/common/header') ?>
        <div id="content" class="site-content">
            <div class="page-header dtable text-center header-transparent pheader-studio">
                <div class="dcell">
                    <div class="container">
                        <h1 class="page-title">About UNILAM</h1>
                        <ul id="breadcrumbs" class="breadcrumbs none-style">
                            <li><a href="<?=base_url('home')?>">Home</a></li>
                            <li class="active">About</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($aboutPageDetails) && !empty($aboutPageDetails)) : ?>
            <section class="about-1" style="background-image: url(public/mainassets/images/about-bg.jpg); background-size: cover; background-position: right;">
                <div class="grid-lines grid-lines-vertical">
                    <span class="g-line-vertical line-left color-line-default"></span>
                    <span class="g-line-vertical line-right color-line-default"></span>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 mb-5 mb-lg-0">
                            <div class="about-img-1">
                                <img src="<?=base_url($aboutPageDetails['aboutImageUrl'])?>" alt="">
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12 align-self-center">
                            <div class="about-content-1 ml-xl-50 mr-xl-70">
                                <div class="ot-heading is-dots">
                                    <span>[ <?= $aboutPageDetails['aboutTitle'] ?> ]</span>
                                    <h2 class="main-heading"><?= $aboutPageDetails['aboutTitle'] ?></h2>
                                </div>
                                <p><?= $aboutPageDetails['aboutDescription'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="our-studio">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-12 col-md-12">
                            <div class="studio-img">
                                <img src="<?=base_url($aboutPageDetails['aboutImageUrl2']) ?>" alt="">
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12 col-md-12 pl-xl-7">
                            <div class="our-studio-detail">
                                <div class="ot-heading ">
                                    <h2 class="main-heading"><?= $aboutPageDetails['aboutTitle2'] ?></h2>
                                </div>
                                <p>
                                    <?= $aboutPageDetails['aboutDescription2'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="studio-counter">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4 mb-xl-0">
                            <div class="ot-counter">
                                <div>
                                    <span>[</span>
                                    <span class="num" data-to="<?= $aboutPageDetails['currentClients'] ?>" data-time="2000">0</span>
                                    <span>+]</span>
                                </div>
                                <h6>Current Clients</h6>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4 mb-xl-0">
                            <div class="ot-counter">
                                <div>
                                    <span>[</span>
                                    <span class="num" data-to="<?= $aboutPageDetails['yearsOfExperience'] ?>" data-time="2000">0</span>
                                    <span>+]</span>
                                </div>
                                <h6>years of experience</h6>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4 mb-sm-0">
                            <div class="ot-counter">
                                <div>
                                    <span>[</span>
                                    <span class="num" data-to="<?= $aboutPageDetails['awardWinning'] ?>" data-time="2000">0</span>
                                    <span>+]</span>
                                </div>
                                <h6>awards winning</h6>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                            <div class="ot-counter">
                                <div>
                                    <span>[</span>
                                    <span class="num" data-to="<?= $aboutPageDetails['officeWorldWide'] ?>" data-time="2000">0</span>
                                    <span>+]</span>
                                </div>
                                <h6>Offices Worldwide</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
  <?= $this->include('frontend/common/footer') ?>
        