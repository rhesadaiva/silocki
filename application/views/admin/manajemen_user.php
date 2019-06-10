<style>
    th {
        font-size: 14px;
    }

    td {
        text-align: center;
        font-size: 13px;
    }

    .aksi {
        font-size: 15px;
        width: 10%;
        text-align: center;
    }
</style>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

    <div class="card shadow">

        <div class="card-header py-3">

            <!-- Button trigger modal -->
            <a class="btn btn-primary" href="<?= base_url('admin/tambahUser'); ?>" role="button">Link</a>
        </div>

        <div class="card-body">

            <div class="row">

                <div class="col-lg">

                    <table class="table table-bordered table-hover" id="izin">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center" scope="col">Nama</th>
                                <th class="text-center" scope="col">NIP</th>
                                <th class="text-center" scope="col">Pangkat / Golongan</th>
                                <th class="text-center" data-valign="middle" data-halign="center" scope="col">Level</th>
                                <th class="text-center" scope="col">Seksi/Subseksi</th>
                                <th class="text-center" scope="col">Atasan</th>
                                <th class="text-center" scope="col">Aksi</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($user_data as $user) : ?>
                                <tr>
                                    <th class="text-center" scope="row"><?= $i; ?></th>
                                    <td><?= $user['nama']; ?></td>
                                    <td><?= $user['nip']; ?></td>
                                    <td><?= $user['pangkat']; ?></td>
                                    <td><?= $user['level']; ?></td>
                                    <td><?= $user['seksi']; ?></td>
                                    <td><?= $user['atasan']; ?></td>
                                    <td class="aksi">
                                        <a data-toggle="tooltip" data-placement="left" title="Edit" href=""><i class="fas fa-fw fa-edit"></i></a>
                                        <a data-toggle="tooltip" data-placement="left" title="Delete" class="Delete" href="<?= base_url(); ?>izinmuat/hapusizinmuat/<?= $user['id']; ?>"><span style="color:red;"><i class="fas fa-fw fa-trash"></i></span></a>

                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->