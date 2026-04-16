<?php /** @noinspection ALL */
if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_user_login extends CI_Model
{

    private $primary_key = 'LoginID';
    private $table_name  = 'tblUtlLogin';
    private $view_name   = 'vwUtlLogin';

    function __construct()
    {
        parent::__construct();
    }

    function select()
    {
        return $this->db->get($this->view_name)->result();
    }

    function selectLaundry()
    {
        $this->db->where('Singkatan_dept', 'HRD');
        $this->db->or_where('Singkatan_dept', 'PMH');
        return $this->db->get($this->view_name)->result();
    }

    function getDeptByUserID($userid)
    {
        $this->db->where('LoginID', $userid);
        return $this->db->get($this->view_name)->row()->GroupName;
    }

    function save($data)
    {
        // print_r($data);
        // exit;
        $this->db->insert($this->table_name, $data);
        $hdrid = $this->db->insert_id();
        return $hdrid;
    }

    function delete($id)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->table_name);
    }

    //===== get ID u/ Edit
    function get($id)
    {
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->table_name)->result();
    }

    function update($id, $data)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table_name, $data);
    }

    function updatePassword($id, $data)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table_name, $data);
    }

    function ubahPassword($id, $data)
    {
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->table_name, $data);
    }

    function getUserChangePass($id, $personID) {
        $this->db->where('LoginID', $id);
        $this->db->or_where('personalid', $personID);
        return $this->db->get($this->table_name)->result();
    }

    function checkUser($LoginID, $Password, $personID) {
        $this->db->where('LoginID', $LoginID);
        $this->db->where('LoginPassword', $Password);
        $this->db->where('personalid', $personID);
        return $this->db->get($this->table_name)->result();
    }

    function UpdatePasswordBy($id, $personID, $change) {
        $this->db->where($this->primary_key, $id);
        $this->db->where('personalid', $personID);
        $this->db->update($this->table_name, $change);
    }

    function UpdateChangePass($change, $personID) {
        $this->db->where('personalid', $personID);
        $this->db->update($this->table_name, $change);
    }
}
