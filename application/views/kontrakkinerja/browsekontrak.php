<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>


    <?php endif; ?>

    <div class="card shadow border-left-primary">

        <div class="card-header">
            <div class="row">
                <div class="col-sm">
                    <h4 class="browsekontrak"><?= $title; ?></h4>
                </div>
                <div class="col-sm">
                    <a class="btn btn-info btn-sm float-sm-right" href="<?= base_url('kontrakkinerja/tambahkontrak'); ?>"><i class="fas fa-fw fa-folder-plus"></i> Tambah Kontrak</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg">

                    <table class="table table-bordered table-hover" id="browsekontrakkinerja">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center browsekontrak" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center browsekontrak" scope="col">Jenis Kontrak Kinerja</th>
                                <?php if ($this->session->userdata['role_id'] == 1) : ?>
                                    <th class="text-center browsekontrak" scope="col">Pemilik Kontrak Kinerja</th>
                                <?php endif; ?>
                                <th class="text-center browsekontrak" scope="col">Nomor Kontrak Kinerja</th>
                                <th class="text-center browsekontrak" scope="col">Periode Pelaksanaan</th>
                                <th class="text-center browsekontrak" data-valign="middle" data-halign="center" scope="col">Status Validasi</th>
                                <th class="text-center browsekontrak" data-valign="middle" data-halign="center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kontrak_kinerja as $kontrak) : ?>
                                <tr>
                                    <th class="text-center" scope="row"><?= $i; ?></th>
                                    <td class="browsekontrak"><?= $kontrak['kontrakkinerjake']; ?></td>
                                    <?php if ($this->session->userdata['role_id'] == 1) : ?>
                                        <td class="browsekontrak"><?= $kontrak['nama']; ?></td>
                                    <?php endif; ?>
                                    <td class="browsekontrak"><?= $kontrak['nomorkk']; ?></td>
                                    <td class="browsekontrak"><?= indonesian_date3($kontrak['tanggalmulai']); ?> s.d <?= indonesian_date3($kontrak['tanggalselesai']); ?></td>
                                    <td class="browsekontrak">
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
                                    <td class="aksibrowsekontrak">
                                        <?php if ($kontrak['is_validated'] == 1) : ?>
                                            <a data-toggle="tooltip" data-placement="left" title="Edit Kontrak Kinerja" href="<?= base_url(); ?>kontrakkinerja/editkontrak/<?= $kontrak['id_kontrak']; ?> "><i class="fas fa-fw fa-edit"></i></a>

                                            <a data-toggle="tooltip" data-placement="left" title="Hapus Kontrak Kinerja" class="hapus-kontrak" href="<?= base_url(); ?>kontrakkinerja/hapuskontrak/<?= $kontrak['id_kontrak']; ?> " id="<?= $kontrak['id_kontrak']; ?>"><span style="color:red;"><i class="fas fa-fw fa-trash"></i></span></a>

                                        <?php else : ?>

                                            <i data-toggle="tooltip" data-placement="left" title="Kontrak Kinerja Terkunci" class="button-locklgobook" id="button-lockkontrak"><span style=" color:#daa520;"><i class="fas fa-fw fa-lock"></i></span></i>
                                    </td>
                                <?php endif; ?>
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