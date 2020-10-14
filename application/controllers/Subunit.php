<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * 
 */
class Subunit extends CI_Controller
{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('account/UserModel');
		if (!$this->session->userdata('admin_logged_in')){
			redirect(site_url('account'));
		}
	}
 
	public function index(){
		$data['title'] = "Kelola Sub Unit Kerja";
		$data['unit'] = $this->UserModel->get_all_unit();
		$data['sub'] = $this->UserModel->get_all_sub()->result_array();

		$this->load->view('admin/includes/navbar', $data);
		$this->load->view('admin/subunit', $data);
		$this->load->view('admin/includes/footer');
	}

	public function addsub(){
		$this->form_validation->set_rules('sub', 'Sub Unit kerja', 'required');

		if ($this->form_validation->run() == TRUE){
			$data_subunit = array(
				'id_unit' => $this->input->post('id_unit'),
				'keterangan' => $this->input->post('sub')
			);

			$this->db->insert('sub_unit_kerja', $data_subunit);
			$this->session->set_flashdata('msg_sub_berhasil', '<div class="alert alert-success" role="alert"> Data sub unit kerja berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect(site_url('subunit'));
		}
		else{
			$this->session->set_flashdata('msg_sub_gagal', '<div class="alert alert-danger" role="alert"> Data sub unit kerja gagal ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect(site_url('subunit'));
		}
	}

	public function editsub(){
		$this->form_validation->set_rules('sub', 'Sub Unit', 'required');
		$id_sub_unit = $this->input->post('id_sub');
		$data_sub = array(
			'id_unit' => $this->input->post('id_unit'),
			'keterangan' => $this->input->post('sub')
		);

		if ($this->form_validation->run() == TRUE){
			$this->db->update('sub_unit_kerja', $data_sub, array('id_sub_unit'=>$id_sub_unit));
			$this->session->set_flashdata('msg_sub_berhasil', '<div class="alert alert-success" role="alert"> Data sub unit kerja berhasil diperbarui <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></div>');
			redirect(site_url('subunit'));
		}
		else{
			$this->session->set_flashdata('msg_sub_gagal', '<div class="alert alert-danger" role="alert"> Data sub unit kerja gagal diperbarui <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>');
			redirect(site_url('subunit'));
		}
	}

	public function delete_sub(){
		$id_sub = $this->input->post('id_sub');
		$this->UserModel->delete_sub($id_sub);
		$this->session->set_flashdata('msg_sub_berhasil', '<div class="alert alert-success" role="alert"> Data sub unit kerja berhasil dihapus <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span></button></div>');
		redirect(site_url('subunit'));
	}
}
?>