<style>
    table.log-table {
        margin-top: 40px;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Console Card -->
    <div class="card">
        <div class="card-body">

            <!-- Console Navs -->
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-log-tab" data-toggle="tab" href="#nav-log" role="tab">Log Akitifitas</a>
                    <a class="nav-item nav-link" id="nav-config-tab" data-toggle="tab" href="#nav-config" role="tab">Konfigurasi</a>

                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">

                <!-- Log Activity -->
                <div class="tab-pane fade show active" id="nav-log" role="tabpanel">
                    <table class="table table-hover table-bordered log-table" id="log-table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- End Log Activity -->

                <!-- Config -->
                <div class="tab-pane fade" id="nav-config" role="tabpanel">
                    ...
                </div>
                <!-- End Config -->

            </div>

        </div>
    </div>




    <!-- END DATA, NEVER EDIT ANYTHING BELOW THIS -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->