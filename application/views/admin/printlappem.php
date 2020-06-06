<body onload="window.print()">
	<div class="container-fluid">	
		<div class="row">
			<div class="col-12">
				<h1 class="text-center">Laporan Pemeliharaan</h1>
			</div>
			<div class="col-12">
				<table class="table table-white bg-white table-bordered">
				    <tbody>
				    	<?php foreach($lappem as $lp): ?>
				        <tr>
				            <td style="width: 100px"><b>Nama Alat</b></td>
				            <td>:</td>
				            <td><span id="namaAlat"><?php echo $lp->nama_alat ?></span></td>
				            <td style="width: 100px"><b>Ruangan</b></td>
				            <td>:</td>
				            <td><span id="lpruangan"><?php echo $lp->ruangan ?></span></td>
				        </tr>
				         <tr>
				            <td><b>Suhu</b></td>
				            <td>:</td>
				            <td><span id="lpsuhu"><?php echo $lp->suhu ?> °C</span></td>
				            <td><b>Kelembaban</b></td>
				            <td>:</td>
				            <td><span id="lpkelembaban"><?php echo $lp->kelembaban ?> %RH</span></td>
				        </tr>
				        <tr>
				            <td><b>Tegangan</b></td>
				            <td>:</td>
				            <td><span id="lptegangan"><?php echo $lp->tegangan ?>  V</span></td>
				            <td><b>Daya Semu</b></td>
				            <td>:</td>
				            <td><span id="lpdayaSemu"><?php echo $lp->daya_semu ?> VA</span></td>
				        </tr>
				        <tr>
				            <td><b>Daya Aktif</b></td>
				            <td>:</td>
				            <td><span id="lpdayaAktif"><?php echo $lp->daya_aktif ?> watt</span></td>
				            <td><b>Daya Reaktif</b></td>
				            <td>:</td>
				            <td><span id="lpdayaReaktif"><?php echo $lp->daya_reaktif ?> VAR</span></td>
				        </tr>
				        <tr>
				            <td><b>Kondisi Fisik</b></td>
				            <td>:</td>
				            <td><span id="lpkondisiFisik"><?php echo $lp->kondisi_fisik ?></span></td>
				            <td><b>Keterangan Kondisi Fisik</b></td>
				            <td>:</td>
				            <td><span id="lpketKondisiFisik"><?php echo $lp->ket_kondisi_fisik ?></span></td>
				        </tr>
				        <tr>
				            <td><b>Tanggal</b></td>
				            <td>:</td>
				            <td><span id="lptanggal"><?php $myd=date_create($lp->lpdc); echo date_format($myd, 'd/m/Y'); ?></span></td>
				            <td><b>Teknisi</b></td>
				            <td>:</td>
				            <td><span id="lpteknisi"><?php echo $lp->nama; ?></span></td>
				        </tr>
				   		<?php endforeach; ?>
				    </tbody>
				</table>
			</div>
		</div>
	</div>
</body>	