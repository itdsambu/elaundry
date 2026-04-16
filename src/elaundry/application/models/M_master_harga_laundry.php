<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_master_harga_laundry extends CI_Model{

	function list_master_harga_laundry(){
		return $this->db->query("select * from master_harga_laundry")->result();
	}

	function simpan_master_harga_laundry($data){
		$this->db->insert('master_harga_laundry',$data);
	}

	function update_master_harga_laundry($id,$data){
		$this->db->where('IDLayanan',$id);
		$this->db->update('master_harga_laundry',$data);
	}

	function get_by_id($id){
		$this->db->where('IDLayanan',$id);
		return $this->db->get('master_harga_laundry');
	}

	function hapus_datalist($id){
		$this->db->where('IDLayanan',$id);
		$this->db->delete('master_harga_laundry');
	}
}
?>