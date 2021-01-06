<!-- Begin Page Content -->
<div class="container justify-content-center">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">

        <div class="col-lg mb-5">


            <div style="background-color: #ffffff" class="container-fluid w-50 shadow">
                <form action="" method="post">
                    <!--Remember-->
                    <input name="id" id="id" type="hidden" value="<?= $user['id']; ?>">
                    <div class="modal-body container">
                        <div class="input-form">
                            <input value="<?= $user['nama']; ?>" type="text" id="nama" name="nama" placeholder="Nama Lengkap">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="nama">Nama Lengkap</label>
                        </div>
                        <div class="input-form">
                            <input value="<?= $user['username']; ?>" type="text" id="username" name="username" placeholder="Username" readonly>
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="username">Username</label>
                        </div>

                        <div class="input-form">
                            <input value="<?= $user['nip']; ?>" type="text" id="nip" name="nip" placeholder="NIP" readonly>
                            <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="nip">NIP</label>
                        </div>

                        <div class="input-form">
                            <input value="<?= $user['email']; ?>" type="text" id="email" name="email" placeholder="Email" readonly>
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="email">Email</label>
                        </div>
                        <div class="input-form">
                            <input value="" type="password" id="password1" name="password1" placeholder="Password">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="password1">Password</label>
                        </div>
                        <!-- <div class="input-form">
                            <input type="password" id="password2" name="password2" placeholder="Ulangi Password">
                            <label for="password2">Ulangi Password</label>
                        </div> -->
                        <div class="input-form">
                            <input value="<?= $user['lvl']; ?>" type="text" id="lvl" name="lvl" placeholder="Jabatan">
                            <?= form_error('lvl', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="lvl">Jabatan</label>
                        </div>

                        <div class="form-group">
                            <select name="role_id" id="role_id" class="form-control">
                                <?php $role = $this->db->get_where('user_role', ['id' => $user['role_id']])->row();
                                ?>
                                <option value="<?= $role->id ?>"><?= $role->role ?></option>
                                <option value="1">Administrator</option>
                                <option value="2">Pegawai</option>
                                <option value="3">Teknisi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="custom-controls-stacked d-block pt-3 pr-2">
                                <label class="custom-control material-checkbox">
                                    <input checked type="checkbox" value="1" name="is_active" id="is_active" class="material-control-input">
                                    Beri Status
                                    <span class="material-control-indicator"></span>
                                    <span class="material-control-description"></span>
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" href="<?= base_url(); ?>admin/akun">Batal</a>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>



            </div>

        </div>
    </div>
</div>