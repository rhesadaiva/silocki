<style>
    th.nomor {
        width: 80px;
        text-align: center;
    }
</style>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="card">
        <div class="card-header">
            <h5 class="text-gray-800">test</h5>
        </div>
        <div class="card-body">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"><i class="far fa-fw fa-folder-open"></i> Belum mengajukan Logbook</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Logbook yang belum disetujui atasan</a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form action="<?= base_url('admin/caribelumrekamlogbook') ?>" method="get">
                        <div class="form-group row mt-4">
                            <label for="pilihbulan" class="col-lg-1 col-sm-2 pr-1 col-form-label" style="margin-right:10px">Pilih Bulan</label>
                            <div class="select">
                                <select class="selectpicker mr-2" name="periodepelaporan" data-live-search="true" data-width="125px">
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary btn-sm" style="width:50px;margin-left:30px" value="Cari">
                            <a class="btn btn-danger btn-sm ml-2 py-auto" href="<?= base_url('admin/monitoring_pegawai') ?>" role="button">Reset</a>
                        </div>
                    </form>
                    <table class="table table-bordered table-hover mt-1">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="nomor">No</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Keterangan</th>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($belumlogbook as $belum) : ?>
                                <tr>
                                    <th scope="row" class="nomor"><?= $i; ?></th>
                                    <td><?= $belum['nama']; ?></td>
                                    <td>Pegawai tersebut belum menyerahkan logbook untuk bulan <?= $belum['periode']; ?></td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- END PEGAWAI BELUM SERAHKAN LOGBOOK -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->