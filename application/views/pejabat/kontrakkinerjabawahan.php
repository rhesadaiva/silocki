<style>
    th {
        font-size: 14px;
    }

    td {
        text-align: center;
        font-size: 15px;
    }

    .aksi {
        font-size: 15px;
        width: 10%;
        text-align: center;
    }
</style>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="flashdata-kontrakbawahan" data-flashdatakontrakbawahan="<?= $this->session->flashdata('kkbawahan'); ?>"></div>
    <div class="flashdata-ikubawahan" data-flashdataikubawahan="<?= $this->session->flashdata('ikubawahan'); ?>"></div>

    <div class="card shadow">
        <div class="card-header">
            <h5 class="text-gray-800"><?= $title; ?></h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg">
                    <table class="table table-bordered table-hover" id="browseiku">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Nomor Kontrak Kinerja </th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Pemilik Kontrak Kinerja</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Periode Kontrak Kinerja</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Status Validasi</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $i = 1; ?>
                                <?php foreach ($kontrak_kinerja as $kontrak) : ?>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $kontrak['nomorkk']; ?></td>
                                    <td><?= $kontrak['nama']; ?></td>
                                    <td><?= shortdate_indo($kontrak['tanggalmulai']); ?> s.d <?= shortdate_indo($kontrak['tanggalselesai']); ?></td>
                                    <td>
                                        <?
                                        switch ($kontrak['is_validated']) {
                                            case '1':
                                                echo 'Belum tervalidasi';
                                                break;

                                            case '2':
                                                echo 'Sudah divalidasi oleh atasan';
                                                break;
                                            case '3':
                                                echo 'Sudah divalidasi oleh Seksi Kepatuhan Internal';
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td class="aksi">
                                        <?php if ($kontrak['is_validated'] == 1) : ?>

                                            <a data-toggle="tooltip" data-placement="left" title="Detail Kontrak Kinerja" href="<?= base_url(); ?>pejabat/detailkontrak/<?= $kontrak['id']; ?> "><i class="fas fa-fw fa-search"></i></a>
                                            <a data-toggle="tooltip" class="button-buttonapprovekontrak" data-placement="left" title="Persetujuan Kontrak Kinerja" href="<?= base_url(); ?>pejabat/approvekontrak/<?= $kontrak['id']; ?> "><span style="color:green;"><i class="fas fa-fw fa-thumbs-up"></i></a>

                                        <?php else : ?>
                                            <a data-toggle="tooltip" class="button-buttonbatalapprovekontrak" data-placement="left" title="Pembatalan Persetujuan Kontrak Kinerja" href="<?= base_url(); ?>pejabat/batalapprovekontrak/<?= $kontrak['id']; ?> "><span style="color:red;"><i class="fas fa-thumbs-down"></i></i></a>

                                        <?php endif; ?>

                                    </td>
                                </tr>
                                <?php $i++ ?>
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