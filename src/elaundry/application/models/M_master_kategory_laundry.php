<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_master_kategory_laundry extends CI_Model{

	function list_master_kategory_laundry(){
		return $this->db->query("select * from master_kategory_laundry")->result();
	}

	function simpan_master_kategory_laundry($data){
		$this->db->insert('master_kategory_laundry',$data);
	}

	function update_master_kategory_laundry($id,$data){
		$this->db->where('Id_Kategory',$id);
		$this->db->update('master_kategory_laundry',$data);
	}

	function get_by_id($id){
		$this->db->where('Id_Kategory',$id);
		return $this->db->get('master_kategory_laundry');
	}

	function hapus_datalist($id){
		$this->db->where('Id_Kategory',$id);
		$this->db->delete('master_kategory_laundry');
	}
}
?>