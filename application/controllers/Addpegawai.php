<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Addpegawai extends CI_Controller
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
    $data['title'] = "Tambah Data Pegawai";
    $data['unit'] = $this->UserModel->get_unit_kerja()->result_array();
    $this->load->view("admin/includes/navbar", $data);
    $this->load->view("admin/formnon", $data);
    $this->load->view("admin/includes/footer");
  }

  public function pns()
  {
    $data['title'] = "Tambah Data Pegawai";
    $data['unit'] = $this->UserModel->get_unit_kerja()->result_array();
    $this->load->view("admin/includes/navbar", $data);
    $this->load->view("admin/addpegawai", $data);
    $this->load->view("admin/includes/footer");
  }

  public function simpanpns()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('msg_gagal', '<div class="alert alert-danger" role="alert"> Data gagal ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect(site_url('listpegawai'));
    }

    $data_pegawai = array(
      'status' => 'p',
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
      'pensiun' => htmlspecialchars($this->input->post('pensiun')),
      'status_kerja' => 1,
      'unit_kerja_pegawai' => $this->input->post('unit_master'),
      'sub_pegawai' => $this->input->post('sub_unit_master')
    );

    $this->db->insert('pns_local', $data_pegawai);
    $this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span></button></div>');
    redirect(site_url('listpegawai'));
  }

  public function simpannonpns()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'valid_email', array('valid_email' => 'Alamat email tidak valid'));

    if ($this->form_validation->run() == TRUE) {
      $data_pegawai = array(
        'status' => 'n',
        'nip' => '',
        'nama' => $this->input->post('nama'),
        'jk' => $this->input->post('jk'),
        'agama' => $this->input->post('agama'),
        'tempat_lahir' => strtoupper($this->input->post('tempat_lahir')),
        'tanggal_lahir' => $this->input->post('tgl_lahir'),
        'alamat' => $this->input->post('alamat'),
        'pend_terakhir' => $this->input->post('pend'),
        'jurusan' => $this->input->post('jurusan'),
        'no_telp' => $this->input->post('hp'),
        'email' => $this->input->post('email'),
        'jabatan' => 'non',
        'jenis_jabatan' => $this->input->post('bagian'),
        'tanggal_mulai_kerja' => $this->input->post('tgl_kerja'),
        'status_kerja' => 1,
        'unit_kerja_pegawai' => $this->input->post('unit_master'),
        'sub_pegawai' => $this->input->post('sub_unit_master')
      );

      $this->db->insert('pns_local', $data_pegawai);
      $this->session->set_flashdata('msg_berhasil', '<div class="alert alert-success" role="alert"> Data berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button></div>');
      redirect(site_url('listpegawai'));
    } elseif ($this->form_validation->run() == FALSE) {
      $data['title'] = "Tambah Data Pegawai";
      $data['unit'] = $this->UserModel->get_unit_kerja()->result_array();
      $this->load->view("admin/includes/navbar", $data);
      $this->load->view("admin/formnon", $data);
      $this->load->view("admin/includes/footer");
    }
  }
}
