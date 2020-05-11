<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message') ?>
    <?= validation_errors(); ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#alkesModal">Tambah Data</a>
    <table class="table table-striped text-dark table-responsive-lg text-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Alat</th>
                <th scope="col">Merk</th>
                <th scope="col">Model</th>
                <th scope="col">Nomor Seri</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>
            <?php foreach ($alatkes as $ak) : ?>
                <tr>
                    <td scope="row"><?= $i; ?></td>
                    <td><?= $ak['nama_alat'] ?></td>
                    <td><?= $ak['merk'] ?></td>
                    <td><?= $ak['model'] ?></td>
                    <td><?= $ak['nomorseri'] ?></td>
                    <td><?= $ak['ruangan'] ?></td>
                    <td><a href="<?= base_url(); ?>admin/hapusAlkes/<?= $ak['id']?> " class="badge badge-danger">Hapus</a><a href="" class="badge badge-primary">Edit</a></td>
                </tr>

                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="alkesModal" tabindex="-1" role="dialog" aria-labelledby="alkesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="alkesModalLabel">Tambah Data Alat Kesehatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/kelolaalkes') ?>" method="post">
                <div class="modal-body md-7">
                    <div class="form-group">
                        <label for="nama_alat" style="color: black">Nama Alat</label>
                        <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Masukkan Nama Alat..." value="<?= set_value('nama_alat') ?>">
                    </div>
                    <div class="form-group">
                        <label for="Merk" style="color: black">Merk</label>
                        <input type="text" class="form-control" id="merk" name="merk" placeholder="Masukkan Merk..." value="<?= set_value('merk') ?>">
                    </div>
                    <div class="form-group">
                        <label for="model" style="color: black">Model</label>
                        <input type="text" class="form-control" id="model" name="model" placeholder="Masukkan Model" value="<?= set_value('model') ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomorseri" style="color: black">Nomor Seri</label>
                        <input type="text" class="form-control" id="nomorseri" name="nomorseri" placeholder="Masukkan Nomor Seri" value="<?= set_value('nomorseri') ?>">
                    </div>
                    <div class="form-group">
                        <label for="ruangan" style="color: black">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Masukkan Ruangan" value="<?= set_value('ruangan') ?>">
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