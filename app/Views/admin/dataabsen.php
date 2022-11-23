<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="font-weight-bold">Absensi</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Tanggal</th>
                            <th>Jam Masuk</th>
                            <th>Jam Selesai</th>
                            <th>Keterangan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($absen as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['date']; ?></td>
                                <td><?= $value['datang']; ?></td>
                                <td><?= $value['pulang']; ?></td>
                                <td><?= ($value['datang'] > '07:30:00' ? 'Terlambat' : 'Hadir'); ?></td>
                                <td><a class="btn btn-primary" href="<?= base_url('dashboard/admin/data/absen/detail/'.$value['acid']); ?>" id="<?= $value['id']; ?>"> <i class="fa fa-eye"></i></a></td>
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