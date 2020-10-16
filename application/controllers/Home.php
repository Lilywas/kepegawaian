<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('account/ChartModel');
		$this->load->model('account/UserModel');
	}

	//halaman home publik///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function index()
	{
		$data['title'] = "Home";

		$data['status'] = $this->ChartModel->get_count_status();
		$data['jk'] = $this->ChartModel->get_count_jk();
		$data['pend'] = $this->ChartModel->get_count_pend();
		$data['agama'] = $this->ChartModel->get_count_agama();
		$data['all'] = $this->ChartModel->get_count_all();
		$data['komp'] = $this->ChartModel->get_count_komp();
		$data['allpns'] = $this->ChartModel->get_all_pns();
		$data['gol'] = $this->ChartModel->get_count_gol();

		$data['jumlah_lk_pns'] = $this->ChartModel->get_lk_pns();
		$data['jumlah_pr_pns'] = $this->ChartModel->get_pr_pns();
		$data['jumlah_lk_nonpns'] = $this->ChartModel->get_lk_nonpns();
		$data['jumlah_pr_nonpns'] = $this->ChartModel->get_pr_nonpns();

		$data['jumlah_sd_pns'] = $this->ChartModel->get_pend_sd_pns();
		$data['jumlah_smp_pns'] = $this->ChartModel->get_pend_smp_pns();
		$data['jumlah_smak_pns'] = $this->ChartModel->get_pend_smak_pns();
		$data['jumlah_d1_pns'] = $this->ChartModel->get_pend_d1_pns();
		$data['jumlah_d2_pns'] = $this->ChartModel->get_pend_d2_pns();
		$data['jumlah_d3_pns'] = $this->ChartModel->get_pend_d3_pns();
		$data['jumlah_d4_pns'] = $this->ChartModel->get_pend_d4_pns();
		$data['jumlah_s1_pns'] = $this->ChartModel->get_pend_s1_pns();
		$data['jumlah_s2_pns'] = $this->ChartModel->get_pend_s2_pns();
		$data['jumlah_s3_pns'] = $this->ChartModel->get_pend_s3_pns();

		$data['jumlah_sd_nonpns'] = $this->ChartModel->get_pend_sd_nonpns();
		$data['jumlah_smp_nonpns'] = $this->ChartModel->get_pend_smp_nonpns();
		$data['jumlah_smak_nonpns'] = $this->ChartModel->get_pend_smak_nonpns();
		$data['jumlah_d1_nonpns'] = $this->ChartModel->get_pend_d1_nonpns();
		$data['jumlah_d2_nonpns'] = $this->ChartModel->get_pend_d2_nonpns();
		$data['jumlah_d3_nonpns'] = $this->ChartModel->get_pend_d3_nonpns();
		$data['jumlah_d4_nonpns'] = $this->ChartModel->get_pend_d4_nonpns();
		$data['jumlah_s1_nonpns'] = $this->ChartModel->get_pend_s1_nonpns();
		$data['jumlah_s2_nonpns'] = $this->ChartModel->get_pend_s2_nonpns();
		$data['jumlah_s3_nonpns'] = $this->ChartModel->get_pend_s3_nonpns();

		$this->load->view("user/includes/navbar", $data);
		$this->load->view("user/dashboard", $data);
		$this->load->view("user/includes/footer", $data);
	}

	//halaman home admin//////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function admin()
	{
		if (!$this->session->userdata('admin_logged_in')) {
			redirect(site_url('account'));
		}
		$data['title'] = "Home Admin";
		$data_pegawai = $this->UserModel->get_data_pegawai();

		$total1 = 0;
		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = Date('Y') - $tgl;
			if ($usia == $key['pensiun']) {
				$total1++;
			}
		}
		$data['total1'] = $total1;

		$data['status'] = $this->ChartModel->get_count_status();
		$data['jk'] = $this->ChartModel->get_count_jk();
		$data['pend'] = $this->ChartModel->get_count_pend();
		$data['agama'] = $this->ChartModel->get_count_agama();
		$data['all'] = $this->ChartModel->get_count_all();
		$data['komp'] = $this->ChartModel->get_count_komp();
		$data['allpns'] = $this->ChartModel->get_all_pns();
		$data['gol'] = $this->ChartModel->get_count_gol();

		$data['jumlah_aktif'] = $this->ChartModel->get_all_aktif();

		$data['jumlah_lk_pns'] = $this->ChartModel->get_lk_pns();
		$data['jumlah_pr_pns'] = $this->ChartModel->get_pr_pns();
		$data['jumlah_lk_nonpns'] = $this->ChartModel->get_lk_nonpns();
		$data['jumlah_pr_nonpns'] = $this->ChartModel->get_pr_nonpns();

		$data['jumlah_sd_pns'] = $this->ChartModel->get_pend_sd_pns();
		$data['jumlah_smp_pns'] = $this->ChartModel->get_pend_smp_pns();
		$data['jumlah_smak_pns'] = $this->ChartModel->get_pend_smak_pns();
		$data['jumlah_d1_pns'] = $this->ChartModel->get_pend_d1_pns();
		$data['jumlah_d2_pns'] = $this->ChartModel->get_pend_d2_pns();
		$data['jumlah_d3_pns'] = $this->ChartModel->get_pend_d3_pns();
		$data['jumlah_d4_pns'] = $this->ChartModel->get_pend_d4_pns();
		$data['jumlah_s1_pns'] = $this->ChartModel->get_pend_s1_pns();
		$data['jumlah_s2_pns'] = $this->ChartModel->get_pend_s2_pns();
		$data['jumlah_s3_pns'] = $this->ChartModel->get_pend_s3_pns();

		$data['jumlah_sd_nonpns'] = $this->ChartModel->get_pend_sd_nonpns();
		$data['jumlah_smp_nonpns'] = $this->ChartModel->get_pend_smp_nonpns();
		$data['jumlah_smak_nonpns'] = $this->ChartModel->get_pend_smak_nonpns();
		$data['jumlah_d1_nonpns'] = $this->ChartModel->get_pend_d1_nonpns();
		$data['jumlah_d2_nonpns'] = $this->ChartModel->get_pend_d2_nonpns();
		$data['jumlah_d3_nonpns'] = $this->ChartModel->get_pend_d3_nonpns();
		$data['jumlah_d4_nonpns'] = $this->ChartModel->get_pend_d4_nonpns();
		$data['jumlah_s1_nonpns'] = $this->ChartModel->get_pend_s1_nonpns();
		$data['jumlah_s2_nonpns'] = $this->ChartModel->get_pend_s2_nonpns();
		$data['jumlah_s3_nonpns'] = $this->ChartModel->get_pend_s3_nonpns();

		$this->load->view("admin/includes/navbar", $data);
		$this->load->view("admin/home", $data);
		$this->load->view("admin/includes/footer", $data);
	}
}
