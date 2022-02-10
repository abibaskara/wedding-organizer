<div class="container-fluid container-fixed-sm">
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
    <div class="container-fluid">
        <div class="page-header">
            <h2 class="header-title">Dashboard</h2>
            <div class="header-sub-title">
                <?php if ($this->session->userdata('role') == 'Owner') { ?>
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="<?= base_url('owner') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                    </nav>
                <?php } else { ?>
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="<?= base_url('admin') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                    </nav>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body ">
                    <div class="media">
                        <div class="align-self-center">
                            <i class="ti-wallet font-size-40 icon-gradient-success text-success"></i>
                        </div>
                        <div class="m-l-20">
                            <p class="m-b-0">Menunggu Konfirmasi</p>
                            <h2 class="font-weight-light m-b-0"><?php foreach ($menunggu_konfirmasi as $row) { ?>
                                    <?php if ($row->total_produk == 0) { ?>
                                        0
                                    <?php } else { ?>
                                        <?= $row->total_produk ?>
                                    <?php } ?>
                                <?php } ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="align-self-center">
                            <i class="ti-receipt font-size-40 icon-gradient-info text-info"></i>
                        </div>
                        <div class="m-l-20">
                            <p class="m-b-0">Dikerjakan</p>
                            <h2 class="font-weight-light m-b-0"><?php foreach ($dikerjakan as $row) { ?>
                                    <?php if ($row->total_produk == 0) { ?>
                                        0
                                    <?php } else { ?>
                                        <?= $row->total_produk ?>
                                    <?php } ?>
                                <?php } ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <div class="align-self-center">
                            <i class="ti-bar-chart font-size-40 icon-gradient-primary text-primary"></i>
                        </div>
                        <div class="m-l-20">
                            <p class="m-b-0">Selesai</p>
                            <h2 class="font-weight-light m-b-0"><?php foreach ($selesai as $row) { ?>
                                    <?php if ($row->total_produk == 0) { ?>
                                        0
                                    <?php } else { ?>
                                        <?= $row->total_produk ?>
                                    <?php } ?>
                                <?php } ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>