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
                        <input type="hidden" id="idiku" value="<?= $this->uri->segment(3); ?>">
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
            <div class="modaltambah">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rekamlogbook">
                    <i class="fas fa-fw fa-chart-line"></i> Rekam Logbook Baru
                </button>
            </div>
            <table class="table table-bordered table-hover mt-3" id="browselogbook" name="browselogbook">
                <thead class="thead-light">
                    <tr class="tableheadlogbook">
                        <th class="text-center" data-valign="middle" data-halign="center" scope="col">No.</th>
                        <th class="text-center" scope="col">Periode Pelaporan</th>
                        <th class="text-center perhitungan" scope="col">Perhitungan</th>
                        <th class="text-center realisasiawal" scope="col">Realisasi Pada Bulan Pelaporan</th>
                        <th class="text-center realisasiterakhir" data-valign="middle" data-halign="center" scope="col">Realisasi s.d Bulan Pelaporan</th>
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
                        <td class="periode">
                            <?php switch ($logbook['periode']) {
                                    case 1:
                                        echo "Januari";
                                        break;

                                    case 2:
                                        echo "Februari";
                                        break;

                                    case 3:
                                        echo "Maret";
                                        break;

                                    case 4:
                                        echo "April";
                                        break;

                                    case 5:
                                        echo "Mei";
                                        break;

                                    case 6:
                                        echo "Juni";
                                        break;

                                    case 7:
                                        echo "Juli";
                                        break;

                                    case 8:
                                        echo "Agustus";
                                        break;

                                    case 9;
                                        echo "September";
                                        break;

                                    case 10;
                                        echo "Oktober";
                                        break;

                                    case 11;
                                        echo "November";
                                        break;

                                    case 12;
                                        echo "Desember";
                                        break;
                                }
                                ?>
                        </td>
                        <td class="perhitungan"><?= $logbook['perhitungan']; ?></td>
                        <td class="realisasi"><?= $logbook['realisasibulan']; ?></td>
                        <td class="realisasiterakhir"><?= $logbook['realisasiterakhir']; ?></td>
                        <td class="text-justify keterangan"><?= $logbook['ket']; ?></td>
                        <td class="wakturekam"><?= indonesian_date2($logbook['wakturekam']); ?></td>

                        <td class="aksi">
                            <?php if ($logbook['is_sent'] == 0) : ?>

                            <a data-toggle="tooltip" data-placement="left" title="Kirim Ke Atasan" class="button-kirimlogbook" href="<?= base_url(); ?>logbook/kirimkeatasan/<?= $logbook['id_logbook']; ?>" id-logbook="<?= $logbook['id_logbook'] ?>"><span style="color:blue;"><i class="fas fa-fw fa-paper-plane"></i></span></a>

                            <a data-toggle="tooltip" data-placement="left" title="Hapus Logbook" class="button-hapuslogbook" href="<?= base_url(); ?>logbook/hapuslogbook/<?= $logbook['id_logbook']; ?> " id-logbook="<?= $logbook['id_logbook'] ?>"><span style="color:red;"><i class="fas fa-fw fa-trash"></i></span></a>

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

    <!-- Modal Tambah Logbook -->
    <div class="modal fade" id="rekamlogbook" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rekam Logbook Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('logbook/rekamlogbook') ?>" method="post" class="inputlogbookbaru">

                        <div class="form-group row">
                            <label for="id_iku" class="col-sm-2 col-form- sr-only">ID IKU</label>
                            <div class="col-sm-2">
                                <input type="hidden" class="form-control" name="id_iku" id="id_iku" value="<?= $idiku; ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kodeiku" class="col-sm-2 col-form-label sr-only">Kode IKU</label>
                            <div class="col-sm-2">
                                <input type="hidden" class="form-control" name="kodeiku" id="kode_iku" value="<?= $indikator['kodeiku'] ?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="periodepelaporan" class="col-sm-4 col-form-label">Periode Pelaporan</label>
                            <div class="col-sm-8">
                                <select class="selectpicker" name="periodepelaporan">
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="perhitungan" class="col-sm-4 col-form-label">Perhitungan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control rounded-1" name="perhitungan"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="realisasipadabulan" class="col-sm-4 col-form-label">Realisasi Pada Bulan Pelaporan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="realisasipadabulan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="realisasisdbulan" class="col-sm-4 col-form-label">Realisasi s.d Bulan Pelaporan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="realisasisdbulan">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control rounded-1" name="keterangan"></textarea>
                            </div>
                        </div>

                        <!-- <div class="form-group row pt-4">
                            <div class="col-sm-6">
                                <button type="submit" name="buttonlogbook" id="buttonlogbookbaru" class="btn btn-success"><i class="fas fa-fw fa-save"></i> Simpan Logbook</button>
                            </div>
                        </div> -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="window.location.reload()"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
                            <button type="submit" id="btn-logbookbaru" class="btn btn-success"><i class="fas fa-fw fa-save"></i> Simpan Logbook</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->