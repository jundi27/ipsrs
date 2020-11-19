<!-- modal add laporan -->
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
                        <input type="hidden" name="user_id" value="<?= $this->session->user_id ?>">
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

<!-- modal detail laporan -->
<div class="modal fade" id="detailLaporan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h5>Detail Laporan</h5>
                </div>
            </div>
            <div class="modal-body">
                <table class="table table-white bg-white table-bordered">
                    <tbody>
                        <tr>
                            <td><b>Nama Alat</b></td>
                            <td>:</td>
                            <td><span id="namaAlat"></span></td>
                            <td><b>Ruangan</b></td>
                            <td>:</td>
                            <td><span id="lpruangan"></span></td>
                        </tr>
                        <tr>
                            <td><b>Suhu</b></td>
                            <td>:</td>
                            <td><span id="lpsuhu"></span></td>
                            <td><b>Kelembaban</b></td>
                            <td>:</td>
                            <td><span id="lpkelembaban"></span></td>
                        </tr>
                        <tr>
                            <td><b>Tegangan</b></td>
                            <td>:</td>
                            <td><span id="lptegangan"></span></td>
                            <td><b>Daya Semu</b></td>
                            <td>:</td>
                            <td><span id="lpdayaSemu"></span></td>
                        </tr>
                        <tr>
                            <td><b>Daya Aktif</b></td>
                            <td>:</td>
                            <td><span id="lpdayaAktif"></span></td>
                            <td><b>Daya Reaktif</b></td>
                            <td>:</td>
                            <td><span id="lpdayaReaktif"></span></td>
                        </tr>
                        <tr>
                            <td><b>Kondisi Fisik</b></td>
                            <td>:</td>
                            <td><span id="lpkondisiFisik"></span></td>
                            <td><b>Keterangan Kondisi Fisik</b></td>
                            <td>:</td>
                            <td><span id="lpketKondisiFisik"></span></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal</b></td>
                            <td>:</td>
                            <td><span id="lptanggal"></span></td>
                            <td><b>Teknisi</b></td>
                            <td>:</td>
                            <td><span id="lpteknisi"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- modal detail history laporan -->
<div class="modal fade" id="detailHistoryLaporan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h5>Detail Laporan</h5>
                </div>
            </div>
            <div class="modal-body">
                <table class="table table-white bg-white table-bordered">
                    <tbody>
                        <tr>
                            <td><b>Nama Alat</b></td>
                            <td>:</td>
                            <td><span id="hstnamaAlat"></span></td>
                            <td><b>Ruangan</b></td>
                            <td>:</td>
                            <td><span id="hstlpruangan"></span></td>
                        </tr>
                        <tr>
                            <td><b>Suhu</b></td>
                            <td>:</td>
                            <td><span id="hstlpsuhu"></span></td>
                            <td><b>Kelembaban</b></td>
                            <td>:</td>
                            <td><span id="hstlpkelembaban"></span></td>
                        </tr>
                        <tr>
                            <td><b>Tegangan</b></td>
                            <td>:</td>
                            <td><span id="hstlptegangan"></span></td>
                            <td><b>Daya Semu</b></td>
                            <td>:</td>
                            <td><span id="hstlpdayaSemu"></span></td>
                        </tr>
                        <tr>
                            <td><b>Daya Aktif</b></td>
                            <td>:</td>
                            <td><span id="hstlpdayaAktif"></span></td>
                            <td><b>Daya Reaktif</b></td>
                            <td>:</td>
                            <td><span id="hstlpdayaReaktif"></span></td>
                        </tr>
                        <tr>
                            <td><b>Kondisi Fisik</b></td>
                            <td>:</td>
                            <td><span id="hstlpkondisiFisik"></span></td>
                            <td><b>Keterangan Kondisi Fisik</b></td>
                            <td>:</td>
                            <td><span id="hstlpketKondisiFisik"></span></td>
                        </tr>
                        <tr>
                            <td><b>Tanggal</b></td>
                            <td>:</td>
                            <td><span id="hstlptanggal"></span></td>
                            <td><b>Teknisi</b></td>
                            <td>:</td>
                            <td><span id="hstlpteknisi"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>