                <!-- Begin Page Content -->
                <div class="container-fluid">
                	<?= $this->session->flashdata('message'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?>
                    	<span>/ <?= $subtitle;?></span>
                    </h1>
                    <h1 class="h5 mb-4 text-gray-800">Nama Member : <?= $member_detail['name']?></h1>
                    <h1 class="h5 mb-4 text-gray-800">Paket : <?= $member_detail['paket']?></h1>
                    <form method="post" action="<?= base_url('admin/setassessmentbyid/') ?><?= $user_id?>">
                    <div class="form-group">
					    <label for="formGroupExampleInput">Tinggi Badan</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $member_detail['tinggi_badan'];?>" readonly>
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput">Berat Badan</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $member_detail['berat_badan'];?>"readonly>
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput">BMI</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="BMI" name="bmi">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput">Persentase Lemak Tubuh</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Persentase Lemak Tubuh" name="lemak_tubuh">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput">Detak Jantung Rehat</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Detak Jantung" name="detak_jantung">
					  </div>
					  <a href="<?= base_url('admin/getallmembers/') ;?>" type="button" class="btn btn-secondary">Kembali</a>
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->