                <!-- Begin Page Content -->
                <div class="container-fluid">
                	<?= $this->session->flashdata('message'); ?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?= $title;?></h1>
                    
                   <div>
                   	<h4>ID Member : <?= $member_detail['user_id']?></h4>
                   		<h4>Agenda : 
                   		<?php if($member_detail['catatan'] == ''):?>
                   				<?= 'Tidak ada catatan'?>
                   			<?php else:?>
                   				<?= $member_detail['catatan']?>	
                   			<?php endif;?>
                   		</h4>
                   </div>
                   <div>
                   	<form method="post" action="<?= base_url('admin/getuserworkoutdetail')?>">
                   		<button type="submit" class="btn btn-success mb-3">Terima</button>
                   		<a href="<?= base_url('admin/getusersworkouts')?>" type="button" class="btn btn-primary mb-3">Kembali</a>
                   	</form>
                   </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->