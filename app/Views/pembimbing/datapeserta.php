<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Tabel data peserta -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="font-weight-bold">Data Peserta PKL</h4>
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active font-weight-bold" aria-current="page" href="#" id="pendaftar">Pendaftar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" aria-current="page" href="#" id="aktif">Peserta Aktif</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" aria-current="page" href="#" id="deaktif">Peserta Deaktif</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <!-- tabel data pendaftar -->
            <div class="table-responsive" id="tabel-pendaftar">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Opsi</th>
                            <th>Notifikasi Pesan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pendaftar as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td class="text-center flex">
                                    <a href="/Pembimbing/detailPeserta/<?= $value['id'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <b>|</b>
                                    <a href="/Pembimbing/terimaPeserta/<?= $value['id'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-success"><i class="fa fa-check"></i></a>
                                    <b>|</b>
                                    <a href="/Pembimbing/hapusPeserta/<?= $value['id'] ?>" onclick="return confirm('Apakah anda yakin? Anda tidak akan dapat memulihkan file!')" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                <td class="text-center flex">

                                    <a href="/Pembimbing/hapusPeserta/<?= $value['id'] ?>" onclick="return confirm('Apakah anda yakin? Anda tidak akan dapat memulihkan file!')" class="btn btn-warning"><i class="fa fa-book"></i></a>

                                </td>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- tabel data peserta aktif -->
            <div class="table-responsive" id="tabel-aktif" style="display: none;">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($aktif as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td>
                                    <a href="/Pembimbing/detailPeserta/<?= $value['id'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <!-- tabel data peserta yang sudah tidak aktif -->
            <div class="table-responsive" id="tabel-deaktif" style="display: none;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>E-mail</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($deaktif as $key => $value) : ?>
                            <tr>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td>
                                    <a href="/Pembimbing/terimaPeserta/<?= $value['id'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->