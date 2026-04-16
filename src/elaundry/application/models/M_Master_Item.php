<?php
defined('BASEPATH') or exit('No direct Script Access Allowed');

class M_Master_Item extends CI_Model{

	function get_DataKategori(){
		$query = $this->db->query("SELECT * FROM master_kategori");
		return $query->result();
	}

	function get_DataSatuan(){
		$query = $this->db->query("SELECT * FROM master_satuan");
		return $query->result();
	}

	function getHitung(){
		$query = $this->db->query("SELECT * FROM master_item");
		return $query->num_rows();
	}	

	function simpan($data){
		$this->db->insert('master_item',$data);
	}

	function get_Data(){
		$query = $this->db->query("SELECT * from master_item as A left join master_kategori as B ON A.kategoriID = B.kategoriID left join master_satuan as C ON A.satuanID = C.satuanID where A.status = '1' ");
		return $query->result();
	}

	function get_Dataid($id){
		$query = $this->db->query("SELECT * FROM master_item where itemID = '$id'");
		return $query->result();
	}

	function update($id,$data){
		$this->db->where('itemID',$id);
		$this->db->update('master_item',$data);
	}
}