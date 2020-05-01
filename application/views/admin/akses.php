<!-- Sbadmin -->
<!-- content -->
<!-- <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4 mb-5"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg"> -->

<!-- menampilkan pesan error -->
<!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

                    <?= $this->session->flashdata('pesan'); ?>

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#aksesModal">Tambah Akses Baru</a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($role as $r) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $r['role'] ?></td>
                                    <td>
                                        <a href="<?= base_url('admin/roleakses/') . $r['id']; ?>" class="badge badge-warning" style="color: white">Akses</a>
                                        <a href="" class="badge badge-success">Edit</a>
                                        <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusMenuModal">Hapus</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>


        </div>
    </main> -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="aksesModal" tabindex="-1" role="dialog" aria-labelledby="aksesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aksesModalLabel">Tambahkan Akses Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/akses'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" placeholder="Nama role">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div> -->


<!-- Sbadmin2 -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <!-- menampilkan pesan error -->
            <?= form_error('menu', '<div class="alert alert-danger" role="alert">', '</div>') ?>

            <?= $this->session->flashdata('pesan'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#aksesModal">Tambah Akses Baru</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($role as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['role'] ?></td>
                            <td>
                                <a href="<?= base_url('admin/roleakses/') . $r['id']; ?>" class="badge badge-warning">Akses</a>
                                <a href="" class="badge badge-success">Edit</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusMenuModal">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="aksesModal" tabindex="-1" role="dialog" aria-labelledby="aksesModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="aksesModalLabel">Tambahkan Akses Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/akses'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="role" name="role" placeholder="Nama role">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->