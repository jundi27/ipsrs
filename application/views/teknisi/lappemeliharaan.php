<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message') ?>
    <?= validation_errors(); ?>
    <!--<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#lappemModal">Buat Laporan</a>
    <table class="table table-striped text-dark table-responsive-lg text-center">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Teknisi</th>
                <th scope="col">Tanggal Laporan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php $i = 1; ?>

            <tr>
                <td scope="row"><?= $i; ?></td>
                <td><?= $user['nama'] ?></td>
                <td></td>
                <td></td>
            </tr>
            <?php $i++; ?>
        </tbody>

    </table>-->




    <hr>
    <form class="user" method="post" action="<?= base_url('teknisi/lappemeliharaan'); ?>">
        <div class="row">
            <div class="col-lg-6">
                <div class="p-4">
                    <h4 class="text-center">Data Ayah</h4>
                    <div class="form-group mb-2">
                        <label for="nama_alat" style="color: black">&nbsp;Nama Alat</label>
                        <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Masukkan Nama Ayah..." value="<?= set_value('nama_alat') ?>">
                        <?= form_error('nama_alat', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tempat_lahir_ayah" style="color: black">&nbsp;Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir_ayah" name="tempat_lahir_ayah" placeholder="Masukkan Tempat Lahir Ayah...">
                        <?= form_error('tempat_lahir_ayah', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal_lahir_ayah" style="color: black">&nbsp;Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" placeholder="Tanggal Bulan Tahun">
                        <?= form_error('tanggal_lahir_ayah', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="no_hp_ayah" style="color: black">&nbsp;No. HP</label>
                        <input type="text" class="form-control" id="no_hp_ayah" name="no_hp_ayah" placeholder="Masukkan No. HP Ayah..." value="<?= set_value('no_hp_ayah') ?>">
                        <?= form_error('no_hp_ayah', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="agama_ayah" style="color: black">&nbsp;Agama</label>
                        <input type="text" class="form-control" id="agama_ayah" name="agama_ayah" placeholder="Masukkan Agama Ayah...">
                        <?= form_error('agama_ayah', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="pendidikan_ayah" style="color: black">&nbsp;Pendidikan</label>
                        <input type="text" class="form-control" id="pendidikan_ayah" name="pendidikan_ayah" placeholder="Masukkan Pendidikan Terakhir Ayah...">
                        <?= form_error('pendidikan_ayah', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="pekerjaan_ayah" style="color: black">&nbsp;Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah...">
                        <?= form_error('pekerjaan_ayah', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4">
                    <h4 class="text-center">Data Ibu</h4>
                    <div class="form-group mb-2">
                        <label for="nama_ibu" style="color: black">&nbsp;Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu..." value="<?= set_value('nama_ibu') ?>">
                        <?= form_error('nama_ibu', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tempat_lahir_ibu" style="color: black">&nbsp;Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir_ibu" name="tempat_lahir_ibu" placeholder="Masukkan Tempat Lahir Ibu...">
                        <?= form_error('tempat_lahir_ibu', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="tanggal_lahir_ibu" style="color: black">&nbsp;Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" placeholder="Tanggal Bulan Tahun">
                        <?= form_error('tanggal_lahir_ibu', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="no_hp_ibu" style="color: black">&nbsp;No. HP</label>
                        <input type="text" class="form-control" id="no_hp_ibu" name="no_hp_ibu" placeholder="Masukkan No. HP Ibu..." value="<?= set_value('no_hp_ibu') ?>">
                        <?= form_error('no_hp_ibu', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="agama_ibu" style="color: black">&nbsp;Agama</label>
                        <input type="text" class="form-control" id="agama_ibu" name="agama_ibu" placeholder="Masukkan Agama Ibu...">
                        <?= form_error('agama_ibu', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="pendidikan_ibu" style="color: black">&nbsp;Pendidikan</label>
                        <input type="text" class="form-control" id="pendidikan_ibu" name="pendidikan_ibu" placeholder="Masukkan Pendidikan Terakhir Ibu...">
                        <?= form_error('pendidikan_ibu', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                    <div class="form-group mb-2">
                        <label for="pekerjaan_ibu" style="color: black">&nbsp;Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu...">
                        <?= form_error('pekerjaan_ibu', '<small class="small text-danger"> &nbsp;', '</small>') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <button type="submit" class="btn btn-success btn-block" style="color: black">
                Daftar
            </button>
        </div>
    </form>
    <hr>


    <!--<div class="container">
        <form class="user" action="<?= base_url('teknisi/lappemeliharaan') ?>" method="post">
            <div class="md-7">
                <div class="form-row">
                    <div class="col">
                        <label for="nama_alat" style="color: black">Nama Alat</label>
                        <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Masukkan Nama Alat..." value="<?= set_value('nama_alat') ?>">
                        <?= form_error('nama_alat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col">
                        <label for="ruangan" style="color: black">Ruangan</label>
                        <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Masukkan Ruangan..." value="<?= set_value('ruangan') ?>">
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label for="suhu" style="color: black">Suhu</label>
                        <input type="text" class="form-control" id="suhu" name="suhu" placeholder="Suhu ... (*C)" value="<?= set_value('suhu') ?>">
                    </div>
                    <div class="col">
                        <label for="kelembaban" style="color: black">Kelembaban</label>
                        <input type="text" class="form-control" id="kelembaban" name="kelembaban" placeholder="Kelembaban ... (% RH)" value="<?= set_value('kelembaban') ?>">
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label for="tegangan" style="color: black">Tegangan</label>
                        <input type="text" class="form-control" id="tegangan" name="tegangan" placeholder="Masukkan Tegangan" value="<?= set_value('tegangan') ?>">
                    </div>
                    <div class="col">
                        <label for="daya_semu" style="color: black">Daya Semu</label>
                        <input type="text" class="form-control" id="daya_semu" name="daya_semu" placeholder="Daya Semu ... (VA)" value="<?= set_value('daya_semu') ?>">
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label for="daya_aktif" style="color: black">Daya Aktif</label>
                        <input type="text" class="form-control" id="daya_aktif" name="daya_aktif" placeholder="Daya Aktif ... (watt)" value="<?= set_value('daya_aktif') ?>">
                    </div>
                    <div class="col">
                        <label for="daya_reaktif" style="color: black">Daya Reaktif</label>
                        <input type="text" class="form-control" id="daya_reaktif" name="daya_reaktif" placeholder="Daya Reaktif ... (VAR)" value="<?= set_value('daya_reaktif') ?>">
                    </div>
                </div>
                <div class="form-group form-row">
                    <div class="col">
                        <label for="kondisi_fisik" style="color: black">Kondisi Fisik</label>
                        <input type="text" class="form-control" id="kondisi_fisik" name="kondisi_fisik" placeholder="Kondisi Fisik" value="<?= set_value('kondisi_fisik') ?>">
                    </div>
                    <div class="col">
                        <label for="ket_kondisi_fisik" style="color: black">Keterangan Kondisi Fisik</label>
                        <input type="text" class="form-control" id="ket_kondisi_fisik" name="ket_kondisi_fisik" placeholder="Jelaskan Kondisi FIsik" value="<?= set_value('ket_kondisi_fisik') ?>">
                    </div>
                </div>
            </div>
            <div class="container text-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Buat</button>
            </div>
        </form>
    </div>


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
                <form action="<?= base_url('teknisi/lappemeliharaan') ?>" method="post">
                    <div class="modal-body md-7">
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="nama_alat" style="color: black">Nama Alat</label>
                                <input type="text" class="form-control" id="nama_alat" name="nama_alat" placeholder="Masukkan Nama Alat..." value="<?= set_value('nama_alat') ?>">
                            </div>
                            <div class="col">
                                <label for="ruangan" style="color: black">Ruangan</label>
                                <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Masukkan Ruangan..." value="<?= set_value('ruangan') ?>">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="suhu" style="color: black">Suhu</label>
                                <input type="text" class="form-control" id="suhu" name="suhu" placeholder="Suhu ... (*C)" value="<?= set_value('suhu') ?>">
                            </div>
                            <div class="col">
                                <label for="kelembaban" style="color: black">Kelembaban</label>
                                <input type="text" class="form-control" id="kelembaban" name="kelembaban" placeholder="Kelembaban ... (% RH)" value="<?= set_value('kelembaban') ?>">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="tegangan" style="color: black">Tegangan</label>
                                <input type="text" class="form-control" id="tegangan" name="tegangan" placeholder="Masukkan Tegangan" value="<?= set_value('tegangan') ?>">
                            </div>
                            <div class="col">
                                <label for="daya_semu" style="color: black">Daya Semu</label>
                                <input type="text" class="form-control" id="daya_semu" name="daya_semu" placeholder="Daya Semu ... (VA)" value="<?= set_value('daya_semu') ?>">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="daya_aktif" style="color: black">Daya Aktif</label>
                                <input type="text" class="form-control" id="daya_aktif" name="daya_aktif" placeholder="Daya Aktif ... (watt)" value="<?= set_value('daya_aktif') ?>">
                            </div>
                            <div class="col">
                                <label for="daya_reaktif" style="color: black">Daya Reaktif</label>
                                <input type="text" class="form-control" id="daya_reaktif" name="daya_reaktif" placeholder="Daya Reaktif ... (VAR)" value="<?= set_value('daya_reaktif') ?>">
                            </div>
                        </div>
                        <div class="form-group form-row">
                            <div class="col">
                                <label for="kondisi_fisik" style="color: black">Kondisi Fisik</label>
                                <input type="text" class="form-control" id="kondisi_fisik" name="kondisi_fisik" placeholder="Kondisi Fisik" value="<?= set_value('kondisi_fisik') ?>">
                            </div>
                            <div class="col">
                                <label for="ket_kondisi_fisik" style="color: black">Keterangan Kondisi Fisik</label>
                                <input type="text" class="form-control" id="ket_kondisi_fisik" name="ket_kondisi_fisik" placeholder="Jelaskan Kondisi FIsik" value="<?= set_value('ket_kondisi_fisik') ?>">
                            </div>
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