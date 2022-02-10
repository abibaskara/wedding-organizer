<div class="container-fluid">
    <div class="page-header">
        <h2 class="header-title">Data Order</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="<?= base_url('admin') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                <!-- <a class="breadcrumb-item" href="#">Forms</a> -->
                <span class="breadcrumb-item active">Data Order</span>
            </nav>
        </div>
    </div>
</div>
<?php
$message = $this->session->flashdata('error');
if ($message) {
    echo '
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="mdi mdi-close-circle-outline"></i>
            <strong>Error!</strong> ' . $message . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
} ?>
<?php
$message = $this->session->flashdata('success');
if ($message) {
    echo '
        <div class="alert alert-info alert-dismissible fade show">
            <i class="mdi mdi-check-circle-outline"></i>
            <strong>Success!</strong> ' . $message . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
} ?>
<?php
$message = $this->session->flashdata('warning');
if ($message) {
    echo '
        <div class="alert alert-warning alert-dismissible fade show">
            <i class="mdi mdi-check-circle-outline"></i>
            <strong>Success!</strong> ' . $message . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
} ?>
<div class="card">
    <div class="card-body">
        <div class="table-overflow">
            <table id="dt-opt" class="table table-hover table-xl">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Customer</th>
                        <th>Order Number</th>
                        <th>Tanggal Pembelian</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data_order as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row->nama ?></td>
                            <td><?= $row->order_number ?></td>
                            <td><?= date('d-m-Y', strtotime($row->tgl_pembelian)) ?></td>
                            <td>Rp. <?= number_format($row->total_harga, 0, ",", ".") ?></td>
                            <td>
                                <?php if ($row->status == 1) { ?>
                                    <span class="badge badge-danger">Menunggu Pembayaran</span>
                                <?php } elseif ($row->status == 2) { ?>
                                    <span class="badge badge-danger">Menunggu Pelunasan</span>
                                <?php } elseif ($row->status == 3) { ?>
                                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                <?php } elseif ($row->status == 4) { ?>
                                    <span class="badge badge-info">Dikerjakan</span>
                                <?php } else { ?>
                                    <span class="badge badge-success">Selesai</span>
                                <?php } ?>
                            </td>
                            <td class="font-size-18">
                                <a data-toggle="modal" title="Edit Data" href="#edit-data<?= $row->id_pembelian ?>" class="text-gray m-r-15"><i class="ti-eye"></i></a>
                                <!-- <a data-toggle="modal" title="Delete Data" href="#delete-data<?= $row->id_pembelian ?>" class="text-gray m-r-15"><i class="ti-trash"></i></a> -->
                                <!-- <a data-toggle="modal" title="Detail Data" href="#detail-data<?= $row->id_pembelian ?>" class="text-gray m-r-15"><i class="ti-eye"></i></a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->

<!-- EDIT DATA -->
<?php foreach ($data_order as $row) : ?>
    <div class="modal fade" id="edit-data<?php echo $row->id_pembelian ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Order
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="p-h-10">
                        <div class="row">
                            <div class="col-6">
                                <p>Nama Customer </p>
                            </div>
                            <div class="col-6">
                                <p>: <?= $row->nama ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Order Number </p>
                            </div>
                            <div class="col-6">
                                <p>: <?= $row->order_number ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Status </p>
                            </div>
                            <div class="col-6">
                                <p>:
                                    <?php if ($row->status == 1) { ?>
                                        <span class="badge badge-danger">Menunggu Pembayaran</span>
                                    <?php } elseif ($row->status == 2) { ?>
                                        <span class="badge badge-danger">Menunggu Pelunasan</span>
                                    <?php } elseif ($row->status == 3) { ?>
                                        <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                    <?php } elseif ($row->status == 4) { ?>
                                        <span class="badge badge-info">Dikerjakan</span>
                                    <?php } else { ?>
                                        <span class="badge badge-success">Selesai</span>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-overflow">
                    <table id="dt-opt" class="table table-hover table-xl">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama Produk</th>
                                <th>Kuantiti</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $id = $row->id_detail;
                            $getDetail = $this->TransaksiModel->joinDetail($id);
                            foreach ($getDetail as $detail) {
                                $gambar = $this->ProdukModel->getGambar($detail->id_gambar)->row();
                            ?>
                                <tr>
                                    <td><img src="<?= base_url() . 'assets/assets-admin/foto-produk/' . $gambar->foto; ?>" width="40px" height="40"></td>
                                    <td><?= $detail->nama ?></td>
                                    <td style="text-align: center;"><?= $detail->kuantiti ?></td>
                                    <td>Rp. <?= number_format($detail->harga, 0, ",", ".") ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer no-border">
                    <div class="text-right">
                        <?= form_open('transaksi/transaksiStatus') ?>
                        <?php if ($row->status == 1) { ?>
                        <?php } elseif ($row->status == 2) { ?>
                            <button class="btn btn-primary" data-dismiss="modal">Kembali</button>
                        <?php } elseif ($row->status == 3) { ?>
                            <input type="hidden" name="id_pembelian" class="form-control" value="<?= $row->id_pembelian ?>">
                            <button class="btn btn-success" type="submit">Kerjakan</button>
                            <button class="btn btn-primary" data-dismiss="modal">Kembali</button>
                        <?php } elseif ($row->status == 4) { ?>
                            <input type="hidden" name="id_pembelian2" class="form-control" value="<?= $row->id_pembelian ?>">
                            <button class="btn btn-success" type="submit">Selesai</button>
                            <button class="btn btn-primary" data-dismiss="modal">Kembali</button>
                        <?php } else { ?>
                            <button class="btn btn-primary" data-dismiss="modal">Kembali</button>
                        <?php } ?>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>


<!-- DELETE DATA -->
<!-- <?php foreach ($data_produk as $row) : ?>
        <div class="modal fade" id="delete-data<?php echo $row->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-center font-size-70">
                        <i class="mdi mdi-information-outline icon-gradient-warning"></i>
                    </div>
                    <form action="<?= base_url('produk/delete') ?>" method="POST">
                        <div class="modal-body">
                            <div class="p-h-10">
                                <div class="form-group text-center">
                                    <label class="control-label">Anda Yakin Ingin Menghapus Data?</label>
                                    <input id="id" class="form-control" type="hidden" name="id" value="<?php echo $row->id ?>" />
                                    <input class="form-control" type="hidden" name="userfile" value="<?php echo $row->foto ?>" />
                                    <input type="hidden" name="id_category" id="id_category" value="<?php echo $kategori ?>">
                                </div>
                            </div>
                            <div style="text-align: center;">
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-danger">Yes, delete it!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?> -->

<!-- DETAIL -->
<!-- <?php foreach ($data_pembayaran as $row) : ?>
    <div class="modal fade" id="detail-data<?= $row->id_pembayaran ?>">
        <div class="modal-dialog detail-data" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Produk</h4>
                </div>
                <div class="modal-body">
                    <div class="p-15 m-v-40">
                        <div class="row ">
                            <div class="col-md-6">
                                <img src="<?= base_url() . 'assets/assets-admin/foto-produk/' . $row->foto; ?>" width="200px">
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-semibold m-t-25"><?= $row->nama ?></h2>
                                <p class="lead">Rp. <?= number_format($row->bayar, 0, ",", ".") ?></p>
                                <p class="m-b-25"><?= $row->description ?></p>
                                <label class="control-label"><?= $row->nama ?></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-border">
                    <div class="text-right">
                        <button class="btn btn-gradient-success" data-dismiss="modal"><i class="mdi mdi-cart-outline m-r-5"></i>Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?> -->
</div>