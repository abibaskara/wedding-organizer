<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-md-6">
                <h2 class="header-title">Data Produk
                    <?php foreach ($title as $row) : ?>
                        <?php echo $row->category_name ?>
                    <?php endforeach ?></h2>
                <div class="header-sub-title">
                    <nav class="breadcrumb breadcrumb-dash">
                        <a href="<?= base_url('admin') ?>" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                        <!-- <a class="breadcrumb-item" href="#">Forms</a> -->
                        <span class="breadcrumb-item active">Produk</span>
                    </nav>
                </div>
            </div>
            <div class="col-md-6">
                <div style="text-align:right;">
                    <button data-toggle="modal" data-target="#tambah-data" class="btn btn-info">Tambah Data</button>
                </div>
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
                            <th>Foto</th>
                            <th>Nama Catering</th>
                            <th>Category</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_produk as $row) {
                            $gambar = $this->ProdukModel->getGambar($row->id_gambar)->row();
                        ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><a title="Lihat Detail" href="#View<?php echo $row->id_gambar ?>" data-toggle="modal"> <img src="<?php echo base_url() . 'assets/assets-admin/foto-produk/' . $gambar->foto; ?>" width="40px" height="40"></a></td>
                                <td><?php echo $row->nama ?></td>
                                <td><?php echo $row->category_name ?></td>
                                <td>Rp. <?php echo number_format($row->harga, 0, ".", ".") ?></td>
                                <td class="font-size-18">
                                    <a data-toggle="modal" title="Edit Data" href="#edit-data<?php echo $row->id ?>" class="text-gray m-r-15"><i class="ti-pencil"></i></a>
                                    <a data-toggle="modal" title="Delete Data" href="#delete-data<?php echo $row->id ?>" class="text-gray m-r-15"><i class="ti-trash"></i></a>
                                    <a data-toggle="modal" title="Detail Data" href="#detail-data<?php echo $row->id ?>" class="text-gray m-r-15"><i class="ti-eye"></i></a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<!-- TAMBAH DATA -->
<div class="modal fade" id="tambah-data">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Tambah
                    <?php foreach ($title as $row) : ?>
                        <?php echo $row->category_name ?>
                    <?php endforeach ?>
                </h4>
            </div>
            <form action="<?= base_url('produk/add') ?>" enctype="multipart/form-data" method="POST" id="SimpanData">

                <div class="modal-body">
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Nama Produk</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Produk" required>
                            <input type="hidden" name="id_category" id="id_category" value="<?php echo $kategori ?>">
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description" required></textarea>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" required>
                            </div>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Foto</label>
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <input type="file" name="filefoto<?php echo $i; ?>" size="20" class="form-control" /><br />
                            <?php endfor; ?>
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

<!-- IMAGE VIEW -->
<?php foreach ($data_produk as $row) {
    $gambar = $this->ProdukModel->getGambar($row->id_gambar)->result();
?>
    <div class="modal fade" id="View<?php echo $row->id_gambar ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Gambar
                        <?php foreach ($title as $data) { ?>
                            <?php echo $data->category_name ?>
                        <?php } ?>
                    </h4>
                </div>
                <div class="modal-body" style="text-align: center;">
                    <?php foreach ($gambar as $a) { ?>
                        <?= $a->id ?>
                        <img src="<?php echo base_url() . 'assets/assets-admin/foto-produk/' . $a->foto; ?>" width="300px">
                        <a data-toggle="modal" title="Edit Foto" href="#edit-foto<?= $a->id ?>" class="text-gray m-r-15" style="float: right;"><span class="badge badge-primary"><i class="ti-pencil"></i>Edit Gambar</span></a>
                        <hr>
                    <?php } ?>

                </div>
                <div class="modal-footer no-border">
                    <div class="text-right">
                        <button class="btn btn-success" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- EDIT FOTO -->
<?php foreach ($data_produk as $row) {
    foreach ($data_foto as $a) { ?>
        <div class="modal fade" id="edit-foto<?php echo $a->id ?>">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Edit Foto</h4>
                    </div>
                    <?php echo form_open_multipart('produk/editFoto'); ?>
                    <div class="modal-body">
                        <div class="p-h-10">
                            <div class="form-group">
                                <input type="hidden" name="id_category" id="id_category" value="<?php echo $kategori ?>">
                                <label class="control-label">Foto</label>

                                <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $a->id ?>">
                                <input type="file" name="filefoto" size="20" class="form-control">

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
<?php }
} ?>


<!-- EDIT DATA -->
<?php foreach ($data_produk as $row) {
    $gambar = $this->ProdukModel->getGambar($row->id_gambar)->result();
?>
    <div class="modal fade" id="edit-data<?php echo $row->id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Edit Catering
                        <?php foreach ($title as $data) { ?>
                            <?php echo $data->category_name ?>
                        <?php } ?>
                    </h4>
                </div>
                <?php echo form_open_multipart('produk/edit'); ?>
                <div class="modal-body">
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Nama Produk</label>
                            <input type="hidden" name="id_category" id="id_category" value="<?php echo $kategori ?>">
                            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $row->id ?>">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Produk" value="<?php echo $row->nama ?>">
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Description</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Description"><?php echo $row->description ?></textarea>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <div class="form-group">
                            <label class="control-label">Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="number" name="harga" id="harga" class="form-control" placeholder="Harga" value="<?php echo $row->harga ?>">
                            </div>
                        </div>
                    </div>
                    <div class="p-h-10">
                        <?php foreach ($gambar as $a) { ?>
                            <img src="<?php echo base_url() . 'assets/assets-admin/foto-produk/' . $a->foto; ?>" width="100px" height="100">
                        <?php } ?>
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
<?php } ?>

<!-- DELETE DATA -->
<?php foreach ($data_produk as $row) {
    $gambar = $this->ProdukModel->getGambar($row->id_gambar)->result();
?>
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
                                <?php foreach ($gambar as $a) { ?>
                                    <input id="id_produk" class="form-control" type="hidden" name="id_produk" value="<?php echo $a->id_produk ?>" />
                                    <input id="foto" class="form-control" type="hidden" name="foto" value="<?php echo $a->foto ?>" />
                                <?php } ?>
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
<?php } ?>

<!-- DETAIL -->
<?php foreach ($data_produk as $row) {
    $gambar1 = $this->ProdukModel->getGambar($row->id_gambar)->row();
    $gambar = $this->ProdukModel->getGambar($row->id_gambar)->result();
?>
    <div class="modal fade" id="detail-data<?php echo $row->id ?>">
        <div class="modal-dialog detail-data" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Detail Produk
                        <?php foreach ($title as $data) { ?>
                            <?php echo $data->category_name ?>
                        <?php } ?>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="p-15 m-v-40">
                        <div class="row ">
                            <div class="col-md-6">
                                <img src="<?php echo base_url() . 'assets/assets-admin/foto-produk/' . $gambar1->foto; ?>" width="200px" height="200px">
                                <div class="row">
                                    <?php foreach ($gambar as $a) { ?>
                                        <div style="margin-top:10px">
                                            <img src="<?php echo base_url() . 'assets/assets-admin/foto-produk/' . $a->foto; ?>" width="50px" height="50px" style="float: right;">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h2 class="text-semibold m-t-25"><?php echo $row->nama ?></h2>
                                <p class="lead">Rp. <?php echo number_format($row->harga, 2, ",", ".") ?></p>
                                <p class="m-b-25"><?php echo $row->description ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-border">
                    <div class="text-right">
                        <button class="btn btn-gradient-success" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php } ?>