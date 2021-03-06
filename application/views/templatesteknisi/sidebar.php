<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

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
        Teknisi
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="<?= base_url('teknisi/pengaduan'); ?>" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-laptop-medical"></i>
            <span>Pengaduan</span>
        </a>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Laporan Pengaduan</a>
                <a class="collapse-item" href="#">Cek Laporan Pengaduan</a>
                <a class="collapse-item" href="#">Menu 1</a>
                <a class="collapse-item" href="# ?>">Menu 2</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?= current_url() === base_url('teknisi/ceklappem') || current_url() === base_url('teknisi/lappemeliharaan') ? 'active' : null ?>">
        <a class="nav-link collapsed" href="<?= base_url('teknisi/pemeliharaan'); ?>" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-briefcase-medical"></i>
            <span>Pemeliharaan</span>
        </a>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('teknisi/lappemeliharaan') ?>">Laporan Pemeliharaan</a>
                <a class="collapse-item" href="<?= base_url('teknisi/ceklappem') ?>">History Laporan</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item <?= current_url() === base_url('teknisi/index') || current_url() === base_url('teknisi/edit') || current_url() === base_url('teknisi/changepassword') ? 'active' : null ?>">
        <a class="nav-link collapsed" href="<?= base_url('teknisi/index'); ?>" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span>
        </a>

        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('teknisi/index') ?>">Profil</a>
                <a class="collapse-item" href="<?= base_url('teknisi/edit') ?>">Edit Profil</a>
                <a class="collapse-item" href="<?= base_url('teknisi/changepassword') ?>">Ganti Password</a>
            </div>
        </div>
    </li>
    <!--<li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-book"></i>
            <span>Buat Laporan Pemeliharaan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-history"></i>
            <span>Cek Laporan Pemeliharaan</span></a>
    </li>-->

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
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