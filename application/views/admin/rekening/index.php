<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="header-title">Data Rekening</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="<?= base_url('admin') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <!-- <a class="breadcrumb-item" href="#">Forms</a> -->
                        <span class="breadcrumb-item active">Rekening</span>
                    </nav>
                </div>
            </div>
            <div class="col-md-6" style="text-align: right;">
                <button data-toggle="modal" data-target="#tambah-data" class="btn btn-info">Tambah Data</button>
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
                            <th>Nama Bank</th>
                            <th>No Rekening</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_rekening as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->nama_bank ?></td>
                                <td><?php echo $row->no_rekening ?></td>
                                <td class="font-size-18">
                                    <a data-toggle="modal" title="Edit Data" href="#edit-data<?php echo $row->id ?>" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                    <a data-toggle="modal" title="Delete Data" href="#delete-data<?php echo $row->id ?>" class="text-gray m-r-15"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- TAMBAH DATA -->
    <div class="modal fade" id="tambah-data">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Tambah Rekening</h4>
                </div>
                <form action="<?= base_url('rekening/add') ?>" method="POST">
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="form-group">
                                <label class="control-label">Nama Bank</label>
                                <select name="nama_bank" id="nama_bank" class="form-control">
                                    <option>---Pilih Bank---</option>
                                    <option value="BNI">BNI</option>
                                    <option value="BCA">BCA</option>
                                    <option value="BRI">BRI</option>
                                    <option value="MANDIRI">MANDIRI</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label">No Rekening</label>
                                <input type="number" name="no_rekening" id="no_rekening" class="form-control" placeholder="No Rekening" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer no-border">
                        <div class="text-right">
                            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- EDIT DATA -->
    <?php foreach ($data_rekening as $row) : ?>
        <div class="modal fade" id="edit-data<?php echo $row->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit Rekening</h4>
                    </div>
                    <form action="<?= base_url('rekening/edit') ?>" method="POST">
                        <div class="modal-body">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Nama Bank</label>
                                    <select name="nama_bank" id="nama_bank" class="form-control">
                                        <option value="<?= $row->nama_bank ?>"><?= $row->nama_bank ?></option>
                                        <option disabled>---Pilih Bank---</option>
                                        <option value="BNI">BNI</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BRI">BRI</option>
                                        <option value="MANDIRI">MANDIRI</option>
                                    </select>
                                    <input type="hidden" name="id" id="id" class="form-control" value="<?= $row->id ?>">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">No Rekening</label>
                                    <input type="number" value="<?= $row->no_rekening ?>" name="no_rekening" id="no_rekening" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer no-border">
                            <div class="text-right">
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>

    <!-- DELETE DATA -->
    <?php foreach ($data_rekening as $row) : ?>
        <div class="modal fade" id="delete-data<?php echo $row->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-center font-size-70">
                        <i class="mdi mdi-information-outline icon-gradient-warning"></i>
                    </div>
                    <form action="<?= base_url('rekening/delete') ?>" method="POST">
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
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>