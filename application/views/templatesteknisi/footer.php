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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
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

    // ajax detailLaporan
    const viewDtlLaporan = () => {
        const detailLaporan = $("#detailLaporan");
        detailLaporan.on("show.bs.modal", (e)=>{
            const id = $(e.relatedTarget).data('id-laporan');

            $.ajax({
                url: 'http://localhost/ipsrs/ajax/detaillappem',
                method: 'get',
                data: { id: id },
                success: (res)=>{
                    let arr = JSON.parse(res);
                    $("#namaAlat").text(arr[0].nama_alat)
                    $("#lpruangan").text(arr[0].ruangan)
                    $("#lpsuhu").text(arr[0].suhu+' °C')
                    $("#lpkelembaban").text(arr[0].kelembaban+' %RH')
                    $("#lptegangan").text(arr[0].tegangan+' V')
                    $("#lpdayaSemu").text(arr[0].daya_semu+' VA')
                    $("#lpdayaAktif").text(arr[0].daya_aktif+' watt')
                    $("#lpdayaReaktif").text(arr[0].daya_reaktif+' VAR')
                    $("#lpkondisiFisik").text(arr[0].kondisi_fisik)
                    $("#lpketKondisiFisik").text(arr[0].ket_kondisi_fisik)
                    const tanggal = arr[0].lpdc;
                    const reversed = tanggal.split('-').reverse().join('/');
                    $("#lptanggal").text(reversed)
                    $("#lpteknisi").text(arr[0].nama)
                },
                error: (err)=>{
                    console.log("error mendapatkan data!");
                }
            })
        })
    }


    // fungsi untuk load data laporan pemeliharaan pada history, secara live biar bisa filter tanggal
    const liveLappem = () => {
        $.ajax({
            url: 'http://localhost/ipsrs/ajax/lappem',
            method: 'get',
            success: (res)=>{
                $("#liveLappem").html(res)
            },
            error: (err)=>{
                console.log('error mendapatkan data!')
            }
        })
    }


    // filter tanggal live dengan ajax
    $("#filterDateAwal").change(()=>filterTanggal());
    $("#filterDateAkhir").change(()=>filterTanggal());
    const filterTanggal = () => {
        const dateAwal = $("#filterDateAwal").val();
        const dateAkhir = $("#filterDateAkhir").val();

        let url;
        if(dateAwal === '' || dateAkhir === ''){
            url = 'http://localhost/ipsrs/ajax/lappem'
        }else{
            url = 'http://localhost/ipsrs/ajax/lappem?tgl_awal='+dateAwal+'&&tgl_akhir='+dateAkhir;
        }

        $.ajax({
            url: url,
            method: 'get',
            success: (res)=>{
                $("#liveLappem").html(res)
            },
            error: (err)=>{
                alert("Error mendapatkan data!");
            }
        })
    }

    // fungsi cek expired, jika expired maka pindahkan ke tabel history
    const cekExpired = () => {
        $.ajax({
            url: 'http://localhost/ipsrs/ajax/cek_expired',
            method: 'get',
            success: (res)=>{
                console.log(res);
                if(res.includes('data dengan id')){
                    window.location.reload();
                }
            },
            error: (err)=>{
                console.log('no expired data!');
            }
        })
    }

    // eksekusi fungsi
    viewDtlLaporan();
    liveLappem();
    cekExpired();

    // data table untuk semua tabel
    $("table").dataTable();
</script>
</body>
</html>