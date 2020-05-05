<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $user_menu['id']; ?>">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="text" value="<?= $user_menu['menu']; ?>" class="form-control" id="menu" name="menu" placeholder="Nama menu">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a class="btn btn-danger" data-dismiss="modal" href="<?= base_url('menu'); ?>">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->