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
                                <!-- Button trigger modal -->

                                <?php
                                $cek = $this->db->get_where('forward_pengaduan', ['id_pengaduan' => $p['id']])->result();
                                if ($cek) :
                                ?>
                                    <span class="badge badge-<?php
                                                                switch ($cek[0]->status) {
                                                                    case 'Sedang Diteruskan':
                                                                        echo 'secondary';
                                                                        break;
                                                                    case 'Ditolak':
                                                                        echo 'danger';
                                                                        break;
                                                                    case 'Sedang Diperbaiki':
                                                                        echo 'info';
                                                                        break;
                                                                    case 'Sudah Diperbaiki':
                                                                        echo 'success';
                                                                        break;
                                                                    default:
                                                                        # code...
                                                                        break;
                                                                } ?>"><?= $cek[0]->status ?></span>
                                <?php
                                else :
                                ?>
                                    <a href="javascript:;" class="badge badge-warning btn-forward" data-id="<?= $p['id'] ?>" data-toggle="modal" data-target="#modal-forward">
                                        Teruskan
                                    </a>
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

<script>
    const btnForward = document.querySelectorAll(".btn-forward")
    const idPengaduan = document.querySelector("#id-pengaduan")

    btnForward.forEach(item => item.addEventListener("click", (e) => {
        const id = e.target.getAttribute("data-id")
        idPengaduan.value = id
    }))
</script>