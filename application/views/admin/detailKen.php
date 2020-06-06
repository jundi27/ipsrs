<!-- Sbadmin2 -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <section class="content">
        <a href="<?= base_url('admin/lapkendala') ?>" class="btn btn-primary btn-sm mb-4"><i class="fas fa-arrow-left"></i> Kembali</a>
        <table class="table">
            <tr>
                <th>Nama</th>
                <td><?= $detail['nama'] ?></td>
            </tr>
            <tr>
                <th>Kendala</th>
                <td><?= $detail['kendala'] ?></td>
            </tr>
            <tr>
                <th>Ruangan</th>
                <td><?= $detail['ruangan'] ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?= $detail['tgl'] ?></td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td><?= $detail['ket'] ?></td>
            </tr>
        </table>
    </section>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->