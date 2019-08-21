<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="form-input">
        <form action="" method="post">

            <div class="row">
                <div class="col-lg">

                    <div class="card shadow border-left-info">
                        <div class="card-header py-3">
                            <h5 class="editiku"><?= $title; ?></h5>
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
                                    <textarea class="form-control rounded-1" input-type="text" id="namaiku" name="namaiku" rows="2"><?= $iku['namaiku']; ?></textarea>
                                    <?= form_error('namaiku', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="formulaiku" class="col-sm-3 col-form-label">Formula IKU</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control rounded-1" input-type="text" id="formulaiku" name="formulaiku" rows="2"><?= $iku['formulaiku']; ?></textarea>
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
                                    <input type="text" class="form-control" name="satuanpengukuran" value="<?= $iku['satuanpengukuran']; ?>">
                                    <?= form_error('satuanpengukuran', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="aspektarget" class="col-sm-3 col-form-label">Aspek Target IKU</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker" name="aspektarget">
                                        <?php foreach ($aspektarget as $aspek) : ?>
                                        <?php if ($aspek == $iku['aspektarget']) : ?>
                                        <option value="<?= $aspek; ?>" selected><?= $aspek; ?></option>
                                        <?php else : ?>
                                        <option value="<?= $aspek; ?>"><?= $aspek; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="penanggungjawab" class="col-sm-3 col-form-label">Unit/Pihak Penanggung Jawab IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="penanggungjawab" value="<?= $iku['penanggungjawab']; ?>">
                                    <?= form_error('penanggungjawab', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="penyediadata" class="col-sm-3 col-form-label">Unit/Pihak Penyedia Data IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="penyediadata" value="<?= $iku['penyediadata']; ?>">
                                    <?= form_error('penyediadata', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sumberdata" class="col-sm-3 col-form-label">Sumber Data</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="sumberdata" value="<?= $iku['sumberdata']; ?>">
                                    <?= form_error('sumberdata', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="konsolidasiperiode" class="col-sm-3 col-form-label">Konsolidasi Periode IKU</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker" name="konsolidasiperiode">
                                        <?php foreach ($konsolidasiperiode as $konsolidasi) : ?>
                                        <?php if ($konsolidasi == $iku['konsolidasiperiodeiku']) : ?>
                                        <option value="<?= $konsolidasi; ?>" selected><?= $konsolidasi; ?></option>
                                        <?php else : ?>
                                        <option value="<?= $konsolidasi; ?>"><?= $konsolidasi; ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="periodepelaporan" class="col-sm-3 col-form-label">Periode Pelaporan IKU</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker" name="periodepelaporan">
                                        <?php foreach ($periodepelaporan as $periode) : ?>
                                        <?php if ($periode == $iku['periodepelaporan']) : ?>
                                        <option value="<?= $periode; ?>" selected><?= $periode ?></option>
                                        <?php else : ?>
                                        <option value="<?= $periode; ?>"><?= $periode ?></option>
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