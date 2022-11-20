<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $val = Service('validation'); ?>
    <div class="row m-2">
        <div class="col">
            <div class="card card-olive shadow">
                <div class="card-header">
                    <h3 class="card-title">Masukkan Aktivitas PKL Terbaru</h3>
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
                        <div class="form-group">
                            <label for="date">Tanggal</label><small class="text-danger">*</small>
                            <input type="date" name="date" class="form-control" id="date">
                            <?= ($val->hasError('date')) ? '<small class="text-danger">' . $val->getError('date') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="mulai">Jam mulai</label><small class="text-danger">*</small>
                            <input type="time" name="mulai" class="form-control" id="mulai">
                            <?= ($val->hasError('mulai')) ? '<small class="text-danger">' . $val->getError('mulai') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="selesai">Jam selesai</label><small class="text-danger">*</small>
                            <input type="time" name="selesai" class="form-control" id="selesai">
                            <?= ($val->hasError('selesai')) ? '<small class="text-danger">' . $val->getError('selesai') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Penjelasan Kegiatan</label><small class="text-danger">*</small>
                            <input type="text" name="keterangan" class="form-control" id="keterangan">
                            <?= ($val->hasError('keterangan')) ? '<small class="text-danger">' . $val->getError('keterangan') . '</small>' : ''; ?>
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