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
            <h4 class="card-title">Profile</h4>
        </div>
        <div class="card-body">
            <?php if ($this->session->userdata('role') == 'Owner') { ?>
                <form action="<?php base_url() ?>updateProfile" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $this->session->userdata('id'); ?>">
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $this->session->userdata('email'); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $this->session->userdata('nama'); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="<?= $this->session->userdata('gender'); ?>">
                                    <!-- Value Gender -->
                                    <?php if ($this->session->userdata('gender') == 'L') {
                                        echo 'Laki-Laki';
                                    } else {
                                        echo 'Perempuan';
                                    }
                                    ?>
                                </option>
                                <option value="">---Pilih Gender---</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="<?= $this->session->userdata('role'); ?>">
                                    <!-- Value Gender -->
                                    <?= $this->session->userdata('role'); ?>
                                </option>
                                <option value="">---Pilih Role---</option>
                                <option value="Admin">Admin</option>
                                <option value="Owner">Owner</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-sm-right">
                            <a href="<?= base_url('profile') ?>" class="btn btn-default">Back</a>
                            <button class="btn btn-gradient-success">Simpan</button>
                        </div>
                    </div>
                </form>
            <?php } else { ?>
                <form method="POST" action="<?= base_url('profile/update') ?>">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $this->session->userdata('id'); ?>">
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $this->session->userdata('email'); ?>" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" value="<?= $this->session->userdata('nama'); ?>" placeholder="Nama">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="<?= $this->session->userdata('gender'); ?>">
                                    <!-- Value Gender -->
                                    <?php if ($this->session->userdata('gender') == 'L') {
                                        echo 'Laki-Laki';
                                    } else {
                                        echo 'Perempuan';
                                    }
                                    ?>
                                </option>
                                <option value="">---Pilih Gender---</option>
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="<?= $this->session->userdata('role'); ?>">
                                    <?= $this->session->userdata('role'); ?>
                                </option>
                                <option value="">---Pilih Role---</option>
                                <option value="Admin">Admin</option>
                                <option value="Owner">Owner</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-sm-right">
                            <a href="<?= base_url('profile') ?>" class="btn btn-default">Back</a>
                            <button class="btn btn-gradient-success">Simpan</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</div>