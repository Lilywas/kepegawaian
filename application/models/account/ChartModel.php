<?php

/**
 * 
 */
class ChartModel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_count_status()
	{
		$this->db->select('status');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status_kerja', 1);
		$this->db->group_by('status');
		return $this->db->from('pns_local')
			->get()
			->result();
	}

	function get_count_jk()
	{
		$this->db->select('jk');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status_kerja', 1);
		$this->db->group_by('jk');
		return $this->db->from('pns_local')
			->get()
			->result();
	}

	function get_count_pend()
	{
		$this->db->select('pend_terakhir');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status_kerja', 1);
		$this->db->group_by('pend_terakhir');
		$this->db->order_by('count(*)', 'desc');
		return $this->db->from('pns_local')
			->get()
			->result();
	}

	function get_count_agama()
	{
		$this->db->select('agama');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status_kerja', 1);
		$this->db->group_by('agama');
		$this->db->order_by('agama', 'asc');
		return $this->db->from('pns_local')
			->get()
			->result();
	}

	function get_count_all()
	{
		$this->db->select('*');
		$this->db->where('status_kerja', 1);
		return $this->db->from('pns_local')
			->get()
			->result();
	}

	function get_all_pns()
	{
		$this->db->select('*');
		$this->db->where('status', 'p');
		$this->db->where('status_kerja', 1);
		return $this->db->from('pns_local')
			->get()
			->result();
	}

	function get_count_komp()
	{
		$this->db->select('kompetensi_bidang.kompetensi');
		$this->db->select("count(*) as jumlah");
		$this->db->join('pns_local', 'pns_local.id_pegawai = kompetensi_bidang.id_pegawai');
		$this->db->where('pns_local.status_kerja', 1);
		$this->db->group_by('kompetensi_bidang.kompetensi');
		return $this->db->from('kompetensi_bidang')
			->get()
			->result();
	}

	function get_count_gol()
	{
		$this->db->select('pangkat');
		$this->db->select('jk');
		$this->db->select("count(*) as jumlah");
		$this->db->where('status', 'p');
		$this->db->where('status_kerja', 1);
		$this->db->group_by('pangkat');
		$this->db->group_by('jk');
		$this->db->order_by('pangkat', 'asc');
		return $this->db->from('pns_local')
			->get()
			->result();
	}

	function get_all_aktif()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}

	function get_lk_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE jk='Laki-laki' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pr_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE jk='Perempuan' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_lk_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE jk='Laki-laki' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pr_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE jk='Perempuan' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_sd_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SD' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_smp_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SMP' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_smak_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SMA/K' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d1_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D1' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d2_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D2' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d3_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D3' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d4_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D4' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s1_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S1' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s2_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S2' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s3_pns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S3' AND status='p' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_sd_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SD' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_smp_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SMP' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_smak_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='SMA/K' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d1_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D1' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d2_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D2' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d3_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D3' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_d4_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='D4' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s1_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S1' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s2_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S2' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
	function get_pend_s3_nonpns()
	{
		$query = $this->db->query("SELECT * FROM pns_local WHERE pend_terakhir='S3' AND status='n' AND status_kerja=1");
		$count = $query->num_rows();

		return $count;
	}
}
