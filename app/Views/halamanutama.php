<!-- kalender kuota js -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        $.get('/Home/getUser', (data) => {
            var calendar = new FullCalendar.Calendar(calendarEl, {
                themeSystem: 'bootstrap',
                fixedWeekCount: false,
                initialView: 'dayGridMonth',
                selectable: true,
                eventColor: 'blue',
                eventDisplay: 'list-item',
                views: {
                    dayGridMonth: {
                        dayMaxEventRows: 0,
                    },
                }
            });
            // tambah detail kuota
            calendar.batchRendering(function() {
                data.all.forEach(element => {
                    if (element.status == 1) {
                        calendar.addEvent({
                            title: element.nama,
                            startRecur: element.startDate,
                            endRecur: element.endDate
                        });
                    }
                });
            });
            calendar.render();
        })
    });
</script>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Topbar -->
    <nav class="navbar navbar-expand shadow" style="width:auto;">
        <!-- Navbar -->
        <a class="navbar-brand d-flex align-items-center justify-content-center" href="Home">
            <div class="navbar-brand-icon">
                <img style="width:60px" src="/assets/img/logobps.png" alt="Logo BPS">
            </div>
            <div class="navbar-brand-text mx-1">PKL BPS KOTA MALANG</div>
        </a>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#content">Beranda
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#informasi">Informasi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#alur">Alur Pendaftaran
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#profil">Profil BPS
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Main Content -->
        <div id="content">
            <!-- display flash data message -->
            <?php
            if (session()->getFlashdata('success')) : ?>
                <div class="text-sm-center text-center p-sm-5 m-sm-5" id="alert">
                    <div class="alert alert-success alert-dismissible">
                        <?php echo session()->getFlashdata('success') ?>
                    </div>
                </div>
            <?php elseif (session()->getFlashdata('blmditerima')) : ?>
                <div class="text-sm-center text-center p-sm-5 m-sm-5" id="alert">
                    <div class="alert alert-danger">
                        <?php echo session()->getFlashdata('blmditerima') ?>
                    </div>
                </div>
            <?php endif; ?>

            <!-- ======= Logo ======= -->
            <div class="row text-sm-center text-center p-sm-2 m-sm-4">
                <div class="col-md-6 col-7 mx-auto">
                    <img style="width:60%" src="/assets/img/logobps.png" alt="BPS Logo">
                </div>
                <div class="col-md-6 text-md-end mt-sm-5 mt-3">
                    <h1 class="text-center grey-text">SISTEM INFORMASI</h1>
                    <h1 class="text-center grey-text">PRAKTIK KERJA LAPANGAN</h1>
                    <h1 class="text-center grey-text">BPS KOTA MALANG</h1>
                    <?php if (!session()->log) : ?>
                        <div class="nav-item">
                            <a class="nav-link" href="<?= base_url('AuthGoogle'); ?>">
                                <button class="btn btn-primary btn-icon-split btn-lg m-3" style="background-color:#508b90">
                                    <span class="text">Masuk / Ajukan Pendaftaran</span></button>
                            </a>
                            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <?php echo session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <?php echo session()->getFlashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else : ?>
                        <div class="nav-item">
                            <a class="nav-link" href="<?= base_url('AuthGoogle/logout'); ?>">
                                <button class="btn btn-primary btn-icon-split btn-lg m-3" style="background-color:#508b90">
                                    <span class="icon text-white-50"><i class="fas fa-sign-out-alt"></i></span>
                                    <span class="text">Keluar</span></button>
                            </a>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <!-- End Logo -->
            <hr>

            <!-- ======= Informasi ======= -->
            <div class="row pt-sm-5 px-sm-5 mx-sm-5" id="informasi">
                <div class="col h2 text-dark mb-1">
                    INFORMASI JUMLAH PESERTA PKL</div>
            </div>
            <!-- Kalender -->
            <div class="col-md-6 pt-sm-3 mx-auto" id="calendar"></div>
            <div class="col h5 text-grey m-3 text-center">
                Jumlah kuota maksimal peserta PKL di BPS Kota Malang adalah 16 peserta setiap harinya.</div>

            <!-- User days left
            <div class="col-lg-5 mt-5">
                <?php foreach ($user as $index => $u) : ?>
                    <div class="icon-box d-flex align-items-center mb-3">
                        <div>
                            <div class="icon"><i class="fa fa-user"></i></div>
                        </div>
                        <div class="body-icon">
                            <h6 class="m-1"> <?= $u['nama'] . ' kurang ' . $u['sisaHari'] . ' hari'; ?>
                            </h6>
                        </div>
                    </div>
                <?php endforeach ?>
            </div> -->
            <hr>

            <!-- ======= Alur Pendaftaran ======= -->
            <div class="container" id="alur">
                <div class="text-center pb-sm-5">
                    <h2 class="h2 mb-1 pt-sm-5 mt-sm-5">ALUR PENDAFTARAN</h2>
                    <h5 class="section-subheading text-muted">Alur Pendaftaran PKL di BPS Kota Malang.</5>
                </div>
                <ul class="timeline">
                    <li>
                        <div class="timeline-badge"><img class="rounded-circle img-fluid" src="/assets/img/timeline/1.png" alt=""></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Kunjungi halaman PKL BPS Kota Malang</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Kunjungi halaman utama Sistem Informasi PKL BPS Kota Malang dan lihat jumlah peserta yang ada pada bagian informasi. Pastikan kuota tidak penuh saat akan mendaftar</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge"><img class="rounded-circle img-fluid" src="/assets/img/timeline/2.png" alt=""></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Ajukan Pendaftaran</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Ajukan pendaftaran dengan menekan tombol Masuk/Ajukan Pendaftaran yang tertera pada halaman utama Sistem Informasi PKL BPS Kota Malang</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge"><img class="rounded-circle img-fluid" src="/assets/img/timeline/3.png"></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Isi Data Diri</h4>
                            </div>
                            <div class="timeline-body">
                                <p> Isi dan Lengkapi data diri peserta PKL beserta dokumen pendukung sebagai syarat melaksanakan PKL di BPS Kota Malang. Pastikan data diri dan dokumen pendukung benar dan sesuai dengan ketentuan.</p>
                            </div>
                        </div>
                    </li>
                    <li class="timeline-inverted">
                        <div class="timeline-badge"><img class="rounded-circle img-fluid" src="/assets/img/timeline/4.png" alt=""></i></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4 class="timeline-title">Tunggu Hasil Konfirmasi Penerimaan</h4>
                            </div>
                            <div class="timeline-body">
                                <p>Hasil konfirmasi penerimaan dapat dilihat saat masuk ke akun pada halaman Login. Apabila dokumen yang dibutuhkan sesuai dan kuota terpenuhi maka peserta dinyatakan lolos untuk melaksanakan PKL di BPS Kota Malang dan dapat masuk ke halaman peserta.</p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="timeline-badge">
                            <div class="icon" style="color:darkgrey;"><i class="fa fa-check"></i></div>
                        </div>
                        <div class="timeline-panel">
                            <div class="timeline-body">
                                <p>PKL dapat dilaksanakan sampai waktu yang sudah ditentukan</p>
                            </div>
                        </div>
                    </li>
            </div>
            <!-- End Alur -->
            <hr>

            <!-- ======= Profil ======= -->
            <div class="container" id="profil">
                <div class="row justify-content-center pt-sm-5 mt-sm-5">
                    <div class="col-xl-9 text-grey mb-1">
                        <h5 class="upper text-center">TENTANG</h5>
                        <h2 class="title mb-3 text-center">BPS KOTA MALANG</h2>
                    </div>
                    <div class="col-xl-9 5 text-center text-grey mb-1">
                        Badan Pusat Statistik adalah Lembaga Pemerintah Non-Departemen yang bertanggung jawab langsung kepada Presiden. Sebelumnya, BPS merupakan Biro Pusat Statistik, yang dibentuk berdasarkan UU Nomor 6 Tahun 1960 tentang Sensus dan UU Nomer 7 Tahun 1960 tentang Statistik. Sebagai pengganti kedua UU tersebut ditetapkan UU Nomor 16 Tahun 1997 tentang Statistik. Berdasarkan UU ini yang ditindaklanjuti dengan peraturan perundangan dibawahnya, secara formal nama Biro Pusat Statistik diganti menjadi Badan Pusat Statistik.</div>
                    <!-- ======= Visi ======= -->
                    <div class="row justify-content-center my-1">
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 text-primary mb-1">
                                                VISI</div>
                                            <div class="h6 mb-0 text-gray-800">Pelopor data statistik terpercaya untuk semua</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Visi -->
                        <!-- ======= Misi ======= -->
                        <div class="col-xl-5 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="h5 text-primary mb-1">
                                                MISI</div>
                                            <div class="h6 mb-0 text-gray-800">
                                                <ol>
                                                    <li> Menyediakan data statistik berkualitas melalui kegiatan statistik yang terintegrasi dan berstandar nasional maupun internasional.</li>
                                                    <li> Memperkuat Sistem Statistik Nasional yang berkesinambungan melalui pembinaan dan koordinasi di bidang statistik.</li>
                                                    <li> Membangun insan statistik yang profesional, berintegritas dan amanah untuk kemajuan perstatistikan</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Misi -->
                </div>
            </div>
            <!-- End Profil -->

        </div>
        <!-- /.container-fluid -->
        <script>
            $('#alert').delay(9999).slideUp('slow');
            $('.alert').delay(9999).slideUp('slow');
        </script>
    </div>
    <!-- End of Main Content -->