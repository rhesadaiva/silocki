<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="flashdata" data-flashdataiku="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>

    <?php endif; ?>

    <div class="flashdata-logbook" data-flashdatalogbook="<?= $this->session->flashdata('logbook'); ?>"></div>
    <?php if ($this->session->flashdata('logbook')) : ?>

    <?php endif; ?>

    <div class="card shadow border-left-primary">

        <div class="card-header">
            <div class="row">
                <div class="col-sm">
                    <h4 class="text-dark-800 browseiku"><?= $title; ?></h4>
                </div>
                <div class="col-sm">
                    <a class="btn btn-info btn-sm float-right" href="<?= base_url('') ?>iku/rekamiku/"><i class="fas fa-fw fa-folder-plus"></i> Tambah IKU</a>
                </div>
            </div>


        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-lg">

                    <table class="table table-bordered table-hover" id="browseiku">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center browseiku" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center browseiku" data-valign="middle" data-halign="center" scope="col">Nomor Kontrak Kinerja</th>
                                <?php if ($this->session->userdata['role_id'] == 1) : ?>
                                <th class="text-center browseiku" scope="col">Pemilik Kontrak Kinerja</th>
                                <?php endif; ?>
                                <th class="text-center browseiku" scope="col">Nomor IKU</th>
                                <th class="text-center browseiku" data-valign="middle" data-halign="center" scope="col">Nama IKU</th>
                                <th class=" text-center browseiku" data-valign="middle" data-halign="center" scope="col">Target IKU</th>
                                <th class="text-center browseiku" data-valign="middle" data-halign="center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($indikator as $iku) : ?>
                            <tr>
                                <th class="text-center nomorurut browseiku" scope="row"><?= $i; ?></th>
                                <td class="nomorkk browseiku"><?= $iku['nomorkk']; ?></td>
                                <?php if ($this->session->userdata['role_id'] == 1) : ?>
                                <td class="browseiku pemilik"><?= $iku['nama']; ?></td>
                                <?php endif; ?>
                                <td class="nomoriku browseiku"><?= $iku['kodeiku']; ?></td>
                                <td class="namaiku text-justify browseiku"><?= $iku['namaiku']; ?></td>
                                <td class="targetiku browseiku"><?= $iku['targetiku']; ?> dari <?= $iku['nilaitertinggi']; ?></td>

                                <td class="aksibrowseiku">
                                    <?php if ($iku['iku_validated'] == 0) : ?>

                                    <a data-toggle="tooltip" data-placement="left" title="Edit IKU" href="<?= base_url(); ?>iku/editiku/<?= $iku['id_iku']; ?>"><i class="fas fa-fw fa-edit"></i></a>

                                    <a data-toggle="tooltip" data-placement="left" title="Hapus IKU" class="buttonhapusiku" href="<?= base_url(); ?>iku/hapusiku/<?= $iku['id_iku']; ?> " id-iku="<?= $iku['id_iku']; ?>"><span style="color:red;"><i class="fas fa-fw fa-trash"></i></span></a>

                                    <?php else : ?>
                                    <a data-toggle="tooltip" data-placement="left" title="Pengisian Logbook" class="inputlogbook" href="<?= base_url(); ?>logbook/showlogbook/<?= $iku['id_iku']; ?>"><span style="color:forestgreen;"><i class="fas fa-fw fa-chart-line"></i></span></a>

                                    <a data-toggle="tooltip" data-placement="left" title="Adendum IKU" href="<?= base_url(); ?>iku/adendum/<?= $iku['id_iku']; ?>"><i class="fas fa-fw fa-edit"></i></a>

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