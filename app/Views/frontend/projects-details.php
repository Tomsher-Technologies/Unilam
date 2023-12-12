  <?= $this->include('frontend/common/header') ?>

        <div id="content" class="site-content">
            <div class="page-header dtable text-center header-transparent pheader-portfolio-detail" style="background-image: url( ../<?= isset($projectsDetails) ? $projectsDetails['workBnnerImageUrl'] : '' ?>);">
                <div class="dcell">
                    <div class="container">
                        <?php if (isset($projectsDetails) && !empty($projectsDetails)) : ?>
                            <h1 class="page-title"><?= $projectsDetails['projectTitle'] ?></h1>
                        <?php endif; ?>
                        <ul id="breadcrumbs" class="breadcrumbs none-style">
                            <li><a href="<?=base_url('home')?>">Home</a></li>
                            <li><a href="<?=base_url('works')?>">Our Works</a></li>
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
                                            <img src="<?=base_url($galleryImages_row->gallaryImageUrl)?>" alt="">
                                        </div>
                                    <?php endforeach ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="space-60"></div>
                    </div>
                    <div class="row">
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['projectTitle'])) : ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                <div class="p-detail-info">
                                    <h6>Project:</h6>
                                    <p><?= $projectsDetails['projectTitle'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['projectLocation'])) : ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                <div class="p-detail-info">
                                    <h6>Location:</h6>
                                    <p><?= $projectsDetails['projectLocation'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($projectsDetails) && !empty($projectsDetails['services'])) : ?>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                <div class="p-detail-info">
                                    <h6>Services:</h6>
                                    <p><?= $projectsDetails['services'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php /*if (isset($projectsDetails) && !empty($projectsDetails['projectType'])) : ?>
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
                        <?php endif; */?>
                        <div class="space-30"></div>
                        <?php /*if (isset($projectsDetails) && !empty($projectsDetails['workDescription'])) : ?>
                            <div class="col-lg-12">
                                <p><span class="drop-cap"><span class="drop-cap-letter">Al</span></span>
                                    <?= $projectsDetails['workDescription'] ?></p>
                                <div class="space-20"></div>
                                <div class="space-5"></div>
                            </div>
                        <?php endif; */ ?>
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

 <?= $this->include('frontend/common/footer') ?>