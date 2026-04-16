<?php 
defined('BASEPATH') OR exit('No direct script acess allowed');

class m_jabatan extends CI_Model{

	function dropdown_departemen(){
		return $this->db->get('master_departemen')->result();
	}

	function list_jabatan(){
		return $this->db->get('master_jabatan')->result();
	}

	function hapus_departemen($id){
		$this->db->where('ID_jab',$id);
		$this->db->delete('master_jabatan');
	}

	function simpan_jabatan($data){
		$this->db->insert('master_jabatan',$data);
	}

	function get_by_id($id){
		$this->db->where('ID_jab',$id);
		return $this->db->get('master_jabatan');
	}

	function update_jabatan($id,$data){
		$this->db->where('ID_jab',$id);
		$this->db->update('master_jabatan',$data);
	}
}
?>