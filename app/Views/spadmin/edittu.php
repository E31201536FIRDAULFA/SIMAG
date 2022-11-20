<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $val = Service('validation'); ?>
    <div class="row m-2">
        <div class="col">
            <div class="card card-olive shadow">
                <div class="card-header">
                    <h3 class="card-title">Update Kuota</h3>
                </div>
                <div class="card-body">
                    <!-- display flash data message -->
                    <?php
                    if (session()->getFlashdata('failed')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('failed') ?>
                        </div>
                    <?php endif; ?>
                    <form action="/TU/updatekuota/<?= $id; ?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="d_distribusi">Divisi Distribusi</label><small class="text-danger">*</small>
                            <input type="text" name="d_distribusi" class="form-control" id="d_distribusi" value="<?= $d_distribusi; ?>">
                            <?= ($val->hasError('d_distribusi')) ? '<small class="text-danger">' . $val->getError('d_distribusi') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="d_produksi">Divisi Produksi</label><small class="text-danger">*</small>
                            <input type="text" name="d_produksi" class="form-control" id="d_produksi" value="<?= $d_produksi; ?>">
                            <?= ($val->hasError('d_produksi')) ? '<small class="text-danger">' . $val->getError('d_produksi') . '</small>' : ''; ?>
                        </div>

                        <div class="form-group">
                            <label for="d_sosial">Divisi Sosial</label><small class="text-danger">*</small>
                            <input type="text" name="d_sosial" class="form-control " id="d_sosial" placeholder="" value="<?= $d_sosial; ?>">
                            <?= ($val->hasError('d_sosial')) ? '<small class="text-danger">' . $val->getError('d_sosial') . '</small>' : ''; ?>
                        </div>

                        <div class="form-group">
                            <label for="d_neraca">Divisi Neraca</label><small class="text-danger">*</small>
                            <input type="text" name="d_neraca" class="form-control " id="d_neraca" placeholder="" value="<?= $d_neraca; ?>">
                            <?= ($val->hasError('d_neraca')) ? '<small class="text-danger">' . $val->getError('d_neraca') . '</small>' : ''; ?>
                        </div>
                        <button type=" submit" name="submit" class="btn btn-primary">Simpan</button>
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