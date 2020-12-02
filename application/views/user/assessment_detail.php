                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <div class="row">
                    <div class="col-lg-6">
                      
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    <a href="<?= base_url('user/index')?>" type="button" class="btn btn-primary mb-3">Kembali</a>
                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">BMI</span>
                      </div>
                      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?= $user['bmi']?>" readonly>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Persentase Lemak Tubuh</span>
                      </div>
                      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?= $user['lemak_tubuh']?>" readonly>
                    </div>

                    <div class="input-group input-group-sm mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Detak Jantung Rehat</span>
                      </div>
                      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" value="<?= $user['detak_jantung']?>" readonly>
                    </div>
                    </div>
                  </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
