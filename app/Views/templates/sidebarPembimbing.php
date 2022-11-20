<!-- Sidebar -->
<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #508b90;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Pembimbing">
        <div class="sidebar-brand-icon rotate-n-15">
            <img style="width:50px" src="/assets/img/logobps.png" alt="Logo">
        </div>
        <div class="sidebar-brand-text mx-1">PKL BPS KOTA MALANG</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Beranda -->
    <li class="nav-item">
        <a class="nav-link" href="/Pembimbing">
            <i class="fa fa-home"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <!-- Nav Item - absensi Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/Pembimbing/dataPeserta">
            <i class="fa fa-edit"></i>
            <span>Data Peseta PKL</span>
        </a>
    </li>

    <!-- Nav Item - Laporan aktivitas harian Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/Pembimbing/dataAktivitas">
            <i class="fa fa-folder-open"></i>
            <span>Laporan Aktivitas Harian</span>
        </a>
    </li>

    <!-- Nav Item - Laporan aktivitas harian Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/Pembimbing/dataAbsen">
            <i class="fa fa-folder-open"></i>
            <span>Laporan Absensi</span>
        </a>
    </li>

    <!-- Nav Item - Laporan aktivitas harian Menu -->
    <li class="nav-item">
        <a class="nav-link" href="/Pembimbing/dashboard">
            <i class="fa fa-folder-open"></i>
            <span>Report Nilai Mahasiswa</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if (!session()->log) : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('AuthGoogle'); ?>">
                <i class="nav-icon fas fa-sign-out-alt"></i> Login
            </a>
        </li>
    <?php else : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('AuthGoogle/logout'); ?>">
                <i class="nav-icon fas fa-sign-out-alt"></i> Keluar
            </a>
        </li>
    <?php endif ?>

</ul>
<!-- End of Sidebar -->