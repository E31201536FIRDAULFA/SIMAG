<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Tabel Laporan Aktivitas Harian -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="font-weight-bold">Laporan Aktivitas Harian</h4>
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active font-weight-bold" aria-current="page" href="#" id="belumsetuju">Belum Disetujui</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" aria-current="page" href="#" id="setuju">Sudah Disetujui</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <!-- tabel laporan aktivitas yang belum disetujui -->
            <div class="table-responsive" id="tabel-belumsetuju">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($belumsetuju as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><a href="/Pembimbing/detailPeserta/<?= $value['userId'] ?>"><?= $value['nama']; ?></a></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['mulai']; ?></td>
                                <td><?= $value['selesai']; ?></td>
                                <td><?= $value['keterangan']; ?></td>
                                <td class="text-center flex">
                                    <a href="/Pembimbing/terimaAktivitas/<?= $value['acid'] ?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-success"><i class="fa fa-check"></i></a>
                                    <a href="/Pembimbing/hapusAktivitas/<?= $value['acid'] ?>" onclick="return confirm('Apakah anda yakin? Anda tidak akan dapat memulihkan file!')" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <!-- tabel laporan aktivitas yang sudah disetujui -->
            <div class="table-responsive" id="tabel-setuju" style="display: none;">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Keterangan</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 2; ?>
                        <?php foreach ($setuju as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><a href="/Pembimbing/detailPeserta/<?= $value['userId'] ?>"><?= $value['nama']; ?></a></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['mulai']; ?></td>
                                <td><?= $value['selesai']; ?></td>
                                <td><?= $value['keterangan']; ?></td>
                                <td class="text-center flex">
                                    <a href="/Pembimbing/detailPeserta/<?= $value['acid'] ?>" button type="submit" class="btn btn-primary "><i class="fa fa-plus "></i></a>
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