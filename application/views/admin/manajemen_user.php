<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="flashdata-manageuser" data-flashdatamanageuser="<?= $this->session->flashdata('user'); ?>"></div>

    <div class="card shadow border-left-primary">

        <div class="card-header py-3">

            <div class="row">
                <div class="col-sm">
                    <h4 class="manageuser"><?= $title; ?></h4>
                </div>
                <div class="col-sm">
                    <a class="btn btn-info btn-sm float-sm-right" href="<?= base_url('admin/tambahpegawai'); ?>"><i class="fas fa-fw fa-user-plus"></i> Tambah Pegawai</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg">
                    <table class="table table-bordered table-hover mt-4" id="datauser">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center manageuser" data-valign="middle" data-halign="center" scope="col">No.</th>
                                <th class="text-center manageuser" scope="col">Nama</th>
                                <th class="text-center manageuser" scope="col">NIP</th>
                                <th class="text-center manageuser" scope="col">Pangkat / Golongan</th>
                                <th class="text-center manageuser" data-valign="middle" data-halign="center" scope="col">Level</th>
                                <th class="text-center manageuser" scope="col">Seksi/Subseksi</th>
                                <th class="text-center manageuser" scope="col">Atasan</th>
                                <th class="text-center manageuser" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($user_data as $user) : ?>
                                <tr>
                                    <th class="text-center manageuser" scope="row"><?= $i; ?></th>
                                    <td class="manageuser"><?= $user['nama']; ?></td>
                                    <td class="manageuser"><?= $user['nip']; ?></td>
                                    <td class="manageuser"><?= $user['pangkat']; ?></td>
                                    <td class="manageuser"><?php switch ($user['role_id']) {
                                                                    case 1:
                                                                        echo "Admin";
                                                                        break;

                                                                    case 2:
                                                                        echo "Kepala Kantor";
                                                                        break;

                                                                    case 3:
                                                                        echo "Kepala Subbagian / Kepala Seksi";
                                                                        break;

                                                                    case 4:
                                                                        echo "Kepala Subseksi";
                                                                        break;

                                                                    case 5:
                                                                        echo "Pelaksana";
                                                                        break;
                                                                }
                                                                ?></td>

                                    <td class="manageuser"><?= $user['seksi']; ?></td>
                                    <td class="manageuser"><?= $user['atasan']; ?></td>
                                    <td class="aksimanageuser">
                                        <a data-toggle="tooltip" data-placement="left" title="Edit Data Pegawai" href="<?= base_url(); ?>admin/editpegawai/<?= $user['id']; ?>"><i class="fas fa-fw fa-edit"></i></a>
                                        <a data-toggle="tooltip" data-placement="left" title="Hapus Data Pegawai" class="button-hapuspegawai" href="<?= base_url(); ?>admin/hapuspegawai/<?= $user['id']; ?>"><span style="color:red;"><i class="fas fa-fw fa-trash"></i></span></a>
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