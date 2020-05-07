<!-- Begin Page Content -->
<div class="container justify-content-center">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">

        <div class="col-lg mb-5">

            <div style="background-color: #ffffff" class="container-fluid w-50 shadow">
                <form action="" method="post">
                    <!--Remember-->
                    <input type="hidden" name="id" value="<?= $user_submenu['id']; ?>">
                    <div class="modal-body container">
                        <div class="input-form">
                            <input type="text" value="<?= $user_submenu['judul']; ?>" id="judul" name="judul" placeholder="Judul Submenu">
                            <label for="judul">Judul Submenu</label>
                        </div>

                        <div class="input-form">
                            <input type="text" value="<?= $user_submenu['url']; ?>" id="url" name="url" placeholder="Url Submenu">
                            <label for="url">Url Submenu</label>
                        </div>

                        <div class="input-form">
                            <input type="text" value="<?= $user_submenu['icon']; ?>" id="icon" name="icon" placeholder="Icon Submenu">
                            <label for="icon">Icon Submenu</label>
                        </div>

                        <div class="form-group pt-2 pb-0">
                            <select name="menu_id" id="menu_id" class="form-control">
                                <option value="">Select Menu</option>
                                <?php foreach ($menu as $m) : ?>
                                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                                <?php endforeach; ?>
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
                        <a class="btn btn-danger" href="<?= base_url('menu/submenu'); ?>">Batal</a>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>



            </div>

        </div>
    </div>
</div>