<body class="login-page">

    <div class="page-header header-filter">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                    <div class="card card-login">

                        <div class="card-header card-header-danger text-center">
                            <h4 class="card-title">RESET PASSWORD SILOCKI</h4>
                            <h5><?= $this->session->userdata['nama']; ?></h5>

                        </div>


                        <?= $this->session->flashdata('reset'); ?>

                        <div class="card-body card-form">
                            <!-- Form -->
                            <form method="post" action="<?= base_url('auth/resetpassword'); ?>">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">fingerprint</i>
                                        </span>
                                    </div>
                                    <input type="text" name="tokennumber" class="form-control" placeholder="Token Telegram" value="<?= set_value('nip'); ?>" autocomplete off>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="resetpass" class="form-control" placeholder="Password Baru" autocomplete off>
                                    <?= form_error('resetpass', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                    </div>
                                    <input type="password" name="konfirmresetpass" class="form-control" placeholder="Konfirmasi Password Baru" autocomplete off>
                                    <?= form_error('konfirmresetpass', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="row btn-row-reset">
                                    <button type="submit" class="btn btn-danger btn-reset"><b>RESET PASSWORD</b></button>
                                </div>

                            </form>
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