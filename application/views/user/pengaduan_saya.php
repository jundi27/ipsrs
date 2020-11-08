<!-- php function -->
<?php

function show_status($status)
{
    $echo = "";
    switch ($status) {
        case 'Sedang Diteruskan':
            $echo .= '<span class="badge badge-dark"><i class="fa fa-forward" aria-hidden="true"></i> ' . $status . '</span>';
            break;
        case 'Ditolak':
            $echo .= '<span class="badge badge-danger"><i class="fa fa-times" aria-hidden="true"></i> ' . $status . '</span>';
            break;
        case 'Sedang Diperbaiki':
            $echo .= '<span class="badge badge-primary"><i class="fa fa-cog" aria-hidden="true"></i> ' . $status . '</span>';
            break;
        case 'Sudah Diperbaiki':
            $echo .= '<span class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> ' . $status . '</span>';
            break;
        default:
            $echo .= '<span class="badge badge-secondary"><i class="fa fa-info-circle" aria-hidden="true"></i> Belum Diproses</span>';
            break;
    }

    return $echo;
}

function show_ditolak_button($teknisi, $alasan)
{
    return '<br /><a href="javascript:;" id="btn-lihat-alasan" data-toggle="modal" data-target="#modal-lihat-alasan" data-nama="' . $teknisi . '" data-alasan="' . $alasan . '" class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i> Alasan</a>';
}

function show_userinfo($teknisi, $lvl)
{
    return '<br /><small class="text-secondary"><i class="fa fa-cog" aria-hidden="true"></i>: <b>' . $teknisi . '</b> (' . $lvl . ')</small>';
}
?>

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
                            <!-- <th scope="col">Barang</th> -->
                            <!-- <th scope="col">Ruangan</th> -->
                            <th scope="col">Tanggal</th>
                            <!-- <th scope="col">Keterangan</th> -->
                            <th scope="col">Status</th>
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
                                    <?php
                                    $query = $this->db->query("SELECT forward_pengaduan.*, user.nama AS t_nama, user.lvl AS t_lvl FROM forward_pengaduan JOIN user ON forward_pengaduan.id_teknisi = user.id WHERE forward_pengaduan.id_pengaduan = " . $p['p_id'])->row();
                                    if ($query) {
                                        echo show_status($query->status);
                                        if ($query->status == 'Ditolak') {
                                            echo show_ditolak_button($query->t_nama, $query->edit_alasan_penolakan != '' ? $query->edit_alasan_penolakan : $query->alasan_penolakan);
                                        }
                                        echo show_userinfo($query->t_nama, $query->t_lvl);
                                    } else {
                                        echo '<span class="badge badge-secondary"><i class="fa fa-info-circle" aria-hidden="true"></i> Belum Diproses</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="<?= base_url('user/pengaduan_saya/'); ?><?= $p['p_id']; ?>" class="badge badge-primary">Detail</a>
                                    <br />
                                    <?php
                                    if ($query) {
                                        if ($query->status == 'Sudah Diperbaiki') {
                                            echo '<a href="' . base_url('user/pengaduan_saya?aksi=selesai&id=' . $query->id_forward) . '" onclick="return confirm(`Selesaikan pengaduan ini?`)" class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Tanda Selesai</a>';
                                        } elseif ($query->status == 'Ditolak') {
                                            echo '<a href="javascript:;" id="btn-minta-lagi" data-toggle="modal" data-target="#modal-minta-lagi" data-id="' . $query->id_forward . '" class="badge badge-warning"><i class="fas fa-recycle"></i>
                                        Minta Lagi</a><br>';
                                            echo '<a href="' . base_url('user/pengaduan_saya?aksi=selesai&id=' . $query->id_forward) . '" onclick="return confirm(`Selesaikan pengaduan ini?`)" class="badge badge-success"><i class="fa fa-check" aria-hidden="true"></i> Tanda Selesai</a>';
                                        }
                                    }
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
                <!-- <button type="button" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Tandai Selesai</button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-minta-lagi" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Minta kembali pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('user/pengaduan_saya?aksi=mintalagi') ?>
            <div class="modal-body">
                <input type="hidden" name="id_forward" id="modal-id-forward">
                <div class="form-group">
                    <label for="">Masukkan alasan</label>
                    <textarea class="form-control" name="alasan_pengembalian" placeholder="Alasan anda..." rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Kirim</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<script>
    const btnLihatAlasan = document.querySelectorAll("#btn-lihat-alasan");

    btnLihatAlasan.forEach(item => {
        item.addEventListener("click", e => {
            const nama = e.target.getAttribute("data-nama")
            const alasan = e.target.getAttribute("data-alasan")

            document.querySelector("#modal-nama-penolak").innerText = nama
            document.querySelector("#modal-isi-penolakan").innerText = alasan
        })
    })
</script>


<script>
    const btnMintaLagi = document.querySelectorAll("#btn-minta-lagi");
    const idForward = document.querySelectorAll("#id-forward");

    btnMintaLagi.forEach(item => {
        item.addEventListener("click", e => {
            const idForward = e.target.getAttribute("data-id")
            // console.log(alasan);

            document.querySelector("#modal-id-forward").value = idForward
        })
    })
</script>