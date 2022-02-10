<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login - Wedding Organizer</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="<?php echo base_url() . 'assets/assets-landing/image/icon-2.png' ?>">
    <link rel="shortcut icon" href="<?php echo base_url() . 'assets/assets-landing/image/icon-2.png' ?>">

    <!-- core dependcies css -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/assets-admin/vendor/bootstrap/dist/css/bootstrap.css' ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/assets-admin/vendor/PACE/themes/blue/pace-theme-minimal.css' ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/assets-admin/vendor/perfect-scrollbar/css/perfect-scrollbar.min.css' ?>" />

    <!-- page css -->

    <!-- core css -->
    <link href="<?php echo base_url() . 'assets/assets-admin/css/font-awesome.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/assets-admin/css/themify-icons.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/assets-admin/css/materialdesignicons.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/assets-admin/css/animate.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/assets-admin/css/app.css' ?>" rel="stylesheet">
</head>

<body>
    <div class="app">
        <div class="layout bg-gradient-info">
            <div class="container">
                <div class="row full-height align-items-center">
                    <div class="col-md-5">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <div class="p-h-15 p-v-40">
                                    <h2>Login</h2>
                                    <p class="m-b-15 font-size-13">Please enter your email and password to login</p>
                                    <form action="<?= base_url('login/prosesAdmin'); ?>" method="POST">
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
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                        </div>
                                        <button class="btn btn-block btn-lg btn-gradient-success">Login</button>
                                        <div class="text-center m-t-30">
                                            <a href="<?= base_url('register/indexAdmin'); ?>" class="text-gray text-link text-opacity">Register Now!</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- build:js <?php echo base_url() . 'assets/assets-admin/js/vendor.js' ?> -->
    <!-- core dependcies js -->
    <script src="<?php echo base_url() . 'assets/assets-admin/vendor/jquery/dist/jquery.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-admin/vendor/popper.js/dist/umd/popper.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-admin/vendor/bootstrap/dist/js/bootstrap.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-admin/vendor/PACE/pace.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-admin/vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/assets-admin/vendor/d3/d3.min.js' ?>"></script>
    <!-- endbuild -->

    <!-- build:js <?php echo base_url() . 'assets/assets-admin/js/app.min.js' ?> -->
    <!-- core js -->
    <script src="<?php echo base_url() . 'assets/assets-admin/js/app.js' ?>"></script>
    <!-- configurator js -->
    <script src="<?php echo base_url() . 'assets/assets-admin/js/configurator.js' ?>"></script>
    <!-- endbuild -->

    <!-- page js -->

</body>

</html>