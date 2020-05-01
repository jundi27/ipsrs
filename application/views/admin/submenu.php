<!-- Sbadmin -->
<!-- content -->
<!-- <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4 mb-5"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg"> -->

<!-- menampilkan pesan error -->
<!-- <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">'
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>

                    <?= $this->session->flashdata('pesan'); ?>

                    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#subMenuModal">Tambah Submenu Baru</a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Url</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($subMenu as $sm) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $sm['judul'] ?></td>
                                    <td><?= $sm['menu'] ?></td>
                                    <td><?= $sm['url'] ?></td>
                                    <td><?= $sm['icon'] ?></td>
                                    <td><?= $sm['is_active'] ?></td>
                                    <td>
                                        <a href="" class="badge badge-success">Edit</a>
                                        <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusSubMenuModal">Hapus</a>
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

<!-- Modal -->
<!-- <div class="modal fade" id="subMenuModal" tabindex="-1" role="dialog" aria-labelledby="subMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="subMenuModalLabel">Tambahkan Submenu Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/submenu'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Submenu">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Url submenu">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon submenu">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
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

<!-- Hapus Submenu Modal -->
<!-- <div class="modal fade" id="hapusSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="hapusSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusSubMenuModalLabel">Hapus Submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        Apakah anda yakin ingin menghapus submenu ini?
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('admin/hapusSubMenu/'); ?><?= $sm['id']; ?>" class="btn btn-success" style="width: 60px">Iya</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                </div>

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
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">'
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('pesan'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#subMenuModal">Tambah Submenu Baru</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Menu</th>
                        <th scope="col">Url</th>
                        <th scope="col">Icon</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $sm['judul'] ?></td>
                            <td><?= $sm['menu'] ?></td>
                            <td><?= $sm['url'] ?></td>
                            <td><?= $sm['icon'] ?></td>
                            <td><?= $sm['is_active'] ?></td>
                            <td>
                                <a href="" class="badge badge-success">Edit</a>
                                <a href="" class="badge badge-danger" data-toggle="modal" data-target="#hapusSubMenuModal">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="subMenuModal" tabindex="-1" role="dialog" aria-labelledby="subMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="subMenuModalLabel">Tambahkan Submenu Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/submenu'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Submenu">
                        </div>
                        <div class="form-group">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="url" name="url" placeholder="Url submenu">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon submenu">
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Active?
                                </label>
                            </div>
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

    <!-- Hapus Submenu Modal -->
    <div class="modal fade" id="hapusSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="hapusSubMenuModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hapusSubMenuModalLabel">Hapus Submenu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        Apakah anda yakin ingin menghapus submenu ini?
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('admin/hapusSubMenu/'); ?><?= $sm['id']; ?>" class="btn btn-success" style="width: 60px">Iya</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                </div>

            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->