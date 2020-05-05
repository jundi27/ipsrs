<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $user_submenu['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" value="<?= $user_submenu['judul']; ?>" class="form-control" id="judul" name="judul" placeholder="Judul Submenu">
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
                            <input type="text" value="<?= $user_submenu['url']; ?>" class="form-control" id="url" name="url" placeholder="Url Submenu">
                        </div>

                        <div class="form-group">
                            <input type="text" value="<?= $user_submenu['icon']; ?>" class="form-control" id="icon" name="icon" placeholder="Icon Submenu">
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
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a class="btn btn-danger" data-dismiss="modal" href="<?= base_url('menu/submenu'); ?>">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->