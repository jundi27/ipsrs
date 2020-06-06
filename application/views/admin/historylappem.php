<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
    <span class="badge badge-primary">Filter Tanggal</span>

    <div class="form-group row">
        <div class="col-3">
            <label for="filterDateAwal">Awal</label>
            <input type="date" class="form-control" id="filterDateAwal">
        </div>
        <div class="col-3">
            <label for="filterDateAkhir">Akhir</label>
            <input type="date" class="form-control" id="filterDateAkhir">
        </div>
    </div>
    <!-- tabel di render dari admin/ajax/live_lappem.php -->
    <div id="liveLappem"></div>
    <!-- tabel di render dari admin/ajax/live_lappem.php -->
</div>
</div>