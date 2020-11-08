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
                        <th scope="col">Nama Teknisi</th>
                        <th scope="col">Level Teknisi</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Kerusakan</th>
                        <th scope="col">Kendala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kendala as $k) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $k->t_nama ?></td>
                            <td><?= $k->t_lvl ?></td>
                            <td><?= $k->brg ?></td>
                            <td><?= $k->kerusakan ?></td>
                            <td><?= $k->kendala_kerusakan ?></td>
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