<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="col-sm-4">

        <div class="card border-left-primary">

            <div class="card-body">
                <h5 class="pb-3"><i class="far fa-fw fa-id-card"></i> <b>PROFIL</b></h5>
                <!-- NAMA -->
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <b>NAMA/NIP</b>
                            <hr class>
                            <?= $user['nama']; ?>
                            <br>
                            <?= $user['nip']; ?>
                        </div>
                    </div>
                </div>
                <!-- END NAMA -->
                <!-- UNOR -->
                <div class="card mt-2">
                    <div class="card">
                        <div class="card-body">
                            <b>UNIT ORGANISASI</b>
                            <hr>
                            Seksi <?= $user['seksi']; ?>
                        </div>
                    </div>
                </div>
                <!-- END UNOR -->
                <!-- JABATAN -->
                <div class="card mt-2">
                    <div class="card">
                        <div class="card-body">
                            <b>JABATAN</b>
                            <hr>
                            <?= $user['level']; ?> pada Seksi <?= $user['seksi']; ?>
                        </div>
                    </div>
                </div>
                <!-- END JABATAN -->
                <!-- PANGKAT GOLONGAN -->
                <div class="card mt-2">
                    <div class="card">
                        <div class="card-body">
                            <b>PANGKAT/GOLONGAN</b>
                            <hr>
                            <?= $user['pangkat']; ?>
                        </div>
                    </div>
                </div>
                <!-- END PANGKAT GOLONGAN -->
                <!-- ATASAN -->
                <div class="card mt-2">
                    <div class="card">
                        <div class="card-body">
                            <b>ATASAN</b>
                            <hr>
                            <?= $user['atasan']; ?>
                        </div>
                    </div>
                </div>
                <!-- END ATASAN -->
            </div>


        </div>


    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->