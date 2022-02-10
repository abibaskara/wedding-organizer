<div class="container-fluid">
    <div class="page-header">
        <h2 class="header-title">Print Laporan</h2>
        <div class="header-sub-title">
            <nav class="breadcrumb breadcrumb-dash">
                <a href="#" class="breadcrumb-item"><i class="ti-home p-r-5"></i>Home</a>
                <span class="breadcrumb-item active">Print Laporan</span>
            </nav>
        </div>
    </div>
    <div class="card">
        <div class="card-header border bottom">
            <h4 class="card-title">Laporan Eka Suhandi Wedding Organizer</h4>
        </div>
        <form action="<?php base_url() ?>filterPrint" method="POST" target="_blank">
            <div class="card-body">
                <h5>Filter Berdasarkan Tanggal</h5>
                <div class="m-t-25">
                    <div class="input-daterange" data-plugin="datepicker">
                        <div class="row align-items-center">
                            <div class="col">
                                <input type="date" class="form-control" name="start" required>
                            </div>
                            <div class="col-1 text-center p-h-0">
                                <span>to</span>
                            </div>
                            <div class="col">
                                <input type="date" class="form-control" name="end" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 10px;">
                    <input type="submit" class="btn btn-gradient-success" value="PRINT">
                </div>
            </div>
        </form>
    </div>
</div>