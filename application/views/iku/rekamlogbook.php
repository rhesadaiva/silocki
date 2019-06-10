<form action="<?= base_url(''); ?>iku/aksirekamlogbook" method="post">

    <div class="form-group row">
        <label for="unique_iku" class="col-sm-2 col-form-label">ID Unik IKU</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="unique_iku" value="<?= $indikator['unique_iku']; ?>" readonly>
        </div>
    </div>



    <div class="form-group row">
        <label for="kodeiku" class="col-sm-2 col-form-label">Kode IKU</label>
        <div class="col-sm-2">
            <input type="text" class="form-control" name="kodeiku" value="<?= $indikator['kodeiku']; ?>" readonly>
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