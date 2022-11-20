<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $val = Service('validation'); ?>
    <div class="row m-2">
        <div class="col">
            <div class="card card-olive shadow">
                <div class="card-header">
                    <h3 class="card-title">Ubah Laporan Aktivitas Harian</h3>
                </div>
                <div class="card-body">
                    <!-- display flash data message -->
                    <?php
                    if (session()->getFlashdata('failed')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('failed') ?>
                        </div>
                    <?php endif; ?>
                    <form action="" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="date">tanggal</label><small class="text-danger">*</small>
                            <input type="date" name="date" class="form-control" id="date" value="<?= $date; ?>">
                            <?= ($val->hasError('date')) ? '<small class="text-danger">' . $val->getError('date') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="mulai">jam mulai</label><small class="text-danger">*</small>
                            <input type="time" name="mulai" class="form-control" id="mulai" value="<?= $mulai; ?>">
                            <?= ($val->hasError('mulai')) ? '<small class="text-danger">' . $val->getError('mulai') . '</small>' : ''; ?>
                        </div>
                        <div class=" form-group">
                            <label for="selesai">jam selesai</label><small class="text-danger">*</small>
                            <input type="time" name="selesai" class="form-control" id="selesai" value="<?= $selesai; ?>">
                            <?= ($val->hasError('selesai')) ? '<small class="text-danger">' . $val->getError('selesai') . '</small>' : ''; ?>
                        </div>
                        <div class=" form-group">
                            <label for="keterangan">Penjelasan Kegiatan</label><small class="text-danger">*</small>
                            <input type="text" name="keterangan" class="form-control" id="keterangan" value="<?= $keterangan; ?>">
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
<script>
    $('.alert').delay(5000).slideUp('slow');
</script>
</div>
<!-- End of Main Content -->