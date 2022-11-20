<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion shadow" id="accordionSidebar" style="background-color: #508b90;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="peserta">
        <div class="sidebar-brand-icon rotate-n-15">
            <img style="width:50px" src="/assets/img/logobps.png" alt="Logo">
        </div>
        <div class="sidebar-brand-text mx-1">PKL BPS KOTA MALANG</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Beranda -->
    <li class="nav-item">
        <a class="nav-link" href="/TU">
            <i class="fa fa-home"></i>
            <span>Beranda</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Beranda -->
    <li class="nav-item">
        <a class="nav-link" href="/TU/datatu">
            <i class="fa fa-home"></i>
            <span>Kuota Per-Seksi</span></a>
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if (!session()->log) : ?>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('AuthGoogle/logout'); ?>">
                <i class="nav-icon fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    <?php endif ?>

</ul>
<!-- End of Sidebar -->