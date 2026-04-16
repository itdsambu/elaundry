<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_item extends CI_Model{

    private $primary_key = 'ItemID';
    private $table_name  = 'tblMstItem';
    private $view_name   = 'vwMstItem';   

    function __construct(){
        parent:: __construct();
    }

    function select(){
        return $this->db->get($this->view_name)->result();
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

    function get_jumlah(){
        $query = $this->db->query("SELECT * FROM tblMstItem");
        return $query->num_rows();
    }

    function get_MstSatuan(){
        $query = $this->db->query("SELECT * FROM tblMstSatuan");
        return $query->result();
    }

    function get_MstKategori(){
        $query = $this->db->query("SELECT * FROM tblMstKategori");
        return $query->result();
    }
}