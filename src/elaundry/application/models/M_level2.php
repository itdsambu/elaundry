<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Level2 extends CI_Model{

    private $primary_key = 'MenuID';
    private $table_name  = 'tblUtlMenu_lv2';

    function __construct(){
        parent:: __construct();
    }

    function select(){
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