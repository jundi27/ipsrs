<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message') ?>
    <?= validation_errors(); ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#lappemModal">Buat Laporan</a>
    <table class="table table-striped text-dark table-responsive-lg text-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Kuota</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>

            <tr>
                <th scope="row"><?= $i; ?></th>
                <td></td>
                <td> </td>
            </tr>
            <?php $i++; ?>
        </tbody>

    </table>

</div>
</div>


<!-- Modal -->
<div class="modal fade" id="lappemModal" tabindex="-1" role="dialog" aria-labelledby="lappemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lappemModalLabel">Buat Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/lappemeliharaan') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kelas" style="color: black">&nbsp;Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Nama Kelas..." value="<?= set_value('nama_kelas') ?>">
                    </div>
                    <div class="form-group">
                        <label for="kuota" style="color: black">&nbsp;Kuota</label>
                        <input type="text" class="form-control" id="kuota" name="kuota" placeholder="Masukkan Kuota..." value="<?= set_value('kuota') ?>">
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