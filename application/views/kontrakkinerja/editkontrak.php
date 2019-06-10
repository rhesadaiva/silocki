<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="form-input">
        <form action="" method="post">

            <div class="row">
                <div class="col-lg">

                    <div class="card shadow">
                        <div class="card-header py-3">
                            <h4><?= $title; ?></h4>
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="id_kontrak" value="<?= $kontrak['id']; ?>">

                            <div class="form-group row">
                                <label for="kontrakkinerjake" class="col-sm-3 col-form-label">Seri Kontrak Kinerja</label>
                                <div class="col-sm-6">
                                    <select class="selectpicker" name="kontrakkinerjake">
                                        <option value="Pertama">Pertama</option>
                                        <option value="Kedua">Kedua</option>
                                        <option value="Ketiga">Ketiga</option>
                                        <option value="Keempat">Keempat</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nomorkontrakkinerja" class="col-sm-3 col-form-label">Nomor Kontrak Kinerja</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nomorkontrakkinerja">
                                    <?= form_error('nomorkontrakkinerja', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tanggalmulai" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="tanggalmulai">
                                    <?= form_error('tanggalmulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tanggalselesai" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="tanggalselesai">
                                    <?= form_error('tanggalselesai', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="is_active" class="col-sm-3 col-form-label sr-only">Is_active?</label>
                                <div class="col-sm-6">
                                    <input type="hidden" class="form-control" name="is_active" value="1" readonly>
                                </div>
                            </div>



                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-warning ml-2" onclick="window.history.go(-1); return false;"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
                                    <button type="submit" name="buttoneditkontrak" id="buttoneditkontrak" class="btn btn-success"><i class="fas fa-fw fa-sign-in-alt"></i> Simpan</button>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->