                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
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
						  <?php foreach($users_workouts as $u): ?>
						  <tbody>
						    <tr>
						      <th scope="row"><?= $i++;?></th>
						      <td><?= $u['user_id']?></td>
						      <td><?= $u['bb'];?></td>
						      <td><?= $u['tb'];?></td>
						      <td><?= date('d F Y', $u['tanggal'])?></td>
						      <td>
						      <?php if($u['is_accepted'] == 0): ?>
						      	<a class="badge badge-warning" href="<?= base_url('admin/setuserworkout/') ?><?= $u['user_id']?>">Menunggu Konfirmasi</a>
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