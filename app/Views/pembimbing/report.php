<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Tabel data peserta -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="font-weight-bold">Data Nilai Mahasiswa<a href="#"></a></h4>
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link font-weight-bold" aria-current="page" href="#" id="aktif">Nilai Mahasiswa</a>
                </li>
            </ul>
        </div>

        <div class="card-body">
            <!-- tabel data nilai -->
            <div class="table-responsive" id="tabel-aktif" style="display: none;">
                <table class="table" id="dataTable3" width="100%" cellspacing="0" border="0.5">
                    <thead>
                        <tr align="center" background-color: #dddddd;>
                            <th colspan="3">DATA NILAI</th>
                        </tr>
                        <br>
                    </thead>
                    <tbody>
                        <br>
                        <?php foreach ($aktif as $key => $value) : ?>

                            <tr align="center">
                                <td colspan="1"><b>Penelitian</b></td>
                                <td colspan="1"><b>Angka</b>
                            </tr>
                            <tr>
                                <th>Nama</th>
                                <td align="center"><a href="/Pembimbing/detailPeserta/<?= $value['idduser'] ?>"><?= $value['nama']; ?></a></td>
                            </tr>
                            <tr>
                                <th>Pengetahuan</th>
                                <td align="center"><?= $value['pengetahuan']; ?></td>
                            </tr>
                            <tr>
                                <th>Keterampilan</th>
                                <td align="center"><?= $value['keterampilan']; ?></td>
                            </tr>
                            <tr>
                                <th>Kemampuan</th>
                                <td align="center"><?= $value['kemampuan']; ?></td>
                            </tr>
                            <tr>
                                <th>Disiplin</th>
                                <td align="center"><?= $value['disiplin']; ?></td>
                            </tr>
                            <tr align="center">
                                <th>Nilai Rata-Rata</th>
                                <td><?= $value['total']; ?></td>
                            </tr>
                            </tr>
                            <a href="<?= base_url('pembimbing/nilai/cetak/'.$value['nama'].'/'.$value['idduser']) ?>" class="btn btn-success"><i class="fa fa-download">Cetak PDF</i></a>
                        <?php endforeach ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->