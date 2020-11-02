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

            <?php
            $success_message = $this->session->flashdata('success');
            if (!empty($success_message)) {
                echo "<script>
                    swal({
                        title: 'Sukses',
                        text: '$success_message',
                        icon: 'success'
                    })
                   </script>";
            }

            ?>
            <?php
            $failed_message = $this->session->flashdata('failed');
            if (!empty($failed_message)) {
                echo "<script>
                    swal({
                        title: 'Gagal',
                        text: '$failed_message',
                        icon: 'success'
                    })
                   </script>";
            }
            ?>


            <?= $this->session->flashdata('pesan'); ?>

            <div class="table-responsive">

                <table class="table table-hover">
                    <thead style="background-color:#008983; color:#ffffff;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Kerusakan</th>
                            <th scope="col">Barang</th>
                            <th scope="col">Ruangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($pengaduan as $p) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $p['nama']; ?></td>
                                <td><?= $p['nip']; ?></td>
                                <td><?= $p['kerusakan']; ?></td>
                                <td><?= $p['brg']; ?></td>
                                <td><?= $p['ruangan']; ?></td>
                                <td><?php echo date('d M Y', strtotime($p['tgl'])); ?></td>
                                <td><?= $p['ket']; ?></td>
                                <td>
                                    <?php
                                    if (!empty($_GET['aksi']) && $_GET['aksi'] == 'diteruskan') {
                                        $status = $p['status'];
                                    } else {
                                        $status = $this->db->query("select *, user.nama, user.lvl from forward_pengaduan join user on forward_pengaduan.id_teknisi = user.id where forward_pengaduan.id_pengaduan = '$p[id]'")->result()[0]->status;
                                    }
                                    if ($status) {
                                        switch ($status) {
                                            case 'Sedang Diperbaiki':
                                                echo '<span class="badge badge-secondary"><i class="fas fa-spinner"></i> Sedang Diperbaiki</span>';
                                                break;
                                            case 'Ditolak':
                                                echo '<span class="badge badge-danger"><i class="fas fa-times-circle"></i> Ditolak</span>';
                                                break;
                                            case 'Sedang Diteruskan':
                                                echo '<span class="badge badge-dark"><i class="fas fa-info-circle"></i> Belum Diproses</span>';
                                                break;
                                            case 'Sudah Diperbaiki':
                                                echo '<span class="badge badge-secondary"><i class="fas fa-check-circle"></i> Sudah Diperbaiki</span>';
                                                break;
                                            default:
                                                echo '<span class="badge badge-dark"><i class="fas fa-info-circle"></i> Belum Diproses</span>';
                                                break;
                                        }
                                    }
                                    ?>
                                    <?php if ($status == 'Ditolak') : ?>
                                        <a href="#" class="badge badge-info" id="btn-lihat-alasan" data-toggle="modal" data-target="#modal-lihat-alasan" data-nama="<?= $p['nama'] ?>" data-alasan="<?= $p['alasan_penolakan'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> Lihat alasan</a>
                                    <?php endif; ?>
                                    <br>
                                    <small class="text-secondary">Diteruskan ke: <b><?= $p['nama'] ?></b> (<?= $p['lvl'] ?>)</small>
                                </td>
                                <td>
                                    <a href="<?= base_url('teknisi/detail/'); ?><?= $p['id']; ?>" class="badge badge-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>

                                    <?php
                                    if (!empty($this->input->get("aksi")) && $this->input->get("aksi") == 'diteruskan') :
                                    ?>
                                        <br>
                                        <?php if ($p['status'] == 'Sedang Diteruskan') : ?>
                                            <a href="<?= base_url('teknisi/lappengaduan?aksi=perbaiki&id=' . $p['id_forward']) ?>" class="badge badge-success"><i class="fa fa-cog" aria-hidden="true"></i> Perbaiki</a>
                                            <a href="javascript:;" data-id="<?= $p['id_forward'] ?>" class="badge badge-danger btn-tolak" data-toggle="modal" data-target="#modal-tolak"><i class="fa fa-times-circle" aria-hidden="true"></i> Tolak</a>
                                        <?php elseif ($p['status'] == 'Sedang Diperbaiki') : ?>
                                            <a href="" onclick="return confirm('Sudah selesai memperbaiki pengaduan ini?')" class="badge badge-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Tanda Selesai</a>
                                        <?php endif; ?>
                                    <?php
                                    endif;
                                    ?>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-tolak" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tolak</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open("teknisi/lappengaduan?aksi=tolak", 'method="POST"') ?>
                <div class="modal-body">
                    <input type="hidden" id="id-forward" name="id_forward_pengaduan">
                    <div class="form-group">
                        <label for="">Masukkan alasan penolakan</label>
                        <textarea class="form-control" name="alasan_penolakan" required rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="modal-lihat-alasan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-nama-penolak">Nama Penolak</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modal-isi-penolakan">Isi Penolakan</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    const btnLihatAlasan = document.querySelectorAll("#btn-lihat-alasan");

    btnLihatAlasan.forEach(item => {
        item.addEventListener("click", e => {
            const nama = e.target.getAttribute("data-nama")
            const alasan = e.target.getAttribute("data-alasan")
            console.log(alasan);

            document.querySelector("#modal-nama-penolak").innerText = nama
            document.querySelector("#modal-isi-penolakan").innerText = alasan
        })
    })
</script>


<script>
    const btnTolak = document.querySelectorAll(".btn-tolak")
    const idForwardEl = document.querySelector("#id-forward")

    btnTolak.forEach(item => {
        item.addEventListener("click", e => {
            const idForward = e.target.getAttribute("data-id")

            idForwardEl.value = idForward
        })
    })
</script>