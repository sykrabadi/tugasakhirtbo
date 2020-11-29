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
                                      <a href="<?= base_url('admin/getmemberbyid/')?><?= $u['id']?>" class="badge badge-success">Lihat Workout</a>
                                      <a href="" class="badge badge-danger">Hapus</a>
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
