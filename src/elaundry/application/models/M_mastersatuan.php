<?php
defined('BASEPATH') or EXIT('No direct Script Access Allowed');

class M_Mastersatuan extends CI_Model{

	function get_datasatuan(){
		$query = $this->db->query("SELECT * FROM master_satuan");
		return $query->result();
	}

	function simpan($data){
		$this->db->insert('master_satuan', $data);
	}

	function get_data($id){
		$query = $this->db->query("SELECT * FROM master_satuan where satuanID = '$id'");
		return $query->result();
	}

	function update($id,$data){
		$this->db->where('satuanID', $id);
		$this->db->update('master_satuan', $data);
	}
}