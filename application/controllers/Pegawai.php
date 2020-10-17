<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('account/UserModel');
	}

	public function index()
	{
		$data['title'] = "Pegawai BPSDMD Provinsi Jawa Tengah";
		$data['pegawai'] = $this->UserModel->get_all_pegawai_byunit()->result_array();

		$this->load->view('user/includes/navbar', $data);
		$this->load->view('user/pegawai', $data);
		$this->load->view('user/includes/footer');
	}

	public function detail()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$dataPegawai = $this->UserModel->get_detail($id_pegawai)->row();
		$dataNama = array(
			'nama' => $dataPegawai->nama
		);
		$data = $this->UserModel->get_kompetensi($id_pegawai)->result_array(); //get kompetensi pegawai
		$dataRiwayat = $this->UserModel->get_riwayat($id_pegawai)->result_array(); // get riwayat unit kerja

		$data['dataKomp'] = $data;
		$data['dataRiayat'] = $dataRiwayat;
		$data['nama'] = $dataNama;
		$msg = [
			'sukses' => $this->load->view('user/modalriwayat', $data)
		];

		echo json_encode($msg);
	}
}
