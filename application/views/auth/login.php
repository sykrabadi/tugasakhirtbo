<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="px-5 py-3">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 my-3"><b>LOGIN</b></h1>
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Lupa Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url(); ?>/auth/registration">Belum punya akun? Daftar!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify=content-center p-3">
                        <div class="col d-flex justify-content-center">
                            <img src="<?= base_url('assets/img/um.png') ?>" class="img-fluid p-4 " style="width: 170px;">
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>