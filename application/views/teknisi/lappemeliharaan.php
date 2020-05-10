<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message') ?>
    <?= validation_errors(); ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#lappemModal">Buat Laporan</a>
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
            <?php foreach ($date as $dc) : ?>

                <tr>
                    <td scope="row"><?= $i; ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= date('d F Y', $dc['date_created']); ?></td>
                    <td><a href="" class="badge badge-primary">Detail</a></td>
                </tr>

                <?php $i++; ?>
            <?php endforeach; ?>
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
                            <!--<input type="text" class="form-control" id="kondisi_fisik" name="kondisi_fisik" placeholder="Kondisi Fisik" value="<?= set_value('kondisi_fisik') ?>">-->
                            <select class="form-control" name="kondisi_fisik" id="kondisi_fisik" placeholder="Kondisi Fisik">
                                <option selected>Pilih</option>
                                <option value="Bagus">Bagus</option>
                                <option value="Kurang Bagus">Kurang Bagus</option>
                                <option value="Rusak">Rusak</option>
                            </select>
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