<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Tabel Laporan Aktivitas Harian -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <center>
                <h4 class="font-weight-bold">Report Nilai Mahasiswa Magang</h4>
            </center>
        </div>

        <div>
            <h6 class="font-weight">Dari hasil pelaksanaan praktek kerja mahasiswa tersebut, maka dapat dilakukan penilaian sebagai berikut :</h6>
        </div>


        <!-- tabel laporan aktivitas yang belum disetujui -->
        <div class="table-responsive" id="tabel-belumsetuju">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center">
                        <td rowspan="6"><b>Nama</b></td>
                        <td><a href="/Pembimbing/detailPeserta/<?= $value['idduser'] ?>"><?= $value['nama']; ?></a></td>
                    </tr>
                    <td colspan="1"><b>Penelitian</b></td>
                    <td colspan="1"><b>Angka</b>

                        <?php foreach ($aktif as $key => $value) : ?>
                    </td>
                    </tr>

                    <tr>
                        <td>Pengetahuan Tentang Aktivitas Kerja</td>
                        <td align="center"><?= $value['pengetahuan']; ?></td>

                    </tr>

                    <tr>
                        <td>Keterampilan</td>
                        <td align="center"><?= $value['keterampilan']; ?></td>
                    </tr>

                    <tr>
                        <td>Kemampuan Team Work/Komunikasi</td>
                        <td align="center"><?= $value['kemampuan']; ?></td>
                    </tr>

                    <tr>
                        <td> Disiplin Tanggung Jawab</td>
                        <td align="center"><?= $value['disiplin']; ?></td>

                    </tr>
                    <tr align="center">
                        <td><b>Nilai Rata-Rata</b></td>
                        <td><?= $value['total']; ?></td>
                    </tr>
                    <tr>
                        <td class="text-center flex">
                            <a href="/Pembimbing/nilai/<?= $value['idduser'] ?>" class="btn btn-success"><i class="fa fa-plus"></i></a>
                            <b>|</b>

                        </td>
                    </tr>
                <?php endforeach ?>
                </tr>
                </thead>
                <tbody>
            </table>
        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->