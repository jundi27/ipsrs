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
                                <td><?= $p->nama ?></td>
                                <td><?= $p->nip ?></td>
                                <td><?= $p->kerusakan ?></td>
                                <!-- <td><?= $p->brg ?></td> -->
                                <!-- <td><?= $p->ruangan ?></td> -->
                                <td><?php echo date('d M Y', strtotime($p->tgl)); ?></td>
                                <!-- <td><?= $p->ket ?></td> -->

                                <td>
                                    <?php
                                    $query = $this->db->query("SELECT forward_pengaduan.*, user.nama AS t_nama, user.lvl AS t_lvl FROM forward_pengaduan JOIN user ON forward_pengaduan.id_teknisi = user.id WHERE forward_pengaduan.id_pengaduan = " . $p->p_id)->row();

                                    if ($query) {
                                        echo show_status($query->status);
                                        if ($query->status == 'Ditolak') {
                                            echo show_ditolak_button($query->id_forward, $query->t_nama, $query->alasan_penolakan, $query->edit_alasan_penolakan);
                                        }
                                        if ($query->status == 'Ditunda') {
                                            echo show_ditunda_button($query->id_forward, $query->t_nama, $query->kendala_kerusakan, $query->edit_kendala_kerusakan);
                                        }
                                        if ($query->status == 'Dikembalikan') {
                                            echo show_dikembalikan_button($query->alasan_pengembalian);
                                        }
                                        echo show_userinfo($query->t_nama, $query->t_lvl);
                                    } else {
                                        echo '<span class="badge badge-secondary"><i class="fa fa-info-circle" aria-hidden="true"></i> Belum Diproses</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <a href="javascript:;" id="btn-detail" data-toggle="modal" data-target="#modal-detail" <?php foreach ($p as $k => $q) {
                                                                                                                                echo 'data-' . $k . '="' . $q . '"';
                                                                                                                            } ?> data-status="<?= $query ? $query->status : 'Belum Diproses' ?>" data-id="<?= $p->id ?>" class="badge badge-primary"><i class="fa fa-info-circle" aria-hidden="true"></i> Detail</a>
                                    <br>
                                    <?php
                                    if (!$query) {
                                        echo '<a href="javascript:;" data-id_forward="" data-toggle="modal" data-target="#modal-forward" class="badge badge-warning btn-forward" data-id="' . $p->id . '"><i class="fa fa-forward" aria-hidden="true"></i> Teruskan</a>';
                                    } else {
                                        if ($query->status == 'Dikembalikan') {
                                            echo '<a href="javascript:;" data-id_forward="' . $query->id_forward . '" data-toggle="modal" data-target="#modal-forward" class="badge badge-warning btn-forward" data-id="' . $p->id . '"><i class="fa fa-forward" aria-hidden="true"></i> Teruskan</a>';
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
            <?= form_open('admin/lappengaduan?aksi=edit_alasan_penolakan') ?>
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
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
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
    <div class="modal-dialog" role="document">
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
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-6">
                        <div id="modal-detail-row1"></div>
                    </div>
                    <div class="col-6">
                        <div id="modal-detail-row2"></div>
                    </div>
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

    document.querySelectorAll('#btn-detail').forEach(item => {
        item.addEventListener('click', e => {
            const status = e.target.getAttribute('data-status');
            const id = e.target.getAttribute('data-id');

            let row1 = [{
                    title: 'Nama',
                    value: e.target.getAttribute('data-nama')
                },
                {
                    title: 'NIP',
                    value: e.target.getAttribute('data-nip')
                },
                {
                    title: 'Barang',
                    value: e.target.getAttribute('data-brg')
                },
                {
                    title: 'Kerusakan',
                    value: e.target.getAttribute('data-kerusakan')
                },
            ]
            let row2 = [{
                    title: 'Tanggal',
                    value: new Intl.DateTimeFormat('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    }).format(new Date(e.target.getAttribute('data-tgl')))
                },
                {
                    title: 'Keterangan',
                    value: e.target.getAttribute('data-ket')
                },
                {
                    title: 'Status',
                    value: e.target.getAttribute('data-status')
                }
            ]

            document.querySelector('#modal-detail-row1').innerHTML = `${row1.map(item=>{
                    return `<div class="text-center">
                                <b>${item.title}</b>
                                <span class="d-block">${item.value}</span>
                            </div>
                            <br />`
                }).join('')}`
            document.querySelector('#modal-detail-row2').innerHTML = `${row2.map(item=>{
                    return `<div class="text-center">
                                <b>${item.title}</b>
                                <span class="d-block">${item.value}</span>
                            </div>
                            <br />`
                }).join('')}`
        })
    })

    document.querySelectorAll(".btn-forward").forEach(item => item.addEventListener("click", (e) => {
        const id = e.target.getAttribute("data-id")
        const idForward = e.target.getAttribute("data-id_forward")

        if (idForward !== "") {
            document.querySelector("#id-forward").value = idForward
        } else {
            document.querySelector("#id-pengaduan").value = id
        }
    }))
</script>