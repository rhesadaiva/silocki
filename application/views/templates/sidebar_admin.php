<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/') ?>">
        <img src="<?= base_url('assets/img/logo1.png') ?>" alt="" style="width:90%; margin-bottom: 5px;">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Home
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kontrak Kinerja
    </div>

    <!-- Nav Item - Kontrak Kinerja -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kontrakkinerja" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Kontrak Kinerja</span>
        </a>
        <div id="kontrakkinerja" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item mx-auto" href="<?= base_url('kontrakkinerja/browsekontrak'); ?>">Browse Kontrak Kinerja</a>
                <a class="collapse-item mx-auto" href="<?= base_url('iku/browseiku'); ?>">Pengisian IKU dan Logbook</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Atasan
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#persetujuanatasan" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-check"></i>
            <span>Persetujuan Atasan</span>
        </a>
        <div id="persetujuanatasan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item mx auto" href="<?= base_url('pejabat/kontrakkinerjabawahan'); ?>">Approval Bawahan</a>
            </div>
        </div>
    </li>
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#monitoringpegawai" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-check-circle"></i>
            <span>Monitoring Pegawai</span>
        </a>
        <div id="monitoringpegawai" class="collapse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item mx-auto" href="<?= base_url('admin/logbookselesai'); ?>">Sudah Mengirim Logbook</a>
                <a class="collapse-item mx-auto" href="<?= base_url('admin/logbookbelumdisetujui'); ?>">Logbook Belum Disetujui</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Manajemen User -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/manajemen_user'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Manajemen User</span></a>
    </li>

    <!-- Nav Item - Admin Console -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/console'); ?>">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Admin Console</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->