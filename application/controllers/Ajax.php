<?php 
class Ajax extends CI_Controller{

	// ajax untuk load lappem di historylappem
	public function lappem(){
		$tgl_awal = $this->input->get('tgl_awal');
		$tgl_akhir = $this->input->get('tgl_akhir');


		if(null!==$tgl_awal){
			// ketika filter tanggal berjalan
			$data['lappem'] = $this->db->query('select history_lappem.date_created as lpdc, history_lappem.id as hlid, history_lappem.*, user.* from history_lappem, user where history_lappem.user_id = user.id and history_lappem.date_created between '.'"'.$tgl_awal.'"'.' and '.'"'.$tgl_akhir.'"')->result();
		}else{
			// ketika normal
			$data['lappem'] = $this->db->query('select history_lappem.date_created as lpdc, history_lappem.id as hlid, history_lappem.*, user.* from history_lappem, user where history_lappem.user_id = user.id')->result();
		}
		// hasil di render ke tabel teknisi/ajax/live_lappem.php, kemudian diteruskan ke admin/historylappem atau teknisi/ceklappem
		$this->load->view('teknisi/ajax/live_lappem', $data);
	}

	// ajax untuk cek apakah lap_pemeliharaan ada yang sudah expired
	public function cek_expired(){
		$lappem = $this->db->get('lap_pemeliharaan')->result();
		$myd = date_create();
		$nowdate = date_format($myd, 'Y-m-d');
		foreach ($lappem as $lp) {
			if($lp->expired <= $nowdate){
				$data = array(
	                'user_id' => $lp->user_id,
	                'nama_alat' => $lp->nama_alat,
	                'ruangan' => $lp->ruangan,
	                'suhu' => $lp->suhu,
	                'kelembaban' => $lp->kelembaban,
	                'tegangan' => $lp->tegangan,
	                'daya_semu' => $lp->daya_semu,
	                'daya_aktif' => $lp->daya_aktif,
	                'daya_reaktif' => $lp->daya_reaktif,
	                'kondisi_fisik' => $lp->kondisi_fisik,
	                'ket_kondisi_fisik' => $lp->ket_kondisi_fisik,
	                'date_created' => $lp->date_created,
	                'expired' => $lp->expired
	            );
				$this->db->insert('history_lappem', $data);

				$this->db->where('id', $lp->id);
				$this->db->delete('lap_pemeliharaan');
				echo "data dengan id ".$lp->id." dipindahkan ke history, ";
			}
		}
	}

	// ajax detaillappem
	public function detaillappem(){
		$id = $this->input->get('id');
		$lappem = $this->db->query('select lap_pemeliharaan.date_created as lpdc, lap_pemeliharaan.*, user.* from lap_pemeliharaan inner join user on lap_pemeliharaan.user_id = user.id where lap_pemeliharaan.id = '.$id)->result();
		echo json_encode($lappem);
	}

	// ajax detailhistorylappem
	public function detailhistorylappem(){
		$id = $this->input->get('id');
		$hstlappem = $this->db->query('select history_lappem.date_created as lpdc, history_lappem.*, user.* from history_lappem inner join user on history_lappem.user_id = user.id where history_lappem.id = '.$id)->result();
		echo json_encode($hstlappem);
	}
}
?>
