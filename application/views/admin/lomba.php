                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    
                    <div class="row">
                        <div class="col-lg">
                            <!-- jalankan error message jika tidak ada form yang terisi -->
                            <?php if(validation_errors()): ?>
                              <div class="alert alert-danger" role="alert">
                                <?= validation_errors();?>
                              </div>
                            <?php endif;?>
                              <!-- jalankan flash message jika validasi berhasil -->
                              <?= $this->session->flashdata('message');?>
                            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Lomba</a>
                            <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Nama</th>
                                  <th scope="col">Penyelenggara</th>
                                  <th scope="col">Tingkat</th>
                                  <th scope="col">Aksi</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php $i=1;?>
                                <?php foreach ($lomba as $l):?>
                                <tr>
                                  <th scope="row"><?=$i++;?></th>
                                  <td><?=$l['nama'];?></td>
                                  <td><?=$l['penyelenggara'];?></td>
                                  <td><?=$l['tingkat'];?></td>
                                  <td>
                                      <a href="<?= base_url();?>/admin/getAllPesertaById/<?= $l['id'];?>" class="badge badge-info">Daftar Peserta</a>
                                      <a href="<?= base_url();?>/admin/hapusLombaById/<?= $l['id'];?>" class="badge badge-danger" onclick="return confirm('yakin ?');">Hapus</a>
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

            <!-- modal -->

            <!-- Modal -->
            <div class="modal fade" id="newSubMenuModal" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Lomba</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="<?= base_url('admin/addlomba');?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lomba">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="penyelenggara" name="penyelenggara" placeholder="Penyelenggara">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="tingkat" name="tingkat" placeholder="Tingkat">
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
