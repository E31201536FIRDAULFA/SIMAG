<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $val = Service('validation'); ?>
    <div class="row m-2">
        <div class="col">
            <div class="card card-olive shadow">
                <div class="card-header">
                    <h3 class="card-title">Input Nilai Kegiatan Mahasiswa</h3>
                </div>
                <div class="card-body">
                    <!-- display flash data message -->
                    <?php
                    if (session()->getFlashdata('failed')) : ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('failed') ?>
                        </div>
                    <?php endif; ?>
                    <form action="" enctype="multipart/form-data" method="POST" onSubmit="return confirm('Apakah anda yakin? Pastikan data yang diisi sudah benar');">
                        <!-- <input type="text" name="idd_user" value=""> -->
                        <div class="form-group">
                            <label for="pengetahuan">Pengetahuan Tentang Aktivitas Kerja</label><small class="text-danger">*</small>
                            <input type="number" name="pengetahuan" class="form-control" id="Nilai" placeholder="Masukan Nilai Angka">
                            <?= ($val->hasError('pengetahuan')) ? '<small class="text-danger">' . $val->getError('pengetahuan') . '</small>' : ''; ?>
                        </div>

                        <div class="form-group">
                            <label for="keterampilan">Keterampilan</label><small class="text-danger">*</small>
                            <input type="number" name="keterampilan" class="form-control" id="keterampilan" placeholder="Masukan Nilai Angka">
                            <?= ($val->hasError('keterampilan')) ? '<small class="text-danger">' . $val->getError('keterampilan') . '</small>' : ''; ?>
                        </div>

                        <div class="form-group">
                            <label for="kemampuan">Kemampuan Team Work/Komunikasi</label><small class="text-danger">*</small>
                            <input type="number" name="kemampuan" class="form-control" id="kemampuan" placeholder="Masukan Nilai Angka">
                            <?= ($val->hasError('kemampuan')) ? '<small class="text-danger">' . $val->getError('kemampuan') . '</small>' : ''; ?>
                        </div>

                        <div class="form-group">
                            <label for="disiplin">Disiplin Tanggung Jawab</label><small class="text-danger">*</small>
                            <input type="number" name="disiplin" class="form-control" id="disiplin" placeholder="Masukan Nilai Angka">
                            <?= ($val->hasError('disiplin')) ? '<small class="text-danger">' . $val->getError('disiplin') . '</small>' : ''; ?>
                        </div>

                        <div class="form-group">
                            <label for="total">Nilai Rata-Rata</label><small class="text-danger">*</small>
                            <input type="number" name="total" class="form-control" id="total" placeholder="Masukan Nilai Angka">
                            <?= ($val->hasError('total')) ? '<small class="text-danger">' . $val->getError('total') . '</small>' : ''; ?>
                        </div>


                        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
                <!-- /.card-body -->
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