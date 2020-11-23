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
						    </tr>
						  </thead>
						  <?php $i=1; ?>
						  <?php foreach($hehe as $h): ?>
						  <tbody>
						    <tr>
						      <th scope="row"><?= $i++;?></th>
						      <td><?= $h['bb'];?></td>
						      <td><?= $h['tb'];?></td>
						      <td><?= date('d F Y', $h['tanggal'])?></td>
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