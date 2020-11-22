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
                                  <th scope="col">Jenis Kelamin</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Jenis Workout</th>
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
                                  <td>
                                      <a href="" class="badge badge-success">Lihat Workout</a>
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
