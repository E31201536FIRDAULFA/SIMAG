<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $val = Service('validation'); ?>
    <div class="row m-2">
        <div class="col">
            <div class="card card-olive shadow">
                <div class="card-header">
                    <h3 class="card-title">Ubah Data Pembimbing</h3>
                </div>
                <div class="card-body">
                    <!-- display flash data message -->
                    <?php
                    if (session()->getFlashdata('failed')) : ?>
                        <div class="alert alert-danger">
                            <?= session()->getFlashdata('failed') ?>
                        </div>
                    <?php endif; ?>
                    <form action="/Admin/editPembimbing/<?= $id; ?>" enctype="multipart/form-data" method="POST">
                        <div class="form-group">
                            <label for="nama">nama</label><small class="text-danger">*</small>
                            <input type="nama" name="nama" class="form-control" id="nama" value="<?= $nama; ?>">
                            <?= ($val->hasError('nama')) ? '<small class="text-danger">' . $val->getError('nama') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="email">email</label><small class="text-danger">*</small>
                            <input type="email" name="email" class="form-control" id="email" value="<?= $email; ?>">
                            <?= ($val->hasError('email')) ? '<small class="text-danger">' . $val->getError('email') . '</small>' : ''; ?>
                        </div>
                        <div class=" form-group">
                            <label for="inputJK">Jenis Kelamin</label><small class="text-danger">*</small>
                            <select class="form-control" id="inputJK" placeholder="Jenis Kelamin" name="JK">
                                <?php if ($jenisKelamin == 1) : ?>
                                    <option value="1" selected>Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                <?php else : ?>
                                    <option value="1">Laki-Laki</option>
                                    <option value="2" selected>Perempuan</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputTanggalLahir">Tanggal Lahir</label><small class="text-danger">*</small>
                            <input type="date" class="form-control " id="inputTanggalLahir" placeholder="Tanggal Lahir" name="tglLahir" value="<?= $tglLahir; ?>">
                            <?= ($val->hasError('tglLahir')) ? '<small class="text-danger">' . $val->getError('tglLahir') . '</small>' : ''; ?>

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