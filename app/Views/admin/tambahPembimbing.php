<!-- Begin Page Content -->
<div class="container-fluid">
    <?php $val = Service('validation'); ?>
    <div class="row m-2">
        <div class="col">
            <div class="card card-olive shadow">
                <div class="card-header">
                    <h3 class="card-title">Masukkan Data Pembimbing</h3>
                </div>
                <div class="card-body">
                    <!-- display flash data message -->
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('dashboard/admin/pembimbing/insert'); ?>" enctype="multipart/form-data" method="POST" onSubmit="return confirm('Apakah anda yakin? Pastikan data yang diisi sudah benar');">
                        <div class="form-group">
                            <label for="nama">Nama</label><small class="text-danger">*</small>
                            <input type="nama" name="nama" class="form-control" id="nama">
                            <?= ($val->hasError('nama')) ? '<small class="text-danger">' . $val->getError('nama') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label><small class="text-danger">*</small>
                            <input type="email" name="email" class="form-control" id="email">
                            <?= ($val->hasError('email')) ? '<small class="text-danger">' . $val->getError('email') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group">
                            <label for="inputRole">Peran</label><small class="text-danger">*</small>
                            <select class="form-control" id="inputRole" placeholder="Peran" name="role">
                                <option value="2">Pembimbing</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputJK">Jenis Kelamin</label><small class="text-danger">*</small>
                            <select class="form-control" id="inputJK" placeholder="Jenis Kelamin" name="JK">
                                <option value="1">Laki-Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputTanggalLahir">Tanggal Lahir</label><small class="text-danger">*</small>
                            <input type="date" class="form-control " id="inputTanggalLahir" placeholder="Tanggal Lahir" name="tglLahir">
                            <?= ($val->hasError('tglLahir')) ? '<small class="text-danger">' . $val->getError('tglLahir') . '</small>' : ''; ?>

                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
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