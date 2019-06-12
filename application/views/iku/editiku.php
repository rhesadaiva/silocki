<style>
    h5 {
        color: royalblue;
        font-weight: bold;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="form-input">
        <form action="" method="post">

            <div class="row">
                <div class="col-lg">

                    <div class="card shadow border-left-info">
                        <div class="card-header py-3">
                            <h5><?= $title; ?></h5>
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="id_iku" value="<?= $iku['id_iku'] ?>">

                            <div class="form-group row">
                                <label for="kodeiku" class="col-sm-3 col-form-label">Kode IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="kodeiku" value="<?= $iku['kodeiku']; ?>">
                                    <?= form_error('kodeiku', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="namaiku" class="col-sm-3 col-form-label">Nama IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="namaiku" value="<?= $iku['namaiku']; ?>">
                                    <?= form_error('namaiku', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="formulaiku" class="col-sm-3 col-form-label">Formula IKU</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control rounded-1" input-type="text" id="formulaiku" name="formulaiku" rows="2" value="<?= $iku['formulaiku']; ?>"></textarea>
                                    <?= form_error('formulaiku', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="targetiku" class="col-sm-3 col-form-label">Target IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="targetiku" value="<?= $iku['targetiku']; ?>">
                                    <?= form_error('targetiku', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nilaitertinggi" class="col-sm-3 col-form-label">Nilai Tertinggi IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nilaitertinggi" value="<?= $iku['nilaitertinggi']; ?>">
                                    <?= form_error('nilaitertinggi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="satuanpengukuran" class="col-sm-3 col-form-label">Satuan Pengukuran IKU</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker" name="satuanpengukuran">
                                        <?php foreach ($satuanpengukuran as $sat) : ?>
                                            <?php if ($sat == $iku['satuanpengukuran']) : ?>
                                                <option value="<?= $sat; ?>" selected><?= $sat; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $sat; ?>"><?= $sat; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="konsolidasiperiode" class="col-sm-3 col-form-label">Konsolidasi Periode IKU</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker" name="konsolidasiperiode">
                                        <?php foreach ($konsolidasiperiode as $kon) : ?>
                                            <?php if ($kon == $iku['konsolidasiperiodeiku']) : ?>
                                                <option value="<?= $kon; ?>" selected><?= $kon; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $kon; ?>"><?= $kon; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-5 mt-3">
                                    <button type="button" class="btn btn-warning ml-2" onclick="window.history.go(-1); return false;"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
                                    <button type="submit" name="buttonikubaru" id="buttonikubaru" class="btn btn-success"><i class="fas fa-fw fa-sign-in-alt"></i> Simpan</button>
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