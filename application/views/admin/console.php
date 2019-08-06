<style>
    .btn-utility {
        padding: 2px 2px 2px 2px;
        margin-top: 2px;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Card -->
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <!-- Log Activity -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#log-activity" role="tab">Log Activity</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#data-selector" role="tab">Data Selector</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                <!-- Log Table -->
                <div class="tab-pane fade show active mt-3" id="log-activity" role="tabpanel" aria-labelledby="nav-home-tab">
                    <table class="table table-striped table-bordered table-hover" id="log-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="text-center">No</th>
                                <th scope="col" class="text-center">Username</th>
                                <th scope="col" class="text-center">Waktu</th>
                                <th scope="col" class="text-center">Log</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($log_data as $activity) : ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $activity['log_user']; ?></td>
                                    <td><?= $activity['log_time']; ?></td>
                                    <td><?= $activity['log_desc']; ?></td>

                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- End Log Table -->

                <div class="tab-pane fade" id="data-selector" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form action="" method="get" class="">
                        <div class="form-row mt-2">
                            <div class="form-group col-md-2">
                                <label for="inputState" style="padding-left:10px"><b>Tipe Data</b></label>
                                <select id="tipe-data" name="tipe-data" class="selectpicker">
                                    <option value="kontrak">Kontrak Kinerja</option>
                                    <option value="iku">Indikator Kinerja Utama</option>
                                    <option value="logbook">Logbook</option>
                                </select>
                            </div>

                            <div class="form-group col-md-2 ml-3">
                                <label for="inputCity">Keyword</label>
                                <input type="text" class="form-control" id="keyword" name="keyword">
                            </div>
                            <br>
                            <button class="btn btn-primary btn-sm ml-3 btn-utility" type="submit"><i class="fas fa-fw fa-search"></i> Cari Data</button>
                            <button class="btn btn-danger btn-sm ml-3 btn-utility" type="button"><i class="fas fa-fw fa-undo-alt"></i> Reset Hasil Pencarian</button>
                    </form>
                </div>
            </div>
            <!-- End Log Activity -->
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->