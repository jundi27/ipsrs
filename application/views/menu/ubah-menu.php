<!-- Begin Page Content -->
<div class="container justify-content-center">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">

        <div class="col-lg mb-5">

            <div style="background-color: #ffffff" class="container-fluid w-50 shadow">
                <form action="" method="post">
                    <!--Remember-->
                    <input type="hidden" name="id" value="<?= $user_menu['id']; ?>">
                    <div class="modal-body container">
                        <div class="input-form">
                            <input type="text" value="<?= $user_menu['menu']; ?>" id="menu" name="menu" placeholder="Judul Submenu">
                            <label for="menu">Nama menu</label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-danger" href="<?= base_url('menu'); ?>">Batal</a>
                        <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div>
</div>