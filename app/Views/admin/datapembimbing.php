<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- display flash data message -->
            <?php
            if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>
            <h4 class="font-weight-bold">Data Pembimbing PKL <a href="tambahPembimbing"><button type="submit" class="btn btn-primary"><i class="fa fa-plus "></i></button></a></h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Jenis Kelamin</th>
                            <th>Tnggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($detail as $key => $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= ($value['role'] == '1' ? 'Admin' : 'Pembimbing'); ?></td>
                                <td><?= ($value['jenisKelamin'] == '1' ? 'Laki-Laki' : 'Perempuan') ?></td>
                                <td><?= $value['tglLahir']; ?></td>
                                <td class="text-center flex">
                                    <a href="/Admin/editPembimbing/<?= $value['id']; ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="/Admin/hapusPembimbing/<?= $value['id']; ?>" onclick="return confirm('Apakah anda yakin? Anda tidak akan dapat memulihkan file!')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
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