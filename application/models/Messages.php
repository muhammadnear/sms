<?php	
	class Messages extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function Get_KotakMasuk($tahun)
		{
			$value = $this->db->query("SELECT * FROM  `kotak_masuk` WHERE year(time) = $tahun")->result();
			return $value;
		}
		function Get_KotakKeluar($tahun)
		{
			$value = $this->db->query("SELECT * FROM  `kotak_keluar` WHERE year(created_time) = $tahun")->result();
			return $value;
		}

		function UpdateUser($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('users', $data);
		}
/*		function GetKota()
		{
			$value = $this->db->query('SELECT * FROM  `kota` WHERE 1')->result();
			return $value;
		}
		function countReg($id)
		{
			$this->db->like('kode_register', $id);
			$this->db->from('register');
			return $this->db->count_all_results();
		}*/
		function hapusUser($id)
		{
			$this->db->where('id',$id);
			$this->db->delete('users');
		}
		function insertPesan($data)
		{
			return $this->db->insert("kotak_keluar",$data);
		}
	}
?>