<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register - Wedding Orginizer</title>

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
        <div class="layout bg-white full-height">
            <div class="row no-gutters">
                <div class="col-md-8 d-none d-md-block align-self-end" style="background-image: url('<?php echo base_url() . 'assets/assets-admin/images/others/img-32.jpg' ?>')">
                    <div class="row full-height">
                        <div class="col-md-10 align-self-center">
                            <div class="m-b-50 m-l-70">
                                <div class="m-t-15 m-l-20">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 align-self-center">
                    <div class="row">
                        <div class="col-10 offset-1 col-sm-8 offset-sm-2">
                            <div class="p-v-25">
                                <h1 class="m-b-30">Create Your account</h1>
                                <form method="POST" action="<?php echo base_url('register/prosesAdmin'); ?>">
                                    <?php
                                    $message = $this->session->flashdata('error');
                                    if ($message) {
                                        echo '<p class="alert alert-danger text-center">' . $message . '</p>';
                                    } ?>
                                    <div class="form-group">
                                        <label class="control-label">Email Address</label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Role</label>
                                        <Select name="role" id="role" class="form-control">
                                            <option value="" selected>---Select Role---</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Owner">Owner</option>
                                        </Select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Password</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group m-t-20">
                                        <button class="btn btn-gradient-success btn-block btn-lg">Create New Account</button>
                                    </div>
                                </form>
                                <p>Already have an account? <a href="<?= base_url('login/loginAdmin') ?>">Sign In</a></p>
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