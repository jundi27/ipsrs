<?php
$success = $this->session->flashdata('success');
if (!empty($success)) {
    echo "<script>
            swal({
                title: 'Sukses',
                text: '$success',
                icon: 'success'
            })
            </script>";
}
$error = $this->session->flashdata('error');
if (!empty($error)) {
    echo "<script>
            swal({
                title: 'Gagal',
                text: '$error',
                icon: 'error'
            })
            </script>";
}
?>


<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message') ?>
    <?= validation_errors(); ?>
    <a href="" class="btn btn-primary mb-3" style="background-color:#008983; color:#ffffff" data-toggle="modal" data-target="#lappemModal">
        <i class="fa fa-plus"></i> Buat Laporan</a>
    <table class="table table-striped text-dark text-center">
        <thead style="background-color:#008983; color:#ffffff">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Teknisi</th>
                <th scope="col">Alat</th>
                <th scope="col">Ruangan</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Tanggal Laporan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($lappem as $lp) : ?>
                <tr>
                    <td scope="row"><?= $i; ?></td>
                    <td><?= $lp->nama; ?></td>
                    <td><?= $lp->nama_alat; ?></td>
                    <td><?= $lp->ruangan; ?></td>
                    <td><?= $lp->kondisi_fisik; ?></td>
                    <td>
                        <?php
                        $myd = date_create($lp->lpdc);
                        $dbdate = date_format($myd, 'd M Y');
                        echo $dbdate;
                        ?>
                    </td>
                    <td>
                        <a href="javascript:;" id="btn-detail-laporan" <?php
                                                                        foreach ($lp as $key => $val) {
                                                                            echo 'data-' . $key . '="' . $val . '"';
                                                                        }
                                                                        ?> data-toggle="modal" data-target="#modal-detail-laporan" class="badge badge-primary">Detail</a>
                        <a href="javascript:;" id="btn-hapus-laporan" data-id="<?= $lp->lpid ?>" class="badge badge-danger">Hapus</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
</div>

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
                        <input type="hidden" required name="user_id" value="<?= $this->session->user_id ?>">
                        <div class="col">
                            <label for="nama_alat" style="color: black">Nama Alat</label>
                            <input type="text" required class="form-control" id="nama_alat" name="nama_alat" placeholder="Masukkan Nama Alat..." value="<?= set_value('nama_alat') ?>">
                        </div>
                        <div class="col">
                            <label for="ruangan" style="color: black">Ruangan</label>
                            <input type="text" required class="form-control" id="ruangan" name="ruangan" placeholder="Masukkan Ruangan..." value="<?= set_value('ruangan') ?>">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col">
                            <label for="suhu" style="color: black">Suhu</label>
                            <input type="text" required class="form-control" id="suhu" name="suhu" placeholder="Suhu ... (*C)" value="<?= set_value('suhu') ?>">
                        </div>
                        <div class="col">
                            <label for="kelembaban" style="color: black">Kelembaban</label>
                            <input type="text" required class="form-control" id="kelembaban" name="kelembaban" placeholder="Kelembaban ... (% RH)" value="<?= set_value('kelembaban') ?>">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col">
                            <label for="tegangan" style="color: black">Tegangan</label>
                            <input type="text" required class="form-control" id="tegangan" name="tegangan" placeholder="Masukkan Tegangan" value="<?= set_value('tegangan') ?>">
                        </div>
                        <div class="col">
                            <label for="daya_semu" style="color: black">Daya Semu</label>
                            <input type="text" required class="form-control" id="daya_semu" name="daya_semu" placeholder="Daya Semu ... (VA)" value="<?= set_value('daya_semu') ?>">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col">
                            <label for="daya_aktif" style="color: black">Daya Aktif</label>
                            <input type="text" required class="form-control" id="daya_aktif" name="daya_aktif" placeholder="Daya Aktif ... (watt)" value="<?= set_value('daya_aktif') ?>">
                        </div>
                        <div class="col">
                            <label for="daya_reaktif" style="color: black">Daya Reaktif</label>
                            <input type="text" required class="form-control" id="daya_reaktif" name="daya_reaktif" placeholder="Daya Reaktif ... (VAR)" value="<?= set_value('daya_reaktif') ?>">
                        </div>
                    </div>
                    <div class="form-group form-row">
                        <div class="col">
                            <label for="kondisi_fisik" style="color: black">Kondisi Fisik</label>
                            <!--<input type="text" required class="form-control" id="kondisi_fisik" name="kondisi_fisik" placeholder="Kondisi Fisik" value="<?= set_value('kondisi_fisik') ?>">-->
                            <select class="form-control" name="kondisi_fisik" id="kondisi_fisik" placeholder="Kondisi Fisik" required>
                                <option value="">Pilih</option>
                                <option value="Bagus">Bagus</option>
                                <option value="Kurang Bagus">Kurang Bagus</option>
                                <option value="Rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="ket_kondisi_fisik" style="color: black">Keterangan Kondisi Fisik</label>
                            <input type="text" required class="form-control" id="ket_kondisi_fisik" name="ket_kondisi_fisik" placeholder="Jelaskan Kondisi FIsik" value="<?= set_value('ket_kondisi_fisik') ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" style="background-color:#008983; color:#ffffff">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- modal detail laporan -->
