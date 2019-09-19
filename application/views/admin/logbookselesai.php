<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="card shadow border-left-primar">
        <div class="card-header">
            <h4 class="text-gray-800"><span style="color:royalblue;font-weight:bold;"><?= $title; ?></h4>
        </div></span>
        <div class="card-body">

            <form action="<?= base_url('admin/filterlogbookselesai') ?>" method="get">
                <div class="form-group row mt-2 ">
                    <label for="pilihbulan" class="col-lg-1 col-sm-2 pr-1 col-form-label" style="margin-right:10px">Pilih Bulan</label>
                    <div class="select">
                        <select class="selectpicker mr-2" name="periodepelaporan" data-live-search="true" data-width="125px">
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
                    <br>
                    <button class="btn btn-primary btn-sm ml-3" type="submit"><i class="fas fa-fw fa-filter"></i> Filter Data</button>
                    <button class="btn btn-danger btn-sm ml-3" onclick="location.href='<?= base_url('admin/logbookselesai') ?>' " type="button"><i class="fas fa-fw fa-undo-alt"></i> Reset Hasil Pencarian</button>

                </div>
            </form>
            <table class="table table-bordered table-hover mt-1" id="logbookselesai">
                <thead class="thead-light" style="text-align:center">
                    <tr>
                        <th scope="col" class="nomor selesai">No</th>
                        <th scope="col" class="selesai">Nama Pegawai</th>
                        <th scope="col" class="selesai">Jumlah Logbook</th>
                        <th scope="col" class="selesai">Periode</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($logbookclear as $clear) : ?>
                        <tr class="selesai">
                            <th scope="row" style="text-align:center" class="nomor"><?= $i; ?></th>
                            <td class="selesai text-center"><?= $clear['nama']; ?></td>
                            <td class="selesai text-center">Sudah menyerahkan <b><?= $clear['total']; ?></b> Logbook</td>
                            <td class="selesai text-center"><?= $clear['periode']; ?>
                            </td>
                            <div class="datanama" value="<?= $clear['nama'] ?>"></div>
                            <div class="dataperiode" value="<?= $clear['periode'] ?>"></div>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->