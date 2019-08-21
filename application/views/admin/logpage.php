<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="flashdata-pengumuman" data-flashdatapengumuman="<?= $this->session->flashdata('pengumuman'); ?>"></div>
    <?php if ($this->session->flashdata('pengumuman')) : ?>

    <?php endif; ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Console Card -->
    <div class="card">
        <div class="card-body">

            <!-- Console Navs -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-log-tab" data-toggle="tab" href="#nav-log" role="tab">Log Akitifitas</a>
                    <a class="nav-item nav-link" id="nav-config-tab" data-toggle="tab" href="#nav-config" role="tab">Konfigurasi</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                <!-- Log Activity -->
                <div class="tab-pane fade show active mt-3" id="nav-log" role="tabpanel">
                    <table class="table table-hover table-bordered log-table" id="log-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">Username</th>
                                <th scope="col" class="text-center">Waktu</th>
                                <th scope="col" class="text-center">Deskripsi Log</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($log_data as $activity) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $activity['log_user']; ?></td>
                                <td><?= indonesian_date2($activity['log_time']); ?></td>
                                <td><?= $activity['log_desc']; ?></td>

                            </tr>
                            <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- End Log Activity -->

                <!-- Config -->
                <div class="tab-pane fade" id="nav-config" role="tabpanel">
                    <div class="col-sm card-pengumuman">
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-sm">
                                        <h4 class="pengumumanjudul">Panel Pengumuman</h4>
                                    </div>
                                    <div class="col-sm">
                                        <button type="button" class="btn-sm btn btn-primary float-right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-fw fa-folder-plus"></i> Tambah Data</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <thead class="thead-light">
                                        <tr class="pengumumantr">
                                            <th scope="col">No</th>
                                            <th scope="col">Isi Pengumuman</th>
                                            <th scope="col">Tanggal Pengumuman</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($notifikasi as $notif) : ?>
                                        <tr class="pengumumanisi">
                                            <th scope="row"><?= $i; ?></th>
                                            <td class="contentpengumuman"><?= $notif['content']; ?></td>
                                            <td class="tglpengumuman"><?= tgl_indo($notif['tglrekam']); ?></td>
                                            <td class="aksipengumuman">
                                                <a data-toggle="tooltip" data-placement="left" title="Hapus Pengumuman" class="hapuspengumuman" href="<?= base_url(); ?>admin/hapuspengumuman/<?= $notif['id']; ?>"><span style=" color:red;"><i class="fas fa-fw fa-trash"></i></span></a>
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
                <!-- End Config -->

            </div>

        </div>
    </div>

    <!-- MODAL TAMBAH PENGUMUMAN -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Pengumuman</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Tambah Pengumuman -->
                    <form action="<?= base_url('admin/tambahpengumuman'); ?>" method="post">

                        <div class="form-group">
                            <label for="contentpeng" style="color: black;">Isi Pengumuman</label>
                            <textarea class="form-control rounded-1" input-type="text" name="contentisi" rows="2"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-sm float-right"><i class="fas fa-fw fa-save"></i>Tambah Data</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- END DATA, NEVER EDIT ANYTHING BELOW THIS -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->