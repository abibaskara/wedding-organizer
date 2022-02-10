<div class="container-fluid">
    <div class="page-header">
        <h2 class="header-title">Account Setting</h2>
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
            <h4 class="card-title">Account</h4>
        </div>
        <div class="card-body">
            <?php if ($this->session->userdata('role') == 'Owner') { ?>
                <form method="POST" action="<?= base_url('owner/updateSetting') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $this->session->userdata('id'); ?>">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Re-type Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re-type Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-sm-right">
                            <a href="<?= base_url('admin') ?>" class="btn btn-default">Back</a>
                            <button class="btn btn-gradient-success">Simpan</button>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <form method="POST" action="<?= base_url('setting/update') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">New Password</label>
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $this->session->userdata('id'); ?>">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="New Password">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Re-type Password</label>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Re-type Password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-sm-right">
                            <a href="<?= base_url('admin') ?>" class="btn btn-default">Back</a>
                            <button class="btn btn-gradient-success">Simpan</button>
                        </div>
                    </div>
                </form>
            <?php } ?>

        </div>
    </div>
</div>