<!-- BEGIN DETAIL MAIN BLOCK -->
<div class="detail-block detail-block_margin" style="background-image: url(<?= base_url() . 'assets/assets-landing/image/banner/dekor2.jpg'  ?>); margin-top:145px">
    <div class="wrapper">
        <div class="detail-block__content">
            <h1>Shop</h1>
            <ul class="bread-crumbs">
                <li class="bread-crumbs__item">
                    <a href="<?= base_url('/') ?>" class="bread-crumbs__link">Home</a>
                </li>
                <li class="bread-crumbs__item">Shop</li>
            </ul>
        </div>
    </div>
</div>
<!-- DETAIL MAIN BLOCK EOF   -->
<!-- BEGIN SHOP -->
<div class="shop">
    <div class="wrapper">
        <div class="shop-content">
            <div class="shop-aside">
                <div class="shop-aside__item">
                    <span class="shop-aside__item-title">Categories</span>
                    <ul>
                        <li>
                            <a href="<?= base_url('shop') ?>">All</a>
                        </li>
                        <?php if (!empty($data_category)) {
                            foreach ($data_category as $row) { ?>
                                <li>
                                    <a href="<?= base_url('shop/cariProduk/' . $row->id_category) ?>"><?php echo $row->category_name ?></a>
                                </li>
                            <?php }
                        } else { ?>
                            <li>
                                <a>Tidak Ada Data Category</a>
                            </li>
                        <?php
                        } ?>
                    </ul>
                </div>
            </div>
            <div class="shop-main">
                <div class="shop-main__items">
                    <?php foreach ($data_produk as $row) {
                        $gambar = $this->ProdukModel->getGambar($row->id_gambar)->row();
                    ?>
                        <div style="padding: 10px">
                            <a href="<?= base_url('shop/detail/' . $row->id) ?>">
                                <div style="text-align: center;">
                                    <img name="foto" src="<?php echo base_url() . 'assets/assets-admin/foto-produk/' . $gambar->foto; ?>" width="262px" height="262px" class="js-img" alt="">
                                </div>
                            </a>

                            <div class="container" style="margin-top: 10px;">
                                <div class="row" style="text-align: center;">
                                    <div class="col-6">
                                        <a type="submit" href="<?= base_url('shop/buy/' . $row->id) ?>" class="btn btn-primary" id="swal-test"><i class="icon-cart"></i>Buy</a>
                                    </div>
                                    <div class="col-6">
                                        <!-- Cart -->
                                        <?php
                                        echo form_open('shop/keranjang');
                                        echo form_hidden('id', $row->id);
                                        echo form_hidden('qty', 1);
                                        echo form_hidden('price', $row->harga);
                                        echo form_hidden('name', $row->nama);
                                        echo form_hidden('redirect_page', str_replace('index.php', '', current_url()));
                                        ?>
                                        <button type="submit" class="btn btn-success"><i class="icon-cart"></i>Add</button>
                                        <?php echo form_close(); ?>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= base_url('shop/detail/' . $row->id) ?>">
                                <div style="margin-top:5px">
                                    <span class="products-item__name" style="text-align: center;"><?php echo $row->nama ?></span>
                                    <span class="products-item__cost">Rp. <?php echo number_format($row->harga, '0', '.', '.') ?></span>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <img class="promo-video__decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side-r.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">

    <img class="shop-decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
</div>
<!-- SHOP EOF   -->
<!-- BEGIN INSTA PHOTOS -->
<div class="insta-photos">
    <a href="#" class="insta-photo">
        <img data-src="<?= base_url() . 'assets/assets-landing/image/insta-post/instapost1.png' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
        <div class="insta-photo__hover">
            <!-- <i class="icon-insta"></i> -->
        </div>
    </a>
    <a href="#" class="insta-photo">
        <img data-src="<?= base_url() . 'assets/assets-landing/image/insta-post/instapost2.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
        <div class="insta-photo__hover">
            <!-- <i class="icon-insta"></i> -->
        </div>
    </a>
    <a href="#" class="insta-photo">
        <img data-src="<?= base_url() . 'assets/assets-landing/image/insta-post/instapost3.jpeg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
        <div class="insta-photo__hover">
            <!-- <i class="icon-insta"></i> -->
        </div>
    </a>
    <a href="#" class="insta-photo">
        <img data-src="<?= base_url() . 'assets/assets-landing/image/insta-post/instapost4.jpeg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
        <div class="insta-photo__hover">
            <!-- <i class="icon-insta"></i> -->
        </div>
    </a>
    <a href="#" class="insta-photo">
        <img data-src="<?= base_url() . 'assets/assets-landing/image/insta-post/instapost5.jpeg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
        <div class="insta-photo__hover">
            <!-- <i class="icon-insta"></i> -->
        </div>
    </a>
    <a href="#" class="insta-photo">
        <img data-src="<?= base_url() . 'assets/assets-landing/image/insta-post/instapost6.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
        <div class="insta-photo__hover">
            <!-- <i class="icon-insta"></i> -->
        </div>
    </a>
</div>
<!-- INSTA PHOTOS EOF   -->
<script src="<?php echo base_url() . 'assets/assets-admin/vendor/sweetalert/lib/sweet-alert.js' ?>"></script>
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'center',
            showConfirmButton: false,
            timer: 3000
        });

        $('#swal-test').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Berhasil ditambahkan di keranjang'
            })
        });
    });
</script>