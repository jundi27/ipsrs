<!-- Sbadmin2 -->
<!-- Sidebar -->
<!-- <ul style="background-color: #008983" class="navbar-nav sidebar sidebar-dark"> -->
<!-- Sidebar - Brand -->
<!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-hospital"></i>
        </div>
        <div class="sidebar-brand-text mx-3">IPSRS</div>
    </a> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider"> -->


<!-- QUERY MENU -->
<!-- <?php
        $role_id = $this->session->userdata('role_id');
        $queryMenu = "SELECT `user_menu`.`id`, `menu`
                  FROM `user_menu` 
                  JOIN `user_access_menu` 
                  ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                  WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC 
                ";

        $menu = $this->db->query($queryMenu)->result_array();
        ?> -->

<!-- LOOPING MENU -->
<!-- <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['menu']; ?>
        </div> -->

<!-- SIAPKAN SUB-MENU SESUAI MENU -->
<!-- <?php
            $menuId = $m['id'];
            $querySubMenu = "SELECT * 
                         FROM `user_sub_menu`
                         JOIN `user_menu`
                         ON   `user_sub_menu`.`menu_id` = `user_menu`.`id`
                         WHERE `user_sub_menu`.`menu_id` = $menuId
                         AND `user_sub_menu`.`is_active` = 1 
                        ";
            $subMenu = $this->db->query($querySubMenu)->result_array();
        ?>

        <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['judul']) : ?>
                <li class="nav-item active">
                <?php else : ?>
                <li class="nav-item">
                <?php endif; ?>
                <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                    <i class="<?= $sm['icon']; ?>"></i>
                    <span><?= $sm['judul']; ?></span></a>
                </li>
            <?php endforeach; ?> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider mt-3 mb-0">

        <?php endforeach; ?> -->

<!-- Nav Item -->
<!-- <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>
        </li> -->

<!-- Divider -->
<!-- <hr class="sidebar-divider d-none d-md-block"> -->

<!-- Sidebar Toggler (Sidebar) -->
<!-- <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

</ul> -->

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
        Pegawai
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pengaduan</span>
        </a>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/pengaduanKer') ?>">Adukan Kerusakan</a>
                <a class="collapse-item" href="<?= base_url('user/pengaduan_saya') ?>">Pengaduan Saya</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed pt-0" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span>
        </a>

        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="<?= base_url('user/index') ?>">Profil</a>
                <a class="collapse-item" href="<?= base_url('user/edit') ?>">Edit Profil</a>
                <a class="collapse-item" href="<?= base_url('user/changepassword') ?>">Ganti Password</a>
            </div>
        </div>
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

<script>
    const sidebarItem = document.querySelectorAll(".nav-item");
    const arraySidebarItem = Array.from(sidebarItem)

    const currentUrl = window.location.href;
    arraySidebarItem.forEach((item, index) => {
        if (item.children[0].getAttribute("href") == '#') {
            const links = item.children[1].children[0].children;
            const arrayLinks = Array.from(links)

            arrayLinks.forEach(itemLink => {
                if (itemLink.getAttribute("href") == currentUrl) {
                    sidebarItem[index].classList.add("active")
                    item.children[0].classList.remove("collapsed")
                    item.children[1].classList.add("show")
                    itemLink.classList.add("active")
                }
            })
        } else {
            const link = item.children[0].getAttribute("href")

            if (link == currentUrl) {
                sidebarItem[index].classList.add("active")
            }
        }
    })
</script>