<style>
    th,
    tr {
        text-align: center;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->


    <div class="card shadow border-left-primary">
        <div class="card-header">
            <h4 class="text-gray-800"><span style="color:royalblue;font-weight:bold"><?= $title; ?></span></h4>
        </div>
        <div class="card-body">

            <form action="<?= base_url('admin/filterlogbookbelumdisetujui') ?>" method="get">
                <div class="form-group row mt-2 ">
                    <label for="pilihbulan" class="col-lg-1 col-sm-2 pr-1 col-form-label" style="margin-right:10px">Pilih Bulan</label>
                    <div class="select">
                        <select class="selectpicker mr-2" name="periodepelaporan" data-live-search="true" data-width="125px">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <br>
                    <button class="btn btn-primary btn-sm ml-3" type="submit"><i class="fas fa-fw fa-filter"></i> Filter Data</button>
                    <button class="btn btn-danger btn-sm ml-3" onclick="location.href='<?= base_url('admin/logbookbelumdisetujui') ?>' " type="button"><i class="fas fa-fw fa-undo-alt"></i> Reset Hasil Pencarian</button>

                </div>
            </form>
            <table class="table table-bordered table-hover mt-1">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="nomor">No</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Periode</th>

                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($belumlogbook as $belum) : ?>
                        <?php if ($belum['total'] < 5) : ?>
                            <tr>
                                <th scope="row" class="nomor"><?= $i; ?></th>
                                <td><?= $belum['nama']; ?></td>
                                <td>Ada <b><?= $belum['total']; ?></b> Logbook yang belum divalidasi oleh atasan</td>
                                <td>
                                    <?php switch ($belum['periode']) {
                                        case 1:
                                            echo "Januari";
                                            break;

                                        case 2:
                                            echo "Februari";
                                            break;

                                        case 3:
                                            echo "Maret";
                                            break;

                                        case 4:
                                            echo "April";
                                            break;

                                        case 5:
                                            echo "Mei";
                                            break;

                                        case 6:
                                            echo "Juni";
                                            break;

                                        case 7:
                                            echo "Juli";
                                            break;

                                        case 8:
                                            echo "Agustus";
                                            break;

                                        case 9;
                                            echo "September";
                                            break;

                                        case 10;
                                            echo "Oktober";
                                            break;

                                        case 11;
                                            echo "November";
                                            break;

                                        case 12;
                                            echo "Desember";
                                            break;
                                    }
                                    ?>
                                </td>

                            </tr>
                        <?php endif; ?>

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