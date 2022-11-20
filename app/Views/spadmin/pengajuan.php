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
                        <h1 class="h4 text-gray-900 mb-4">Lengkapi Data Pengajuan Anda!</h1>
                    </div>
                    <form class="user" action="" enctype="multipart/form-data" method="POST" onSubmit="return confirm('Apakah anda yakin? Pastikan data yang diisi sudah benar');">

                        <div class="form-group">
                            <label for="inputInstansi">Instansi/Sekolah Asal</label><small class="text-danger">*</small><br>
                            <input type="text" class="form-control " id="inputInstansi" placeholder="Instansi/Sekolah Asal" name="instansi">
                            <?= ($val->hasError('instansi')) ? '<small class="text-danger">' . $val->getError('instansi') . '</small>' : ''; ?>
                        </div>
                        Pelaksanaan PKL
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label for="inputMulai">Dari</label><small class="text-danger">*</small><br>
                                <input type="date" class="form-control " id="inputMulai" placeholder="Dari" name="startDate">
                                <?= ($val->hasError('startDate')) ? '<small class="text-danger">' . $val->getError('startDate') . '</small>' : ''; ?>
                            </div>
                            <div class="col-sm-6">
                                <label for="inputSelesai">Sampai</label><small class="text-danger">*</small><br>
                                <input type="date" class="form-control " id="inputSelesai" placeholder="Sampai" name="endDate">
                                <?= ($val->hasError('endDate')) ? '<small class="text-danger">' . $val->getError('endDate') . '</small>' : ''; ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputSuratPengantar">Dokumen Surat Pengantar</label><small class="text-danger">*</small><br>
                            <input type="file" id="inputSuratPengantar" placeholder="Dokumen Surat Pengantar" name="pengantar">
                            <?= ($val->hasError('pengantar')) ? '<small class="text-danger">' . $val->getError('pengantar') . '</small>' : ''; ?>
                            <small><em><br>format pdf & ukuran maksimal 10MB</em></small>
                        </div>
                        <div class="form-group">
                            <label for="inputProposal">Dokumen Proposal</label><small class="text-danger">*</small><br>
                            <input type="file" id="inputProposal" placeholder="Dokumen Proposal" name="proposal">
                            <?= ($val->hasError('proposal')) ? '<small class="text-danger">' . $val->getError('proposal') . '</small>' : ''; ?>
                            <small><em><br>format pdf & ukuran maksimal 10MB</em></small>
                        </div>
                        <button class="btn btn-primary" name="submit" type="submit">
                            Ajukan Pendaftaran
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