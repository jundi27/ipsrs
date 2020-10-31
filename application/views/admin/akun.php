<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <?= $this->session->flashdata('pesan'); ?>

    <a style="background-color:#008983; color:#ffffff;" data-toggle="modal" data-target="#subModal" href="" class="btn btn-primary mb-2"><i class="fa fa-plus"></i> Tambah Akun</a>

    <div style="height: 500px" class="container shadow">
        <div class="row">
            <div style="border-right: 2px solid #008983;" class="col-lg-2 mt-3 mb-5 ">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Pegawai</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Teknisi</a>
                </div>
            </div>
            <div class="col-lg-10 mt-3 mb-5">
                <div class="tab-content" id="v-pills-tabContent">

                    <div style="height: 450px" class="tab-pane active show fade table-wrapper-scroll-y " id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <table class="table table-hover text-center">
                            <thead style="background-color:#008983; color:#ffffff;">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($member as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['nama']; ?></td>
                                        <td><?= $m['username']; ?></td>
                                        <td><?= $m['lvl']; ?></td>
                                        <td>
                                            <a class="badge badge-info" href="<?= base_url('admin/ubahAkun/'); ?><?= $m['username']; ?>">Ubah</a>
                                            <a class="badge badge-danger" id="hapus-modal" data-id="<?= $m['id']; ?>" data-toggle="modal" data-target="#hapusModal" href="">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>

                    <div style="height: 450px" class="tab-pane fade table-wrapper-scroll-y " id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <table class="table table-hover text-center">
                            <thead style="background-color:#008983; color:#ffffff;">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($teknisi as $t) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $t['nama']; ?></td>
                                        <td><?= $t['username']; ?></td>
                                        <td><?= $t['lvl']; ?></td>
                                        <td>
                                            <a class="badge badge-info" href="<?= base_url('admin/ubahAkun/'); ?><?= $t['username']; ?>">Ubah</a>
                                            <a class="badge badge-danger" id="hapus-modal2" data-id="<?= $t['id'] ?>" data-toggle="modal" data-target="#hapusModal2" href="">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>


        </div>
    </div>


    <hr style="color: #008983; size: 5px" class="divider">
    </hr>

    <!-- Modal Hapus Akun Pegawai-->
    <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="background-color:#008983; color:#ffffff;" class="modal-header">
                    <h5 class="modal-title" id="hapusaksesModalLabel">Hapus Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        Apakah anda yakin ingin menghapus akun ini?
                    </div>
                </div>

                <div class="modal-footer">
                    <a style="width: 60px" id="btn-hapus-modal" class="btn btn-success" href="#">Ya</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const hapusModal = document.querySelectorAll("#hapus-modal")
        const btnHapusModal = document.querySelector("#btn-hapus-modal")

        hapusModal.forEach(item => {
            item.addEventListener("click", e => {
                const id = e.target.getAttribute("data-id")

                // console.log(location);
                btnHapusModal.setAttribute("href", location.origin + '/ipsrs/admin/hapusAkun/' + id)
            })
        })
    </script>

    <!-- Modal Hapus Akun Teknisi-->
    <div class="modal fade" id="hapusModal2" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="background-color:#008983; color:#ffffff;" class="modal-header">
                    <h5 class="modal-title" id="hapusaksesModalLabel">Hapus Akun</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        Apakah anda yakin ingin menghapus akun ini?
                    </div>
                </div>

                <div class="modal-footer">
                    <a style="width: 60px" id="btn-hapus-modal2" class="btn btn-success" href="#">Ya</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const hapusModal2 = document.querySelectorAll("#hapus-modal2")
        const btnHapusModal2 = document.querySelector("#btn-hapus-modal2")

        hapusModal2.forEach(item => {
            item.addEventListener("click", e => {
                const id = e.target.getAttribute("data-id")

                // console.log(location);
                btnHapusModal2.setAttribute("href", location.origin + '/ipsrs/admin/hapusAkun/' + id)
            })
        })
    </script>

    <!-- Modal Tambah Akun -->
    <div class="modal fade" id="subModal" tabindex="-1" role="dialog" aria-labelledby="subModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div style="background-color:#008983; color:#ffffff" class="modal-header">
                    <h5 class="modal-title" id="subModalLabel">Tambah Akun Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="<?= base_url('admin/akun'); ?>" method="post">
                    <div class="modal-body container">

                        <div class="input-form">
                            <input type="text" id="nama" name="nama" placeholder="Nama Lengkap">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="nama">Nama Lengkap</label>
                        </div>

                        <div class="input-form">
                            <input type="text" id="username" name="username" placeholder="Username">
                            <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="username">Username</label>
                        </div>

                        <div class="input-form">
                            <input type="text" id="email" name="email" placeholder="Email">

                            <label for="email">Email</label>
                        </div>

                        <div class="input-form">
                            <input type="password" id="password1" name="password1" placeholder="Password">

                            <label for="password1">Password</label>
                        </div>
                        <div class="input-form">
                            <input type="password" id="password2" name="password2" placeholder="Ulangi Password">
                            <label for="password2">Ulangi Password</label>
                        </div>

                        <div class="input-form">
                            <input type="text" id="lvl" name="lvl" placeholder="Jabatan">
                            <?= form_error('lvl', '<small class="text-danger pl-3">', '</small>'); ?>
                            <label for="lvl">Jabatan</label>
                        </div>

                        <div class="form-group">
                            <select name="role_id" id="role_id" class="form-control">
                                <option value="">Select Role</option>
                                <option value="1">Administrator</option>
                                <option value="2">Pegawai</option>
                                <option value="3">Teknisi</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="custom-controls-stacked d-block pt-3 pr-2">
                                <label class="custom-control material-checkbox">
                                    <input checked type="checkbox" value="1" name="is_active" id="is_active" class="material-control-input">
                                    Active?
                                    <span class="material-control-indicator"></span>
                                    <span class="material-control-description"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->