                <!-- Begin Page Content -->
                <div class="container-fluid">

                  <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                      <?= validation_errors(); ?>
                    </div>
                  <?php endif; ?>
                  <!-- jalankan flash message jika validasi berhasil -->
                  <?= $this->session->flashdata('message'); ?>
                  <!-- Page Heading -->
                  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Event</th>
                        <th scope="col">Penyelenggara</th>
                        <th scope="col">Tingkat</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <?php $i = 1; ?>
                    <?php foreach ($lomba as $l) : ?>
                      <tbody>
                        <tr>
                          <th scope="row"><?= $i++; ?></th>
                          <td><?= $l['nama'] ?></td>
                          <td><?= $l['penyelenggara'] ?></td>
                          <td><?= $l['tingkat'] ?></td>
                          <td>
                            <?php if ($this->menu->cekTerdaftar($this->session->userdata('id'), $l['id'])) : ?>
                              <a class="badge badge-success" disabled ?>Anda Sudah Terdaftar</a>
                            <?php else : ?>
                              <a href="" class="daftar-lomba badge badge-primary" data-toggle="modal" data-target="#daftar" data-id='<?= $l['id'] ?>'>Daftar</a>
                            <?php endif; ?>
                            <a href="" class="daftar-lomba badge badge-info" data-toggle="modal" data-target="#info" data-id='<?= $l['id'] ?>'>Daftar Peserta</a>

                          </td>
                        </tr>
                      </tbody>
                    <?php endforeach; ?>
                  </table>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
                <!-- Modal -->
                <div class="modal fade" id="daftar" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="newSubMenuModalLabel">Daftar Lomba</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?= base_url('lomba'); ?>" method="post">
                          <input type="hidden" id="id_user" name="id_user" value="<?= $this->session->userdata('id') ?>">
                          <input type="text" class="form-control" id="id_lomba" placeholder="id_lomba" name="id_lomba" value="<?= $l['id'] ?>" readonly>
                          <div class="justify-content-center">
                            <i class="fas fa-users"></i>
                            <label>Nama Tim</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="title" name="namatim" placeholder="Nama Tim">
                          </div>

                          <div class="justify-content-center">
                            <i class="fas fa-user-tie"></i>
                            <label>Dosen Pebimbing</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="title" name="dosen" placeholder="Dosen Pembimbing">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="url" name="nip" placeholder="NIP/NIDN">
                          </div>

                          <div class="justify-content-center">
                            <i class="fas fa-user-alt"></i>
                            <label>Data Anggota 1</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="nama1" placeholder="Nama">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="nim1" placeholder="NIM">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="jurusan1" placeholder="Jurusan">
                          </div>

                          <div class="justify-content-center">
                            <i class="fas fa-user-alt"></i>
                            <label>Data Anggota 2</label>
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="nama2" placeholder="Nama">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="nim2" placeholder="NIM">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="jurusan2" placeholder="Jurusan">
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="info" tabindex="-1" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="newSubMenuModalLabel">Daftar Peserta Lomba</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
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
                          <?php $i = 1 ?>
                          <?php $team = $this->menu->getTeamByLomba($l['id']); ?>
                          <?php foreach ($team as $t) : ?>
                            <tbody>
                              <tr>
                                <?= $l['id'] ?>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $t['namatim'] ?></td>
                                <td><?= $t['dosen'] ?></td>
                                <td><?= $t['nama1'] ?></td>
                                <td><?= $t['nama2'] ?></td>
                              </tr>
                            </tbody>
                          <?php endforeach; ?>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>