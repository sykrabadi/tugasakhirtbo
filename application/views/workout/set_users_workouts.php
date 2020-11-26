                <!-- Begin Page Content -->
                <div class="container-fluid">
                	
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>

                    <form method="post" action="<?= base_url('admin/setuserworkout/') ?><?= $user_id?>">
                    <div class="form-group">
					    <label for="formGroupExampleInput">ID User</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" value="<?= $user_id;?>" name="user_id" readonly>
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput">Angkat Beban</label>
					    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Kg" name="angkat_beban">
					  </div>
					  <div class="form-group">
					    <label for="formGroupExampleInput2">Lari</label>
					    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Km" name="lari">
					  </div>
					  <a href="<?= base_url('admin/getusersworkouts') ;?>" type="button" class="btn btn-secondary">Kembali</a>
					  <button type="submit" class="btn btn-primary">Submit</button>
					</form>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
