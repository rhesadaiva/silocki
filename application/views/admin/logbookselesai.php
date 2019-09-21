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
                        <th>Detail Logbook</th>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($logbookclear as $clear) : ?>
                        <tr class="selesai">
                            <th scope="row" style="text-align:center" class="nomor"><?= $i; ?></th>
                            <td class="selesai text-center" id="datapegawainama"><?= $clear['nama']; ?></td>
                            <td class="selesai text-center">Sudah menyerahkan <b><?= $clear['total']; ?></b> Logbook</td>
                            <td class="selesai text-center" id="periodepegawailogbook"><?= $clear['periode']; ?>
                            </td>

                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modaldetail" id="btn-detailmodal"><i class="fas fa-fw fa-search"></i> Lihat Detail</button>

                            </td>
                            <div id="datanama" data-nama="<?= $clear['nama'] ?>"></div>
                            <div id="dataperiode" data-periode="<?= $clear['periode'] ?>"></div>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<!-- Test Modal -->
<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" id="modaldetail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Logbook</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="title">
                    <table class="table">
                        <tbody id="identitaslogbook">

                        </tbody>
                    </table>
                </div>
                <div class="contentdetail mt-1">
                    <table class="table table-bordered">
                        <thead class="thead-light" style="text-align:center">
                            <tr>

                                <th scope="col" class="headerdetailmodal">Kode IKU</th>
                                <th scope="col" class="headerdetailmodal">Nama IKU</th>
                                <th scope="col" class="headerdetailmodal">Perhitungan</th>
                                <th scope="col" class="headerdetailmodal">Realisasi Bulan Pelaporan</th>
                                <th scope="col" class="headerdetailmodal">Realisasi s.d Bulan Pelaporan</th>
                                <th scope="col" class="headerdetailmodal">Keterangan</th>
                                <th scope="col" class="headerdetailmodal">Waktu Rekam</th>
                                <th scope="col" class="headerdetailmodal">Tanggal Persetujuan</th>
                            </tr>
                        </thead>
                        <tbody id="detaillogbook">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->