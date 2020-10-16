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
		$data_pegawai = $this->UserModel->get_data_pegawai();

		$total1 = 0;
		$total2 = 0;
		$total3 = 0;
		$total4 = 0;
		$total5 = 0;

		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = Date('Y') - $tgl;
			if ($usia == $key['pensiun']) {
				$total1++;
			}
		}
		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = (Date('Y') + 1) - $tgl;
			if ($usia == $key['pensiun']) {
				$total2++;
			}
		}
		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = (Date('Y') + 2) - $tgl;
			if ($usia == $key['pensiun']) {
				$total3++;
			}
		}
		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = (Date('Y') + 3) - $tgl;
			if ($usia == $key['pensiun']) {
				$total4++;
			}
		}
		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = (Date('Y') + 4) - $tgl;
			if ($usia == $key['pensiun']) {
				$total5++;
			}
		}

		$data['total1'] = $total1;
		$data['total2'] = $total2;
		$data['total3'] = $total3;
		$data['total4'] = $total4;
		$data['total5'] = $total5;

		$data['status'] = $this->ChartModel->get_count_status();
		$data['jk'] = $this->ChartModel->get_count_jk();
		$data['pend'] = $this->ChartModel->get_count_pend();
		$data['agama'] = $this->ChartModel->get_count_agama();
		$data['all'] = $this->ChartModel->get_count_all();
		$data['komp'] = $this->ChartModel->get_count_komp();
		$data['allpns'] = $this->ChartModel->get_all_pns();

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

		$data['jumlah_1a_lk'] = $this->ChartModel->get_gol1a_lk();
		$data['jumlah_1a_pr'] = $this->ChartModel->get_gol1a_pr();
		$data['jumlah_1b_lk'] = $this->ChartModel->get_gol1b_lk();
		$data['jumlah_1b_pr'] = $this->ChartModel->get_gol1b_pr();
		$data['jumlah_1c_lk'] = $this->ChartModel->get_gol1c_lk();
		$data['jumlah_1c_pr'] = $this->ChartModel->get_gol1c_pr();
		$data['jumlah_1d_lk'] = $this->ChartModel->get_gol1d_lk();
		$data['jumlah_1d_pr'] = $this->ChartModel->get_gol1d_pr();

		$data['jumlah_2a_lk'] = $this->ChartModel->get_gol2a_lk();
		$data['jumlah_2a_pr'] = $this->ChartModel->get_gol2a_pr();
		$data['jumlah_2b_lk'] = $this->ChartModel->get_gol2b_lk();
		$data['jumlah_2b_pr'] = $this->ChartModel->get_gol2b_pr();
		$data['jumlah_2c_lk'] = $this->ChartModel->get_gol2c_lk();
		$data['jumlah_2c_pr'] = $this->ChartModel->get_gol2c_pr();
		$data['jumlah_2d_lk'] = $this->ChartModel->get_gol2d_lk();
		$data['jumlah_2d_pr'] = $this->ChartModel->get_gol2d_pr();

		$data['jumlah_3a_lk'] = $this->ChartModel->get_gol3a_lk();
		$data['jumlah_3a_pr'] = $this->ChartModel->get_gol3a_pr();
		$data['jumlah_3b_lk'] = $this->ChartModel->get_gol3b_lk();
		$data['jumlah_3b_pr'] = $this->ChartModel->get_gol3b_pr();
		$data['jumlah_3c_lk'] = $this->ChartModel->get_gol3c_lk();
		$data['jumlah_3c_pr'] = $this->ChartModel->get_gol3c_pr();
		$data['jumlah_3d_lk'] = $this->ChartModel->get_gol3d_lk();
		$data['jumlah_3d_pr'] = $this->ChartModel->get_gol3d_pr();

		$data['jumlah_4a_lk'] = $this->ChartModel->get_gol4a_lk();
		$data['jumlah_4a_pr'] = $this->ChartModel->get_gol4a_pr();
		$data['jumlah_4b_lk'] = $this->ChartModel->get_gol4b_lk();
		$data['jumlah_4b_pr'] = $this->ChartModel->get_gol4b_pr();
		$data['jumlah_4c_lk'] = $this->ChartModel->get_gol4c_lk();
		$data['jumlah_4c_pr'] = $this->ChartModel->get_gol4c_pr();
		$data['jumlah_4d_lk'] = $this->ChartModel->get_gol4d_lk();
		$data['jumlah_4d_pr'] = $this->ChartModel->get_gol4d_pr();
		$data['jumlah_4e_lk'] = $this->ChartModel->get_gol4e_lk();
		$data['jumlah_4e_pr'] = $this->ChartModel->get_gol4e_pr();

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
		$total2 = 0;
		$total3 = 0;
		$total4 = 0;
		$total5 = 0;

		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = Date('Y') - $tgl;
			if ($usia == $key['pensiun']) {
				$total1++;
			}
		}
		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = (Date('Y') + 1) - $tgl;
			if ($usia == $key['pensiun']) {
				$total2++;
			}
		}
		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = (Date('Y') + 2) - $tgl;
			if ($usia == $key['pensiun']) {
				$total3++;
			}
		}
		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = (Date('Y') + 3) - $tgl;
			if ($usia == $key['pensiun']) {
				$total4++;
			}
		}
		foreach ($data_pegawai as $key) {
			$tgl = substr($key['tanggal_lahir'], 0, 4);
			$usia = (Date('Y') + 4) - $tgl;
			if ($usia == $key['pensiun']) {
				$total5++;
			}
		}

		$data['total1'] = $total1;
		$data['total2'] = $total2;
		$data['total3'] = $total3;
		$data['total4'] = $total4;
		$data['total5'] = $total5;

		$data['status'] = $this->ChartModel->get_count_status();
		$data['jk'] = $this->ChartModel->get_count_jk();
		$data['pend'] = $this->ChartModel->get_count_pend();
		$data['agama'] = $this->ChartModel->get_count_agama();
		$data['all'] = $this->ChartModel->get_count_all();
		$data['komp'] = $this->ChartModel->get_count_komp();
		$data['allpns'] = $this->ChartModel->get_all_pns();

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

		$data['jumlah_1a_lk'] = $this->ChartModel->get_gol1a_lk();
		$data['jumlah_1a_pr'] = $this->ChartModel->get_gol1a_pr();
		$data['jumlah_1b_lk'] = $this->ChartModel->get_gol1b_lk();
		$data['jumlah_1b_pr'] = $this->ChartModel->get_gol1b_pr();
		$data['jumlah_1c_lk'] = $this->ChartModel->get_gol1c_lk();
		$data['jumlah_1c_pr'] = $this->ChartModel->get_gol1c_pr();
		$data['jumlah_1d_lk'] = $this->ChartModel->get_gol1d_lk();
		$data['jumlah_1d_pr'] = $this->ChartModel->get_gol1d_pr();

		$data['jumlah_2a_lk'] = $this->ChartModel->get_gol2a_lk();
		$data['jumlah_2a_pr'] = $this->ChartModel->get_gol2a_pr();
		$data['jumlah_2b_lk'] = $this->ChartModel->get_gol2b_lk();
		$data['jumlah_2b_pr'] = $this->ChartModel->get_gol2b_pr();
		$data['jumlah_2c_lk'] = $this->ChartModel->get_gol2c_lk();
		$data['jumlah_2c_pr'] = $this->ChartModel->get_gol2c_pr();
		$data['jumlah_2d_lk'] = $this->ChartModel->get_gol2d_lk();
		$data['jumlah_2d_pr'] = $this->ChartModel->get_gol2d_pr();

		$data['jumlah_3a_lk'] = $this->ChartModel->get_gol3a_lk();
		$data['jumlah_3a_pr'] = $this->ChartModel->get_gol3a_pr();
		$data['jumlah_3b_lk'] = $this->ChartModel->get_gol3b_lk();
		$data['jumlah_3b_pr'] = $this->ChartModel->get_gol3b_pr();
		$data['jumlah_3c_lk'] = $this->ChartModel->get_gol3c_lk();
		$data['jumlah_3c_pr'] = $this->ChartModel->get_gol3c_pr();
		$data['jumlah_3d_lk'] = $this->ChartModel->get_gol3d_lk();
		$data['jumlah_3d_pr'] = $this->ChartModel->get_gol3d_pr();

		$data['jumlah_4a_lk'] = $this->ChartModel->get_gol4a_lk();
		$data['jumlah_4a_pr'] = $this->ChartModel->get_gol4a_pr();
		$data['jumlah_4b_lk'] = $this->ChartModel->get_gol4b_lk();
		$data['jumlah_4b_pr'] = $this->ChartModel->get_gol4b_pr();
		$data['jumlah_4c_lk'] = $this->ChartModel->get_gol4c_lk();
		$data['jumlah_4c_pr'] = $this->ChartModel->get_gol4c_pr();
		$data['jumlah_4d_lk'] = $this->ChartModel->get_gol4d_lk();
		$data['jumlah_4d_pr'] = $this->ChartModel->get_gol4d_pr();
		$data['jumlah_4e_lk'] = $this->ChartModel->get_gol4e_lk();
		$data['jumlah_4e_pr'] = $this->ChartModel->get_gol4e_pr();

		$this->load->view("admin/includes/navbar", $data);
		$this->load->view("admin/home", $data);
		$this->load->view("admin/includes/footer", $data);
	}
}
