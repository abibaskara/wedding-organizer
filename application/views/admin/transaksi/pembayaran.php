<div class="container-fluid">
    <div class="page-header">
        <h2 class="header-title">Data Status Pembayaran</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="<?= base_url('admin') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                <!-- <a class="breadcrumb-item" href="#">Forms</a> -->
                <span class="breadcrumb-item active">Data Status Pembayaran</span>
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
                        <th>Bukti Dp</th>
                        <th>Bukti Pelunasan</th>
                        <th>Nama Customer</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data_pembayaran as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?php
                                if (empty($row->foto_dp)) { ?>
                                    None
                                <?php } else {
                                ?>
                                    <a title="Lihat Detail" href="#View<?= $row->foto_dp ?>" data-toggle="modal"> <img src="<?= base_url() . 'assets/assets-landing/foto/' . $row->foto_dp; ?>" width="40px" height="40"></a>
                                <?php } ?>
                            </td>
                            <td>
                                <?php
                                if (empty($row->foto_lunas)) { ?>
                                    None
                                <?php } else {
                                ?>
                                    <a title="Lihat Detail" href="#View<?= $row->foto_lunas ?>" data-toggle="modal"> <img src="<?= base_url() . 'assets/assets-landing/foto/' . $row->foto_lunas; ?>" width="40px" height="40"></a>
                                <?php } ?>
                            </td>
                            <td><?= $row->nama ?></td>
                            <td>Rp. <?= number_format($row->bayar, 0, ",", ".") ?></td>
                            <td>
                                <?php if ($row->status_pembayaran == 1) { ?>
                                    <span class="badge badge-danger">Belum Lunas</span>
                                <?php } else { ?>
                                    <span class="badge badge-info">Lunas</span>
                                <?php } ?>
                            </td>
                            <td class="font-size-18">
                                <a data-toggle="modal" title="Detail Data" href="#detail-data<?= $row->id_pembayaran ?>" class="text-gray m-r-15"><i class="ti-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->

<!-- IMAGE VIEW DETAIL DP -->
<?php foreach ($data_pembayaran as $row) : ?>
    <div class="modal fade" id="View<?php echo $row->foto_dp ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Gambar Dp</h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <img src="<?php echo base_url() . 'assets/assets-landing/foto/' . $row->foto_dp; ?>" width="400px">
                </div>
                <div class="modal-footer no-border">
                    <div class="text-right">
                        <button class="btn btn-success" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- IMAGE VIEW DETAIL PELUNASAN-->
<?php foreach ($data_pembayaran as $row) : ?>
    <div class="modal fade" id="View<?php echo $row->foto_lunas ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Gambar Dp</h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <img src="<?php echo base_url() . 'assets/assets-landing/foto/' . $row->foto_lunas; ?>" width="400px">
                </div>
                <div class="modal-footer no-border">
                    <div class="text-right">
                        <button class="btn btn-success" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- DETAIL DATA -->
<?php foreach ($data_pembayaran as $row) : ?>
    <div class="modal fade" id="detail-data<?php echo $row->id_pembayaran ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Pembayaran
                    </h4>
                </div>
                <!-- <?php echo form_open_multipart('produk/edit'); ?> -->
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
                                <p>Tgl Pembayaran Dp </p>
                            </div>
                            <div class="col-6">
                                <p>
                                    <?php
                                    if (empty($row->tgl_pembayaran_dp)) { ?>
                                        : None
                                    <?php } else { ?>
                                        : <?= $row->tgl_pembayaran_dp ?>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Tgl Pembayaran Lunas </p>
                            </div>
                            <div class="col-6">
                                <p>
                                    <?php
                                    if (empty($row->tgl_pembayaran_lunas)) { ?>
                                        : None
                                    <?php } else { ?>
                                        : <?= $row->tgl_pembayaran_lunas ?>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Bank Transfer Dp</p>
                            </div>
                            <div class="col-6">
                                <p>
                                    <?php
                                    if (empty($row->rekening_dp)) { ?>
                                        : None
                                    <?php } else { ?>
                                        : <?= $row->rekening_dp ?>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Bank Transfer Lunas</p>
                            </div>
                            <div class="col-6">
                                <p>
                                    <?php
                                    if (empty($row->rekening_lunas)) { ?>
                                        : None
                                    <?php } else { ?>
                                        : <?= $row->rekening_lunas ?>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                        <?php
                        if ($row->status_pembayaran == 1) { ?>
                            <div class="row">
                                <div class="col-6">
                                    <p>Baru yang dibayarkan </p>
                                </div>
                                <div class="col-6">
                                    <p>
                                        : Rp. <?= number_format($row->bayar, 0, '.', '.')  ?>
                                    </p>
                                </div>
                            </div>
                        <?php } else { ?>
                        <?php } ?>
                        <div class="row">
                            <div class="col-6">
                                <p>Total Harga </p>
                            </div>
                            <div class="col-6">
                                <p>: Rp. <?= number_format($row->total_harga, 0, '.', '.') ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p>Status </p>
                            </div>
                            <div class="col-6">
                                <?php if ($row->status_pembayaran == 1) { ?>
                                    : <span class="badge badge-warning">Belum Lunas</span>
                                <?php } else { ?>
                                    : <span class="badge badge-info">Lunas</span>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">

                            <?php if ($row->status_pembayaran == 2) { ?>
                            <?php } else { ?>
                                <div class="col-6">
                                    <p>Bukti Dp: </p>
                                    <img src="<?= base_url() . 'assets/assets-landing/foto/' . $row->foto_dp; ?>" width="75px" height="75px">
                                </div>
                            <?php } ?>
                            <?php if ($row->status_pembayaran == 1) { ?>
                            <?php } else { ?>
                                <div class="col-6">
                                    <p>Bukti Lunas: </p>
                                    <img src="<?= base_url() . 'assets/assets-landing/foto/' . $row->foto_lunas; ?>" width="75px" height="75px">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-border">
                    <div class="text-right">
                        <button class="btn btn-primary" data-dismiss="modal">Kembali</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>
</div>