<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= $this->session->flashdata('pesan'); ?>

            <form class="user" action="<?= base_url('teknisi/kendalaKer'); ?>" method="POST">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="brg" class="col-sm-3 col-form-label">Kendala</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="kendala" name="kendala">
                        <?= form_error('kendala', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ruangan" class="col-sm-3 col-form-label">Ruangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="ruangan" name="ruangan">
                        <?= form_error('ruangan', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="tgl" class="col-sm-3 col-form-label">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" id="tgl" name="tgl">
                        <?= form_error('tgl', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control" id="ket" name="ket"></textarea>
                    </div>
                </div>

                <div class="form-group row justify-content-end">
                    <div class="col-sm-9">
                        <button type="submit" class="btn btn-success">Kirim</button>
                        <a class="btn btn-danger" href="<?= base_url('teknisi/kendalaKer'); ?>">Batal</a>
                    </div>
                </div>

            </form>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->