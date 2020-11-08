<!-- Footer -->
<!-- Sbadmin -->
<!-- <footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-center mx-auto">
            <div class="text-muted">Copyright &copy; RSD Madani <?= date('Y'); ?></div>
        </div>
    </div>
</footer>
</div>
</div> -->

<!-- Scroll to Top Button-->
<!-- <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<script>
    $(document).on('scroll', function() {
        var scrollDistance = $(this).scrollTop();
        if (scrollDistance > 100) {
            $('.scroll-to-top').fadeIn();
        } else {
            $('.scroll-to-top').fadeOut();
        }
    });
</script> -->

<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>demo/chart-area-demo.js"></script>
<script src="<?= base_url('assets/'); ?>demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/'); ?>demo/datatables-demo.js"></script> 


</body>

</html> -->

<!-- Sbadmin2 -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; RSD Madani <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #008983">
                <h5 style="color: #ffffff" class="modal-title" id="exampleModalLabel">Apakah anda ingin keluar?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Silahkan pilih "Ya" untuk keluar.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Tidak</button>
                <a class="btn btn-success" style="width: 70px;" href="<?= base_url('auth/logout') ?>">Ya</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- data tables -->
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<script>
    $('table').DataTable();

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });


    $('.form-check-input').on('click', function() {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/gantiakses'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('admin/roleakses/') ?>" + roleId;
            }
        });
    });



    // fungsi untuk load data laporan pemeliharaan pada history, secara live biar bisa filter tanggal
    const liveLappem = () => {
        $.ajax({
            url: 'http://localhost/ipsrs/ajax/lappem',
            method: 'get',
            success: (res) => {
                $("#liveLappem").html(res)
            },
            error: (err) => {
                console.log('error mendapatkan data!')
            }
        })
    }

    // ajax detail laporan
    const viewDtlLaporan = () => {
        const detailLaporan = $("#detailLaporan");
        detailLaporan.on("show.bs.modal", (e) => {
            const id = $(e.relatedTarget).data('id-laporan');
            console.log(id)
            $.ajax({
                url: 'http://localhost/ipsrs/ajax/detaillappem',
                method: 'get',
                data: {
                    id: id
                },
                success: (res) => {
                    let arr = JSON.parse(res);
                    console.log(arr)
                    $("#namaAlat").text(arr[0].nama_alat)
                    $("#lpruangan").text(arr[0].ruangan)
                    $("#lpsuhu").text(arr[0].suhu + ' °C')
                    $("#lpkelembaban").text(arr[0].kelembaban + ' %RH')
                    $("#lptegangan").text(arr[0].tegangan + ' V')
                    $("#lpdayaSemu").text(arr[0].daya_semu + ' VA')
                    $("#lpdayaAktif").text(arr[0].daya_aktif + ' watt')
                    $("#lpdayaReaktif").text(arr[0].daya_reaktif + ' VAR')
                    $("#lpkondisiFisik").text(arr[0].kondisi_fisik)
                    $("#lpketKondisiFisik").text(arr[0].ket_kondisi_fisik)
                    const tanggal = arr[0].lpdc;
                    const reversed = tanggal.split('-').reverse().join('/');
                    $("#lptanggal").text(reversed)
                    $("#lpteknisi").text(arr[0].nama)
                },
                error: (err) => {
                    console.log("error mendapatkan data!");
                }
            })
        })
    }

    // filter tanggal live dengan ajax
    $("#filterDateAwal").change(() => filterTanggal());
    $("#filterDateAkhir").change(() => filterTanggal());
    const filterTanggal = () => {
        const dateAwal = $("#filterDateAwal").val();
        const dateAkhir = $("#filterDateAkhir").val();

        let url;
        if (dateAwal === '' || dateAkhir === '') {
            url = 'http://localhost/ipsrs/ajax/lappem'
        } else {
            url = 'http://localhost/ipsrs/ajax/lappem?tgl_awal=' + dateAwal + '&&tgl_akhir=' + dateAkhir;
        }

        $.ajax({
            url: url,
            method: 'get',
            success: (res) => {
                $("#liveLappem").html(res)
            },
            error: (err) => {
                alert("Error mendapatkan data!");
            }
        })
    }

    // cek laporan apakah sudah expired atau belum
    const cekExpired = () => {
        $.ajax({
            url: 'http://localhost/ipsrs/ajax/cek_expired',
            method: 'get',
            success: (res) => {
                console.log(res);
                if (res.includes('data dengan id')) {
                    window.location.reload();
                }
            },
            error: (err) => {
                console.log('no expired data!');
            }
        })
    }

    // eksekusi fungsi
    viewDtlLaporan();
    liveLappem();
    cekExpired();

    // data table untuk semua tabel


    console.clear();
</script>


</body>

</html>