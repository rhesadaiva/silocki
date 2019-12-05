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
                                    <th class="text-center nomor-bawahan" scope="row"><?= $i; ?></th>
                                    <td class="periode"><?= $logbook['periode']; ?></td>
                                    <td class="perhitungan-bawahan"><?= $logbook['perhitungan']; ?></td>
                                    <td class="realisasi-bawahan"><?= $logbook['realisasibulan']; ?></td>
                                    <td class="realisasi-bawahan"><?= $logbook['realisasiterakhir']; ?></td>
                                    <td class="text-justify keterangan-bawahan"><?= $logbook['ket']; ?></td>
                                    <td class="wakturekam-bawahan text-justify"><?= indonesian_date2($logbook['wakturekam']); ?></td>
                                    <?php if ($logbook['tgl_approve'] != NULL) : ?>
                                        <td class="waktupersetujuan-bawahan text-justify"><?= indonesian_date2($logbook['tgl_approve']); ?></td>
                                    <?php else : ?>
                                        <td class="waktupersetujuan-bawahan text-justify">Belum divalidasi</td>
                                    <?php endif; ?>

                                    <td class="aksi">
                                        <?php if ($logbook['is_approved'] == 0) : ?>
                                            <a data-toggle="tooltip" data-placement="left" title="Setuju Logbook Bawahan" class="button-setujulogbookbawahan" href="<?= base_url(); ?>pejabat/approvelogbook/<?= $logbook['id_logbook']; ?>" data-logbook="<?= $logbook['id_logbook']; ?>"><span style="color:blue;"><i class="fas fa-fw fa-thumbs-up"></i></span></a>
                                            <a data-toggle="modal" data-placement="left" title="Cetak Logbook" class="button-cetaklogbook" href="#modalPDFatasan"><span style="color:forestgreen;"><i class="fas fa-fw fa-print"></i></span></a>
                                        <?php else : ?>
                                            <a data-toggle="tooltip" data-placement="left" title="Batalkan Persetujuan Logbook" class="button-tidaksetujulogbookbawahan" href="<?= base_url(); ?>pejabat/batalapprovelogbook/<?= $logbook['id_logbook']; ?>" data-logbook="<?= $logbook['id_logbook']; ?>"><span style="color:red;"><i class="fas fa-fw fa-thumbs-down"></i></span></a>
                                            <a data-toggle="modal" data-placement="left" title="Cetak Logbook" class="button-cetaklogbook" href="#modalPDFatasan"><span style="color:forestgreen;"><i class="fas fa-fw fa-print"></i></span></a>
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

    <!-- Modal PDF -->
    <div class="modal fade" id="modalPDFatasan" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cetak Data Logbook</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height:500px;">
                    <div id="modalpdflogbook">
                        <iframe src="<?= base_url(); ?>logbook/cetakLogbook/<?= $logbook['id_logbook']; ?> " style="width: 100%; height: 450px;"></iframe>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->