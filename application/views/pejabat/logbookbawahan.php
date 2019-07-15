<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow border-left-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-sm">
                    <h4 class="judul"><?= $title; ?></h4>
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-warning btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
                </div>
            </div>
        </div>
        <div class="card-body">

            <table class="table">
                <tbody>

                    <tr>
                        <th scope="row" width="150px">Kode IKU</th>
                        <td><?= $indikator['kodeiku']; ?></td>
                    </tr>

                    <tr>
                        <th scope="row">Nama IKU</th>
                        <td><?= $indikator['namaiku']; ?></td>
                    </tr>

                    <tr>
                        <th scope="row">Formula IKU</th>
                        <td><?= $indikator['formulaiku']; ?></td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

    <div class="card shadow mt-3 border-left-success">
        <div class="card-header">
            <h4 class="logbook">Daftar Logbook Bawahan</h4>
        </div>
        <div class="card-body">

            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link" id="nav-detaillogbook-tab" data-toggle="tab" href="#nav-detaillogbook" role="tab"><i class="fas fa-fw fa-search"></i> Detail Logbook</a>
                </div>
            </nav>

            <div class="tab-content pt-1" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-detaillogbook" role="tabpanel">
                    <table class="table table-bordered table-hover mt-3" id="browselogbook" name="browselogbook">
                        <thead class="thead-light">
                            <tr class="tableheadlogbook">
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center" scope="col">Periode Pelaporan</th>
                                <th class="text-center" scope="col">Perhitungan</th>
                                <th class="text-center realisasi" scope="col">Realisasi Pada Bulan Pelaporan</th>
                                <th class="text-center realisasi" data-valign="middle" data-halign="center" scope="col">Realisasi s.d Bulan Pelaporan</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Keterangan</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Waktu Rekam</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Waktu Persetujuan</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($logbookdetail as $logbook) : ?>
                                <tr class="detail">
                                    <th class="text-center" scope="row"><?= $i; ?></th>
<<<<<<< HEAD
                                    <<<<<<< HEAD <!-- Ganti Tanggal -->
                                        =======

                                        <!-- Mengganti angka menjadi bulan -->
                                        >>>>>>> 4f85151a83f432e1464474c6177d0c19ef6e9197
                                        <td class="periode">
                                            <?php switch ($logbook['periode']) {
                                                case 1:
                                                    echo "Januari";
                                                    break;

                                                case 2:
                                                    echo "Februari";
                                                    break;

                                                case 3:
                                                    echo "Maret";
                                                    break;

                                                case 4:
                                                    echo "April";
                                                    break;

                                                case 5:
                                                    echo "Mei";
                                                    break;

                                                case 6:
                                                    echo "Juni";
                                                    break;

                                                case 7:
                                                    echo "Juli";
                                                    break;

                                                case 8:
                                                    echo "Agustus";
                                                    break;

                                                case 9;
                                                    echo "September";
                                                    break;

                                                case 10;
                                                    echo "Oktober";
                                                    break;

                                                case 11;
                                                    echo "November";
                                                    break;

                                                case 12;
                                                    echo "Desember";
                                                    break;
                                            }; ?>
                                        </td>
                                        <!-- Mengganti angka menjadi bulan -->

                                        <td><?= $logbook['perhitungan']; ?></td>
                                        <td><?= $logbook['realisasibulan']; ?></td>
                                        <td><?= $logbook['realisasiterakhir']; ?></td>
                                        <td class="text-justify"><?= $logbook['ket']; ?></td>
                                        <td class="wakturekam text-justify"><?= $logbook['wakturekam']; ?></td>
                                        <td class="wakturekam text-justify"><?= $logbook['tgl_approve']; ?></td>

                                        <td class="aksi">
                                            <?php if ($logbook['is_approved'] == 0) : ?>

                                                <a data-toggle="tooltip" data-placement="left" title="Setuju Logbook Bawahan" class="button-setujulogbookbawahan" href="<?= base_url(); ?>pejabat/approvelogbook/<?= $logbook['id_logbook']; ?>"><span style="color:blue;"><i class="fas fa-fw fa-thumbs-up"></i></span></a>

                                            <?php else : ?>

                                                <a data-toggle="tooltip" data-placement="left" title="Batalkan Persetujuan Logbook" class="button-tidaksetujulogbookbawahan" href="<?= base_url(); ?>pejabat/batalapprovelogbook/<?= $logbook['id_logbook']; ?>"><span style="color:red;"><i class="fas fa-fw fa-thumbs-down"></i></span></a>

                                            <?php endif; ?>
                                        </td>
=======
                                    <!-- Ganti Tanggal -->
                                    <!-- Mengganti angka menjadi bulan -->

                                    <td class="periode">
                                        <?php switch ($logbook['periode']) {
                                            case 1:
                                                echo "Januari";
                                                break;

                                            case 2:
                                                echo "Februari";
                                                break;

                                            case 3:
                                                echo "Maret";
                                                break;

                                            case 4:
                                                echo "April";
                                                break;

                                            case 5:
                                                echo "Mei";
                                                break;

                                            case 6:
                                                echo "Juni";
                                                break;

                                            case 7:
                                                echo "Juli";
                                                break;

                                            case 8:
                                                echo "Agustus";
                                                break;

                                            case 9;
                                                echo "September";
                                                break;

                                            case 10;
                                                echo "Oktober";
                                                break;

                                            case 11;
                                                echo "November";
                                                break;

                                            case 12;
                                                echo "Desember";
                                                break;
                                        }
                                        ?></td>
                                    <!-- END -->
                                    <td><?= $logbook['perhitungan']; ?></td>
                                    <td><?= $logbook['realisasibulan']; ?></td>
                                    <td><?= $logbook['realisasiterakhir']; ?></td>
                                    <td class="text-justify"><?= $logbook['ket']; ?></td>
                                    <td class="wakturekam text-justify"><?= $logbook['wakturekam']; ?></td>
                                    <td class="wakturekam text-justify"><?= $logbook['tgl_approve']; ?></td>

                                    <td class="aksi">
                                        <?php if ($logbook['is_approved'] == 0) : ?>

                                            <a data-toggle="tooltip" data-placement="left" title="Setuju Logbook Bawahan" class="button-setujulogbookbawahan" href="<?= base_url(); ?>pejabat/approvelogbook/<?= $logbook['id_logbook']; ?>"><span style="color:blue;"><i class="fas fa-fw fa-thumbs-up"></i></span></a>

                                        <?php else : ?>

                                            <a data-toggle="tooltip" data-placement="left" title="Batalkan Persetujuan Logbook" class="button-tidaksetujulogbookbawahan" href="<?= base_url(); ?>pejabat/batalapprovelogbook/<?= $logbook['id_logbook']; ?>"><span style="color:red;"><i class="fas fa-fw fa-thumbs-down"></i></span></a>

                                        <?php endif; ?>
                                    </td>
>>>>>>> d58deddb461d2604877d57ab1b5fd8b67cd836fd

                                </tr>

                            </tbody>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->