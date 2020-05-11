<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message') ?>
    <?= validation_errors(); ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#teknisiModal">Tambah Data</a>
    <table class="table table-striped text-dark table-responsive-lg text-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Teknisi</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>
            <?php foreach ($date as $dc) : ?>
                <tr>
                    <td scope="row"><?= $i; ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $ak['merk'] ?></td>
                    <td><a href="<?= base_url(); ?>admin/hapusTeknisi/<?= $ak['id'] ?> " class="badge badge-danger">Hapus</a><a href="" class="badge badge-primary">Edit</a></td>
                </tr>

                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="teknisiModal" tabindex="-1" role="dialog" aria-labelledby="teknisiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="teknisiModalLabel">Tambah Data Teknisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/kelolateknisi') ?>" method="post">
                <div class="modal-body md-7">
                    <div class="form-group">
                        <label for="nama" style="color: black">Nama Teknisi</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Teknisi..." value="<?= set_value('nama') ?>">
                    </div>
                    <div class="form-group">
                        <label for="username" style="color: black">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username..." value="<?= set_value('username') ?>">
                    </div>
                    <div class="form-group">
                        <label for="email" style="color: black">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?= set_value('email') ?>">
                    </div>
                    <div class="form-group">
                        <label for="password1" style="color: black">Password</label>
                        <input type="password" class="form-control" id="password1" name="password1" placeholder="Masukkan Password" value="<?= set_value('password1') ?>">
                    </div>
                    <div class="form-group">
                        <label for="password2" style="color: black">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi Password" value="<?= set_value('password2') ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>