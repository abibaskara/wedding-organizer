<!-- BEGIN DETAIL MAIN BLOCK -->
<div class="detail-block detail-block_margin" style="background-image: url(<?= base_url() . 'assets/assets-landing/image/banner/dekor2.jpg'  ?>); margin-top:145px">
    <div class="wrapper">
        <div class="detail-block__content">
            <h1>Registration</h1>
            <ul class="bread-crumbs">
                <li class="bread-crumbs__item">
                    <a href="<?= base_url('/') ?>" class="bread-crumbs__link">Home</a>
                </li>
                <li class="bread-crumbs__item">Registration</li>
            </ul>
        </div>
    </div>
</div>
<!-- DETAIL MAIN BLOCK EOF   -->
<!-- BEGIN REGISTRATION -->
<div class="login registration">
    <div class="wrapper">
        <div class="login-form js-img" data-src="img/registration-form__bg.png">
            <form method="POST" action="<?php echo base_url('register/proses'); ?>">
                <h3>register now</h3>
                <div class="box-field">
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter your full name">
                </div>
                <div class="box-field__row">
                    <div class="box-field">
                        <input type="text" name="no" id="no" class="form-control" placeholder="Enter your phone">
                    </div>
                    <div class="box-field">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email">
                    </div>
                </div>
                <div class="box-field">
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Enter your address">
                </div>
                <!-- <div class="box-field"> -->
                <select name="gender" id="gender" class="form-control" placeholder="Select your gender">
                    <option>--Select Gender--</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <!-- </div> -->
                <div class="box-field__row">
                    <span>password</span>
                </div>
                <div class="box-field">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password">
                </div>
                <button class="btn" type="submit">registration</button>
                <div class="login-form__bottom">
                    <span>Already have an account? <a href="<?= base_url('login') ?>">Log in</a></span>
                </div>
            </form>
        </div>
    </div>
    <img class="promo-video__decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side-r.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">

    <img class="shop-decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
</div>
<!-- REGISTRATION EOF   -->