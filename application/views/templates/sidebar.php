<!--Sidebar-->
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">


                    <!-- QUERY MENU -->
                    <?php
                    $role_id = $this->session->userdata('role_id');
                    $queryMenu = "SELECT `user_menu`.`id`, `menu`
                                    FROM `user_menu` 
                                    JOIN `user_access_menu` 
                                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` ASC 
                                ";

                    $menu = $this->db->query($queryMenu)->result_array();
                    ?>

                    <!-- LOOPING MENU -->
                    <?php foreach ($menu as $m) : ?>
                        <div class="sb-sidenav-menu-heading">
                            <?= $m['menu']; ?>
                        </div>

                        <!-- SIAPKAN SUB-MENU SESUAI MENU -->
                        <?php
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
                            <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                                <div class="sb-nav-link-icon">
                                    <i class="<?= ($sm['icon']) ?>"></i>
                                </div>
                                <?= ($sm['title']) ?>
                            </a>
                        <?php endforeach; ?>


                    <?php endforeach; ?>



                    <!-- Heading -->
                    <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->

                    <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-fw fa-columns"></i>
                        </div>
                        Layouts
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-fw fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="layout-static.html">Static Navigation</a>
                            <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-fw fa-book-open"></i>
                        </div>
                        Pages
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-fw fa-angle-down"></i>
                        </div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">Authentication
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">Login</a>
                                    <a class="nav-link" href="#">Register</a>
                                    <a class="nav-link" href="#">Forgot Password</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">Error
                                <div class="sb-sidenav-collapse-arrow">
                                    <i class="fas fa-angle-down"></i>
                                </div>
                            </a>
                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#">401Page</a>
                                    <a class="nav-link" href="#">404 Page</a>
                                    <a class="nav-link" href="#">500 Page</a>
                                </nav>
                            </div>
                        </nav>
                    </div> -->

                    <!-- Heading -->
                    <!-- <div class="sb-sidenav-menu-heading">User</div> -->

                    <!-- <a class="nav-link" href="<?= base_url('vendor/') ?>sbadmin/dist/charts.html">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-fw fa-chart-area"></i>
                        </div>
                        Charts
                    </a>
                    <a class="nav-link" href="<?= base_url('vendor/') ?>sbadmin/dist/tables.html">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-fw fa-table"></i>
                        </div>
                        Tables
                    </a> -->

                    <!-- Heading -->
                    <div class="sb-sidenav-menu-heading"></div>

                    <a class="nav-link" href="<?= base_url('auth/logout') ?>">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                        </div>
                        Logout
                    </a>

                </div>
            </div>

            <!-- <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?= $user['name']; ?>
                </div> -->
        </nav>
    </div>