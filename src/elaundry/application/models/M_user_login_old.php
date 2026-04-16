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

    // function select()
    // { //record all user
    //     $q  = json_decode($this->curl->simple_get(setAPI2() . "p1_get_all_departemen"));
    //     return $this->db->query("with 
    //                                 tbldept as (
    //                                     select (elem->>'deptid')::text tbldept_deptid from json_array_elements('" . json_encode($q) . "') elem)

    //                                 select
    //                                     *
    //                                 from 
    //                                     tblutllogin a
    //                                 left join
    //                                     tbldept b
    //                                 on a.DeptID::text=b.tbldept_deptid
    //                                 order by a.NamaUser")->result();
    // }


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
}
