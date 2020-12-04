                <!-- Begin Page Content -->
                <div class="container-fluid">
                	<?= $this->session->flashdata('message'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?>
                    	<span>/ <?= $subtitle;?></span>
                    </h1>
                    <h4 class="h4 mb-4 text-gray-800">ID Member : <?= $member_data['id']?></h4>
                    <h4 class="h4 mb-4 text-gray-800">Nama Member : <?= $member_data['name']?></h4>
                    <h4 class="h4 mb-4 text-gray-800">Paket : <?= $member_data['paket']?></h4>
                    <table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Jadwal Workout</th>
						    </tr>
						  </thead>
						  <?php $i=1; ?>
						  <?php foreach($member_history as $m): ?>
						  <tbody>
						    <tr>
						      <th scope="row"><?= $i++;?></th>
						      <td><?= date('d F Y', $m['tanggal'])?></td>
						    </tr>
						  <?php endforeach;?>
						  </tbody>
					</table>
					<a href="<?= base_url('admin/getallmembers')?>" class="btn btn-primary">Kembali</a>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->