<div class="modal fade" id="modal-detail-laporan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <h5>Detail Laporan</h5>
                </div>
            </div>
            <div class="modal-body">
                <div class="row" id="data-detail-laporan"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // menampilkan detail laporan
    document.querySelectorAll('#btn-detail-laporan').forEach(item => {
        item.addEventListener('click', e => {
            const get = attr => {
                return e.target.getAttribute(`data-${attr}`)
            }
            const dateFormatter = date => new Intl.DateTimeFormat('id-ID', {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            }).format(new Date(get(date)))

            const detail = [{
                    key: 'Tanggal Laporan',
                    val: dateFormatter('lpdc')
                }, {
                    key: 'Nama Alat',
                    val: get('nama_alat')
                }, {
                    key: 'Ruangan',
                    val: get('ruangan')
                }, {
                    key: 'Suhu',
                    val: get('suhu') + ' &deg;C'
                }, {
                    key: 'Kelembapan',
                    val: get('kelembaban') + ' %RH'
                }, {
                    key: 'Tegangan',
                    val: get('tegangan') + ' V'
                },
                {
                    key: 'Daya Semu',
                    val: get('daya_semu') + ' VA'
                }, {
                    key: 'Daya Aktif',
                    val: get('daya_aktif') + ' watt'
                }, {
                    key: 'Daya Reaktif',
                    val: get('daya_reaktif') + ' VAR'
                }, {
                    key: 'Kondisi Fisik',
                    val: get('kondisi_fisik')
                }, {
                    key: 'Ket. Kondisi Fisik',
                    val: get('ket_kondisi_fisik')
                }, {
                    key: 'Tanggal Kadaluarsa',
                    val: dateFormatter('expired')
                }, {
                    key: 'Nama Teknisi',
                    val: get('nama')
                }, {
                    key: 'Jabatan',
                    val: get('lvl')
                }
            ]

            document.querySelector('#data-detail-laporan').innerHTML = `${detail.map((item,index) => {
                return `<div class="col-6 text-center">
                        <b>${item.key}</b>
                        <span class="d-block">${item.val}</span>
                        <br />
                    </div>`
            }).join('')}`

        })
    })

    function numberOnly(e) {
        console.log(e.target.value);
        e.target.value = e.target.value.replace(/\/[^0-9]/g, '')
    }

    // menghapus laporan
    document.querySelectorAll('#btn-hapus-laporan').forEach(item => {
        item.addEventListener('click', e => {
            const idLaporan = e.target.getAttribute('data-id')

            swal({
                title: 'Lanjutkan menghapus?',
                text: 'Hapus data ini? data tidak bisa dikembalikan setelah dihapus.',
                icon: 'warning',
                buttons: ['Batal', 'Lanjut'],
                dangerMode: true
            }).then(confirm => {
                if (confirm) {
                    window.location.href = window.location.href + '?aksi=hapus&id_laporan=' + idLaporan
                }
            })
        })
    })
</script>