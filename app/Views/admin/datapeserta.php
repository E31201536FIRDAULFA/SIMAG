<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="font-weight-bold">Data Peserta PKL</h4>
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
            <div class="table-responsive" id="tabel-pendaftar">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Instansi/Sekolah</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pendaftar as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><a href="<?= base_url('dashboard/admin/peserta/detail/'.$value['userId']) ?>"><?= $value['nama']; ?></a></td>
                                <td><?= $value['instansi']; ?></td>
                                <td><?= $value['startDate']; ?></td>
                                <td><?= $value['endDate']; ?></td>
                                <td class="text-center flex">
                                    <a href="<?= base_url('dashboard/admin/peserta/terima/'.$value['userId'])?>" onclick="return confirm('Apakah anda yakin?')" class="btn btn-success"><i class="fa fa-check"></i></a>
                                    <a href="<?= base_url('dashboard/admin/peserta/delete/'.$value['userId'])?>" onclick="return confirm('Apakah anda yakin? Anda tidak akan dapat memulihkan file!')" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive" id="tabel-aktif" style="display: none;">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Instansi/Sekolah</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($aktif as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><a href="<?= base_url('dashboard/admin/peserta/detail/'.$value['userId']) ?>"><?= $value['nama']; ?></a></td>
                                <td><?= $value['instansi']; ?></td>
                                <td><?= $value['startDate']; ?></td>
                                <td><?= $value['endDate']; ?></td>
                                <td class="text-center flex">
                                    <a href="<?= base_url('dashboard/admin/peserta/delete/'.$value['userId'])?>" onclick="return confirm('Apakah anda yakin? Anda tidak akan dapat memulihkan file!')" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

            <div class="table-responsive" id="tabel-deaktif" style="display: none;">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Instansi/Sekolah</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($deaktif as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><a href="<?= base_url('dashboard/admin/peserta/detail/'.$value['userId']) ?>"><?= $value['nama']; ?></a></td>
                                <td><?= $value['instansi']; ?></td>
                                <td><?= $value['startDate']; ?></td>
                                <td><?= $value['endDate']; ?></td>
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