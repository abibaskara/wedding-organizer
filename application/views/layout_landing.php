<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="format-detection" content="telephone=no">
    <meta name="it-rating" content="it-rat-cd303c3f80473535b3c667d0d67a7a11">
    <meta name="cmsmagazine" content="3f86e43372e678604d35804a67860df7">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
    <title>Eka Suhandi - Wedding Organizer</title>
    <meta name='description' content="" />
    <meta name="keywords" content="" />
    <link href="<?php echo base_url() . 'assets/assets-landing/vendor/selectize/dist/css/selectize.default.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/assets-admin/vendor/sweetalert/lib/sweet-alert.css' ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="icon" type="image/x-icon" href="<?php echo base_url() . 'assets/assets-landing/image/icon-2.png' ?>" />
    <link rel="preload stylesheet" href="<?php echo base_url() . 'assets/assets-landing/css/style.css' ?>" as="style">
    <style>
        .cart-table {
            font-weight: 600;
            font-size: 15px;
            line-height: 150%;
            color: #222222;
        }
    </style>
</head>

<body class="loaded">


    <!-- BEGIN BODY -->

    <div class="main-wrapper">

        <!-- BEGIN CONTENT -->

        <main class="content" style="margin-top: 20px;">
            <?= $contents; ?>
        </main>

        <!-- CONTENT EOF   -->

        <!-- BEGIN HEADER -->

        <header class="header">
            <div class="header-top">
                <span>Welcome!</span>
                <i class="header-top-close js-header-top-close icon-close"></i>
            </div>
            <div class="header-content">
                <div class="header-logo">
                    <img src="<?= base_url() . 'assets/assets-landing/image/logo-2.png' ?>" alt="">
                </div>
                <div class="header-box">
                    <ul class="header-nav">
                        <li><a href="<?= base_url('/') ?>">Home</a></li>
                        <li><a href="<?= base_url('profil') ?>">Profile</a></li>
                        <li><a href="<?= base_url('shop') ?>">shop</a></li>
                        <?php $data = $this->session->userdata('nama');
                        if (empty($data)) { ?>
                        <?php } else { ?>
                            <li><a href="<?= base_url('myorder') ?>">My Order</a></li>
                        <?php } ?>
                        <li><a href="<?= base_url('contact') ?>">contact</a></li>
                    </ul>
                    <ul class="header-options">
                        <?php
                        $data = $this->session->userdata('nama');
                        if (empty($data)) { ?>
                            <li><a href="<?php echo base_url('login') ?>"><i class="icon-user"></i></a>
                            <?php } else { ?>
                                <ul class="header-nav">
                                    <li><a href="#"><i class="icon-user"></i> <?= $this->session->userdata('nama'); ?></a>
                                        <ul>
                                            <li><a href="<?php echo site_url('login/logout') ?>">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php }
                            ?>
                            <?php
                            $keranjang = $this->cart->contents();
                            $jml_item = 0;
                            foreach ($keranjang as $row) {
                                $jml_item = $jml_item + $row['qty'];
                            }
                            ?>
                            <li><a href="<?php echo base_url('shop/cart') ?>"><i class="icon-cart"></i><span><?= $jml_item ?></span></a></li>
                    </ul>
                </div>

                <div class="btn-menu js-btn-menu"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></div>
            </div>
        </header>

        <!-- HEADER EOF   -->

        <!-- BEGIN FOOTER -->

        <footer style="margin-top: 20px;" class="footer">
            <div class="wrapper">
                <div class="footer-copy">
                    <span>&copy; All rights reserved. BeShop 2020</span>
                </div>
            </div>
        </footer>

        <!-- FOOTER EOF   -->



    </div>

    <div class="icon-load"></div>

    <!-- BODY EOF   -->

    <script src="<?php echo base_url() . 'assets/assets-landing/js/jquery-3.5.1.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-landing/js/lazyload.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-landing/js/slick.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-landing/js/custom.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-admin/vendor/nouislider/distribute/nouislider.js' ?>"></script>

    <script src="<?php echo base_url() . 'assets/assets-admin/vendor/noty/js/noty/packaged/jquery.noty.packaged.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-admin/vendor/selectize/dist/js/standalone/selectize.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-admin/js/components/notifications.js' ?>"></script>
</body>

</html>