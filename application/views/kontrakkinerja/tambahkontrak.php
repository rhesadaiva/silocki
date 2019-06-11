<style>
    h5 {
        color: royalblue;
        font-weight: bold;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="form-input">
        <form action="<?= base_url('kontrakkinerja/tambahkontrak'); ?>" method="post">

            <div class="row">
                <div class="col-lg">

                    <div class="card shadow border-left-info">
                        <div class="card-header py-3">
                            <h5><?= $title; ?></h5>
                        </div>
                        <div class="card-body">

                            <div class="form-group row">
                                <?php if ($this->session->userdata('role_id') == 1) : ?>
                                    <label for="nipkk" class="col-sm-3 col-form-label">Set Pegawai</label>
                                    <div class="col-sm-6">
                                        <select class="selectpicker" name="nipkk" data-live-search="true" data-width="fit">
                                            <?php foreach ($nip as $n) : ?>
                                                <option value="<?= $n['nip']; ?>"><?= $n['nip']; ?> - <?= $n['nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                <?php else : ?>
                                    <label for="nipkk" class="col-sm-3 col-form-label sr-only">NIP</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" class="form-control" name="nipkk" value="<?= $this->session->userdata('nip'); ?>" readonly>
                                    </div>
                                <?php endif; ?>
                            </div>

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
                                    <button type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
                                    <button type="submit" name="buttonkontrakbaru" id="buttonkontrakbaru" class="btn btn-success"><i class="fas fa-fw fa-sign-in-alt"></i> Simpan</button>
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