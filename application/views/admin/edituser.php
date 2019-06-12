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

                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Nama Pegawai</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nama" value="<?= $userdetail['nama'] ?>">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nip" class="col-sm-3 col-form-label">Nomor Induk Pegawai</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" name="nip" value="<?= $userdetail['nip']; ?>">
                                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pangkat" class="col-sm-3 col-form-label">Pangkat/Golongan</label>
                                <div class="col-sm-6">
                                    <select class="selectpicker" name="pangkat" data-live-search="true" data-width="fit" value="<?= $userdetail['pangkat/golongan'] ?>">
                                        <?php foreach ($pangkat as $p) : ?>
                                            <option value="<?= $p['pangkat/golongan']; ?>"><?= $p['pangkat/golongan']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="role" class="col-sm-3 col-form-label">Hak Akses</label>
                                <div class="col-sm-6">
                                    <select class="selectpicker" name="role" data-live-search="true" data-width="fit">
                                        <?php foreach ($role as $r) : ?>
                                            <option value="<?= $r['id']; ?>"><?= $r['level']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="seksisub" class="col-sm-3 col-form-label">Seksi / Subseksi</label>
                                <div class="col-sm-6">
                                    <select class="selectpicker" name="seksisub" data-live-search="true" data-width="fit">
                                        <?php foreach ($seksi as $s) : ?>
                                            <option value="<?= $s['seksi/subseksi']; ?>"><?= $s['seksi/subseksi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="atasan" class="col-sm-3 col-form-label">Atasan</label>
                                <div class="col-sm-6">
                                    <select class="selectpicker" name="atasan" data-live-search="true" data-width="fit">
                                        <?php foreach ($user_data as $user) : ?>
                                            <option value="<?= $user['nama']; ?>"><?= $user['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-warning" onclick="window.history.go(-1); return false;"><i class="fas fa-fw fa-undo-alt"></i> Kembali</button>
                                    <button type="submit" name="buttonedituser" id="buttonedituser" class="btn btn-success"><i class="fas fa-fw fa-sign-in-alt"></i> Simpan</button>
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