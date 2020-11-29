                <!-- Begin Page Content -->
                <div class="container-fluid">
                	<?= $this->session->flashdata('message'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    <a href="<?= base_url('admin/getallmembers')?>" type="button" class="btn btn-primary mb-3">Kembali</a>
                    <table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">ID User</th>
						      <th scope="col">Berat Badan Saat Terdaftar</th>
						      <th scope="col">Tinggi Badan Saat Terdaftar</th>
						      <th scope="col">Tanggal Terdaftar</th>
						      <th scope="col">Aksi</th>
						    </tr>
						  </thead>
						  <?php $i=1; ?>
						  <?php foreach($member_workout as $mw): ?>
						  <tbody>
						    <tr>
						      <th scope="row"><?= $i++;?></th>
						      <td><?= $mw['user_id']?></td>
						      <td><?= $mw['bb'];?></td>
						      <td><?= $mw['tb'];?></td>
						      <td><?= date('d F Y', $mw['tanggal'])?></td>
						      <td>
						      <?php if($mw['is_accepted'] == 0): ?>
						      	<a class="badge badge-warning" href="<?= base_url('admin/setuserworkout/') ?><?= $mw['user_id']?>">Menunggu Konfirmasi</a>
						      	<?php else: ?>
						      	<a class="badge badge-success" disabled >Berhasil Dikirim</a>
						      <?php endif; ?>
						      </td>
						    </tr>
						  <?php endforeach;?>
						  </tbody>
						</table>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->