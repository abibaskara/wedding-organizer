<!-- BEGIN DETAIL MAIN BLOCK -->
<div class="detail-block detail-block_margin" style="background-image: url(<?= base_url() . 'assets/assets-landing/image/banner/dekor2.jpg'  ?>); margin-top:145px">
    <div class="wrapper">
        <div class="detail-block__content">
            <h1>Checkout</h1>
            <ul class="bread-crumbs">
                <li class="bread-crumbs__item">
                    <a href="<?= base_url('/') ?>" class="bread-crumbs__link">Home</a>
                </li>
                <li class="bread-crumbs__item">
                    <a href="<?= base_url('shop') ?>" class="bread-crumbs__link">Shop</a>
                </li>
                <li class="bread-crumbs__item">Checkout</li>
            </ul>
        </div>
    </div>
</div>
<!-- DETAIL MAIN BLOCK EOF   -->
<!-- BEGIN CHECKOUT -->
<div class="checkout checkout-step3">
    <div class="wrapper">
        <div class="checkout-content">
            <div class="checkout-purchase checkout-form">
                <h4>
                    Eka Suhandi Makeup thanks<br>
                    you for your purchase!
                </h4>
                <p>Tim desainer bunga, perencana acara, produksi, dan penata gaya kami yang berpengalaman akan membantu mengubah ide pernikahan Anda menjadi kenyataan.</p>
                <ul class="checkout-purchase__list">
                    <li><span>Nama</span><?= $this->session->userdata('nama') ?></li>
                    <li><span>Order number</span>
                        <?php
                        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $charactersLength = strlen($characters);
                        $randomString = '';
                        $order_number = 'A00';
                        for ($i = 0; $i < 4; $i++) {
                            $randomString .= $characters[rand(0, $charactersLength - 1)];
                        }
                        $orderNumber = $order_number . $randomString;
                        echo $orderNumber;
                        ?>
                    </li>
                    <li><span>Order status</span>Awaiting payment</li>
                    <li><span>Pembelian</span>
                        <?php $tanggal = date('d/m/Y');
                        $date = date('Y-m-d');
                        echo $tanggal;
                        ?>
                    </li>
                    <li><span>Alamat</span><?= $this->session->userdata('alamat') ?></li>
                </ul>
            </div>
            <div class="checkout-info">
                <div class="checkout-order">
                    <h5>Your Order</h5>
                    <?php
                    foreach ($data_buy as $row) {
                        $barang = $this->ProdukModel->getGambar($row->id)->row();
                    ?>
                        <div class="checkout-order__item">
                            <a href="#" class="checkout-order__item-img">
                                <img data-src="<?= base_url() . 'assets/assets-admin/foto-produk/' . $barang->foto ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" class="js-img" alt="">
                            </a>
                            <div class="checkout-order__item-info">
                                <a class="title6" href="#"><?= $row->nama ?> <span>x1</span></a>
                                <span class="checkout-order__item-price">Rp. <?= number_format($row->harga, 0, '.', '.') ?></span>
                            </div>
                        </div>
                    <?php
                    } ?>
                </div>
                <?= form_open('shop/checkoutBuy'); ?>
                <div class="cart-bottom__total">
                    <?php
                    $id_cust = $this->session->userdata('id');
                    foreach ($data_buy as $row) {
                    ?>
                        <input type="hidden" name="id_produk" value="<?= $row->id ?>">
                        <input type="hidden" name="id_customer" value="<?= $id_cust ?>">
                        <input type="hidden" name="harga" value="<?= $row->harga ?>">
                        <input type="hidden" name="tgl_pembelian" value="<?= $date ?>">
                        <input type="hidden" name="order_number" value="<?= $orderNumber ?>">
                        <input type="hidden" name="total_harga" value="<?= $row->harga ?>">
                        <div class="cart-bottom__total-goods">
                            <?= $row->nama ?>
                            <span>Rp. <?= number_format($row->harga, 0, '.', '.') ?></span>
                        </div>

                        <div class="cart-bottom__total-num">
                            total:
                            <span>Rp. <?= number_format($row->harga, 0, '.', '.'); ?></span>
                        </div>
                        <button type="submit" class="btn">confirm order</button>
                    <?php } ?>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <img class="promo-video__decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side-r.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">

    <img class="shop-decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
</div>
<!-- CHECKOUT EOF   -->