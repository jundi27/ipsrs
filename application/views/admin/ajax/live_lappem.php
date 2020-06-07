<!-- Halaman ini akan di render di historylappem.php -->
<table class="table table-striped text-dark text-center">
    <?php
    $alldate = date_create();
    echo '<span style="color: green;">History laporan sebelum ' . date_format($alldate, 'M Y') . "</span>";
    ?>
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
                <td><?php $myd = date_create($lp->lpdc);
                    echo date_format($myd, 'd M Y'); ?></td>
                <td><a href="javascript:;" data-id-hst="<?php echo $lp->hlid ?>" data-toggle="modal" data-target="#detailHistoryLaporan" class="badge badge-primary">Detail</a>
                    <a href="<?= base_url('admin/printhistorylappem/') . $lp->hlid ?>" target="_blank" id="togglePrintLaporan" class="badge badge-success">Cetak</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $this->load->view('admin/modals') ?>

<script type="text/javascript">
    const viewDtlHistoryLaporan = () => {
        const detailHistoryLaporan = $("#detailHistoryLaporan");
        detailHistoryLaporan.on("show.bs.modal", (e) => {
            const id = $(e.relatedTarget).data('id-hst');

            $.ajax({
                url: 'http://localhost/ipsrs/ajax/detailhistorylappem',
                method: 'get',
                data: {
                    id: id
                },
                success: (res) => {
                    let arr = JSON.parse(res);
                    $("#hstnamaAlat").text(arr[0].nama_alat)
                    $("#hstlpruangan").text(arr[0].ruangan)
                    $("#hstlpsuhu").text(arr[0].suhu + ' °C')
                    $("#hstlpkelembaban").text(arr[0].kelembaban + ' %RH')
                    $("#hstlptegangan").text(arr[0].tegangan + ' V')
                    $("#hstlpdayaSemu").text(arr[0].daya_semu + ' VA')
                    $("#hstlpdayaAktif").text(arr[0].daya_aktif + ' watt')
                    $("#hstlpdayaReaktif").text(arr[0].daya_reaktif + ' VAR')
                    $("#hstlpkondisiFisik").text(arr[0].kondisi_fisik)
                    $("#hstlpketKondisiFisik").text(arr[0].ket_kondisi_fisik)
                    const tanggal = arr[0].lpdc;
                    const reversed = tanggal.split('-').reverse().join('/');
                    $("#hstlptanggal").text(reversed)
                    $("#hstlpteknisi").text(arr[0].nama)
                },
                error: (err) => {
                    console.log("error mendapatkan data!");
                }
            })
        })
    }
    viewDtlHistoryLaporan()

    // data table untuk semua tabel
    $("table").dataTable();
</script>