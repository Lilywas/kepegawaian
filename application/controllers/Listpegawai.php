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
		$dataStatus = array('status' => $status->status);

		//kalau status pegawainya PNS/////////////////////////////////////////////////////////////////////////////////////////////////
		if ($dataStatus['status'] == 'p') {
			//kalau mau nyimpen hasil edit
			if (isset($_POST['simpan'])) {
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
				} else {
					$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Data gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
					$this->edit_pegawai($id_pegawai);
				}
			}
			//menampilkan halaman buat edit data pegawai
			else {
				$data['dataPegawai'] = $this->UserModel->get_detail($id_pegawai)->row();
				$data['unit'] = $this->UserModel->get_unit_kerja()->result_array();

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
				} else {
					$sub = $this->UserModel->get_sub_unit_fromsub($data_pegawai['sub_pegawai'])->row();
					$data['sub'] = $this->UserModel->get_sub_unit_fromunit($sub->id_unit)->result_array();
				}

				$data['title'] = 'Edit Data Pegawai';
				$this->load->view('admin/includes/navbar', $data);
				$this->load->view('admin/formeditpns', $data);
				$this->load->view('admin/includes/footer');
			}
		}
		//kalau pegawainya non pns///////////////////////////////////////////////////////////////////////////////////////////////////
		else {
			if (isset($_POST['simpan'])) {
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
				} else {
					$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Data gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
					$this->edit_pegawai($id_pegawai);
				}
			}
			//menampilkan haalaman edit data pegawai
			else {
				$data['dataPegawai'] = $this->UserModel->get_detail($id_pegawai)->row();
				$data['unit'] = $this->UserModel->get_unit_kerja()->result_array();

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
				} else {
					$sub = $this->UserModel->get_sub_unit_fromsub($data_pegawai['sub_pegawai'])->row();
					$data['sub'] = $this->UserModel->get_sub_unit_fromunit($sub->id_unit)->result_array();
				}

				$data['title'] = 'Edit Data Pegawai';
				$this->load->view('admin/includes/navbar', $data);
				$this->load->view('admin/formeditnon', $data);
				$this->load->view('admin/includes/footer');
			}
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
		$data['dataPegawai'] = $this->UserModel->get_detail($id_pegawai)->row();
		$dataStatus = array('status_kerja' => $data['dataPegawai']->status_kerja);

		//kalau mau meng-nonaktif-kan pegawai////////////////////////////////////////////////////////////////////////////////////////
		if ($dataStatus['status_kerja'] == 1) {
			$simpan = $this->input->post('simpan');
			if ($simpan == 1) {
				$this->form_validation->set_rules('status', 'Status', 'required');

				$ket = $this->input->post('ket');
				$ketlai = $this->input->post('ketlai');
				$ketmutasi = $this->input->post('ketmutasi');
				if ($ket == 'Lainnya') {
					if ($ketlai == NULL) {
						$lain = $ket;
					} else {
						$lain = $ket . " (" . $ketlai . ")";
					}
				} elseif ($ket == 'Mutasi') {
					if ($ketmutasi == NULL) {
						$lain = $ket;
					} else {
						$lain = $ket . ' ke ' . $ketmutasi;
					}
				} else {
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
				} else {
					$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Status pegawai gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span></button></div>');
					redirect('listpegawai');
				}
			}
		}
		//mengaktifkan kembali pegawai yang tadinya nonaktif//////////////////////////////////////////////////////////////////////////////
		else {
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
				} else {
					$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Status pegawai gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span></button></div>');
					redirect('listpegawai/nonaktif');
				}
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
		$data['dataPegawai'] = $this->UserModel->get_detail($id_pegawai)->row();

		$simpan = $this->input->post('simpan');
		if ($simpan == 1) {
			$this->form_validation->set_rules('status', 'Status', 'required');
			// var_dump($this->input->post('tgl_selesai')); exit();
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
			} else {
				$this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Status pegawai gagal diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span></button></div>');
				redirect('listpegawai/pensiun');
			}
		}
	}
}
