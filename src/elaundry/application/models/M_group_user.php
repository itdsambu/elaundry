<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_group_user extends CI_Model{

    private $primary_key        = 'GroupID';
    private $table_name         = 'tblUtlGroupUser';  

    function __construct(){
        parent:: __construct();
    }

    function select(){
        return $this->db->get($this->table_name)->result();
    }

    function select_laundry(){
        $this->db->where('GroupID',166);
        $this->db->or_where('GroupID',165);
        $this->db->or_where('GroupID',95);
        $this->db->or_where('GroupID',144);
        return $this->db->get($this->table_name)->result();
    }

    function save($data){
        $this->db->insert($this->table_name,$data);
        $hdrid = $this->db->insert_id();
        return $hdrid;
    }

    function delete($id){
        $this->db->where($this->primary_key,$id);
        $this->db->delete($this->table_name);
    }

    //===== get ID u/ Edit
    function get($id){
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->table_name)->result();
    }

    function update($id,$data){
        $this->db->where($this->primary_key,$id);
        $this->db->update($this->table_name,$data);
    }
}