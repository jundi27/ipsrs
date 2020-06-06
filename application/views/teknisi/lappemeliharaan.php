<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message') ?>
    <?= validation_errors(); ?>
    <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#lappemModal">Buat Laporan</a>
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
                        <td>
                        <?php 
                        $myd=date_create($lp->lpdc);
                        $dbdate = date_format($myd, 'd M Y');
                        echo $dbdate;
                        ?>
                        </td>
                        <td><a href="javascript:;"
                        data-id-laporan="<?= $lp->lpid ?>"
                        data-toggle="modal" data-target="#detailLaporan" class="badge badge-primary">Detail</a>
                        </td>
                    </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>

    </table>
</div>
</div>

<?php $this->load->view('teknisi/modals') ?>