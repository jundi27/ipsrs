<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?php
    $success = $this->session->flashdata('success');
    if (!empty($success)) {
        echo "<script>
                    swal({
                        title: 'Sukses',
                        text: '$success',
                        icon: 'success'
                    })
                   </script>";
    }

    ?>
    <?php
    $error = $this->session->flashdata('error');
    if (!empty($error)) {
        echo "<script>
                    swal({
                        title: 'Gagal',
                        text: '$error',
                        icon: 'error'
                    })
                   </script>";
    }
    ?>

    <?= validation_errors(); ?>
<<<<<<< HEAD
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#alkesModal" style="background-color:#008983; color:#ffffff;">Tambah Data</a>
=======
    <a href="" class="btn btn-primary mb-3" style="background-color:#008983; color:#ffffff" data-toggle="modal" data-target="#tambah-alkes">
        <i class="fa fa-plus"></i> Tambah Data</a>
>>>>>>> 2380b451d782fac499917d2a4fe35d814ef6d3ab
    <table class="table table-striped text-dark table-responsive-lg text-center">
        <thead style="background-color:#008983; color:#ffffff;">
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
                    <td>
                        <a href="javascript:;" id="btn-hapus-alkes" data-id="<?= $ak['id'] ?>" class="badge badge-danger">Hapus</a>
                        <a href="javascript:;" id="btn-edit-alkes" data-toggle="modal" data-target="#modal-edit-alkes" <?php foreach ($ak as $key => $val) {
                                                                                                                            echo 'data-' . $key . '="' . $val . '"';
                                                                                                                        } ?> class="badge badge-primary">Edit</a>
                    </td>
                </tr>

                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah-alkes" tabindex="-1" role="dialog" aria-labelledby="alkesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#008983; color:#ffffff">
                <h5 class="modal-title" id="alkesModalLabel">Tambah Data Alat Kesehatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/kelolaalkes?aksi=tambah_alkes') ?>" method="post">
                <div class="modal-body md-7">
                    <div class="form-group">
                        <label for="nama_alat" style="color: black">Nama Alat</label>
                        <input type="text" required class="form-control" id="nama_alat" name="nama_alat" placeholder="Masukkan Nama Alat..." value="<?= set_value('nama_alat') ?>">
                    </div>
                    <div class="form-group">
                        <label for="Merk" style="color: black">Merk</label>
                        <input type="text" required class="form-control" id="merk" name="merk" placeholder="Masukkan Merk..." value="<?= set_value('merk') ?>">
                    </div>
                    <div class="form-group">
                        <label for="model" style="color: black">Model</label>
                        <input type="text" required class="form-control" id="model" name="model" placeholder="Masukkan Model" value="<?= set_value('model') ?>">
                    </div>
                    <div class="form-group">
                        <label for="nomorseri" style="color: black">Nomor Seri</label>
                        <input type="text" required class="form-control" id="nomorseri" name="nomorseri" placeholder="Masukkan Nomor Seri" value="<?= set_value('nomorseri') ?>">
                    </div>
                    <div class="form-group">
                        <label for="ruangan" style="color: black">Ruangan</label>
                        <input type="text" required class="form-control" id="ruangan" name="ruangan" placeholder="Masukkan Ruangan" value="<?= set_value('ruangan') ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-edit-alkes" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#008983; color:#ffffff">
                <h5 class="modal-title">Ubah data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('admin/kelolaalkes?aksi=ubah') ?>
            <div class="modal-body">
                <div id="modal-edit-alkes-form"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" style="background-color:#008983; color:#ffffff">Ubah</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('#btn-edit-alkes').forEach(item => {
        item.addEventListener('click', e => {
            console.log(e.target);
            const target = attr => e.target.getAttribute(`data-${attr}`)
            const formArr = [{
                title: 'ID',
                attr: 'id',
                value: target('id')
            }, {
                title: 'Nama Alat',
                attr: 'nama_alat',
                value: target('nama_alat')
            }, {
                title: 'Merk',
                attr: 'merk',
                value: target('merk')
            }, {
                title: 'Model',
                attr: 'model',
                value: target('model')
            }, {
                title: 'Nomor Seri',
                attr: 'nomorseri',
                value: target('nomorseri')
            }, {
                title: 'Ruangan',
                attr: 'ruangan',
                value: target('ruangan')
            }, ];
            document.querySelector('#modal-edit-alkes-form').innerHTML = `${formArr.map(item => {
                return `<div class="form-group">
                        ${item.attr=='id'? `<input type="hidden" name="${item.attr}" id="${item.attr}" class="form-control" value="${item.value}">`:
                        `<label for="">${item.title}</label>
                        <input type="text" name="${item.attr}" id="${item.attr}" class="form-control" placeholder="${item.title}..." value="${item.value}" >
                        </div>`}`
                }).join('')
            }
            `
        })
    })

    document.querySelectorAll('#btn-hapus-alkes').forEach(item => {
        item.addEventListener('click', e => {
            const id = e.target.getAttribute('data-id')
            swal({
                title: 'Hapus data ini?',
                text: 'Data tidak dapat dikembalikan setelah dihapus.',
                icon: 'warning',
                buttons: ['Batal', 'Hapus'],
                dangerMode: true
            }).then(willdDelete => {
                if (willdDelete) {
                    window.location.href = window.location.href + '?aksi=hapus&id=' + id
                } else {
                    console.log('Batal dihapus!')
                }
            })
        })
    })
</script>