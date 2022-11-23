<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- display flash data message -->
                <?php if (!empty(session()->getFlashdata('error'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty(session()->getFlashdata('success'))) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php endif; ?>
            <h4 class="font-weight-bold">Data Pembimbing PKL <a href="<?= base_url('dashboard/admin/pembimbing/add') ?>"><button type="submit" class="btn btn-primary"><i class="fa fa-plus "></i></button></a></h4>
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
                                    <a href="<?= base_url('dashboard/admin/pembimbing/edit/'.$value['id']); ?>" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                    <a href="<?= base_url('dashboard/admin/pembimbing/delete/'.$value['id']); ?>" onclick="return confirm('Apakah anda yakin? Anda tidak akan dapat memulihkan file!')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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