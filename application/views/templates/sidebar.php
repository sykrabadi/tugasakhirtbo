

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-code"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sistem Informasi PKM</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Query Menu -->
            <!-- Joinning table -->
            <!-- Menampilkan menu sesuai -->
            <!-- $role_id diambil dari 'role_id' => $user['role_id'] pada controller Auth -->
            <!-- menu_id merupakan id dari menu yang akan ditampilkan berdasarkan user level, misalnya pada database, menu_id = 2 yaitu my profile dan edit profile dapat diakses oleh user maupun admin-->
            <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT `user_menu`.`id`, `menu`
                            FROM `user_menu` JOIN `user_access_menu`
                            ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                            WHERE `user_access_menu`.`role_id` = $role_id
                            ORDER BY `user_access_menu`.`menu_id` ASC
                ";
                $menu = $this->db->query($queryMenu)->result_array();
            ?>
            <!-- Query di atas bermakna mengambil data dari kolom id dan menu dari user_menu yang di-join dengan tabel user_access_menu yang nilai id dari tabel user_menu sama dengan nilai menu_id dari tabel user_access_menu. Nilai id pada tabel user_menu merujuk pada level user : 1 untuk admin dan 2 untuk user biasa. Ada fitur dalam web yang hanya dapat diakses oleh user biasa, namun ada juga fitur yang dapat diakses oleh admin dan user, misal my profile dan edit profile dapat digunakan baik level user maupun level admin-->

            <!-- Singkatnya, query di atas hanya mengambil id level user untuk dijadikan bahan looping sub menu -->

            <!-- Heading -->
            <!-- Looping menu -->
            <?php foreach ($menu as $m) :?>
            <div class="sidebar-heading">
                <?= $m['menu'];?>
            </div>

            <!-- Siapkan submenu sesuai user level pada query sebelumnya -->
            <?php
                $menuId = $m['id'];
                $querySubMenu = " SELECT * FROM `user_sub_menu` JOIN
                                `user_menu` ON `user_sub_menu`.`menu_id` = 
                                `user_menu`.`id` WHERE `user_sub_menu`.`menu_id`
                                = $menuId AND `user_sub_menu`.`is_active` = 1
                ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
            ?>
                <?php foreach($subMenu as $sm): ?>
                    <!-- Nav Item - Dashboard -->
                    <!-- Menampilkan submenu yang aktif jika nama submenu pada looping sama dengan nama submenu pada tabel -->
                    <?php if($title == $sm['title']) :?>
                    <li class="nav-item active">
                    <?php else:?>
                    <li class="nav-item">
                    <?php endif;?>
                        <a class="nav-link pb-0" href="<?= base_url($sm['url']);?>">
                            <i class="<?= $sm['icon'];?>"></i>
                            <span><?= $sm['title'];?></span></a>
                    </li>
                <?php endforeach;?>

                <!-- Divider -->
            <hr class="sidebar-divider mt-3">

            <?php endforeach;?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Logout
            </div>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout');?>">
                    <i class="fas fa-sign-out-alt"></i>
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