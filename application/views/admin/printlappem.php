<style>
	@page {
		size: auto;
		margin: 0mm;
	}
</style>

<div class="container-fluid" style="max-width: 700px;">
	<div class="py-3 mt-3 d-flex align-items-center">
		<img src="<?= base_url('assets/img/rsd.png')?>" alt="Logo" class="img-fluid" style="max-width: 100px;">
		<div class="text-center w-100">
			<h4 style="font-weight: bold;">Laporan Pemeliharaan Alat Kesehatan
				<br />RSD Madani Kota Pekanbaru</h4>
		</div>
	</div>
	<br>
	<table class="table table-white bg-white">
		<tbody>
			<tr>
				<td style="width: 250px"><b>Nama Alat</b></td>
				<td>:</td>
				<td><?php echo $lappem->nama_alat ?></td>
			</tr>
			<tr>
				<td><b>Ruangan</b></td>
				<td>:</td>
				<td><?php echo $lappem->ruangan ?></td>
			</tr>
			<tr>
				<td><b>Suhu</b></td>
				<td>:</td>
				<td><?php echo $lappem->suhu ?> °C</td>
			</tr>
			<tr>
				<td><b>Kelembaban</b></td>
				<td>:</td>
				<td><?php echo $lappem->kelembaban ?> %RH</td>
			</tr>
			<tr>
				<td><b>Tegangan</b></td>
				<td>:</td>
				<td><?php echo $lappem->tegangan ?> V</td>
			</tr>
			<tr>
				<td><b>Daya Semu</b></td>
				<td>:</td>
				<td><?php echo $lappem->daya_semu ?> VA</td>
			</tr>
			<tr>
				<td><b>Daya Aktif</b></td>
				<td>:</td>
				<td><?php echo $lappem->daya_aktif ?> watt</td>
			</tr>
			<tr>
				<td><b>Daya Reaktif</b></td>
				<td>:</td>
				<td><?php echo $lappem->daya_reaktif ?> VAR</td>
			</tr>
			<tr>
				<td><b>Kondisi Fisik</b></td>
				<td>:</td>
				<td><?php echo $lappem->kondisi_fisik ?></td>
			</tr>
			<tr>
				<td><b>Keterangan Kondisi Fisik</b></td>
				<td>:</td>
				<td><?php echo $lappem->ket_kondisi_fisik ?></td>
			</tr>
			<!-- <tr>
					<td><b>Tanggal</b></td>
					<td>:</td>
					<td><?= date_format(date_create($lappem->lpdc), 'd F Y'); ?></td>
				</tr>
				<tr>
					<td><b>Teknisi</b></td>
					<td>:</td>
					<td><?php echo $lappem->nama; ?></td>
				</tr> -->
		</tbody>
	</table>
	<div class="float-right mb-3">
		<div class="mb-5">
			<p>Pekanbaru, <?= date_format(date_create($lappem->lpdc), 'd F Y'); ?></p>
			Teknisi
		</div>
		<div>
			<b class="d-block"><?= $lappem->nama ?></b>
			<hr style="margin-top: -5px;">
		</div>
	</div>
</div>

<script>
	window.addEventListener('load', e => {
		document.title = `Laporan Pemeliharaan #<?= uniqid() ?>`
		window.print()
	})
</script>