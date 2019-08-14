<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        SiLoCKi KPPBC Tanjungpinang | Login
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="assets/css/material-kit.min.css?v=2.0.5" rel="stylesheet" />
    <!-- My CSS -->
    <link href="assets/css/login-style.css" rel="stylesheet" />

</head>

<body class="login-page">

    <div class="page-header header-filter">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">

                        <div class="card-header card-header-success text-center">
                            <h4 class="card-title">SISTEM PELAPORAN CAPAIAN KINERJA KPPBC TANJUNGPINANG</h4>

                        </div>

                        <?= $this->session->flashdata('message'); ?>

                        <div class="card-body card-form">
                            <!-- Form -->
                            <form method="post" action="<?= base_url('auth'); ?>">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">account_circle</i>
                                        </span>
                                    </div>
                                    <input type="text" name="nip" class="form-control" placeholder="Nomor Induk Pegawai" value="<?= set_value('nip'); ?>" autocomplete off>
                                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="password" class="form-control" placeholder="Password" autocomplete off>
                                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="row btn-row-submit">
                                    <button type="submit" class="btn btn-success btn-submit"><b>LOGIN</b></button>
                                </div>

                            </form>
                            <div class="row btn-row-forget">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#forgotpassword">
                                    <b>LUPA PASSWORD</b>
                                </button>
                            </div>
                            <!-- End Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, developed with <i class="material-icons">favorite</i> by
                    Daiva
                </div>
            </div>
        </footer>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="forgotpassword" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="forgotpasswordlabel"><b>Authentikasi Ganti Password</b></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?= $this->session->flashdata('forgot'); ?>

                    <form action="<?= base_url('auth/lupapassword'); ?>" method="post">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="material-icons">account_circle</i>
                                </span>
                            </div>
                            <input type="text" name="nipforgot" class="form-control" placeholder="Nomor Induk Pegawai" autocomplete off>
                            <?= form_error('nipforgot', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>Batal</b></button>
                            <button type="submit" class="btn btn-primary"><b>Proses</b></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="assets/js/plugins/moment.min.js"></script>
    <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
    <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/material-kit.min.js?v=2.0.5" type="text/javascript"></script>

</body>

</html>