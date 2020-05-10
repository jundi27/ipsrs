<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

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