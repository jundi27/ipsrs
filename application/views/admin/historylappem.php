<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- Halaman ini akan di render di historylappem.php -->
    <table class="table table-striped text-dark text-center">
        <?php
        $alldate = date_create();
        echo '<span style="color: green;">History laporan sebelum ' . date_format($alldate, 'M Y') . "</span>";
        ?>
        <thead style="background-color:#008983; color:#ffffff;">
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
                    <td><?php $myd = date_create($lp->lpdc);
                        echo date_format($myd, 'd M Y'); ?></td>
                    <td><a href="javascript:;" <?php
                                                foreach ($lp as $key => $val) {
                                                    echo 'data-' . $key . '="' . $val . '"';
                                                }
                                                ?> data-toggle="modal" id="btn-detail-history-lappem" data-target="#detail-history-lappem" class="badge badge-primary">Detail</a>
                        <a href="<?= base_url('admin/printhistorylappem/') . $lp->hlid ?>" target="_blank" id="togglePrintLaporan" class="badge badge-success">Cetak</a>
                    </td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- modal detail history lappem -->
<div class="modal fade" id="detail-history-lappem" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="data-detail-history-lappem">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('#btn-detail-history-lappem').forEach(item => {
        item.addEventListener('click', e => {
            const getAttr = key => {
                return e.target.getAttribute(`data-${key}`)
            }
            const detail = [{
                key: 'Tanggal Laporan',
                value: new Intl.DateTimeFormat('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                }).format(new Date(getAttr('lpdc')))
            }, {
                key: 'Nama Alat',
                value: getAttr('nama_alat')
            }, {
                key: 'Ruangan',
                value: getAttr('ruangan')
            }, {
                key: 'Suhu',
                value: getAttr('suhu')
            }, {
                key: 'Kelembaban',
                value: getAttr('kelembaban')
            }, {
                key: 'Tegangan',
                value: getAttr('tegangan')
            }, {
                key: 'Daya Semu',
                value: getAttr('daya_semu')
            }, {
                key: 'Daya Aktif',
                value: getAttr('daya_aktif')
            }, {
                key: 'Daya Reaktif',
                value: getAttr('daya_reaktif')
            }, {
                key: 'Kondisi Fisik',
                value: getAttr('kondisi_fisik')
            }, {
                key: 'Ket. Kondisi Fisik',
                value: getAttr('ket_kondisi_fisik')
            }, {
                key: 'Tanggal Kadaluarsa',
                value: new Intl.DateTimeFormat('id-ID', {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                }).format(new Date(getAttr('expired')))
            }, {
                key: 'Nama Teknisi',
                value: getAttr('nama')
            }, {
                key: 'Email Teknisi',
                value: getAttr('email')
            }, ];

            document.querySelector('#data-detail-history-lappem').innerHTML = `${detail.map(item =>{
            return `<div class="col-6 text-center">
                        <b>${item.key}</b>
                        <span class="d-block">${item.value}</span>
                        <br />
                    </div>`
            }).join('')}`
        })
    })
</script>