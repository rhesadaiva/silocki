<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h3 mb-0 text-gray-800">Dashboard</h4>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Kontrak Kinerja  -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">JUMLAH KONTRAK KINERJA YANG DISETUJUI</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kkdisetujui; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-file-signature fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">JUMLAH INDIKATOR KINERJA UTAMA YANG DISETUJUI</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $ikudisetujui; ?></div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">JUMLAH LOGBOOK YANG TELAH DIKIRIM</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $logbookdikirim; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-clipboard-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!--PROFIL -->
        <div class="col-xl-5 col-lg-4">
            <div class="card shadow mb-4 border-top-primary">

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between ">
                    <h5 class="m-0 font-weight-bold text-primary"><i class="far fa-fw fa-id-card"></i> PROFIL</h5>
                </div>
                <!-- Card Body -->
                <div class="card-body">

                    <div class="profil">
                        <div class="card border-left-success">
                            <div class="card-body py-2">
                                <span style="color: black; font-weight: 700">
                                    NAMA/NIP
                                </span>
                                <hr class="mt-1">

                                <span class="profil">
                                    <?= $user['nama']; ?>
                                    <br>
                                    <?= $user['nip']; ?>
                                </span>

                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body py-2 border-left-info">
                                <span style="color: black; font-weight: 700">
                                    PANGKAT/GOLONGAN
                                </span>
                                <hr class="mt-1">
                                <span class="profil">
                                    <?= $user['pangkat']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="card mt-3">
                            <div class="card-body py-2 border-left-warning">
                                <span style="color: black; font-weight: 700">
                                    UNIT ORGANISASI
                                </span>
                                <hr class="mt-1">
                                <span class="profil">
                                    <?php switch ($user['role_id']) {
                                        case 1:
                                            echo "Admin";
                                            break;

                                        case 2:
                                            echo "Kepala Kantor";
                                            break;

                                        case 3:
                                            echo "Kepala Subbagian / Kepala Seksi";
                                            break;

                                        case 4:
                                            echo "Kepala Subseksi";
                                            break;

                                        case 5:
                                            echo "Pelaksana";
                                            break;
                                    }
                                    ?> pada <?= $user['seksi']; ?>
                                </span>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-body py-2 border-left-danger">
                                <span style="color: black; font-weight: 700">
                                    ATASAN
                                </span>
                                <hr class=" mt-1">
                                <span class="profil">
                                    <?= $user['atasan']; ?>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PENGUMUMAN -->
        <div class="col-xl-7 col-lg-8">
            <div class="card shadow mb-4 border-top-info">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-info"><i class="fas fa-fw fa-bullhorn"></i> PENGUMUMAN</h5>
                </div>
                <div class="card-body">
                    <?php foreach ($pengumuman as $peng) : ?>
                    <div class="alert alert-success" role="alert">
                        <?= $peng['content']; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->