<style>
    td {
        text-align: center;
    }

    h5.detail-kontrak {
        color: royalblue;
        font-weight: bold;
    }

    h5.daftar-iku {
        color: forestgreen;
        font-weight: bold;
    }

    td.kontrak {
        text-align: left;
        padding-right: 700px;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="flashdata-kontrakbawahan" data-flashdatakontrakbawahan="<?= $this->session->flashdata('kkbawahan'); ?>"></div>
    <div class="flashdata-ikubawahan" data-flashdataikubawahan="<?= $this->session->flashdata('ikubawahan'); ?>"></div>


    <div class="row">
        <div class="col-lg">

            <div class="card shadow  border-left-primary">
                <div class="card-header">
                    <h5 class="detail-kontrak"><?= $title; ?> : <?= $detailkontrak['nomorkk']; ?></h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tbody>

                            <th scope="row">Seri Kontrak Kinerja</th>
                            <td class="kontrak"><?= $detailkontrak['kontrakkinerjake']; ?></td>
                            <tr>
                                <th scope="row">Tanggal Awal Kontrak Kinerja</th>
                                <td class="kontrak"><?= shortdate_indo($detailkontrak['tanggalmulai']); ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Tanggal Selesai Kontrak Kinerja</th>
                                <td class="kontrak"><?= shortdate_indo($detailkontrak['tanggalselesai']); ?> </td>
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
            <h5 class="daftar-iku">Daftar IKU Bawahan</h5>
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
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($listiku as $iku) : ?>
                                <tr>
                                    <th class="text-center" scope="row"><?= $i; ?></th>
                                    <td><?= $iku['kodeiku']; ?></td>
                                    <td><?= $iku['namaiku']; ?></td>
                                    <td><?= $iku['targetiku']; ?> dari <?= $iku['nilaitertinggi']; ?></td>

                                    <td class="aksi">
                                        <?php if ($iku['iku_validated'] == 0) : ?>
                                            <a data-toggle="tooltip" class="button-buttonapprovekontrak" data-placement="left" title="Persetujuan Indikator Kinerja Utama" href="<?= base_url(); ?>pejabat/approveiku/<?= $iku['id_iku']; ?> "><span style="color:green;"><i class="fas fa-fw fa-thumbs-up"></i></a>

                                        <?php else : ?>

                                            <a data-toggle="tooltip" data-placement="left" title="Lihat Logbook" class="inputlogbook" href="<?= base_url(); ?>pejabat/logbookbawahan/<?= $iku['id_iku']; ?>"><span style="color:forestgreen;"><i class="fas fa-fw fa-chart-line"></i></span></a>
                                            <a data-toggle="tooltip" class="button-buttonbatalapproveiku" data-placement="left" title="Pembatalan Persetujuan IKU" href="<?= base_url(); ?>pejabat/batalapproveiku/<?= $iku['id_iku']; ?> "><span style="color:red;"><i class="fas fa-thumbs-down"></i></a>

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