<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">

            <?= $this->session->flashdata('pesan'); ?>

            <form class="user" action="<?= base_url('user/pengaduanKer'); ?>" method="POST">
                <div class="form-group row">
                    <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nip" class="col-sm-3 col-form-label">NIP</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="nip" name="nip">
                        <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="kerusakan_id" class="col-sm-3 col-form-label">Fasilitas Kerusakan</label>
                    <div class="col-sm-9">
                        <select type="text" class="form-control" id="kerusakan_id" name="kerusakan_id">
                            <option value="">Pilih Fasilitas Kerusakan...</option>
                            <?php foreach ($kerusakan as $k) : ?>
                                <option value="<?= $k['id']; ?>"><?= $k['kerusakan']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="brg" class="col-sm-3 col-form-label">Nama Barang</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="brg" name="brg">
                        <?= form_error('brg', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="ruangan" class="col-sm-3 col-form-label">Nama Ruangan</label>
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
                        <a class="btn btn-danger" href="<?= base_url('user/pengaduanKer'); ?>">Batal</a>
                    </div>
                </div>

            </form>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->