<!-- BEGIN DETAIL MAIN BLOCK -->
<div class="detail-block detail-block_margin" style="background-image: url(<?= base_url() . 'assets/assets-landing/image/banner/dekor2.jpg'  ?>); margin-top:145px">
    <div class="wrapper">
        <div class="detail-block__content">
            <h1>My profile</h1>
            <ul class="bread-crumbs">
                <li class="bread-crumbs__item">
                    <a href="<?= base_url('/') ?>" class="bread-crumbs__link">Home</a>
                </li>
                <li class="bread-crumbs__item">My Orders</li>
            </ul>
        </div>
    </div>
</div>
<!-- DETAIL MAIN BLOCK EOF   -->
<!-- BEGIN PROFILE -->
<div class="profile">
    <div class="wrapper">
        <div class="profile-content">
            <div class="profile-main">
                <div class="tab-wrap">
                    <ul class="nav-tab-list tabs">
                        <li class="active">
                            <a href="#profile-tab_2">My orders</a>
                        </li>
                    </ul>
                    <div class="box-tab-cont"> -->
                        <div class="tab-cont" id="profile-tab_2">
                            <div class="profile-orders">
                                <div class="profile-orders__row profile-orders__row-head">
                                    <div class="profile-orders__col">date</div>
                                    <div class="profile-orders__col">Delivery address</div>
                                    <div class="profile-orders__col">amount</div>
                                    <div class="profile-orders__col">Status</div>
                                </div>
                                <?php
                                $id = $this->session->userdata('id');
                                $dataPembelian = $this->ShopModel->getOrder($id);
                                if (empty($dataPembelian)) { ?>
                                    <div class="profile-orders__item">
                                        <div style="text-align: center;">Data Kosong</div>
                                    </div>
                                    <?php } else {
                                    foreach ($dataPembelian as $row) {
                                        $idBeli = $row->id_detail;
                                        $getDetail = $this->ShopModel->joinDetail($id, $idBeli);
                                    ?>
                                        <div class="profile-orders__item">
                                            <div class="profile-orders__row">
                                                <div class="profile-orders__col"><span class="profile-orders__col-mob">date</span><span class="profile-orders__item-date"><?= date('M-d', strtotime($row->tgl_pembelian)) ?>,<br> <?= date('Y', strtotime($row->tgl_pembelian)) ?></span></div>
                                                <div class="profile-orders__col"><span class="profile-orders__col-mob">Delivery address</span><span class="profile-orders__item-addr"><?= $row->alamat ?><br></span></div>
                                                <div class="profile-orders__col"><span class="profile-orders__col-mob">amount</span><span class="profile-orders__item-price">Rp. <?= number_format($row->total_harga, 0, '.', '.') ?></span></div>
                                                <div class="profile-orders__col">
                                                    <span class="profile-orders__col-mob">Status</span>
                                                    <span class="profile-orders__col-onway">
                                                        <?php
                                                        if ($row->status == 1) {
                                                            echo 'Menunggu Pembayaran';
                                                        } elseif ($row->status == 2) {
                                                            echo 'Menunggu Pelunasan';
                                                        } elseif ($row->status == 3) {
                                                            echo 'Menunggu Konfirmasi';
                                                        } elseif ($row->status == 4) {
                                                            echo 'Dikerjakan';
                                                        } else {
                                                            echo 'Selesai';
                                                        }
                                                        ?>
                                                    </span>
                                                    <span class="profile-orders__col-btn"></span>
                                                </div>
                                            </div>
                                            <div class="profile-orders__content">
                                                <ul>
                                                    <?php foreach ($getDetail as $a) {
                                                    ?>
                                                        <li><?= $a->nama ?><span>Rp. <?= number_format($a->harga, 0, '.', '.') ?></span></li>
                                                    <?php } ?>

                                                    <?php
                                                    if ($row->status == 1) { ?>
                                                        <li>Confirmation Payment:
                                                            <a href="<?= base_url('myorder/pembayaran/') . $row->id_pembelian ?>" class="btn">Bayar Dp</a>
                                                            <a href="<?= base_url('myorder/cash/') . $row->id_pembelian ?>" class="btn">Bayar Cash</a>
                                                        </li>
                                                    <?php } elseif ($row->status == 2) { ?>
                                                        <li>Confirmation Payment:<a href="<?= base_url('myorder/pelunasan/') . $row->id_pembelian ?>" class="btn">Pelunasan Sekarang</a></li>
                                                    <?php } else { ?>
                                                        <li></li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
                                <?php }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="tab-cont hide" id="profile-tab_3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque tempore saepe blanditiis omnis. Reprehenderit officia atque facere tempora, neque quaerat et aliquid tempore mollitia, nemo, minima iste placeat cupiditate odio?
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <img class="promo-video__decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side-r.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">

    <img class="shop-decor js-img" data-src="<?= base_url() . 'assets/assets-landing/image/side/shop-decor-side.jpg' ?>" src="data:image/gif;base64,R0lGODlhAQABAAAAACw=" alt="">
</div>
<!-- PROFILE EOF   -->