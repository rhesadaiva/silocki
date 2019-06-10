<style>
    th {
        font-size: 14px;
    }

    td {
        text-align: center;
        font-size: 15px;
    }

    td.nomorkk {
        text-align: center;
        font-size: 15px;
        width: 200px;
    }

    td.namaiku {
        text-align: center;
        font-size: 15px;
        width: 400px;
    }

    .aksi {
        font-size: 15px;
        width: 10%;
        text-align: center;
    }

    h5 {
        color: royalblue;
        font-weight: bold;
    }
</style>


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
                    <h5 class="text-dark-800"><?= $title; ?></h5>
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
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center" scope="col">Nomor Kontrak Kinerja</th>
                                <?php if ($this->session->userdata['role_id'] == 1) : ?>
                                    <th class="text-center" scope="col">Pemilik Kontrak Kinerja</th>
                                <?php endif; ?>
                                <th class="text-center" scope="col">Nomor IKU</th>
                                <th class="text-center" scope="col">Nama IKU</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Target IKU</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($indikator as $iku) : ?>
                                <tr>
                                    <th class="text-center" scope="row"><?= $i; ?></th>
                                    <td class="nomorkk"><?= $iku['nomorkk']; ?></td>
                                    <?php if ($this->session->userdata['role_id'] == 1) : ?>
                                        <td><?= $iku['nama']; ?></td>
                                    <?php endif; ?>
                                    <td><?= $iku['kodeiku']; ?></td>
                                    <td class="namaiku"><?= $iku['namaiku']; ?></td>
                                    <td><?= $iku['targetiku']; ?> dari <?= $iku['nilaitertinggi']; ?></td>

                                    <td class="aksi">
                                        <?php if ($iku['iku_validated'] == 0) : ?>
                                            <!--<a data-toggle="tooltip" data-placement="left" title="Input Logbook" class="inputlogbook" href="<?= base_url(); ?>logbook/showlogbook/<?= $iku['id_iku']; ?>"><span style="color:forestgreen;"><i class="fas fa-fw fa-chart-line"></i></span></a> -->
                                            <a data-toggle="tooltip" data-placement="left" title="Edit" href="<?= base_url(); ?>iku/editiku/<?= $iku['id_iku']; ?>"><i class="fas fa-fw fa-edit"></i></a>
                                            <a data-toggle="tooltip" data-placement="left" title="Delete" class="buttonhapusiku" href="<?= base_url(); ?>iku/hapusiku/<?= $iku['id_iku']; ?> "><span style="color:red;"><i class="fas fa-fw fa-trash"></i></span></a>

                                        <?php else : ?>
                                            <a data-toggle="tooltip" data-placement="left" title="Input Logbook" class="inputlogbook" href="<?= base_url(); ?>logbook/showlogbook/<?= $iku['id_iku']; ?>"><span style="color:forestgreen;"><i class="fas fa-fw fa-chart-line"></i></span></a>

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