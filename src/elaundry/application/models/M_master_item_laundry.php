<?php
defined('BASEPATH') or exit('No Direct Script Access Allowed');

class m_master_item_laundry extends CI_Model{

	function list_master_item_laundry(){
		return $this->db->query("SELECT
			a.Id_Item, a.NamaItem, a.NotActive, a.Id_Kategory, b.NamaKategory, a.CreatedDate, a.LastUpdatedDate, a.singkatan
			FROM master_item_laundry as a join master_kategory_laundry as b on a.Id_Kategory = b.Id_Kategory")->result();
	}

	function simpan_master_item_laundry($data){
		$this->db->insert('master_item_laundry',$data);
	}

	function update_master_item_laundry($id,$data){
		$this->db->where('Id_Item',$id);
		$this->db->update('master_item_laundry',$data);
	}

	function get_by_id($id){
		$this->db->where('Id_Item',$id);
		return $this->db->get('master_item_laundry');
	}

	function get_kategory(){
		return $this->db->query("select * from master_kategory_laundry")->result();
	}

	function hapus_datalist($id){
		$this->db->where('Id_Item',$id);
		$this->db->delete('master_item_laundry');
	}
}
