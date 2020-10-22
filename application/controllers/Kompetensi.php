<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kompetensi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('account/UserModel');
		if (!$this->session->userdata('admin_logged_in')) {
			redirect(site_url('account'));
		}
	}

	//menampilkan halaman kompetensi
	public function kelola($id_pegawai)
	{
		$data['title'] = 'Kelola Kompetensi Bidang dan Riwayat Unit Kerja';
		$data['dataPegawai'] = $this->UserModel->get_detail($id_pegawai)->row();
		$datapegawai = array('nama' => $data['dataPegawai']->nama, 'id_pegawai' => $data['dataPegawai']->id_pegawai);
		$data['pegawai'] = $datapegawai;

		$data['dataKom'] = $this->UserModel->get_kompetensi($id_pegawai)->result_array();
		$data['dataRiwayat'] = $this->UserModel->get_riwayat($id_pegawai)->result_array();

		$this->load->view('admin/includes/navbar', $data);
		$this->load->view('admin/kompetensi', $data);
		$this->load->view('admin/includes/footer');
	}

	public function addkomp()
	{
		$this->form_validation->set_rules('komp', 'Kompetensi', 'required');
		$id_pegawai = $this->input->post('id_pegawai');

		if ($this->form_validation->run() == TRUE) {
			$data_komp = array(
				'id_pegawai' => $this->input->post('id_pegawai'),
				'kompetensi' => $this->input->post('komp'),
				'keterangan' => $this->input->post('ket')
			);

			$this->db->insert('kompetensi_bidang', $data_komp);
			$this->session->set_flashdata('msg_berhasil', 'Data kompetensi berhasil ditambahkan');
			redirect(site_url('kompetensi/kelola/' . $id_pegawai));
		} elseif ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_gagal', 'Data kompetensi gagal ditambahkan');
			redirect(site_url('kompetensi/kelola/' . $id_pegawai));
		}
	}

	public function addriwayat()
	{
		$this->form_validation->set_rules('unit', 'Unit', 'required');
		$id_pegawai = $this->input->post('id_pegawai');

		if ($this->form_validation->run() == TRUE) {
			$data_riwayat = array(
				'id_pegawai' => $this->input->post('id_pegawai'),
				'unit_kerja' => $this->input->post('unit'),
				'sub_unit_kerja' => $this->input->post('sub_unit'),
				'tanggal_mulai' => $this->input->post('tgl_mulai'),
				'tanggal_selesai' => $this->input->post('tgl_selesai')
			);

			$this->db->insert('riwayat_unit_kerja', $data_riwayat);
			$this->session->set_flashdata('msg_riwayat_berhasil', 'Data riwayat unit kerja berhasil ditambahkan');
			redirect(site_url('kompetensi/kelola/' . $id_pegawai));
		} elseif ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_riwayat_gagal', 'Data riwayat unit kerja gagal ditambahkan');
			redirect(site_url('kompetensi/kelola/' . $id_pegawai));
		}
	}

	public function delete_komp()
	{
		$id_kompetensi = $this->input->post('id_kompetensi');
		$data['dataRiwayat'] = $this->UserModel->get_all_kompetensi($id_kompetensi)->row();
		$dataId = array('id_pegawai' => $data['dataRiwayat']->id_pegawai);
		$id_pegawai = $dataId['id_pegawai'];
		$this->UserModel->delete_komp($id_kompetensi);
		$this->session->set_flashdata('msg_berhasil', 'Data kompetensi berhasil dihapus');
		redirect(site_url('kompetensi/kelola/' . $id_pegawai));
	}

	public function delete_riwayat()
	{
		$id_riwayat = $this->input->post('id_riwayat');
		$data['dataRiwayat'] = $this->UserModel->get_all_riwayat($id_riwayat)->row();
		$dataId = array('id_pegawai' => $data['dataRiwayat']->id_pegawai);
		$id_pegawai = $dataId['id_pegawai'];
		$this->UserModel->delete_riwayat($id_riwayat);
		$this->session->set_flashdata('msg_riwayat_berhasil', 'Data riwayat unit kerja berhasil dihapus');
		redirect(site_url('kompetensi/kelola/' . $id_pegawai));
	}

	public function editkomp()
	{
		$this->form_validation->set_rules('komp', 'Kompetensi', 'required');
		$id_kompetensi = $this->input->post('id_kompetensi');
		$id_pegawai = $this->input->post('id_pegawai');
		$data_komp = array(
			'kompetensi' => $this->input->post('komp'),
			'keterangan' => $this->input->post('ket')
		);

		if ($this->form_validation->run() == TRUE) {
			$this->db->update('kompetensi_bidang', $data_komp, array('id_kompetensi' => $id_kompetensi));
			$this->session->set_flashdata('msg_berhasil', 'Data kompetensi berhasil diperbarui');
			redirect(site_url('kompetensi/kelola/' . $id_pegawai));
		} elseif ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_gagal', 'Data kompetensi gagal diperbarui');
			redirect(site_url('kompetensi/kelola/' . $id_pegawai));
		}
	}

	public function editriwayat()
	{
		$this->form_validation->set_rules('unit', 'Unit', 'required');
		$id_riwayat = $this->input->post('id_riwayat_unit_kerja');
		$id_pegawai = $this->input->post('id_pegawai');
		$data_riwayat = array(
			'unit_kerja' => $this->input->post('unit'),
			'sub_unit_kerja' => $this->input->post('sub_unit'),
			'tanggal_mulai' => $this->input->post('tgl_mulai'),
			'tanggal_selesai' => $this->input->post('tgl_selesai')
		);

		if ($this->form_validation->run() == TRUE) {
			$this->db->update('riwayat_unit_kerja', $data_riwayat, array('id_riwayat_unit_kerja' => $id_riwayat));
			$this->session->set_flashdata('msg_riwayat_berhasil', 'Data riwayat unit kerja berhasil diperbarui');
			redirect(site_url('kompetensi/kelola/' . $id_pegawai));
		} elseif ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_riwayat_gagal', 'Data riwayat unit kerja gagal diperbarui');
			redirect(site_url('kompetensi/kelola/' . $id_pegawai));
		}
	}
}
