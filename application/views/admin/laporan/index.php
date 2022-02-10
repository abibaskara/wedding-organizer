<div class="container-fluid">
    <div class="page-header">
        <h2 class="header-title">Laporan Transaksi</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="<?= base_url('admin') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                <!-- <a class="breadcrumb-item" href="#">Forms</a> -->
                <span class="breadcrumb-item active">Laporan Transaksi</span>
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
                        <th>Nama Produk</th>
                        <th>Total Terjual</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $jumlah = count($get_laporan);
                    ?>
                    <?php $no = 1;
                    $total = $this->TransaksiModel->getTotal();
                    foreach ($total as $a) {
                        $array[] = $a->total_produk;
                    }
                    foreach ($produk as $b) {
                        $data[] = $b->nama;
                    }
                    for ($x = 0; $x <= $jumlah - 1; $x++) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>
                                <?= $data[$x] ?>
                            </td>
                            <td>
                                <?= $array[$x] ?>
                            </td>
                        </tr>
                    <?php } ?>
                <tfoot>
                    <tr>
                        <th></th>
                        <th style="text-align: right;">Total Penjualan</th>
                        <th>
                            <?php foreach ($jumlah_laporan as $c) { ?>
                                <?= $c->total_jumlah ?>
                            <?php } ?>
                        </th>
                    </tr>
                </tfoot>

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>