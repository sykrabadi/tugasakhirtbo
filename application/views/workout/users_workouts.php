                <!-- Begin Page Content -->
                <div class="container-fluid">
                	<?= $this->session->flashdata('message'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?>
                    </h1>
                    <h1 class="h3 mb-4 text-gray-800"></h1>
                    <table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Nama Member</th>
						      <th scope="col">Paket</th>
						      <th scope="col">Jadwal Workout</th>
						      <th scope="col">Keterangan</th>
						    </tr>
						  </thead>
						  <?php $i=1; ?>
						  <?php foreach($users_workouts as $uw): ?>
						  <tbody>
						    <tr>
						      <th scope="row"><?= $i++;?></th>
						      <td><?= $uw['name']?></td>
						      <td><?= $uw['paket']?></td>
						      <td><?= date('d F Y', $uw['tanggal'])?></td>
						      <td>
						      	<?php if($uw['is_accepted'] == 0):?>
						      		<a href="<?= base_url('admin/getuserworkoutdetail/')?><?= $uw['no']?>" class="badge badge-primary">Menunggu Konfirmasi</a>
						      	<?php else:?>
						      		<span href="" class="badge badge-success">Rekap Berhasil Dikirim</span>
						      	<?php endif;?>
						      </td>
						    </tr>
						  <?php endforeach;?>
						  </tbody>
						</table>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->