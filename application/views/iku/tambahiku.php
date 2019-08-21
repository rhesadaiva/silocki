<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="form-input">
        <form action="<?= base_url('iku/rekamiku'); ?>" method="post">

            <div class="row">
                <div class="col-lg">

                    <div class="card shadow border-left-info">
                        <div class="card-header py-2">
                            <h4 class="tambahiku"><?= $title; ?></h4>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <label for="nomorkk" class="col-sm-3 col-form-label">Nomor Kontrak Kinerja</label>
                                <div class="col-sm-5">
                                    <?php if ($this->session->userdata('role_id') == 1) : ?>
                                    <select class="selectpicker" name="nomorkk" data-live-search="true" data-width="fit">
                                        <?php foreach ($kontrak_kinerja as $kontrak) : ?>
                                        <option value="<?= $kontrak['nomorkk']; ?>"><?= $kontrak['nomorkk']; ?> - <?= $kontrak['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php else : ?>
                                    <select class="selectpicker" name="nomorkk">
                                        <option value="<?= $kontrak_kinerja['nomorkk']; ?>"><?= $kontrak_kinerja['nomorkk']; ?></option>
                                    </select>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="kodeiku" class="col-sm-3 col-form-label">Kode IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="kodeiku">
                                    <?= form_error('kodeiku', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="namaiku" class="col-sm-3 col-form-label">Nama IKU</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control rounded-1" input-type="text" id="namaiku" name="namaiku" rows="2"></textarea>
                                    <?= form_error('namaiku', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="formulaiku" class="col-sm-3 col-form-label">Formula IKU</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control rounded-1" input-type="text" id="formulaiku" name="formulaiku" rows="2"></textarea>
                                    <?= form_error('formulaiku', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="targetiku" class="col-sm-3 col-form-label">Target IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="targetiku">
                                    <?= form_error('targetiku', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nilaitertinggi" class="col-sm-3 col-form-label">Nilai Tertinggi IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nilaitertinggi">
                                    <?= form_error('nilaitertinggi', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="satuanpengukuran" class="col-sm-3 col-form-label">Satuan Pengukuran IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="satuanpengukuran">
                                    <?= form_error('satuanpengukuran', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="aspektarget" class="col-sm-3 col-form-label">Aspek Target IKU</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker" name="aspektarget">
                                        <option value="Kuantitas">Kuantitas</option>
                                        <option value="Kualitas">Kualitas</option>
                                        <option value="Waktu">Waktu</option>
                                        <option value="Biaya">Biaya</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="penanggungjawab" class="col-sm-3 col-form-label">Unit/Pihak Penanggung Jawab IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="penanggungjawab">
                                    <?= form_error('penanggungjawab', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="penyediadata" class="col-sm-3 col-form-label">Unit/Pihak Penyedia Data IKU</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="penyediadata">
                                    <?= form_error('penyediadata', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sumberdata" class="col-sm-3 col-form-label">Sumber Data</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="sumberdata">
                                    <?= form_error('sumberdata', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="konsolidasiperiode" class="col-sm-3 col-form-label">Konsolidasi Periode IKU</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker" name="konsolidasiperiode">
                                        <option value="Sum">Sum</option>
                                        <option value="Average">Average</option>
                                        <option value="Take Last Known">Take Last Known</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="periodepelaporan" class="col-sm-3 col-form-label">Periode Pelaporan IKU</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker" name="periodepelaporan">
                                        <option value="Bulanan">Bulanan</option>
                                        <option value="Triwulanan">Triwulanan</option>
                                        <option value="Semesteran">Semesteran</option>
                                        <option value="Tahunan">Tahunan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                <label for="nomorpegawai" class="col-sm-3 col-form-label">Set Pegawai</label>
                                <div class="col-sm-5">
                                    <select class="selectpicker" name="nomorpegawai" data-live-search="true" data-width="fit">
                                        <?php foreach ($nip as $n) : ?>
                                        <option value="<?= $n['nip']; ?>"><?= $n['nip']; ?> - <?= $n['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php else : ?>
                                <label for="nomorpegawai" class="col-sm-3 col-form-label sr-only">NIP</label>
                                <div class="col-sm-5">
                                    <input type="hidden" class="form-control" name="nomorpegawai" value="<?= $this->session->userdata('nip'); ?>" readonly>
                                </div>
                                <?php endif; ?>
                            </div>


                            <div class="form-group row">
                                <div class="col-sm-5 mt-3">
                                    <button type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
                                    <button type="submit" name="buttonikubaru" id="buttonikubaru" class="btn btn-success"><i class="fas fa-fw fa-sign-in-alt"></i> Tambahkan</button>
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