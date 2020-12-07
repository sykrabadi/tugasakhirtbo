                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    <div class="row">
                        <div class="col-lg">
                    <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Paket</th>
                                  <th scope="col">Asesmen Awal</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1;?>
                                <?php foreach ($users as $u):?>
                                <tr>
                                  <th scope="row"><?=$i++;?></th>
                                  <td><?=$u['name'];?></td>
                                  <td><?=$u['email'];?></td>
                                  <td><?=$u['paket'];?></td>
                                  <td>
                                    <?php if($u['is_assessed'] == 0):?>
                                      <a href="<?= base_url('admin/setassessmentbyid/')?><?= $u['id']?>" class="badge badge-warning">Belum Menerima Asesmen Awal</a>
                                    <?php else:?>
                                      <a href="" class="badge badge-success">Sudah Melakukan Asesmen Awal</a>
                                    <?php endif?>
                                  </td>
                                  <td>
                                      <a href="<?= base_url('admin/getuserworkoutbyid/')?><?= $u['id']?>" class="badge badge-success">Riwayat Workout</a>
                                      <a href=""<?= base_url('admin/hapus_data/') ?><?= $u['id'] ?>" class="badge badge-danger">Hapus</a>
                                  </td>
                                </tr>
                                <?php endforeach;?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
