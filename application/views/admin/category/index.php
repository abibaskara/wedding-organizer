<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="header-title">Data Category</h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="<?= base_url('admin') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <!-- <a class="breadcrumb-item" href="#">Forms</a> -->
                        <span class="breadcrumb-item active">Category</span>
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
                            <th>Nama Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_category as $row) : ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->category_name ?></td>
                                <td class="font-size-18">
                                    <a data-toggle="modal" title="Edit Data" href="#edit-data<?php echo $row->id_category ?>" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                    <a data-toggle="modal" title="Delete Data" href="#delete-data<?php echo $row->id_category ?>" class="text-gray m-r-15"><i class="ti-trash"></i></a>
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
                    <h4>Tambah Category</h4>
                </div>
                <form action="<?= base_url('category/add') ?>" method="POST">
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="form-group">
                                <label class="control-label">Nama Category</label>
                                <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Nama Category" required>
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
    <?php foreach ($data_category as $row) : ?>
        <div class="modal fade" id="edit-data<?php echo $row->id_category ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit Category</h4>
                    </div>
                    <form action="<?= base_url('category/edit') ?>" method="POST">
                        <div class="modal-body">
                            <div class="p-h-10">
                                <div class="form-group">
                                    <label class="control-label">Nama Category</label>
                                    <input type="hidden" name="id_category" id="id_category" class="form-control" value="<?php echo $row->id_category ?>">
                                    <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Nama Category" value="<?php echo $row->category_name ?>" required>
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
    <?php foreach ($data_category as $row) : ?>
        <div class="modal fade" id="delete-data<?php echo $row->id_category ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- <div class="modal-header">
                        <h4>Edit Category</h4>
                    </div> -->
                    <div class="text-center font-size-70">
                        <i class="mdi mdi-information-outline icon-gradient-warning"></i>
                    </div>
                    <form action="<?= base_url('category/delete') ?>" method="POST">
                        <div class="modal-body">
                            <div class="p-h-10">
                                <div class="form-group text-center">
                                    <label class="control-label">Anda Yakin Ingin Menghapus Data?</label>
                                    <input id="id_category" class="form-control" type="hidden" name="id_category" value="<?php echo $row->id_category ?>" />
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