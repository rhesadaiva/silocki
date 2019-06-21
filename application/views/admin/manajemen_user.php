<style>
    h4 {
        color: royalblue;
        font-weight: bold;
    }

    th {
        font-size: 15px;
    }

    td {
        text-align: center;
        font-size: 15px;
    }

    .aksi {
        font-size: 15px;
        width: 10%;
        text-align: center;
    }


    }
</style>


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="flashdata-manageuser" data-flashdatamanageuser="<?= $this->session->flashdata('user'); ?>"></div>

    <div class="card shadow border-left-primary">

        <div class="card-header py-3">

            <div class="row">
                <div class="col-sm">
                    <h4><?= $title; ?></h4>
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
                                    <td><?php switch ($user['role_id']) {
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
                                    <td><?= $user['seksi']; ?></td>
                                    <td><?= $user['atasan']; ?></td>
                                    <td class="aksi">
                                        <a data-toggle="tooltip" data-placement="left" title="Edit Data Pegawai" href="<?= base_url(); ?>admin/editpegawai/<?= $user['id']; ?>"><i class="fas fa-fw fa-edit"></i></a>
                                        <a data-toggle="tooltip" data-placement="left" title="Delete" class="button-hapuspegawai" href="<?= base_url(); ?>admin/hapuspegawai/<?= $user['id']; ?>"><span style="color:red;"><i class="fas fa-fw fa-trash"></i></span></a>

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