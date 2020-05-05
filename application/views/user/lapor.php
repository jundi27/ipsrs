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
                    <input type="text" class="form-control" id="nip" name="nip">
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
            </div>
            <div class="form-group row">
                <label for="kerusakan" class="col-sm-3 col-form-label">Fasilitas Kerusakan</label>
                <div class="col-sm-9">
                    <select type="text" class="form-control" id="kerusakan" name="kerusakan">
                        <option value="">IT</option>
                        <option value="">A</option>
                        <option value="">Listrik</option>
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
                <label for="name" class="col-sm-3 col-form-label">Nama Ruangan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nip" name="nip">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Tanggal</label>
                <div class="input-group date col-sm-9" id="datetimepicker1">
                    <input type="text" class="form-control" id="" name="">
                    <span class="input-group-addon">
                        <i class="far fa-calender-alt"></i>
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label for="uraian" class="col-sm-3 col-form-label">Uraian</label>
                <div class="col-sm-9">
                    <textarea type="text" class="form-control" id="uraian" name="uraian"></textarea>
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