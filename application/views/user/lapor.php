<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="row">
        <div class="col-lg-8">

            <?= form_open_multipart('user/lapor'); ?>
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
                <label for="kerusakan" class="col-sm-3 col-form-label">Fasilitas Kerusakan</label>
                <div class="col-sm-9">
                    <select type="text" class="form-control" id="kerusakan" name="kerusakan">
                        <option value="">Pilih Fasilitas Kerusakan...</option>
                        <option value="">Alat Kesehatan</option>
                        <option value="">IT</option>
                        <option value="">Listrik</option>
                        <option value="">Air</option>
                        <option value="">Gedung</option>
                        <option value="">Bangunan</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="brg" class="col-sm-3 col-form-label">Nama Barang</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="brg" name="brg">
                </div>
            </div>

            <div class="form-group row">
                <label for="ruangan" class="col-sm-3 col-form-label">Nama Ruangan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="ruangan" name="ruangan">
                </div>
            </div>

            <div class="form-group row">
                <label for="tgl" class="col-sm-3 col-form-label">Tanggal</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" id="tgl" name="tgl">
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
                    <button type="submit" class="btn btn-danger">Batal</button>
                </div>
            </div>

            </form>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->