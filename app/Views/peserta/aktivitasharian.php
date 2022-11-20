<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- display flash data message -->
            <?php
            if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <h4 class="font-weight-bold">Laporan Aktivitas Harian <a href="/Peserta/tambahAktivitas"><button type="submit" class="btn btn-primary "><i class="fa fa-plus "></i></button></a></h4>
        </div>
        <div class="card-header py-3">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active font-weight-bold" aria-current="page" href="#" id="blmsetuju">Belum Disetujui</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" aria-current="page" href="#" id="stuju">Sudah Disetujui</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" aria-current="page" href="#" id="tdksetuju">Tidak Disetujui</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="tabel-blmsetuju">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Penjelasan Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($blmsetuju as $key => $value) : ?>
                            <tr id="<?= $value['id']; ?>">
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['mulai']; ?></td>
                                <td><?= $value['selesai']; ?></td>
                                <td><?= $value['keterangan']; ?></td>
                                <td class="text-center flex">
                                    <a href="/Peserta/editAktivitas/<?= $value['id']; ?>"> <button type="submit" class="btn btn-success"> <i class="fa fa-edit"></i></button></a>
                                    <button type="submit" class="btn btn-danger remove"> <i class="fa fa-trash "></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <!-- tabel laporan aktivitas yang sudah disetujui -->
            <div class="table-responsive" id="tabel-stuju" style="display: none;">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Penjelasan Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($setuju as $key => $value) : ?>
                            <tr id="<?= $value['id']; ?>">
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['mulai']; ?></td>
                                <td><?= $value['selesai']; ?></td>
                                <td><?= $value['keterangan']; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <!-- tabel laporan aktivitas yang tidak disetujui -->
            <div class="table-responsive" id="tabel-tdksetuju" style="display: none;">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Penjelasan Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($tdksetuju as $key => $value) : ?>
                            <tr id="<?= $value['id']; ?>">
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['mulai']; ?></td>
                                <td><?= $value['selesai']; ?></td>
                                <td><?= $value['keterangan']; ?></td>
                                <td><a href="/Peserta/editAktivitas/<?= $value['id']; ?>"> <button type="submit" class="btn btn-success"> <i class="fa fa-edit"></i></button></a>
                                    <button type="submit" class="btn btn-danger remove"> <i class="fa fa-trash "></i></button>
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
<script>
    $('.alert').delay(5000).slideUp('slow');
</script>