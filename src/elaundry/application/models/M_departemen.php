<?php
/** @noinspection ALL */
defined('BASEPATH') or exit('No direct script access allowed');

class m_departemen extends CI_Model
{

	function list_departemen()
	{
		// $this->load->library('api');
		return json_decode($this->curl->simple_get(setAPI2() . "p1_get_all_departemen"));
		// return $this->db->get('master_departemen')->result();
	}

	function list_departemen_laundry()
	{
		$this->db->where('Singkatan_dept', 'HRD');
		$this->db->or_where('Singkatan_dept', 'PMH');
		return $this->db->get('master_departemen')->result();
	}

	function hapus_departemen($id)
	{
		$this->db->where('ID_dept', $id);
		$this->db->delete('master_departemen');
	}

	function simpan_departemen($data)
	{
		$this->db->insert('master_departemen', $data);
	}

	function get_by_id($id)
	{
		$this->db->where('ID_dept', $id);
		return $this->db->get('master_departemen');
	}

	function update_departemen($id, $data)
	{
		$this->db->where('ID_dept', $id);
		$this->db->update('master_departemen', $data);
	}
}
