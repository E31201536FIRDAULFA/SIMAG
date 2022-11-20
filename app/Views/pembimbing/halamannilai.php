<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Tabel data peserta -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="font-weight-bold">Data Peserta PKL</h4>
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" aria-current="page" href="#" id="aktif">Data Peserta</a>
                </li>

            </ul>
        </div>
        <!-- tabel data peserta aktif -->
        <div class="table-responsive" id="tabel-aktif" style="display: none;">
            <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Instansi/Sekolah</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($aktif as $key => $value) : ?>
                        <tr>
                            <td><?= $i;
                                $i++; ?></td>
                            <td><a href="/Pembimbing/detailPeserta/<?= $value['userId'] ?>"><?= $value['nama']; ?></a></td>
                            <td><?= $value['instansi']; ?></td>
                            <td><?= $value['startDate']; ?></td>
                            <td><?= $value['endDate']; ?></td>
                            <td class="text-center flex">
                                <a href="<?= base_url('pembimbing/nilai/' . $value['userId']) ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                                <a href="<?= base_url('pembimbing/report/' . $value['userId']) ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>