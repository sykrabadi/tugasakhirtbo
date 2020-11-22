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
                                  <th scope="col">Jenis Workout</th>
                                  <th scope="col">Jenis Gerakan</th>
                                  <th scope="col">Lama Waktu</th>
                                  <th scope="col">Kalori</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1;?>
                                <?php foreach ($daftarMember as $dm):?>
                                <tr>
                                  <th scope="row"><?=$i++;?></th>
                                  <td><?=$sm['jenis_workout'];?></td>
                                  <td><?=$sm['jenis_gerakan'];?></td>
                                  <td><?=$sm['lama_waktu'];?></td>
                                  <td><?=$sm['kalori'];?></td>
                                  >
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
