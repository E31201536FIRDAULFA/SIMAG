<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4 shadow">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Detail Profil Peserta
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <hr class="mt-0 mb-4" />
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0 shadow">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" src="<?= $user['foto']; ?>" style="width:230px;height:230px;" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4 shadow">
                        <div class="card-header">Detail Peserta</div>
                        <div class="card-body">
                            <table class="table m-0">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nama Lengkap</th>
                                        <td><?= $user['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Jenis Kelamin</th>
                                        <td><?= ($user['jenisKelamin'] == '1' ? 'Laki-Laki' : 'Perempuan') ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Tanggal Lahir</th>
                                        <td><?= $user['tglLahir']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td><?= $user['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Instansi/Sekolah Asal</th>
                                        <td><?= $user['instansi']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pelaksanaan PKL</th>
                                        <td><?= $user['startDate']; ?> sampai <?= $user['endDate']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Surat Pengantar</th>
                                        <td> <a class="btn btn-sm btn-primary" href="/Admin/bukaPengantar/<?= $user['id'] ?>" target="_blank"><span class="fa fa-eye"></span> Lihat</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Proposal</th>
                                        <td> <a class="btn btn-sm btn-primary" href="/Admin/bukaProposal/<?= $user['id'] ?>" target="_blank"><span class="fa fa-eye"></span> Lihat</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>