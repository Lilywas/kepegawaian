<?php
/**
 * 
 */
class UserModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	function check_user_account($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$result = $this->db->get('admin')->row_array();
		return $result;
	}
	function get_data_pegawai(){
		$query = $this->db->query("SELECT * FROM pns_local where status_kerja=1 ORDER BY id_pegawai");
		$indeks = 0;
		$result = array();

		foreach ($query->result_array() as $row)
		{
			$result[$indeks++] = $row;
		}
		
		return $result;
	}
	function get_data_pegawai_nonaktif(){
		$query = $this->db->query("SELECT * FROM pns_local where status_kerja=0 ORDER BY id_pegawai");
		$indeks = 0;
		$result = array();

		foreach ($query->result_array() as $row)
		{
			$result[$indeks++] = $row;
		}
		
		return $result;
	}
	function get_detail($id){
		$this->db->select('*');
		$this->db->from('pns_local');
		$this->db->where('id_pegawai',$id);

		return $this->db->get();
	}
	function get_from_nip($nip){
		$this->db->select('*');
		$this->db->from('pns_local');
		$this->db->where('nip',$nip);

		return $this->db->get();
	}
	function get_status($id){
		$this->db->select('status');
		$this->db->from('pns_local');
		$this->db->where('id_pegawai',$id);

		return $this->db->get();
	}
	function delete_pegawai($id_pegawai){
		$this->db->where('id_pegawai',$id_pegawai);
		$this->db->delete('pns_local');
	}
	function get_kompetensi($id_pegawai){
		$this->db->select('*');
		$this->db->from('kompetensi_bidang');
		$this->db->where('id_pegawai',$id_pegawai);

		return $this->db->get();
	}
	function get_all_kompetensi($id_kompetensi){
		$this->db->select('*');
		$this->db->from('kompetensi_bidang');
		$this->db->where('id_kompetensi',$id_kompetensi);

		return $this->db->get();
	}
	function delete_komp($id){
		$this->db->where('id_kompetensi',$id);
		$this->db->delete('kompetensi_bidang');
	}
	function get_riwayat($id_pegawai){
		$this->db->select('*');
		$this->db->from('riwayat_unit_kerja');
		$this->db->where('id_pegawai',$id_pegawai);

		return $this->db->get();
	}
	function get_all_riwayat($id_riwayat_unit_kerja){
		$this->db->select('*');
		$this->db->from('riwayat_unit_kerja');
		$this->db->where('id_riwayat_unit_kerja',$id_riwayat_unit_kerja);

		return $this->db->get();
	}
	function delete_riwayat($id){
		$this->db->where('id_riwayat_unit_kerja',$id);
		$this->db->delete('riwayat_unit_kerja');
	}
	function get_unit_kerja(){
		$this->db->select('*');
		$this->db->from('unit_kerja');

		return $this->db->get();
	}
	function get_sub_unit_kerja($id){
		$hasil=$this->db->query("SELECT * FROM sub_unit_kerja WHERE id_unit='$id'");
        return $hasil->result();
	}
	function get_sub_unit($id){
		$hasil=$this->db->query("SELECT sub_pegawai FROM pns_local WHERE id_pegawai='$id'");
        return $hasil->result();
	}
	function get_sub_unit_fromsub($id){
        $this->db->select('id_unit');
		$this->db->from('sub_unit_kerja');
		$this->db->where('id_sub_unit',$id);

		return $this->db->get();
	}
	function get_sub_unit_fromunit($id){
		$this->db->select('*');
		$this->db->from('sub_unit_kerja');
		$this->db->where('id_unit',$id);

		return $this->db->get();
	}
	function get_id_sub($ket){
		$this->db->select('id_sub_unit');
		$this->db->from('sub_unit_kerja');
		$this->db->where('keterangan',$ket);

		return $this->db->get();
	}
	function get_all_unit(){
		$query = $this->db->query("SELECT * FROM unit_kerja ORDER BY id_unit");
		$indeks = 0;
		$result = array();

		foreach ($query->result_array() as $row)
		{
			$result[$indeks++] = $row;
		}
		
		return $result;
	}
	function get_all_sub(){
		$this->db->select('*, unit_kerja.nama_unit as nama_unitkerja, unit_kerja.id_unit as id_unitkerja');
		$this->db->join('unit_kerja', 'unit_kerja.id_unit = sub_unit_kerja.id_unit');
		$this->db->from('sub_unit_kerja');
		$this->db->order_by('id_unitkerja', 'asc');

		return $this->db->get();
	}
	function get_all_pegawai(){
		$this->db->select('*, unit_kerja.nama_unit as nama_unitkerja, sub_unit_kerja.keterangan as nama_subunit');
		$this->db->join('sub_unit_kerja', 'sub_unit_kerja.id_sub_unit = pns_local.sub_pegawai', 'left');
		$this->db->join('unit_kerja', 'unit_kerja.id_unit = pns_local.unit_kerja_pegawai', 'left');
		$this->db->from('pns_local');
		$this->db->where('pns_local.status_kerja',1);
		$this->db->order_by('pns_local.id_pegawai','asc');

		return $this->db->get();
	}
	function get_all_pegawai_nonaktif(){
		$this->db->select('*, unit_kerja.nama_unit as nama_unitkerja, sub_unit_kerja.keterangan as nama_subunit');
		$this->db->join('sub_unit_kerja', 'sub_unit_kerja.id_sub_unit = pns_local.sub_pegawai', 'left');
		$this->db->join('unit_kerja', 'unit_kerja.id_unit = pns_local.unit_kerja_pegawai', 'left');
		$this->db->from('pns_local');
		$this->db->where('pns_local.status_kerja',0);
		$this->db->order_by('pns_local.id_pegawai','asc');

		return $this->db->get();
	}
	function get_all_pegawai_byunit(){
		$this->db->select('*, unit_kerja.nama_unit as nama_unitkerja, sub_unit_kerja.keterangan as nama_subunit');
		$this->db->join('sub_unit_kerja', 'sub_unit_kerja.id_sub_unit = pns_local.sub_pegawai', 'left');
		$this->db->join('unit_kerja', 'unit_kerja.id_unit = pns_local.unit_kerja_pegawai', 'left');
		$this->db->from('pns_local');
		$this->db->where('pns_local.status_kerja',1);
		$this->db->order_by('pns_local.unit_kerja_pegawai','asc');

		return $this->db->get();
	}
	function get_unit($id_unit){
		$this->db->select('nama_unit');
		$this->db->from('unit_kerja');
		$this->db->where('id_unit',$id_unit);

		return $this->db->get();
	}
	function delete_unit($id){
		$this->db->where('id_unit',$id);
		$this->db->delete('unit_kerja');
	}
	function delete_sub_by_unit($id){
		$this->db->where('id_unit',$id);
		$this->db->delete('sub_unit_kerja');
	}
	function delete_sub($id){
		$this->db->where('id_sub_unit',$id);
		$this->db->delete('sub_unit_kerja');
	}
	function get_all_datapegawai(){
		$this->db->select('*, kompetensi_bidang.kompetensi as kompetensi, kompetensi_bidang.keterangan as ket_kompetensi, riwayat_unit_kerja.unit_kerja as riwayat_unitkerja, riwayat_unit_kerja.sub_unit_kerja as riwayat_subunit, riwayat_unit_kerja.tanggal_mulai as riwayat_tglmulai, riwayat_unit_kerja.tanggal_selesai as riwayat_tglselesai');
		$this->db->join('kompetensi_bidang', 'kompetensi_bidang.id_pegawai = pns_local.id_pegawai', 'left');
		$this->db->join('riwayat_unit_kerja', 'riwayat_unit_kerja.id_pegawai = pns_local.id_pegawai', 'left');
		$this->db->from('pns_local');
		$this->db->where('pns_local.status_kerja',1);
		$this->db->order_by('pns_local.id_pegawai', 'asc');

		return $this->db->get();
	}
}
?>