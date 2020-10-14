<?php
/**
 * 
 */
class ChartModel extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_count_status(){
		$this->db->select('status');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status_kerja',1);
		$this->db->group_by('status');
		return $this->db->from('pns_local')
		->get()
		->result();
	}

	function get_count_jk(){
		$this->db->select('jk');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status_kerja',1);
		$this->db->group_by('jk');
		return $this->db->from('pns_local')
		->get()
		->result();
	}

	function get_count_jabatan(){
		$this->db->select('jabatan');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status_kerja',1);
		$this->db->group_by('jabatan');
		$this->db->order_by('jumlah');
		return $this->db->from('pns_local')
		->get()
		->result();
	}

	function get_count_pend(){
		$this->db->select('pend_terakhir');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status_kerja',1);
		$this->db->group_by('pend_terakhir');
		$this->db->order_by('count(*)', 'desc');
		return $this->db->from('pns_local')
		->get()
		->result();
	}

	function get_count_agama(){
		$this->db->select('agama');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status_kerja',1);
		$this->db->group_by('agama');
		$this->db->order_by('agama', 'asc');
		return $this->db->from('pns_local')
		->get()
		->result();
	}

	function get_count_all(){
		$this->db->select('*');
		$this->db->where('status_kerja',1);
		return $this->db->from('pns_local')
		->get()
		->result();
	}

	function get_all_pns(){
		$this->db->select('*');
		$this->db->where('status','p');
		$this->db->where('status_kerja',1);
		return $this->db->from('pns_local')
		->get()
		->result();
	}

	function get_count_jabnon(){
		$this->db->select('jenis_jabatan');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status','n');
		$this->db->where('status_kerja',1);
		$this->db->group_by('jenis_jabatan');
		return $this->db->from('pns_local')
		->get()
		->result();
	}

	function get_count_komp(){
		$this->db->select('kompetensi_bidang.kompetensi');
		$this->db->select("count(*) as jumlah");
		$this->db->join('pns_local', 'pns_local.id_pegawai = kompetensi_bidang.id_pegawai');
		$this->db->where('pns_local.status_kerja',1);
		$this->db->group_by('kompetensi_bidang.kompetensi');
		return $this->db->from('kompetensi_bidang')
		->get()
		->result();
	}

	function get_all_aktif(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_non_aktif(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE status_kerja=0");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	
	function get_lk_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pr_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_lk_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE jk='Laki-laki' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pr_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE jk='Perempuan' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_sd_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SD' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_smp_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SMP' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_smak_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SMA/K' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d1_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D1' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d2_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D2' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d3_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D3' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d4_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D4' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s1_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S1' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s2_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S2' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s3_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S3' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_sd_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SD' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_smp_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SMP' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_smak_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SMA/K' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d1_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D1' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d2_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D2' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d3_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D3' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d4_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D4' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s1_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S1' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s2_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S2' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s3_nonpns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S3' AND status='n' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_khusus_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE jabatan='khusus' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_umum_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE jabatan='umum' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_struktural_pns(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE jabatan='struktural' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	
	function get_gol1a_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%I/A%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol1a_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%I/A%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol1b_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%I/B%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol1b_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%I/B%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol1c_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%I/C%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol1c_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%I/C%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol1d_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%I/D%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol1d_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%I/D%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol2a_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%II/A%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol2a_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%II/A%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol2b_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%II/B%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol2b_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%II/B%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol2c_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%II/C%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol2c_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%II/C%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol2d_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%II/D%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol2d_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%II/D%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol3a_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%III/A%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol3a_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%III/A%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol3b_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%III/B%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol3b_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%III/B%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol3c_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%III/C%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol3c_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%III/C%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol3d_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%III/D%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol3d_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%III/D%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4a_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/A%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4a_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/A%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4b_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/B%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4b_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/B%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4c_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/C%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4c_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/C%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4d_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/D%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4d_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/D%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4e_lk(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/E%' AND jk='Laki-laki' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}
	function get_gol4e_pr(){
		$query = $this->db->query("SELECT * FROM pns_local WHERE pangkat like '%IV/E%' AND jk='Perempuan' AND status='p' AND status_kerja=1");
		$result = $query->row_array();
		$count = $query->num_rows();

		return $count;
	}

}
?>