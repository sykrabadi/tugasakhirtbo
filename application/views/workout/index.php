                <!-- Begin Page Content -->
                <div class="container-fluid">

					<?= $this->session->flashdata('message'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    <!-- Button trigger modal -->
						<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#planner">
						  + Buat Workout Planner 
						</button>

						<table class="table table-hover">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Berat Badan Saat Terdaftar</th>
						      <th scope="col">Tinggi Badan Saat Terdaftar</th>
						      <th scope="col">Tanggal Terdaftar</th>
						      <th scope="col">Aksi</th>
						    </tr>
						  </thead>
						  <?php $i=1; ?>
						  <?php foreach($workout_data as $w): ?>
						  <tbody>
						    <tr>
						      <th scope="row"><?= $i++;?></th>
						      <td><?= $w['bb'];?></td>
						      <td><?= $w['tb'];?></td>
						      <td><?= date('d F Y', $w['tanggal'])?></td>
						      <td>
						      <?php if($w['is_accepted'] == 0): ?>
						      	<a class="badge badge-info" disabled ?>Menunggu Konfirmasi</a>
						      	<?php else: ?>
						      	<a class="badge badge-success" href="" data-target="#detail" data-toggle="modal" ?>Lihat Detail</a>
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

				<!-- Modal -->
				<div class="modal fade" id="planner" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Buat Workout Planner</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				      <div class="modal-body">
				        <form method="post" action="<?= base_url('workout'); ?>">
				        	<input type="hidden" value="<?= $this->session->userdata('id'); ?>" readonly>
						  <div class="form-group">
						    <label for="formGroupExampleInput">Berat Badan Saat Ini</label>
						    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Berat Badan" name="bb">
						  </div>
						  <input type="hidden" value="">

						  <div class="form-group">
						    <label for="formGroupExampleInput">Tinggi Badan Saat Ini</label>
						    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Tinggi Badan" name="tb">
						  </div>
						  <input type="hidden" value="">

				      </div>
				      
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" class="btn btn-primary">Kirim</button>
				      </div>
				  	</form>
				    </div>
				  </div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Buat Workout Planner</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>

				      <div class="modal-body">
				     	<p>hehe</p>
				      </div>
				      
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				      </div>
				  	</form>
				    </div>
				  </div>
				</div>