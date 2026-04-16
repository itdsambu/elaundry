<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_beban extends CI_Model{
	
	function list_beban(){
		return $this->db->get('master_beban')->result();
	}

	function hapus_departemen($id){
		$this->db->where('ID_beban',$id);
		$this->db->delete('master_beban');
	}

	function simpan_beban($data){
		$this->db->insert('master_beban',$data);
	}

	function get_by_id($id){
		$this->db->where('ID_beban',$id);
		return $this->db->get('master_beban');
	}

	function update_beban($id,$data){
		$this->db->where('ID_beban',$id);
		$this->db->update('master_beban',$data);
	}

	function ajaxbeban($idbeban){
		$this->db->where('Type_transaksi',$idbeban);
		return $this->db->get('master_beban')->result();
	}

	function hapus_dataperrow($id){
		$grupid=$this->session->userdata('group_user');
		$this->db->query("delete master_beban where ID_beban='$id'");
	}
}
?>