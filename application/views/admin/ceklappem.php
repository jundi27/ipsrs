<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <table class="table table-striped text-dark text-center">
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
            <?php foreach ($lappem as $lp) : ?>
                <tr>
                    <td scope="row"><?= $i; ?></td>
                    <td><?= $lp->nama; ?></td>
                    <td><?php
                        $myd = date_create($lp->lpdc);
                        echo date_format($myd, 'd M Y');
                        ?></td>
                    <td>
                        <a href="javascript:;" id="btn-detail-laporan" <?php
                                                                        foreach ($lp as $key => $val) {
                                                                            echo 'data-' . $key . '="' . $val . '"';
                                                                        }
                                                                        ?> data-toggle="modal" data-target="#modal-detail-laporan" class="badge badge-primary">Detail</a>
                        <a href="<?= base_url('admin/printlappem/') . $lp->lpid ?>" target="_blank" id="togglePrintLaporan" class="badge badge-success">Cetak</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>

    </table>
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
                val: get('suhu')
            }, {
                key: 'Kelembapan',
                val: get('kelembaban')
            }, {
                key: 'Tegangan',
                val: get('daya_semu')
            }, {
                key: 'Daya Aktif',
                val: get('daya_aktif')
            }, {
                key: 'Daya Reaktif',
                val: get('daya_reaktif')
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
            }]

            document.querySelector('#data-detail-laporan').innerHTML = `${detail.map((item,index) => {
                return `<div class="col-6 text-center">
                        <b>${item.key}</b>
                        <span class="d-block">${item.val}</span>
                        <br />
                    </div>`
            }).join('')}`

        })
    })
</script>