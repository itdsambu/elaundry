<?php
defined('BASEPATH') or exit('No Direct Script access Allowed');

class M_akses_dept extends CI_model{

	function get_dataDepartemen(){
		$query = $this->db->query("SELECT * FROM master_departemen ORDER BY Singkatan_dept ASC");
		return $query->result();
	}

	function get_dataGroupUser(){
		$query = $this->db->query("SELECT * FROM tblUtlGroupUser");
		return $query->result();
	}

	function simpan($data){
		$this->db->insert('tblUtlMenuAksesSubDept',$data);
        $hdrid = $this->db->insert_id();
        return $hdrid;
	}
}