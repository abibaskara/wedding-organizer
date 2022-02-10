<!-- BEGIN DETAIL MAIN BLOCK -->
<?php foreach ($data_detail as $row) {
    $gambar = $this->ProdukModel->getGambar($row->id_gambar)->result();
?>
    <div class="detail-block detail-block_margin" style="background-image: url(<?= base_url() . 'assets/assets-landing/image/banner/dekor2.jpg'  ?>); margin-top:145px">
        <div class="wrapper">
            <div class="detail-block__content">
                <h1>Shop</h1>
                <ul class="bread-crumbs">
                    <li class="bread-crumbs__item">
                        <a href="<?= base_url('/') ?>" class="bread-crumbs__link">Home</a>
                    </li>
                    <li class="bread-crumbs__item">
                        <a href="<?= base_url('shop') ?>" class="bread-crumbs__link">Shop</a>
                    </li>
                    <li class="bread-crumbs__item"><?= $row->nama ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- DETAIL MAIN BLOCK EOF   -->
    <!-- BEGIN PRODUCT -->
    <div class="product">
        <div class="wrapper">
            <div class="product-content">
                <div class="product-slider">
                    <div class="product-slider__main">
                        <?php foreach ($gambar as $a) { ?>
                            <div class="product-slider__main-item">
                                <div class="products-item__type">
                                    <span class="products-item__sale">sale</span>
                                </div>
                                <img loading="lazy" src="<?php echo base_url() . 'assets/assets-admin/foto-produk/' . $a->foto; ?>" alt="product">
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-slider__nav">
                        <?php foreach ($gambar as $a) { ?>
                            <div class="product-slider__nav-item">
                                <img loading="lazy" src="<?php echo base_url() . 'assets/assets-admin/foto-produk/' . $a->foto; ?>" alt="product">
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="product-info">
                    <h3><?= $row->nama ?></h3>
                    <span class="product-price">Rp. <?= number_format($row->harga, 0, '.', '.'); ?></span>
                    <p><?= $row->description ?> </p>
                    <div class="product-options">
                        <div class="product-info__quantity">
                            <span class="product-info__quantity-title">Quantity:</span>
                            <?php
                            echo form_open('shop/keranjang');
                            echo form_hidden('id', $row->id);
                            echo form_hidden('price', $row->harga);
                            echo form_hidden('name', $row->nama);
                            echo form_hidden('redirect_page', str_replace('index.php', '', current_url()));
                            ?>
                            <div class="counter-box">
                                <span class="counter-link counter-link__prev"><i class="icon-arrow"></i></span>
                                <input type="text" id="qty" name="qty" class="counter-input" min="1" value="1">
                                <span class="counter-link counter-link__next"><i class="icon-arrow"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="product-buttons">
                        <button type="submit" class="btn btn-icon"><i class="icon-cart"></i> cart</button>
                        <?php echo form_close(); ?>
                        <a href="<?= base_url('shop/buy/') . $row->id ?>" class="btn btn-grey btn-icon"><i class="icon-cart"></i> Buy</a>
                    </div>
                </div>

            </div>
        </div>
        <img class="promo-video__decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side-r.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">

        <img class="shop-decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
    </div>
<?php } ?>
<!-- PRODUCT EOF   -->