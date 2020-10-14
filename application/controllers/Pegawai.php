<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('account/UserModel');
	}

	public function index(){
		$data['title'] = "Pegawai BPSDMD Provinsi Jawa Tengah";
		$data['pegawai'] = $this->UserModel->get_all_pegawai_byunit()->result_array();

		$this->load->view('user/includes/navbar', $data);
		$this->load->view('user/pegawai', $data);
		$this->load->view('user/includes/footer');
	}

	public function detail(){
		$id = $this->input->post('id_pegawai');
		$dataPegawai = $this->UserModel->get_detail($id)->row();
		$data = $this->UserModel->get_kompetensi($id)->result_array(); //get kompetensi pegawai
		$dataRiwayat = $this->UserModel->get_riwayat($id)->result_array(); // get riwayat unit kerja


		echo "<div class='modal-content'>";
		echo "<div class='modal-header'>";
		echo "<h5 class='modal-title' id='exampleModalLabel'><strong>".$dataPegawai->nama."</strong></h5>";
		echo "<button class='close' type='button' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>×</span></button>";
		echo "</div>";
		echo "<div class='modal-body'>";
		echo "<h4 class='text-center' id='exampleModalLabel'>Kompetensi Bidang</h4>";
		echo "<div class='table-responsive'>";
		echo "<table class='display table table-bordered' width='100%' cellspacing='0'>";
		echo "<thead style='text-align: center;'>";
		echo "<tr>";
		echo "<th>No</th>";
		echo "<th>Kompetensi Bidang</th>";
		echo "<th>Keterangan</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		//kompetensi bidang/////////////////////////////////////////////////////////////////////////////////////
		if ($data != NULL){
			$no=1;
			foreach ($data as $key) {
				echo "<tr>";
				echo "<td style='text-align: center; vertical-align: middle;'>".$no++."</td>";
				echo "<td style='vertical-align: middle;'>".$key['kompetensi']."</td>";
				if ($key['keterangan'] != NULL){
					echo "<td style='vertical-align: middle;'>".$key['keterangan']."</td>";
				}
				else{
					echo "<td style='vertical-align: middle; text-align: center;'>-</td>";
				}
				echo "</tr>";
			}
		}
		else{
			echo "<tr>";
			echo "<td colspan='3' style='text-align: center; vertical-align: middle;'>Belum mempunyai data kompetensi bidang</td>";
			echo "</tr>";
		}		
		echo "</tbody>";
		echo "</table>";
		echo "</div><br>";

		echo "<h4 class='text-center' id='exampleModalLabel'>Riwayat Unit Kerja</h4>";
		echo "<div class='table-responsive'>";
		echo "<table class='display table table-bordered' width='100%' cellspacing='0'>";
		echo "<thead style='text-align: center;'>";
		echo "<tr>";
		echo "<th>No</th>";
		echo "<th>Unit Kerja</th>";
		echo "<th>Sub Unit Kerja</th>";
		echo "<th>Tanggal Mulai Kerja</th>";
		echo "<th>Tanggal Selesai Kerja</th>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		//riwayat unit kerja //////////////////////////////////////////////////////////////////////////////////////////
		$no = 1;
		$bln = Date('m');
		$recap = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		if ($dataRiwayat != NULL){
			$no=1;
			foreach ($dataRiwayat as $key) {
				echo "<tr>";
				echo "<td style='text-align: center; vertical-align: middle;'>".$no++."</td>";
				echo "<td style='vertical-align: middle;'>".$key['unit_kerja']."</td>";
				echo "<td style='vertical-align: middle;'>".$key['sub_unit_kerja']."</td>";
				
				$tgl_mulai = $key['tanggal_mulai'];
				if ($tgl_mulai != '0000-00-00'){
					$tgl = substr($tgl_mulai, 8, 2);
					$bln_mulai = substr($tgl_mulai, 5, 2);
					$thn_mulai = substr($tgl_mulai, 0, 4);
					foreach ($recap as $bln => $value) {
						if ($bln == $bln_mulai){
							echo "<td style='vertical-align: middle; text-align: center;'>".$tgl." ".$value." ".$thn_mulai."</td>";
						}
					}
				}
				else{
					echo "<td style='vertical-align: middle; text-align: center;'>-</td>";
				}

				$tgl_selesai = $key['tanggal_selesai'];
				if ($tgl_selesai != '0000-00-00'){
					$tgl1 = substr($tgl_selesai, 8, 2);
					$bln_selesai = substr($tgl_selesai, 5, 2);
					$thn_selesai = substr($tgl_selesai, 0, 4);

					foreach ($recap as $bln => $value) {
						if ($bln == $bln_selesai){
							echo "<td style='vertical-align: middle; text-align: center;'>".$tgl1." ".$value." ".$thn_selesai."</td>";
						}
					}
				}
				else{
					echo "<td style='vertical-align: middle; text-align: center;'>-</td>";
				}
				echo "</tr>";
			}
		}
		else{
			echo "<tr>";
			echo "<td colspan='5' style='text-align: center; vertical-align: middle;'>Belum mempunyai data riwayat unit kerja</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		echo "</div>";
	}
}

?>