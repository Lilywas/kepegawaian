<?php

/**
 * 
 */
class Account extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('account/UserModel');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	// Menampilkan halaman login
	public function index()
	{
		$this->load->view('admin/form_login');
	}

	//Memeriksa keberadaan akun 
	public function login()
	{
		// Baca inputan username dan password
		$username = $this->input->post('username', 'true');
		$password = $this->input->post('password', 'true');

		$temp_account = $this->UserModel->check_user_account($username, $password);

		//Cek account
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('admin/form_login');
		}

		if ($temp_account > 0) {
			//Jika akun ditemukan, set session
			$array_items = array(
				'id_admin' => $temp_account->id_admin,
				'username' => $temp_account->username,
				'admin_logged_in' => true
			);
			$this->session->set_userdata($array_items);
			redirect(site_url('home/admin'));
		} elseif ($temp_account == 0) {
			//Jika akun tidak dittemukan, kembali ke halaman login
			$this->session->set_flashdata('notification', '<div class="alert alert-danger" role="alert"> Username dan Password tidak ditemukan</div>');
			redirect(site_url('account'));
		}
	}

	//Keluar dari sistem
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('account'));
	}
}
