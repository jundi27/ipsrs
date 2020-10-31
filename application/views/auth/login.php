<!-- Sbadmin -->
<!-- <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 mt-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">

                                <?= $this->session->flashdata('pesan'); ?>

                                <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input class="form-control py-4" id="username" name="username" type="text" placeholder="Username" value="<?= set_value('username'); ?>" />
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control py-4" id="password" name="password" type="password" placeholder="Password" />
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-5 mb-0">
                                        <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
                                        <button type="submit" class="btn btn-primary" href="index.html">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center">
                                <div class="small">
                                    <a href="<?= base_url('auth/registration'); ?>">Need an account? Sign up!</a>
                                </div>
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
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>

                                <?= $this->session->flashdata('pesan'); ?>

                                <form class="user" method="POST" action="<?= base_url('auth'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
                                </div> -->
<!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration'); ?>">Buat akun</a>
                                </div> -->
<!-- </div>
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
        <img src="<?= base_url('assets/') ?>img/bgr.svg">
    </div>
    <div class="login-content">
        <form class="user" method="POST" action="<?= base_url('auth'); ?>">
            <img src="<?= base_url('assets/') ?>img/avatar.svg">
            <h2 class="title">login</h2>

            <?= $this->session->flashdata('pesan'); ?>

            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div class="div">
                    <h5>Username</h5>
                    <input type="text" class="input" id="username" name="username">
                    <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <div class="input-div pass">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div class="div">
                    <h5>Password</h5>
                    <input type="password" class="input" id="password" name="password">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>

            <a href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password?</a>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
</div>