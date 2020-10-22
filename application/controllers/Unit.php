<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unit extends CI_Controller
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
		$data['title'] = "Kelola Unit Kerja";
		$data['unit'] = $this->UserModel->get_all_unit();
		$data['sub'] = $this->UserModel->get_all_sub()->result_array();

		$this->load->view('admin/includes/navbar', $data);
		$this->load->view('admin/unit', $data);
		$this->load->view('admin/includes/footer');
	}

	public function addunit()
	{
		$this->form_validation->set_rules('unit', 'Unit kerja', 'required');

		if ($this->form_validation->run() == TRUE) {
			$data_unit = array(
				'nama_unit' => $this->input->post('unit')
			);

			$this->db->insert('unit_kerja', $data_unit);
			$this->session->set_flashdata('msg_berhasil', 'Data unit kerja berhasil ditambahkan');
			redirect(site_url('unit'));
		} elseif ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_gagal', 'Data unit kerja gagal ditambahkan');
			redirect(site_url('unit'));
		}
	}

	public function editunit()
	{
		$this->form_validation->set_rules('unit', 'Unit Kerja', 'required');
		$id_unit = $this->input->post('id_unit');
		$data_unit = array(
			'nama_unit' => $this->input->post('unit')
		);

		if ($this->form_validation->run() == TRUE) {
			$this->db->update('unit_kerja', $data_unit, array('id_unit' => $id_unit));
			$this->session->set_flashdata('msg_berhasil', 'Data unit kerja berhasil diperbarui');
			redirect(site_url('unit'));
		} elseif ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('msg_gagal', 'Data unit kerja gagal diperbarui');
			redirect(site_url('unit'));
		}
	}

	public function delete_unit()
	{
		$id_unit = $this->input->post('id_unit');
		$this->UserModel->delete_sub_by_unit($id_unit);
		$this->UserModel->delete_unit($id_unit);
		$this->session->set_flashdata('msg_berhasil', 'Data unit kerja berhasil dihapus');
		redirect(site_url('unit'));
	}
}
