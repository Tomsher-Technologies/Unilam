<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>UNILAM</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('public/mainassets/images/favicon.png');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/font-awesome.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/flaticon.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/owl.carousel.min.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/owl.theme.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/magnific-popup.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/lightgallery.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/unilam-menu.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/custom.css');?>" />

    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/style.css');?>" />
    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/royal-preload.css');?>" />
    <!-- REVOLUTION SLIDER CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/mainassets/plugins/revolution/revolution/css/settings.css');?>">
    <!-- REVOLUTION NAVIGATION STYLE -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('public/mainassets/plugins/revolution/revolution/css/navigation.css');?>">

    <link rel="stylesheet" href="<?php echo base_url('public/mainassets/css/jquery.mb.YTPlayer.min.css');?>" type="text/css">

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
                                        <a href="<?=base_url('home')?>">
                                            <img src="<?php echo base_url('public/mainassets/images/logo.svg') ?>" alt="UNILAM" class="">
                                        </a>
                                    </div>
                                </div>
                                <div class="octf-col menu-col no-padding">
                                    <nav id="site-navigation" class="main-navigation">
                                        <ul class="menu">

                                            <li><a href="<?=base_url('home')?>">HOME</a></li>
                                            <li><a href="<?=base_url('about')?>">ABOUT</a></li>

                                            <li class="menu-item-has-children mega-dropdown"><a href="<?=base_url('products')?>">PRODUCTS</a>
                                                <ul class="mega-sub-menu">
                                                    <li class="row">
                                                        <?php if (isset($navProducts) && !empty($navProducts)) : ?>
                                                            <?php foreach ($navProducts as $navProducts_row) :  ?>
                                                                <ul class="col">
                                                                    <li>
                                                                        <div class="nav-category-item d-flex">
                                                                            <div class="thumbnail">
                                                                                <div class="image"><img src="<?=base_url($navProducts_row->menuProductImageUrl)?>" alt="Product images"></div>
                                                                                <a href="<?=base_url('products')?>/<?= $navProducts_row->productID ?>">
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
                                                            <li><a href="<?=base_url('services')?>/<?= $navService_row->serviceID ?>"> <?= $navService_row->serviceTitle ?></a></li>
                                                        <?php endforeach ?>
                                                    <?php endif; ?>
                                                </ul>
                                            </li>
                                            <li><a href="<?=base_url('works')?>">OUR WORKS</a></li>
                                            <li><a href="<?=base_url('contact')?>">CONTACT US</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="octf-col cta-col text-right no-padding">
                                    <!-- Call To Action -->
                                    <div class="octf-btn-cta">
                                        <div class="octf-sidepanel octf-cta-header">
                                            <div  class="panel-btn octf-cta-icons"> <a href="tel:+971<?= $contactDetails['phone'] ?>"><i class="fa-solid fa-phone"></i></a></div>
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
                                    <a href="<?=base_url('home')?>">
                                        <img src="<?=base_url('public/mainassets/images/logo.svg')?>" alt="UNILAM">
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

                                                <li><a href="<?=base_url('home')?>">HOME</a></li>
                                                <li><a href="<?=base_url('about')?>">ABOUT</a></li>
                                                <li><a href="<?=base_url('products')?>">PRODUCTS</a></li>


                                                <li class="menu-item-has-children"><a href="#">SERVICES</a>
                                                    <ul class="sub-menu">
                                                        <?php if (isset($navService) && !empty($navService)) : ?>
                                                            <?php foreach ($navService as $navService_row) :  ?>
                                                                <li><a href="<?=base_url('services')?>/<?= $navService_row->serviceID ?>"> <?= $navService_row->serviceTitle ?></a></li>
                                                            <?php endforeach ?>
                                                        <?php endif; ?>
                                                    </ul>
                                                </li>

                                                <li><a href="<?=base_url('works')?>">OUR WORKS</a></li>
                                                <li><a href="<?=base_url('contact')?>">CONTACT US</a></li>
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