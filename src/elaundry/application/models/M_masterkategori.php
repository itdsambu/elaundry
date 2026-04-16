<?php
defined('BASEPATH') or EXIT('No Direct Allowed Access');

class M_masterkategori extends CI_Model{

	function simpan($data){
		$this->db->insert('master_kategori', $data);
	}

	function get_Data(){
		$query = $this->db->query("SELECT * FROM master_kategori");
		return $query->result();
	}

	function get_dataid($id){
		$query = $this->db->query("SELECT * FROM master_kategori where kategoriID = '$id'");
		return $query->result();
	}

	function update($id,$data){
		$this->db->where('kategoriID',$id);
		$this->db->update('master_kategori',$data);
	}
}