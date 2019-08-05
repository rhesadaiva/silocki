<!-- style for this page -->
<style>
 h4 {
        color: royalblue;
        font-weight: bold;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Log Card -->
    <div class="card">
        <div class="card-header log-activity">
            <h4>Log Activity</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="log-activity">
                <thead>
                    <tr>
                    <th scope="col">No.</th>
                    <th scope="col" class="text-center">Nama User</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Log</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($log_data as $activity) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $activity['log_user']; ?></td>
                            <td><?= $activity['log_desc']; ?></td>
                            <td><?= $activity['log_time']; ?></td>
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