<!-- Sbadmin2 -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">

            <!-- menampilkan pesan error -->
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">'
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <?= $this->session->flashdata('pesan'); ?>

            <table class="table table-hover">
                <thead style="background-color:#008983; color:#ffffff;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Kerusakan</th>
                        <!-- <th scope="col">Barang</th> -->
                        <!-- <th scope="col">Ruangan</th> -->
                        <th scope="col">Tanggal</th>
                        <!-- <th scope="col">Keterangan</th> -->
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengaduan as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $p['nama'] ?></td>
                            <td><?= $p['nip'] ?></td>
                            <td><?= $p['kerusakan'] ?></td>
                            <!-- <td><?= $p['brg'] ?></td> -->
                            <!-- <td><?= $p['ruangan'] ?></td> -->
                            <td><?php echo date('d M Y', strtotime($p['tgl'])); ?></td>
                            <!-- <td><?= $p['ket'] ?></td> -->
                            <td>
                                <a href="<?= base_url('admin/detail/'); ?><?= $p['id']; ?>" class="badge badge-primary">Detail</a>
                                <!-- <a href="" class="badge badge-info">Terima</a>
                                <a href="" class="badge badge-danger">Tolak</a> -->
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->