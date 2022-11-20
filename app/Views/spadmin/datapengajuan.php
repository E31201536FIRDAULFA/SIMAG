 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Tabel data peserta -->
     <div class="card shadow mb-4">
         <div class="card-header py-3">
             <h4 class="font-weight-bold">Data Peserta PKL</h4>
             <ul class="nav nav-pills nav-fill">
                 <li class="nav-item">
                     <a class="nav-link active font-weight-bold" aria-current="page" href="#" id="aktif">Data Pengajuan</a>
                 </li>
             </ul>
         </div>


         <div class="card-body">
             <!-- tabel data peserta aktif -->
             <div class="table-responsive" id="tabel-aktif" style="display: none;">
                 <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>Nama</th>
                             <th>instansi</th>
                             <th>Opsi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php $i = 1; ?>
                         <?php foreach ($aktif as $key => $value) : ?>
                             <tr>
                                 <td><?= $i;
                                        $i++; ?></td>
                                 <td><?= $value['nama']; ?></td>
                                 <td><?= $value['email']; ?></td>
                                 <td>
                                     <a href="/Pembimbing/terimaPeserta/<?= $value['id'] ?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                 </td>

                             </tr>
                         <?php endforeach ?>
                     </tbody>
                 </table>
             </div>