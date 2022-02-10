<div class="container-fluid">
    <div class="page-header">
        <h2 class="header-title">Profile Setting</h2>
        <div class="header-sub-title">
            <?php if ($this->session->userdata('role') == 'Owner') { ?>
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="<?= base_url('owner') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                    <span class="breadcrumb-item active">Account Setting</span>
                </nav>
            <?php } else { ?>
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="<?= base_url('admin') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                    <span class="breadcrumb-item active">Account Setting</span>
                </nav>
            <?php } ?>
        </div>
    </div>
    <?php
    $message = $this->session->flashdata('error');
    if ($message) {
        echo '<div class="alert alert-danger-gradient">
                <div class="d-flex align-items-center justify-content-start">
                    <span class="alert-icon">
                        <i class="mdi mdi-close-circle-outline"></i>
                    </span>
                    <span><strong>Error! </strong>' . $message . '</span>
                </div>
            </div></p>';
    } ?>
    <?php
    $message = $this->session->flashdata('success');
    if ($message) {
        echo '<div class="alert alert-success-gradient">
                <div class="d-flex align-items-center justify-content-start">
                    <span class="alert-icon">
                        <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                    <span><strong>Well done! </strong> ' . $message . '</span>
                </div>
            </div>';
    } ?>
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">Detail Profile</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">Email:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext"><?= $this->session->userdata('email'); ?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">Nama:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext"><?= $this->session->userdata('nama'); ?></p>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">Gender:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext"><?php if ($this->session->userdata('gender') == 'L') {
                                                                    echo 'Laki-Laki';
                                                                } else {
                                                                    echo 'Perempuan';
                                                                }
                                                                ?></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label control-label text-dark">Role:</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext"><?= $this->session->userdata('role'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="text-sm-right">
                    <?php if ($this->session->userdata('role') == 'Owner') { ?>
                        <a href="<?= base_url('owner') ?>" class="btn btn-default">Back</a>
                        <a href="<?= base_url('owner/editProfile') ?>" class="btn btn-gradient-success">Edit</a>
                    <?php } else { ?>
                        <a href="<?= base_url('admin') ?>" class="btn btn-default">Back</a>
                        <a href="<?= base_url('profile/edit') ?>" class="btn btn-gradient-success">Edit</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>