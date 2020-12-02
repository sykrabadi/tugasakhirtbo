                <!-- Begin Page Content -->
                <div class="container-fluid">
                	<?= $this->session->flashdata('message'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    <h1 class="h5 mb-4 text-gray-800">Nama Member : <?= $member_detail['name']?></h1>
                    <h1 class="h5 mb-4 text-gray-800">Paket : <?= $member_detail['paket']?></h1>
                    <h1 class="h3 mb-4 text-gray-800"></h1>
                    <a href="<?= base_url('admin/getallmembers')?>" type="button" class="btn btn-primary mb-3">Kembali</a>
                    <table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Tanggal Terdaftar</th>
						    </tr>
						  </thead>
						  <?php $i=1; ?>
						  <?php foreach($member_workout as $mw): ?>
						  <tbody>
						    <tr>
						      <th scope="row"><?= $i++;?></th>
						      <td><?= date('d F Y', $mw['tanggal'])?></td>
						      <td></td>
						    </tr>
						  <?php endforeach;?>
						  </tbody>
						</table>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->