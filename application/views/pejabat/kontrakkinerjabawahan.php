<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="flashdata-kontrakbawahan" data-flashdatakontrakbawahan="<?= $this->session->flashdata('kkbawahan'); ?>"></div>
    <div class="flashdata-ikubawahan" data-flashdataikubawahan="<?= $this->session->flashdata('ikubawahan'); ?>"></div>
    <div class="flashdata-logbookbawahan" data-flashdatalogbookbawahan="<?= $this->session->flashdata('logbookbawahan'); ?>"></div>

    <div class="card shadow border-left-primary">
        <div class="card-header">
            <h4 class="kkbawahan"><?= $title; ?></h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg">

                    <table class="table table-bordered table-hover" id="browseiku">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center kkbawahan" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center kkbawahan" data-valign="middle" data-halign="center" scope="col">Nomor Kontrak Kinerja </th>
                                <th class="text-center kkbawahan" data-valign="middle" data-halign="center" scope="col">Pemilik Kontrak Kinerja</th>
                                <th class="text-center kkbawahan" data-valign="middle" data-halign="center" scope="col">Periode Kontrak Kinerja</th>
                                <th class="text-center kkbawahan" data-valign="middle" data-halign="center" scope="col">Status Validasi</th>
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                <th class="text-center kkbawahan" data-valign="middle" data-halign="center" scope="col">Nama Validator</th>
                                <?php endif; ?>
                                <th class="text-center kkbawahan" data-valign="middle" data-halign="center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="kontrakbawahan">
                            <tr>
                                <?php $i = 1; ?>
                                <?php foreach ($kontrak_kinerja as $kontrak) : ?>
                                <th class="text-center kkbawahan" scope="row"><?= $i ?></th>
                                <td class="kkbawahan"><?= $kontrak['nomorkk']; ?></td>
                                <td class="kkbawahan"><?= $kontrak['nama']; ?></td>
                                <td class="kkbawahan"><?= indonesian_date3($kontrak['tanggalmulai']); ?> s.d <?= indonesian_date3($kontrak['tanggalselesai']); ?></td>
                                <td class="kkbawahan">
                                    <?php switch ($kontrak['is_validated']) {
                                            case 1:
                                                echo "Belum divalidasi";
                                                break;

                                            case 2:
                                                echo "Sudah divalidasi oleh atasan";
                                                break;

                                            case 3:
                                                echo "Sudah divalidasi oleh Seksi Kepatuhan Internal";
                                                break;
                                        }
                                        ?>
                                </td>
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                <td class="kkbawahan"><?= $kontrak['nama_validated']; ?></td>
                                <?php endif; ?>
                                <td class="aksiapprovekontrak">
                                    <?php if ($kontrak['is_validated'] == 1) : ?>
                                    <a data-toggle="tooltip" class="button-buttonapprovekontrak" data-placement="left" title="Persetujuan Kontrak Kinerja" href="<?= base_url(); ?>pejabat/approvekontrak/<?= $kontrak['id']; ?> "><span style="color:green;"><i class="fas fa-fw fa-thumbs-up"></i></a>

                                    <?php else : ?>
                                    <a data-toggle="tooltip" data-placement="left" title="Detail Kontrak Kinerja" href="<?= base_url(); ?>pejabat/detailkontrak/<?= $kontrak['id']; ?> "><i class="fas fa-fw fa-search"></i></a>

                                    <a data-toggle="tooltip" class="button-buttonbatalapprovekontrak" data-placement="left" title="Pembatalan Persetujuan Kontrak Kinerja" href="<?= base_url(); ?>pejabat/batalapprovekontrak/<?= $kontrak['id']; ?> "><span style="color:red;"><i class="fas fa-fw fa-thumbs-down"></i></a>

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