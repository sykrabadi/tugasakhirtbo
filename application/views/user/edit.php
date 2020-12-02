                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    
                    <div class="row">
                    	<div class="col-lg-8">
                    		<?php echo form_open_multipart('user/edit');?>
                    			<div class="form-group row">
								    <label for="email" class="col-sm-2 col-form-label">Email</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?= $user['email']?>" readonly>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
								    <div class="col-sm-10">
								    	<input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" value="<?= $user['tanggal_lahir']?>" placeholder="<?= $user['tanggal_lahir']?>">
								    </div>
								</div>
								<div class="form-group row">
								    <label for="TB" class="col-sm-2 col-form-label">Tinggi Badan (Cm)</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" id="TB" placeholder="Cm" name="tinggi_badan" value="<?= $user['tinggi_badan']?>">
								      <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="BB" class="col-sm-2 col-form-label">Berat Badan (Kg)</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" id="BB" placeholder="Kg" name="berat_badan" value="<?= $user['berat_badan']?>">
								      <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?= $user['name']?>">
								      <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
								    </div>
								</div>
								<div class="form-group row">
								    <label for="paket" class="col-sm-2 col-form-label">Paket</label>
								    <div class="col-sm-10">
								      <select id="paket" name="paket" class="form-control" value="<?php echo set_value('paket');?>">
								      	<option value="Weight Gain">Weight Gain</option>
								      	<option value="Weight Loss">Weight Loss</option>
								      	<option value="Body Building">Body Building</option>
								      	<option value="Kebugaran">Kebugaran</option>
								      </select>
								      <?= form_error('paket', '<small class="text-danger pl-3">', '</small>'); ?>
								    </div>
								</div>
								<div class="form-group row">
								    <div class="col-sm-2">Picture</div>
								    <div class="col-sm-10">
								    	<div class="row">
								    		<div class="col-sm-3">
								    			<img src="<?= base_url('assets/img/profile/').$user['image'];?>" class="img-thumbnail">
								    		</div>
								    		<div class="col-sm-9">
								    			<div class="custom-file">
												  <input type="file" class="custom-file-input" id="image" name="image">
												  <label class="custom-file-label" for="image">Choose file</label>
												</div>
								    		</div>
								    	</div>
								    </div>
								</div>
								<div class="form-group row justify-content-end">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-primary">Edit</button>
									</div>
								</div>
                    		</form>
                    	</div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
