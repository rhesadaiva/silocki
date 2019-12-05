<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="form-input">
        <form action="" method="post">

            <div class="row">
                <div class="col-lg">

                    <div class="card shadow border-left-info">
                        <div class="card-header py-3">
                            <h5 class="editkontrak"><?= $title; ?></h5>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="id_kontrak" value="<?= $kontrak['id_kontrak']; ?>">
                            <div class="form-group row">
                                <label for="kontrakkinerjake" class="col-sm-3 col-form-label">Seri Kontrak Kinerja</label>
                                <div class="col-sm-6">
                                    <select class="selectpicker" name="kontrakkinerjake">
                                        <?php foreach ($serikontrak as $seri) : ?>
                                            <?php if ($seri == $kontrak['kontrakkinerjake']) :  ?>
                                                <option value="<?= $seri; ?>" selected><?= $seri; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $seri; ?>"><?= $seri; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nomorkontrakkinerja" class="col-sm-3 col-form-label">Nomor Kontrak Kinerja</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nomorkontrakkinerja" value="<?= $kontrak['nomorkk']; ?>">
                                    <?= form_error('nomorkontrakkinerja', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tanggalmulai" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="tanggalmulai" value="<?= $kontrak['tanggalmulai']; ?>">
                                    <?= form_error('tanggalmulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tanggalselesai" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" name="tanggalselesai" value="<?= $kontrak['tanggalselesai']; ?>">
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
                                    <button type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
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