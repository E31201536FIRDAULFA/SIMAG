<div class="container">
    <?php $val = Service('validation'); ?>
    <div class="row justify-content-center">
        <div class="card shadow-lg my-5">
            <div class="card-body p-0">
                <div class="p-5">
                    <!-- display flash data message -->
                    <?php
                    if (session()->getFlashdata('failed')) : ?>
                        <div class="alert alert-danger">
                            <?php echo session()->getFlashdata('failed') ?>
                        </div>
                    <?php endif; ?>
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Lengkapi Data Registrasi Akun!</h1>
                    </div>
                    <form class="user" action="" enctype="multipart/form-data" method="POST" onSubmit="return confirm('Apakah anda yakin? Pastikan data yang diisi sudah benar');">
                        <div class="form-group">
                            <label for="inputNama">Nama</label><small class="text-danger">*</small><br>
                            <input type="text" class="form-control " id="inputNama" placeholder="Nama Lengkap" name="nama">
                            <?= ($val->hasError('nama')) ? '<small class="text-danger">' . $val->getError('nama') . '</small>' : ''; ?>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="inputJK">Jenis Kelamin</label><br>
                                <select class="form-control" id="inputJK" placeholder="Jenis Kelamin" name="JK">
                                    <option value="1">Laki-Laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputTanggalLahir">Tanggal Lahir</label><small class="text-danger">*</small><br>
                                <input type="date" class="form-control " id="inputTanggalLahir" placeholder="Tanggal Lahir" name="tglLahir">
                                <?= ($val->hasError('tglLahir')) ? '<small class="text-danger">' . $val->getError('tglLahir') . '</small>' : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label><br>
                            <input type="email" class="form-control " id="inputEmail" placeholder="Alamat Email" name="email" readonly value="<?= session()->email; ?>">
                        </div>


                        <button class="btn btn-primary" name="submit" type="submit">
                            Registrasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $('.alert').delay(5000).slideUp('slow');
</script>