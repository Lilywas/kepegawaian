<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listpegawai extends CI_Controller
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

	public function index()
	{
		$data['pegawai'] = $this->UserModel->get_all_pegawai()->result_array();
		$data['title'] = 'Pegawai Aktif';

		$this->load->view('admin/includes/navbar', $data);
		$this->load->view('admin/pegawaiaktif', $data);
		$this->load->view('admin/includes/footer');
	}

	public function nonaktif()
	{
		$data['pegawai'] = $this->UserModel->get_all_pegawai_nonaktif()->result_array();
		$data['title'] = 'Pegawai Tidak Aktif';

		$this->load->view('admin/includes/navbar', $data);
		$this->load->view('admin/pegawainonaktif', $data);
		$this->load->view('admin/includes/footer');
	}

	public function edit_pegawai($id_pegawai)
	{
		$status = $this->UserModel->get_status($id_pegawai)->row();
		$data['unit'] = $this->UserModel->get_unit_kerja()->result_array();
		$data['dataPegawai'] = $this->UserModel->get_detail($id_pegawai)->row();
		$dataStatus = array('status' => $status->status);

		//kalau status pegawainya PNS/////////////////////////////////////////////////////////////////////////////////////////////////
		if ($dataStatus['status'] == 'p') {
			$data_pegawai = array(
				'id_pegawai' => $data['dataPegawai']->id_pegawai,
				'nip' => $data['dataPegawai']->nip,
				'nama' => $data['dataPegawai']->nama,
				'jk' => $data['dataPegawai']->jk,
				'tempat_lahir' => $data['dataPegawai']->tempat_lahir,
				'tgl_lahir' => $data['dataPegawai']->tanggal_lahir,
				'agama' => $data['dataPegawai']->agama,
				'alamat' => $data['dataPegawai']->alamat,
				'pend' => $data['dataPegawai']->pend_terakhir,
				'jurusan' => $data['dataPegawai']->jurusan,
				'hp' => $data['dataPegawai']->no_telp,
				'email' => $data['dataPegawai']->email,
				'pangkat' => $data['dataPegawai']->pangkat,
				'jabatan' => $data['dataPegawai']->jabatan,
				'bagian' => $data['dataPegawai']->jenis_jabatan,
				'tgl_kerja' => $data['dataPegawai']->tanggal_mulai_kerja,
				'unit_kerja_pegawai' => $data['dataPegawai']->unit_kerja_pegawai,
				'sub_pegawai' => $data['dataPegawai']->sub_pegawai,
				'pensiun' => $data['dataPegawai']->pensiun
			);
			$data['dataPegawai'] = $data_pegawai;

			//kalau pegawai nya ngga punya sub unit kerja
			if ($data_pegawai['sub_pegawai'] == NULL || $data_pegawai['sub_pegawai'] == '0') {
				$data['subnull'] = $this->UserModel->get_sub_unit_fromunit($data_pegawai['unit_kerja_pegawai'])->result_array();
			} elseif ($data_pegawai['sub_pegawai'] != NULL || $data_pegawai['sub_pegawai'] != '0') {
				$sub = $this->UserModel->get_sub_unit_fromsub($data_pegawai['sub_pegawai'])->row();
				$data['sub'] = $this->UserModel->get_sub_unit_fromunit($sub->id_unit)->result_array();
			}

			$data['title'] = 'Edit Data Pegawai';
			$this->load->view('admin/includes/navbar', $data);
			$this->load->view('admin/formeditpns', $data);
			$this->load->view('admin/includes/footer');
		}

		//kalau pegawainya non pns///////////////////////////////////////////////////////////////////////////////////////////////////
		elseif ($dataStatus['status'] == 'n') {
			//menampilkan haalaman edit data pegawai
			$data_pegawai = array(
				'id_pegawai' => $data['dataPegawai']->id_pegawai,
				'nama' => $data['dataPegawai']->nama,
				'jk' => $data['dataPegawai']->jk,
				'tempat_lahir' => $data['dataPegawai']->tempat_lahir,
				'tgl_lahir' => $data['dataPegawai']->tanggal_lahir,
				'agama' => $data['dataPegawai']->agama,
				'alamat' => $data['dataPegawai']->alamat,
				'pend' => $data['dataPegawai']->pend_terakhir,
				'jurusan' => $data['dataPegawai']->jurusan,
				'hp' => $data['dataPegawai']->no_telp,
				'email' => $data['dataPegawai']->email,
				'bagian' => $data['dataPegawai']->jenis_jabatan,
				'tgl_kerja' => $data['dataPegawai']->tanggal_mulai_kerja,
				'unit_kerja_pegawai' => $data['dataPegawai']->unit_kerja_pegawai,
				'sub_pegawai' => $data['dataPegawai']->sub_pegawai
			);
			$data['dataPegawai'] = $data_pegawai;
			//kalau pegawai tidak punya sub unit kerja
			if ($data_pegawai['sub_pegawai'] == NULL || $data_pegawai['sub_pegawai'] == '0') {
				$data['subnull'] = $this->UserModel->get_sub_unit_fromunit($data_pegawai['unit_kerja_pegawai'])->result_array();
			} elseif ($data_pegawai['sub_pegawai'] != NULL || $data_pegawai['sub_pegawai'] != '0') {
				$sub = $this->UserModel->get_sub_unit_fromsub($data_pegawai['sub_pegawai'])->row();
				$data['sub'] = $this->UserModel->get_sub_unit_fromunit($sub->id_unit)->result_array();
			}

			$data['title'] = 'Edit Data Pegawai';
			$this->load->view('admin/includes/navbar', $data);
			$this->load->view('admin/formeditnon', $data);
			$this->load->view('admin/includes/footer');
		}
	}

	public function update_pns()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		$data_pegawai = array(
			'nip' => $this->input->post('nip'),
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'agama' => $this->input->post('agama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tgl_lahir'),
			'alamat' => $this->input->post('alamat'),
			'pend_terakhir' => $this->input->post('pend'),
			'jurusan' => $this->input->post('jurusan'),
			'no_telp' => $this->input->post('hp'),
			'email' => $this->input->post('email'),
			'pangkat' => $this->input->post('pangkat'),
			'jabatan' => $this->input->post('jabatan'),
			'jenis_jabatan' => $this->input->post('bagian'),
			'tanggal_mulai_kerja' => $this->input->post('tgl_kerja'),
			'unit_kerja_pegawai' => $this->input->post('unit_master'),
			'sub_pegawai' => $this->input->post('sub_unit_master'),
			'pensiun' => $this->input->post('pensiun')
		);

		if ($this->form_validation->run() == TRUE) {
			$this->db->update('pns_local', $data_pegawai, array('id_pegawai' => $id_pegawai));
			$this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert"> Data berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect(site_url('listpegawai'));
		} elseif ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Data gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			$this->edit_pegawai($id_pegawai);
		}
	}

	public function update_non()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$this->form_validation->set_rules('nama', 'Nama', 'required');

		$data_pegawai = array(
			'nama' => $this->input->post('nama'),
			'jk' => $this->input->post('jk'),
			'agama' => $this->input->post('agama'),
			'tempat_lahir' => $this->input->post('tempat_lahir'),
			'tanggal_lahir' => $this->input->post('tgl_lahir'),
			'alamat' => $this->input->post('alamat'),
			'pend_terakhir' => $this->input->post('pend'),
			'jurusan' => $this->input->post('jurusan'),
			'no_telp' => $this->input->post('hp'),
			'email' => $this->input->post('email'),
			'pangkat' => '',
			'jabatan' => 'non',
			'jenis_jabatan' => $this->input->post('bagian'),
			'tanggal_mulai_kerja' => $this->input->post('tgl_kerja'),
			'unit_kerja_pegawai' => $this->input->post('unit_master'),
			'sub_pegawai' => $this->input->post('sub_unit_master')
		);

		if ($this->form_validation->run() == TRUE) {
			$this->db->update('pns_local', $data_pegawai, array('id_pegawai' => $id_pegawai));
			$this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert"> Data berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect(site_url('listpegawai'));
		} elseif ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Data gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			$this->edit_pegawai($id_pegawai);
		}
	}

	public function get_sub_unit()
	{
		$id_unit = $this->input->post('id');
		$data = $this->UserModel->get_sub_unit_kerja($id_unit);
		echo json_encode($data);
	}

	public function ubah_status_pegawai()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$simpan = $this->input->post('simpan');
		if ($simpan == 1) {
			$this->form_validation->set_rules('status', 'Status', 'required');

			$ket = $this->input->post('ket');
			$ketlai = $this->input->post('ketlai');
			$ketmutasi = $this->input->post('ketmutasi');
			if ($ket == 'Lainnya') {
				($ketlai == NULL) ? $lain = $ket : $lain = $ket . " (" . $ketlai . ")";
			} elseif ($ket == 'Mutasi') {
				($ketmutasi == NULL) ? $lain = $ket : $lain = $ket . ' ke ' . $ketmutasi;
			} elseif ($ket != 'Lainnya' && $ket != 'Mutasi') {
				$lain = $ket;
			}

			$data_status = array(
				'status_kerja' => 0,
				'keterangan_status_kerja' => $lain,
				'tanggal_selesai_kerja' => $this->input->post('tgl_selesai')
			);

			if ($this->form_validation->run() == TRUE) {
				$this->db->update('pns_local', $data_status, array('id_pegawai' => $id_pegawai));
				$this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert"> Status pegawai berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button></div>');
				redirect('listpegawai');
			} elseif ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Status pegawai gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button></div>');
				redirect('listpegawai');
			}
		}
	}

	//menampilkan halaman pensiun///////////////////////////////////////////////////////////////////////////////////////////////////////
	public function pensiun()
	{
		$data['pegawai'] = $this->UserModel->get_all_pegawai()->result_array();
		$data['title'] = 'Pegawai Akan Pensiun';
		$this->load->view('admin/includes/navbar', $data);
		$this->load->view('admin/pegawaipensiun', $data);
		$this->load->view('admin/includes/footer');
	}

	//menonaktifkan pegawai yang akan pensiun////////////////////////////////////////////////////////////////////////////////////////////
	public function ubah_status_pensiun()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$simpan = $this->input->post('simpan');
		if ($simpan == 1) {
			$this->form_validation->set_rules('status', 'Status', 'required');
			$ket = $this->input->post('ket');

			$data_status = array(
				'status_kerja' => 0,
				'keterangan_status_kerja' => $ket,
				'tanggal_selesai_kerja' => $this->input->post('tgl_selesai')
			);

			if ($this->form_validation->run() == TRUE) {
				$this->db->update('pns_local', $data_status, array('id_pegawai' => $id_pegawai));
				$this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert"> Status pegawai berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
				redirect('listpegawai/pensiun');
			} elseif ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Status pegawai gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
				redirect('listpegawai/pensiun');
			}
		}
	}

	//mengaktifkan pegawai
	public function aktifkan_pegawai()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$simpan = $this->input->post('simpan');
		if ($simpan == 1) {
			$this->form_validation->set_rules('status', 'Status', 'required');
			$data_status = array(
				'status_kerja' => 1,
				'keterangan_status_kerja' => '',
				'tanggal_selesai_kerja' => '0000-00-00'
			);
			if ($this->form_validation->run() == TRUE) {
				$this->db->update('pns_local', $data_status, array('id_pegawai' => $id_pegawai));
				$this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert"> Status pegawai berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
				redirect('listpegawai/nonaktif');
			} elseif ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Status pegawai gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
				redirect('listpegawai/nonaktif');
			}
		}
	}
}
