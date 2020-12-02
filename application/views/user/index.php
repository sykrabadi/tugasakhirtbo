                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <div class="row">
                    <div class="col-lg-6">
                      <?= $this->session->flashdata('message'); ?>
                    </div>
                  </div>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    <div class="card mb-3" style="max-width: 540px;">
                      <div class="row no-gutters">
                        <div class="col-md-4">
                          <img src="<?= base_url('assets/img/profile/'). $user['image'];?>" class="card-img">
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <h5 class="card-title"><?= $user['name']?></h5>
                            <p class="card-text"><?= $user['email']?></p>
                            <p class="card-text"><small class="text-muted">Member Since <?= date('d F Y', $user['date_created'])?></small></p>
                            <p class="card-text"><?= $user['paket']?></p>
                            <?php if($user['is_assessed']==0):?>
                            <a class="badge badge-info" disabled>Asesmen Awal Belum Tersedia</a>
                            <?php else:?>
                            <a class="badge badge-success" href="<?= base_url('user/getassessmentdetail')?>">Lihat Assessmen Awal</a>
                            <?php endif;?>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
