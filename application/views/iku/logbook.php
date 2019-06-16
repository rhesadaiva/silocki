<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="card shadow border-left-primary">
        <div class="card-header">
            <div class="row">
                <div class="col-sm">
                    <h4 class="judul"><?= $title; ?></h4>
                </div>
                <div class="col-sm">
                    <button type="button" class="btn btn-warning btn-sm float-right" onclick="window.history.go(-1); return false;"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <tbody>

                    <tr>
                        <th scope="row" width="150px">Kode IKU</th>
                        <td><?= $indikator['kodeiku']; ?></td>
                    </tr>

                    <tr>
                        <th scope="row">Nama IKU</th>
                        <td><?= $indikator['namaiku']; ?></td>
                    </tr>

                    <tr>
                        <th scope="row">Formula IKU</th>
                        <td><?= $indikator['formulaiku']; ?></td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

    <div class="card shadow mt-3 border-left-success">
        <div class="card-header">
            <h4 class="logbook">Perekaman Logbook Pegawai</h4>
        </div>
        <div class="card-body">
            <!-- NAVBAR -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-logbook nav-link active" id="nav-rekamlogbook-tab" data-toggle="tab" href="#nav-rekamlogbook" role="tab"><i class="fas fa-fw fa-pencil-alt"></i> Rekam Logbook</a>
                    <a class="nav-item nav-logbook nav-link" id="nav-detaillogbook-tab" data-toggle="tab" href="#nav-detaillogbook" role="tab"><i class="fas fa-fw fa-search"></i> Detail Logbook</a>
                </div>
            </nav>

            <!-- START FORM PENGISIAN -->
            <div class="tab-content pt-1" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-rekamlogbook" role="tabpanel">

                    <form action="" method="post">

                        <div class="form-group row">
                            <label for="id_iku" class="col-sm-2 col-form-label sr-only">ID IKU</label>
                            <div class="col-sm-2">
                                <input type="hidden" class="form-control" name="id_iku" value="<?= $indikator['id_iku']; ?>" readonly>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="kodeiku" class="col-sm-2 col-form-label sr-only">Kode IKU</label>
                            <div class="col-sm-2">
                                <input type="hidden" class="form-control" name="kodeiku" value="<?= $indikator['kodeiku']; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="periodepelaporan" class="col-sm-2 col-form-label">Periode Pelaporan</label>
                            <div class="col-sm-6">
                                <select class="selectpicker" name="periodepelaporan" data-live-search="true">
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
                        </div>

                        <div class="form-group row">
                            <label for="perhitungan" class="col-sm-2 col-form-label">Perhitungan</label>
                            <div class="col-sm-6">
                                <textarea class="form-control rounded-1" name="perhitungan"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="realisasipadabulan" class="col-sm-2 col-form-label">Realisasi Pada Bulan Pelaporan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="realisasipadabulan">
                                <?= form_error('realisasipadabulan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="realisasisdbulan" class="col-sm-2 col-form-label">Realisasi s.d Bulan Pelaporan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="realisasisdbulan">
                                <?= form_error('realisasisdbulan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-6">
                                <textarea class="form-control rounded-1" name="keterangan"></textarea>
                                <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>

                        <div class="form-group row pt-4">
                            <div class="col-sm-6">
                                <button type="submit" name="buttonlogbook" id="buttonlogbookbaru" class="btn btn-success"><i class="fas fa-fw fa-save"></i> Simpan Logbook</button>
                            </div>
                        </div>
                    </form>

                </div>
                <!-- END FORM PENGISIAN -->

                <div class="tab-pane fade" id="nav-detaillogbook" role="tabpanel">
                    <table class="table table-bordered table-hover mt-3" id="browselogbook" name="browselogbook">
                        <thead class="thead-light">
                            <tr class="tableheadlogbook">
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center" scope="col">Periode Pelaporan</th>
                                <th class="text-center perhitungan" scope="col">Perhitungan</th>
                                <th class="text-center realisasi" scope="col">Realisasi Pada Bulan Pelaporan</th>
                                <th class="text-center realisasi" data-valign="middle" data-halign="center" scope="col">Realisasi s.d Bulan Pelaporan</th>
                                <th class="text-center keterangan" data-valign="middle" data-halign="center" scope="col">Keterangan</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Waktu Rekam</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $i = 1 ?>
                            <?php foreach ($logbookdetail as $logbook) : ?>
                                <tr class="detail">
                                    <th class="nomor" scope="row"><?= $i; ?></th>
                                    <td class="periode"><?= $logbook['periode']; ?></td>
                                    <td><?= $logbook['perhitungan']; ?></td>
                                    <td><?= $logbook['realisasibulan']; ?></td>
                                    <td><?= $logbook['realisasiterakhir']; ?></td>
                                    <td><?= $logbook['ket']; ?></td>
                                    <td class="wakturekam"><?= $logbook['wakturekam']; ?></td>

                                    <td class="aksi">
                                        <?php if ($logbook['is_sent'] == 0) : ?>

                                            <a data-toggle="tooltip" data-placement="left" title="Kirim Ke Atasan" class="button-kirimlogbook" href="<?= base_url(); ?>logbook/kirimkeatasan/<?= $logbook['id_logbook']; ?>"><span style="color:blue;"><i class="fas fa-fw fa-paper-plane"></i></span></a>
                                            <a data-toggle="tooltip" data-placement="left" title="Hapus Logbook" class="button-hapuslogbook" href="<?= base_url(); ?>logbook/hapuslogbook/<?= $logbook['id_logbook']; ?> "><span style="color:red;"><i class="fas fa-fw fa-trash"></i></span></a>

                                        <?php else : ?>

                                            <a data-toggle="tooltip" data-placement="left" title="Logbook Terkunci" class="button-locklgobook" id="button-locklogbook"><span style=" color:#daa520;"><i class="fas fa-fw fa-lock"></i></span></a>

                                        <?php endif; ?>
                                    </td>

                                </tr>

                            </tbody>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </table>
                </div>

            </div>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->