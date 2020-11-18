                <!-- Begin Page Content -->
                <div class="container-fluid">
                	
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    <div>
                		<a href="<?= base_url('admin/addlomba'); ?>">
                			<button type="button" class="btn btn-primary mb-3">Kembali</button>
                		</a>
                	</div>
                    <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Nama Tim</th>
                                  <th scope="col">Nama Dosen</th>
                                  <th scope="col">Nama Anggota 1</th>
                                  <th scope="col">Nama Anggota 2</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1;?>
                                <?php foreach ($users as $u):?>
                                <tr>
                                  <th scope="row"><?=$i++;?></th>
                                  <td><?=$u['namatim'];?></td>
                                  <td><?=$u['dosen'];?></td>
                                  <td><?=$u['nama1'];?></td>
                                  <td><?=$u['nama2'];?></td>
                                </tr>
                                <?php endforeach;?>
                              </tbody>
                            </table>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
