<!DOCTYPE html>

<head>
    <title>Cetak Laporan</title>
    <base href="<?php echo base_url() ?>">
    <link rel="shortcut icon" href="<?php echo base_url() . 'assets/assets-landing/image/icon-2.png' ?>">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <style>
        .tanda-tangan {
            right: 80px;
            bottom: 50px;
            z-index: 100;
            margin: 5px 0 10px 15px;
            padding: 15px;
            position: absolute;
        }

        .nm {
            margin-left: 80px;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div style="text-align: center;">
        <img src="<?php echo base_url() . 'assets/assets-admin/images/logo/logo-2.png' ?>" width="200px" height="100px" />
    </div>
    <h1 style="text-align: center;">CETAK LAPORAN WEDDING ORGANIZER</h1>
    <div class="row" style="padding: 20px;">
        <div class=" col-6">
            <div>Eka Suhandi Wedding Organizer</div>
            <div>Perumahan Puri Permai 3 Blok D10 NO 6 Tigaraksa.</div>
        </div>
        <div class=" col-6" style="text-align: right;">
            <!-- <div> </div> -->
            <div>Tangerang</div>
            <div>0812 9871 3357</div>
            <div></div>
        </div>
    </div>

    <!-- <h4 align="center">Jl. Mitramas Raya No.10, Talagasari, Kec. Cikupa, Tangerang, Banten 15710</h4> -->
    <hr />
    <h2 align="center">DATA PRODUK TERJUAL</h2>
    <script>
        window.print()
    </script>
    <div style="padding:10px">
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th style="text-align: center;">No</th>
                    <th style="text-align: center;">Nama Customer</th>
                    <th style="text-align: center;">Order Number</th>
                    <th style="text-align: center;">Nama Produk</th>
                    <th style="text-align: center;">Tanggal Pembelian</th>
                    <th style="text-align: center;">Kuantiti</th>
                    <th style="text-align: center;">Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($get_laporan as $r) {
                ?>
                    <tr>
                        <td style="text-align: center;"><?= $no++; ?></td>
                        <td><?= $r->nama; ?></td>
                        <td><?= $r->order_number; ?></td>
                        <td><?= $r->nama_produk; ?></td>
                        <td><?= $r->tgl_pembelian; ?></td>
                        <td><?= $r->kuantiti; ?></td>
                        <td>Rp. <?= number_format($r->harga_detail, 0, '.', '.'); ?></td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>


    <div style="text-align: right; margin-right:20px">
        <h3>Tangerang, <?= date('d-m-Y'); ?></h3>
        <br>
        <br>
        <br>
        <br>
        <p><strong><?= $this->session->userdata('nama'); ?></strong></p>
    </div>
</body>

</html>