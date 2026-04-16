<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_master_status_laundry extends CI_Model{

	function list_master_status_laundry(){
		return $this->db->query("select * from master_status_laundry")->result();
	}

	function simpan_master_status_laundry($data){
		$this->db->insert('master_status_laundry',$data);
	}

	function update_master_status_laundry($id,$data){
		$this->db->where('IDStatusPelayanan',$id);
		$this->db->update('master_status_laundry',$data);
	}

	function get_by_id($id){
		$this->db->where('IDStatusPelayanan',$id);
		return $this->db->get('master_status_laundry');
	}

	function hapus_datalist($id){
		$this->db->where('IDStatusPelayanan',$id);
		$this->db->delete('master_status_laundry');
	}
}
?>