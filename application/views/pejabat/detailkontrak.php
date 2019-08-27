<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="flashdata-kontrakbawahan" data-flashdatakontrakbawahan="<?= $this->session->flashdata('kkbawahan'); ?>"></div>
    <div class="flashdata-ikubawahan" data-flashdataikubawahan="<?= $this->session->flashdata('ikubawahan'); ?>"></div>


    <div class="row">
        <div class="col-lg">

            <div class="card shadow  border-left-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm">
                            <h4 class="judul"><?= $title; ?>: <?= $detailkontrak['nomorkk']; ?></h4>
                        </div>
                        <div class="col-sm">
                            <button type="button" class="btn btn-warning btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <th scope="row" class="detailkontrak">Seri Kontrak Kinerja</th>
                            <td class="detailkontrak"><?= $detailkontrak['kontrakkinerjake']; ?></td>
                            <tr>
                                <th scope="row" class="detailkontrak">Tanggal Awal Kontrak Kinerja</th>
                                <td class="detailkontrak"><?= indonesian_date3($detailkontrak['tanggalmulai']); ?></td>
                            </tr>

                            <tr>
                                <th scope="row" class="detailkontrak">Tanggal Selesai Kontrak Kinerja</th>
                                <td class="detailkontrak"><?= indonesian_date3($detailkontrak['tanggalselesai']); ?> </td>
                            </tr>

                            <div class="col-sm-4">
                                <input type="hidden" readonly class="form-control" name="nomorkk" value="<?= $detailkontrak['nomorkk']; ?>">
                            </div>

                        </tbody>
                    </table>


                </div>

            </div>
        </div>

    </div>

    <div class="card shadow mt-3 border-left-success">
        <div class="card-header">
            <h4 class="daftar-iku">Daftar IKU Bawahan</h4>
        </div>
        <div class="card-body ">
            <div class="row">

                <div class="col-lg">

                    <table class="table table-bordered table-hover" id="browseiku">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center" scope="col">Nomor IKU</th>
                                <th class="text-center" scope="col">Nama IKU</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Target IKU</th>
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Nama Validator</th>
                                <?php endif; ?>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($listiku as $iku) : ?>
                            <tr>
                                <th class="text-center" scope="row"><?= $i; ?></th>
                                <td class="text-center kodeikubawahan"><?= $iku['kodeiku']; ?></td>
                                <td class="nama-ikubawahan"><?= $iku['namaiku']; ?></td>
                                <td class="text-center"><?= $iku['targetiku']; ?> dari <?= $iku['nilaitertinggi']; ?></td>
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                <td class="text-center"><?= $iku['nama_validated']; ?></td>
                                <?php endif; ?>
                                <td class="aksiikubawahan text-center">
                                    <?php if ($iku['iku_validated'] == 0) : ?>
                                    <a data-toggle="tooltip" class="button-buttonapproveiku" data-placement="left" title="Persetujuan Indikator Kinerja Utama" href="<?= base_url(); ?>pejabat/approveiku/<?= $iku['id_iku']; ?> " data-iku="<?= $iku['id_iku']; ?>"><span style="color:green;"><i class="fas fa-fw fa-thumbs-up"></i></a>

                                    <?php else : ?>

                                    <a data-toggle="tooltip" data-placement="left" title="Lihat Logbook" class="inputlogbook" href="<?= base_url(); ?>pejabat/logbookbawahan/<?= $iku['id_iku']; ?>"><span style="color:forestgreen;"><i class="fas fa-fw fa-chart-line"></i></span></a>
                                    <a data-toggle="tooltip" class="button-buttonbatalapproveiku" data-placement="left" title="Pembatalan Persetujuan IKU" href="<?= base_url(); ?>pejabat/batalapproveiku/<?= $iku['id_iku']; ?> " data-iku="<?= $iku['id_iku']; ?>"><span style="color:red;"><i class="fas fa-thumbs-down"></i></a>

                                    <?php endif; ?>

                                </td>
                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->