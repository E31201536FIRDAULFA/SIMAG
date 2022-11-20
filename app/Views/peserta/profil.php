<div id="layoutSidenav_content">
    <?php $val = Service('validation'); ?>
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4 shadow">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Pengaturan Akun - Profil
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
                    <div class="card mb-4 shadow">
                        <div class="card-header">Profile Picture</div>
                        <div class="card-body text-center">
                            <!-- Profile picture image-->
                            <img class="img-account-profile rounded-circle mb-2" src="<?= $user['foto']; ?>" style="width:230px;height:230px;" alt="" />
                            <form class="user" action="" enctype="multipart/form-data" method="POST">
                                <div class="form-group">
                                    <input type="file" name="foto" class="form-control" id="foto"><em>Format jpg/jpeg/png & ukuran maks 1MB</em>
                                    <?= ($val->hasError('foto')) ? '<small class="text-danger">' . $val->getError('foto') . '</small>' : ''; ?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" id="send_form" class="btn btn-success">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4 shadow">
                        <div class="card-header">Account Details</div>
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
                                        <td><?= $user['startDate'];  ?> sampai <?= $user['endDate']; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>