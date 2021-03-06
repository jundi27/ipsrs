<!-- Sbadmin -->
<!-- <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 mt-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Ganti password anda untuk </h3>
                                <h5><?= $this->session->userdata('reset_email'); ?></h5>
                            </div>
                            <div class="card-body">

                                <?= $this->session->flashdata('pesan'); ?>

                                <form class="user" method="POST" action="<?= base_url('auth/changepassword'); ?>">
                                    <div class="form-group">
                                        <input class="form-control py-4" id="password1" name="password1" type="password" placeholder="Masukkan Password Baru..."/>
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control py-4" id="password2" name="password2" type="password" placeholder="Ulangi Password..."/>
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mb-0">
                                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div> -->



<!-- Sbadmin2 -->
<!-- <div class="container"> -->

<!-- Outer Row -->
<!-- <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0"> -->
<!-- Nested Row within Card Body -->
<!-- <div class="row">

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">Ubah password anda untuk</h1>
                                    <h5 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h5>
                                </div>

                                <?= $this->session->flashdata('pesan'); ?>

                                <form class="user" method="POST" action="<?= base_url('auth/changepassword'); ?>">
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Masukkan password baru...">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi password...">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Ubah Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div> -->


<img class="wave" src="<?= base_url('assets/') ?>img/wave.png">
<div class="container">
    <div class="img">
        <img src="<?= base_url('assets/') ?>img/rp.svg">
    </div>
    <div class="login-content">
        <form class="user" method="POST" action="?= base_url('auth/changepassword'); ?>">
            <!-- <img src="<?= base_url('assets/') ?>img/avatar.svg"> -->
            <h2 class="title">Ubah password anda untuk</h2>
            <h3 class="mb-4"><?= $this->session->userdata('reset_email'); ?></h3>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Masukkan password baru...</h5>
                    <input type="password" class="input" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Ulangi password</h5>
                    <input type="password" class="input" id="password2" name="password2">
                    <?= form_error('password2,', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <a href="<?= base_url('auth'); ?>">Kembali ke login</a>
            <input type="submit" class="btn" value="Ubah password">
        </form>
    </div>
</div>