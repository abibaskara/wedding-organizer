<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="header-title">Data User</h2>
                <div class="header-sub-title">
                    <?php if ($this->session->userdata('role') == 'Admin') { ?>
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="<?= base_url('admin') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                            <span class="breadcrumb-item active">Data User</span>
                        </nav>
                    <?php } else { ?>
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="<?= base_url('owner') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                            <span class="breadcrumb-item active">Data User</span>
                        </nav>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <?php if ($this->session->userdata('role') == 'Owner') { ?>
                    <div style="text-align:right;">
                        <button data-toggle="modal" data-target="#tambah-data" class="btn btn-info">Tambah Data</button>
                    </div>
                <?php } else { ?>
                <?php } ?>
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
                            <th>Nama User</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>No Telp</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_user as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->email ?></td>
                                <td><?php echo $row->gender ?></td>
                                <?php if (empty($row->no)) { ?>
                                    <td>Tidak ada no telp</td>
                                <?php } else { ?>
                                    <td><?php echo $row->no ?></td>
                                <?php } ?>
                                <td class="font-size-18">
                                    <?php if ($this->session->userdata('role') == 'Owner') { ?>
                                        <a data-toggle="modal" title="Edit Data" href="#edit-data<?php echo $row->id ?>" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                        <a data-toggle="modal" title="Detail Data" href="#detail-data<?php echo $row->id ?>" class="text-gray m-r-15"><i class="ti-eye"></i></a>
                                        <a data-toggle="modal" title="Delete Data" href="#delete-data<?php echo $row->id ?>" class="text-gray m-r-15"><i class="ti-trash"></i></a>
                                    <?php } else { ?>
                                        <a data-toggle="modal" title="Delete Data" href="#delete-data<?php echo $row->id ?>" class="text-gray m-r-15"><i class="ti-trash"></i></a>
                                    <?php } ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- TAMBAH DATA -->
    <div class="modal fade" id="tambah-data">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tambah User</h4>
                </div>
                <?php echo form_open_multipart('owner/add'); ?>
                <div class="modal-body">
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Nama User</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama User">
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Email User</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Email User">
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option>---Pilih Gender---</option>
                                <option value="L">L</option>
                                <option value="P">P</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">No Telp</label>
                            <input type="text" name="no" id="no" class="form-control" placeholder="No Telp">
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Role User</label>
                            <select name="role" id="role" class="form-control">
                                <option>---Pilih Role---</option>
                                <option value="Admin">Admin</option>
                                <option value="Customer">Customer</option>
                                <option value="Owner">Owner</option>
                            </select>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Status User</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option disabled>---Pilih Status---</option>
                                <option value="1">Akif</option>
                                <option value="2">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-border">
                    <div class="text-right">
                        <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- EDIT DATA -->
    <?php foreach ($data_user as $row) : ?>
        <div class="modal fade" id="edit-data<?= $row->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit Data User
                            <?= $row->nama ?>
                        </h4>
                    </div>
                    <?php echo form_open_multipart('owner/update'); ?>
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="form-group">
                                <label class="control-label">Nama User</label>
                                <input type="hidden" name="id" id="id" class="form-control" value="<?= $row->id ?>">
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama User" value="<?= $row->nama ?>">
                            </div>
                        </div>
                        <div class="p-h-10">
                            <div class="form-group">
                                <label class="control-label">Email User</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email User" value="<?= $row->email ?>">
                            </div>
                        </div>
                        <div class="p-h-10">
                            <div class="form-group">
                                <label class="control-label">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value=" <?= $row->gender ?>"><?= $row->gender ?></option>
                                    <option disabled>---Pilih Gender---</option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-h-10">
                            <div class="form-group">
                                <label class="control-label">No Telp</label>
                                <input type="text" name="no" id="no" class="form-control" placeholder="No Telp" value="<?= $row->no ?>">
                            </div>
                        </div>
                        <div class="p-h-10">
                            <div class="form-group">
                                <label class="control-label">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat"><?= $row->alamat ?></textarea>
                            </div>
                        </div>
                        <div class="p-h-10">
                            <div class="form-group">
                                <label class="control-label">Role User</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="<?= $row->role ?>"><?= $row->role ?></option>
                                    <option disabled>---Pilih Role---</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Customer">Customer</option>
                                    <option value="Owner">Owner</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-h-10">
                            <div class="form-group">
                                <label class="control-label">Status User</label>
                                <select name="is_active" id="is_active" class="form-control">
                                    <option value="<?= $row->is_active ?>">
                                        <?php if ($row->is_active == 1) { ?>
                                            Aktif
                                        <?php } else { ?>
                                            Tidak Aktif
                                        <?php } ?>
                                    </option>
                                    <option disabled>---Pilih Status---</option>
                                    <option value="1">Akif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-border">
                        <div class="text-right">
                            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- DETAIL DATA -->
    <?php foreach ($data_user as $row) : ?>
        <div class="modal fade" id="detail-data<?= $row->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Detail User <?= $row->nama ?>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="row">
                                <div class="col-6">
                                    <p>Nama User </p>
                                </div>
                                <div class="col-6">
                                    <p>: <?= $row->nama ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Email </p>
                                </div>
                                <div class="col-6">
                                    <p>: <?= $row->email ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Gender </p>
                                </div>
                                <div class="col-6">
                                    <p>: <?= $row->gender ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>No Telp </p>
                                </div>
                                <div class="col-6">
                                    <p>
                                        <?php
                                        if (empty($row->no)) { ?>
                                            : Tidak Ada No Telp
                                        <?php } else { ?>
                                            : <?= $row->no ?>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Role</p>
                                </div>
                                <div class="col-6">
                                    <p>: <?= $row->role ?></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p>Status</p>
                                </div>
                                <div class="col-6">
                                    <p>
                                        <?php
                                        if ($row->is_active == 1) { ?>
                                            : Aktif
                                        <?php } else { ?>
                                            : Tidak Aktif
                                        <?php } ?>
                                    </p>
                                </div>
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

    <!-- DELETE DATA -->
    <?php foreach ($data_user as $row) : ?>
        <div class="modal fade" id="delete-data<?php echo $row->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-center font-size-70">
                        <i class="mdi mdi-information-outline icon-gradient-warning"></i>
                    </div>
                    <?php if ($this->session->userdata('role') == 'Owner') { ?>
                        <form action="<?= base_url('owner/delete') ?>" method="POST">
                            <div class="modal-body">
                                <div class="p-h-10">
                                    <div class="form-group text-center">
                                        <label class="control-label">Anda Yakin Ingin Menghapus Data?</label>
                                        <input id="id" class="form-control" type="hidden" name="id" value="<?php echo $row->id ?>" />
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-danger">Yes, delete it!</button>
                                </div>
                            </div>
                        </form>
                    <?php } else { ?>
                        <form action="<?= base_url('user/delete') ?>" method="POST">
                            <div class="modal-body">
                                <div class="p-h-10">
                                    <div class="form-group text-center">
                                        <label class="control-label">Anda Yakin Ingin Menghapus Data?</label>
                                        <input id="id" class="form-control" type="hidden" name="id" value="<?php echo $row->id ?>" />
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                    <button class="btn btn-danger">Yes, delete it!</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>

                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>