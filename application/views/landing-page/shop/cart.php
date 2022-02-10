<!-- BEGIN DETAIL MAIN BLOCK -->
<div class="detail-block detail-block_margin" style="background-image: url(<?= base_url() . 'assets/assets-landing/image/banner/dekor2.jpg'  ?>); margin-top:145px">
    <div class="wrapper">
        <div class="detail-block__content">
            <h1>Cart</h1>
            <ul class="bread-crumbs">
                <li class="bread-crumbs__item">
                    <a href="index.html" class="bread-crumbs__link">Home</a>
                </li>
                <li class="bread-crumbs__item">Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- DETAIL MAIN BLOCK EOF   -->
<!-- BEGIN CART -->
<div class="cart">
    <div class="wrapper">
        <div class="cart-table">
            <div class="cart-table__box">
                <div class="cart-table__row cart-table__row-head">
                    <div class="cart-table__col">Product</div>
                    <div class="cart-table__col">Price</div>
                    <div class="cart-table__col">Quantity</div>
                    <div class="cart-table__col">Total</div>
                    <div class="cart-table__col" style="text-align:center">Action</div>
                </div>
                <?php

                // use function PHPSTORM_META\type;

                echo form_open('shop/updateKeranjang'); ?>
                <?php
                $keranjang = $this->cart->contents();
                if (empty($keranjang)) { ?>
                    <div style="text-align: center;">
                        Tidak Ada Data Keranjang
                    </div>
                    <?php } else {
                    foreach ($keranjang as $row) {
                        $barang = $this->ProdukModel->detailProduk($row['id']);
                    ?>
                        <div class="cart-table__row">
                            <div class="cart-table__col">
                                <a href="product.html" class="cart-table__img">
                                    <img data-src="<?php echo base_url() . 'assets/assets-admin/foto-produk/' . $barang['foto_detail']; ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                                </a>
                                <div class="cart-table__info">
                                    <a href=" product.html" class="title5"><?php echo $row['name'] ?></a>
                                    <span class="cart-table__info-stock">in stock</span>
                                    <span class="cart-table__info-num">SKU: IN1203</span>
                                </div>
                            </div>
                            <div class="cart-table__col">
                                <span class="cart-table__price">Rp. <?php echo number_format($row['price'], 0, '.', '.') ?></span>
                            </div>

                            <div class="cart-table__col">
                                <div class="cart-table__quantity">
                                    <div class="counter-box">
                                        <span class="counter-link counter-link__prev"><i class="icon-arrow"></i></span>
                                        <?php echo form_input(array(
                                            'name' => $row['rowid'] . '[qty]',
                                            'value' => $row['qty'],
                                            'class' => 'counter-input',
                                            'min' => '1',
                                            'type' => 'text',
                                        )); ?>
                                        <!-- <input type="text" min="1" name="qty" class="counter-input" disabled value="<?php echo $row['qty'] ?>"> -->
                                        <span class="counter-link counter-link__next"><i class="icon-arrow"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-table__col">
                                <span class="cart-total" style="font-size: ;">Rp. <?php echo number_format($row['subtotal'], 0, '.', '.'); ?></span>
                            </div>
                            <div class="cart-table__col" style="text-align: center;">
                                <a href="<?= base_url('shop/deleteKeranjang/') . $row['rowid'] ?>" class="btn-sm btn-dark">Hapus</a>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <div style="text-align: center; margin-top:20px">
                    <button type="submit" class="btn"><i class="icon-cart"></i> Update Cart</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

        <div class="cart-bottom">
            <div class="cart-bottom__promo">
                <h6>How to get a promo code?</h6>
                <p>
                    Follow our news on the website, as well as subscribe to our social networks. So you will not only be able to receive up-to-date codes,
                    but also learn about new products and promotional items.
                </p>
                <div class="contacts-info__social">
                    <span>Find us here:</span>
                    <ul>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-insta"></i></a></li>
                        <li><a href="#"><i class="icon-in"></i></a></li>
                    </ul>
                </div>
            </div>
            <?= form_open('shop/checkout'); ?>
            <div class="cart-bottom__total">
                <!-- <?php $i = 1; ?> -->
                <?php
                $keranjang = $this->cart->contents();
                $id_cust = $this->session->userdata('id');
                $i = 1;
                foreach ($keranjang as $row) {
                ?>
                    <?php echo form_input(array(
                        'name' => $i . '[kuantiti]',
                        'value' => $row['qty'],
                        'type' => 'hidden',
                    )); ?>
                    <?php echo form_input(array(
                        'name' => $i . '[id_produk]',
                        'value' => $row['id'],
                        'type' => 'hidden',
                    )); ?>
                    <?php echo form_input(array(
                        'name' => $i . '[id_customer]',
                        'value' => $id_cust,
                        'type' => 'hidden',
                    )); ?>
                    <?php echo form_input(array(
                        'name' => $i . '[harga]',
                        'value' => $row['subtotal'],
                        'type' => 'hidden',
                    )); ?>
                    <div class="cart-bottom__total-goods">
                        <?= $row['name'] ?>
                        <span>Rp. <?= number_format($row['subtotal'], 0, '.', '.'); ?></span>
                    </div>
                <?php $i++;
                } ?>
                <div class="cart-bottom__total-num">
                    total:
                    <span>Rp. <?= $this->cart->format_number($this->cart->total()); ?></span>
                </div>
                <!-- <?php $i++ ?> -->
                <button type="submit" class="btn">Checkout</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <img class="promo-video__decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side-r.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">

    <img class="shop-decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
</div>
<!-- CART EOF   -->