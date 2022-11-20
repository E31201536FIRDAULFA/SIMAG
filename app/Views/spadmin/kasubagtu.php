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
            <h4 class="font-weight-bold">Kuota Perseksi </a></h4>
        </div>

        <div class="card-body">
            <div class="table-responsive" id="">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Divisi Distribusi</th>
                            <th>Divisi Produksi</th>
                            <th>Divisi Sosial</th>
                            <th>Divisi Neraca</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data as $value) : ?>
                            <tr>
                                <td><?= $i;
                                    $i++; ?></td>
                                <td><?= $value['d_distribusi']; ?></td>
                                <td><?= $value['d_produksi']; ?></td>
                                <td><?= $value['d_sosial']; ?></td>
                                <td><?= $value['d_neraca']; ?></td>
                                <td class="text-center flex">
                                    <a href="/TU/updatekuota/<?= $value['id']; ?>"> <button type="submit" class="btn btn-success"> <i class="fa fa-edit"></i></button></a>
                                    <button type="submit" class="btn btn-danger remove"> <i class="fa fa-trash "></i></button>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>

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