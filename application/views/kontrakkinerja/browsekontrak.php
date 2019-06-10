<style>
    .card-header {
        marg
    }

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


    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
    <?php if ($this->session->flashdata('flash')) : ?>


    <?php endif; ?>

    <div class="card shadow">

        <div class="card-header">
            <div class="row">
                <div class="col-sm">
                    <h4><?= $title; ?></h4>
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
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center" scope="col">Jenis Kontrak Kinerja</th>
                                <th class="text-center" scope="col">Nomor Kontrak Kinerja</th>
                                <th class="text-center" scope="col">Periode Pelaksanaan</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Status Validasi</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($kontrak_kinerja as $kontrak) : ?>
                                <tr>
                                    <th class="text-center" scope="row"><?= $i; ?></th>
                                    <td><?= $kontrak['kontrakkinerjake']; ?></td>
                                    <td><?= $kontrak['nomorkk']; ?></td>
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
                                        <a data-toggle="tooltip" data-placement="left" title="Edit" href="<?= base_url(); ?>kontrakkinerja/editkontrak/<?= $kontrak['id']; ?> "><i class="fas fa-fw fa-edit"></i></a>
                                        <a data-toggle="tooltip" data-placement="left" title="Delete" class="hapus-kontrak" href="<?= base_url(); ?>kontrakkinerja/hapuskontrak/<?= $kontrak['id']; ?> "><span style="color:red;"><i class="fas fa-fw fa-trash"></i></span></a>

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