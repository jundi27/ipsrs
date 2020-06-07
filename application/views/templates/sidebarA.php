<!-- Sidebar -->
<ul style="background-color: #008983" class="navbar-nav sidebar sidebar-dark" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IPSRS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Administrator
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- <hr class="sidebar-divider d-none d-md-block"> -->

    <li class="nav-item">
        <a class="nav-link pt-0" href="<?= base_url('admin/akun'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Akun Manajemen</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed pt-0" href="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengaduan</span>
        </a>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/lappengaduan'); ?>">Cek Laporan Pengaduan</a>
                <a class="collapse-item" href="<?= base_url('admin/lapkendala') ?>">Cek Laporan Kendala</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed pt-0" href="" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-briefcase-medical"></i>
            <span>Pemeliharaan</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('admin/ceklappem') ?>">Laporan Pemeliharaan</a>
                <a class="collapse-item" href="<?= base_url('admin/historylappem') ?>">History Laporan</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link pt-0" href="<?= base_url('admin/kelolaalkes'); ?>">
            <i class="fas fa-fw fa-laptop-medical"></i>
            <span>Kelola Alat Kesehatan</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link pt-0" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->