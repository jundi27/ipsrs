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
        case 'Ditunda':
            $echo .= '<span class="badge badge-warning"><i class="fa fa-info-circle" aria-hidden="true"></i> ' . $status . '</span>';
            break;
        case 'Dikembalikan':
            $echo .= '<span class="badge badge-warning"><i class="fa fa-recycle" aria-hidden="true"></i> ' . $status . '</span>';
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

function show_ditolak_button($id_forward, $teknisi, $alasan, $edit_alasan_penolakan)
{
    return '<br /><a href="javascript:;" id="btn-lihat-alasan" data-toggle="modal" data-target="#modal-lihat-alasan" data-id="' . $id_forward . '" data-nama="' . $teknisi . '" data-alasan="' . $alasan . '" data-edit-alasan-penolakan="' . $edit_alasan_penolakan . '" class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i> Alasan</a>';
}


function show_ditunda_button($id_forward, $teknisi, $kendala, $edit_kendala)
{
    return '<br /><a href="javascript:;" id="btn-lihat-kendala" data-toggle="modal" data-target="#modal-lihat-kendala" data-id="' . $id_forward . '" data-nama="' . $teknisi . '" data-kendala="' . $kendala . '" data-edit-kendala="' . $edit_kendala . '" class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i> Alasan</a>';
}


function show_dikembalikan_button($alasan)
{
    return '<br /><a href="javascript:;" id="btn-lihat-alasan-pengembalian" data-toggle="modal" data-target="#modal-lihat-alasan-pengembalian" data-alasan="' . $alasan . '" class="badge badge-info"><i class="fa fa-eye" aria-hidden="true"></i> Alasan</a>';
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
            <table class="table table-hover table-responsive">
                <thead style="background-color:#008983; color:#ffffff;">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Kerusakan</th>
                        <th scope="col">Barang</th>
                        <th scope="col">Tanggal Pengaduan</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Teknisi</th>
                        <th scope="col">Level Teknisi</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pengaduan as $key => $p) : ?>
                        <tr>
                            <td scope="row"><?= $i; ?></th>
                            <td><?= $p->nama_pengadu ?></td>
                            <td><?= $p->nip ?></td>
                            <td><?= $p->kerusakan ?></td>
                            <td><?= $p->brg ?></td>
                            <td><?= $p->tgl ?></td>
                            <td><?= $p->ket ?></td>
                            <td><?= $p->nama_teknisi ?></td>
                            <td><?= $p->lvl_teknisi ?></td>
                            <td><?= show_status($p->status) ?>
                                <?php
                                if ($p->status == 'Ditolak') {
                                    echo show_ditolak_button($p->id, $p->nama_teknisi, $p->alasan_penolakan, $p->edit_alasan_penolakan);
                                }
                                if ($p->status == 'Ditunda') {
                                    echo show_ditunda_button($p->id, $p->nama_teknisi, $p->kendala_kerusakan, $p->edit_kendala_kerusakan);
                                }
                                ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/historylappeng?aksi=hapus&id=' . $p->id) ?>" onclick="return confirm('Hapus data ini?')" class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="modal-forward" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Teruskan Pengaduan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open("admin/lappengaduan/forward") ?>
            <div class="modal-body">
                <input type="hidden" name="id_forward" id="id-forward">
                <input type="hidden" name="id_pengaduan" id="id-pengaduan">
                <div class="form-group">
                    <label for="">Pilih Teknisi</label>
                    <select name="teknisi" id="" class="form-control" required>
                        <option value="">Teknisi</option>
                        <?php
                        $teknisi = $this->db->get_where('user', ['role_id' => 3])->result();
                        foreach ($teknisi as $key => $value) :
                        ?>
                            <option value="<?= $value->id ?>"><?= strtoupper($value->nama) ?> - <?= $value->lvl ?></option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-warning btn-sm">Teruskan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

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
                <hr>
                <input type="hidden" name="id_forward" id="id-forward-alasan-penolakan">
                <div class="form-group">
                    <label for=""><b>Pesan untuk pengadu</b></label>
                    <textarea class="form-control" id="edit-alasan-penolakan" name="edit_alasan_penolakan" placeholder="Masukkan pesan yang ingin disampaikan ke pengguna..." rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-lihat-alasan-pengembalian" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-nama-penolak">Alasan Pengembalian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="modal-isi-pengembalian">Isi Penolakan</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <!-- <button type="button" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Tandai Selesai</button> -->
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-lihat-kendala" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-nama">Nama</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('admin/lappengaduan?aksi=edit_kendala') ?>
            <div class="modal-body">
                <p id="modal-isi-kendala">Isi Kendala</p>
                <hr>
                <input type="hidden" name="id_forward" id="id-forward-kendala">
                <div class="form-group text-center">
                    <label for=""><b>Pesan untuk pengadu</b></label>
                    <textarea class="form-control" id="edit-kendala" name="edit_kendala_kerusakan" placeholder="Masukkan pesan yang ingin disampaikan ke pengguna..." rows="3" required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                        Nama
                    </div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-8">kkkk</div>
                    <div class="col-md-2">
                        NIP
                    </div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-8">12432432</div>
                    <div class="col-md-2">
                        Barang
                    </div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-8">kkk</div>
                    <div class="col-md-2">
                        Ruangan
                    </div>
                    <div class="col-md-2">:</div>
                    <div class="col-md-8">kkk</div>
                    <div class="col-md-3">
                        Tanggal
                    </div>
                    <div class="col-md-9">: kkk</div>
                    <div class="col-md-3">
                        Keterangan
                    </div>
                    <div class="col-md-9">: kkk</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll("#btn-lihat-alasan").forEach(item => {
        item.addEventListener("click", e => {
            document.querySelector("#id-forward-alasan-penolakan").value = e.target.getAttribute("data-id")
            document.querySelector("#edit-alasan-penolakan").value = e.target.getAttribute("data-edit-alasan-penolakan")
            document.querySelector("#modal-nama-penolak").innerText = e.target.getAttribute("data-nama")
            document.querySelector("#modal-isi-penolakan").innerText = e.target.getAttribute("data-alasan")
        })
    })

    document.querySelectorAll("#btn-lihat-alasan-pengembalian").forEach(item => {
        item.addEventListener("click", e => {
            document.querySelector("#modal-isi-pengembalian").innerText = e.target.getAttribute("data-alasan")
        })
    })

    document.querySelectorAll("#btn-lihat-kendala").forEach(item => {
        item.addEventListener("click", e => {
            document.querySelector("#id-forward-kendala").value = e.target.getAttribute("data-id");
            document.querySelector("#edit-kendala").value = e.target.getAttribute("data-edit-kendala");
            document.querySelector("#modal-nama").innerText = e.target.getAttribute("data-nama");
            document.querySelector("#modal-isi-kendala").innerText = e.target.getAttribute("data-kendala")
        })
    })

    const idPengaduan = document.querySelector("#id-pengaduan")

    document.querySelectorAll(".btn-forward").forEach(item => item.addEventListener("click", (e) => {
        const id = e.target.getAttribute("data-id")
        const idForward = e.target.getAttribute("data-id_forward")
        const modalIdForward = document.querySelector("#id-forward")

        if (idForward !== "") {
            modalIdForward.value = idForward
        } else {
            idPengaduan.value = id
        }
    }))
</script>