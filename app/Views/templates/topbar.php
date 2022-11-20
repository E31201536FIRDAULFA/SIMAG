<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand topbar mb-4 static-top shadow">
        <button id="sidebarToggleTop" class="btn btn-light d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-white-600">Selamat Datang, <?= session()->nama; ?> !</span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <?php if (!session()->log) : ?>
                            <a class="dropdown-item" href="<?= base_url('AuthGoogle'); ?>">
                                <i class="nav-icon fas fa-sign-out-alt"></i> Login
                            </a>
                        <?php else : ?>
                            <a class="dropdown-item" href="<?= base_url('AuthGoogle/logout'); ?>">
                                <i class="nav-icon fas fa-sign-out-alt"></i> Keluar
                            </a>
                        <?php endif ?>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->