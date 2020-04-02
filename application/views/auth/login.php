<div id="layoutAuthentication">
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

                                <form>
                                    <div class="form-group">
                                        <input class="form-control py-4" id="username" name="username" type="text" placeholder="Username" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control py-4" id="password" name="password" type="password" placeholder="Password" />
                                    </div>
                                    <div class="form-group d-flex align-items-center justify-content-between mt-5 mb-0">
                                        <a class="small" href="password.html">Forgot Password?</a>
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
    </div>