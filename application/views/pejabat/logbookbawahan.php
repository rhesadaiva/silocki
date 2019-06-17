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
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($logbookdetail as $logbook) : ?>
                                <tr class="detail">
                                    <th class="text-center" scope="row"><?= $i; ?></th>
                                    <td class="periode"><?= $logbook['periode']; ?></td>
                                    <td><?= $logbook['perhitungan']; ?></td>
                                    <td><?= $logbook['realisasibulan']; ?></td>
                                    <td><?= $logbook['realisasiterakhir']; ?></td>
                                    <td><?= $logbook['ket']; ?></td>
                                    <td class="wakturekam"><?= $logbook['wakturekam']; ?></td>

                                    <td class="aksi">
                                        <?php if ($logbook['is_approved'] == 0) : ?>

                                            <a data-toggle="tooltip" data-placement="left" title="Setuju Logbook Bawahan" class="button-setujulogbookbawahan" href="<?= base_url(); ?>pejabat/approvelogbook/<?= $logbook['id_logbook']; ?>"><span style="color:blue;"><i class="fas fa-fw fa-thumbs-up"></i></span></a>

                                        <?php else : ?>

                                            <a data-toggle="tooltip" data-placement="left" title="Batalkan Persetujuan Logbook" class="button-tidaksetujulogbookbawahan" href="<?= base_url(); ?>pejabat/batalapprovelogbook/<?= $logbook['id_logbook']; ?>"><span style="color:red;"><i class="fas fa-fw fa-thumbs-down"></i></span></a>

                                        <?php endif; ?>
                                    </td>

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