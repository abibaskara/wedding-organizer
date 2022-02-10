<!-- BEGIN DETAIL MAIN BLOCK -->
<div class="detail-block detail-block_margin" style="background-image: url(<?= base_url() . 'assets/assets-landing/image/banner/dekor2.jpg'  ?>); margin-top:145px">
    <div class="wrapper">
        <div class="detail-block__content">
            <h1>Log in</h1>
            <ul class="bread-crumbs">
                <li class="bread-crumbs__item">
                    <a href="#" class="bread-crumbs__link">Home</a>
                </li>
                <li class="bread-crumbs__item">Log in</li>
            </ul>
        </div>
    </div>
</div>
<!-- DETAIL MAIN BLOCK EOF   -->
<!-- BEGIN LOGIN -->
<div class="login">
    <div class="wrapper">
        <div class="login-form js-img" data-src="img/login-form__bg.png">
            <form action="<?= base_url('login/proses'); ?>" method="POST">
                <h3>log in</h3>
                <div class="box-field">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter your email">
                </div>
                <div class="box-field">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                </div>
                <button class="btn" type="submit">log in</button>
                <div class="login-form__bottom">
                    <span>No account? <a href="<?= base_url('register') ?>">Register now</a></span>
                </div>
            </form>
        </div>
    </div>
    <img class="promo-video__decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side-r.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">

    <img class="shop-decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
</div>
<!-- LOGIN EOF   -->