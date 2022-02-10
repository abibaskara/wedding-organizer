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
<div class="checkout checkout-step2">
    <div class="wrapper">
        <div class="checkout-content">
            <div class="checkout-payment checkout-form">
                <h4>Bayar Sekarang</h4>
                <?php foreach ($data_rekening as $row) { ?>
                    <div class="checkout-payment__item">
                        <div class="checkout-payment__item-head">
                            <label class="radio-box"><?= $row->nama_bank ?>
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                                <span class="radio-box__info">
                                    <i class="icon-info"></i>
                                    <span class="radio-box__info-content">
                                        Kirim bukti transfer disini.
                                    </span>
                                </span>
                            </label>
                        </div>
                        <?php echo form_open_multipart('myorder/bayarCash'); ?>
                        <div class="checkout-payment__item-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <span>
                                        No Rekening
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <span>
                                        : <?= $row->no_rekening ?>
                                    </span>
                                    <input type="hidden" class="form-control" name="rekening_lunas" value="<?= $row->nama_bank ?>">
                                </div>
                            </div>
                            <div class="box-field" style="margin-top: 10px;">
                                <span>Input Bayar</span>
                                <?php foreach ($pembelian as $r) {
                                ?>
                                    <input type="hidden" class="form-control" name="id_pembelian" value="<?= $r->id_pembelian ?>">
                                    <input type="hidden" class="form-control" name="id_customer" value="<?= $r->id_customer ?>">
                                    <input type="number" name="bayar" class="form-control" min="<?= $r->total_harga ?>" required>
                                <?php } ?>
                            </div>
                            <div class="box-field" style="margin-top: 10px;">
                                <span>Bukti Transfer</span>
                            </div>
                            <div class="box-field" style="margin-top: 20px;">
                                <input type="file" name="userfile" size="20" class="form-controls" required />
                            </div>
                            <div class="checkout-buttons">
                                <a href="<?= base_url('myorder') ?>" class="btn btn-grey btn-icon"> <i class="icon-arrow"></i> back</a>
                                <button type="submit" class="btn btn-icon btn-next">Simpan <i class="icon-arrow"></i></button>
                            </div>
                        </div>
                        </form>
                    </div>
                <?php } ?>
            </div>

            <div class="checkout-info">
                <?php foreach ($pembelian as $row) { ?>
                    <div class="cart-bottom__total">
                        <div class="cart-bottom__total-goods">
                            Order Number
                            <span><?= $row->order_number ?></span>
                        </div>
                        <div class="cart-bottom__total-goods">
                            Tanggal Pembelian
                            <span><?= date('d-m-Y', strtotime($row->tgl_pembelian)) ?></span>
                        </div>
                        <div class="cart-bottom__total-goods">
                            Total Harga Pembelian
                            <span>Rp. <?= number_format($row->total_harga, 0, '.', '.') ?></span>
                        </div>
                        <div class="cart-bottom__total-num">
                            Yang harus dibayar:
                            <span>
                                Rp. <?= number_format($row->total_harga, 0, '.', '.');
                                    ?>
                            </span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <img class="promo-video__decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side-r.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">

    <img class="shop-decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
</div>
<!-- CHECKOUT EOF   -->