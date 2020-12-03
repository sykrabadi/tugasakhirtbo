                <!-- Begin Page Content -->
                <div class="container-fluid">
                	<?= $this->session->flashdata('message'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    <h1 class="h3 mb-4 text-gray-800"></h1>
                    <a href="<?= base_url('workout')?>" type="button" class="btn btn-primary mb-3">Kembali</a>
                    <div>
                    	<h4>Tanggal Workout : <?= date('d F Y', $workout_detail->tanggal)?></h4>
                    	<h4>Catatan Kegiatan : <?= $workout_detail->catatan?></h4>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->