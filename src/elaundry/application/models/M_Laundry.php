<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_Laundry extends CI_Model
{

    private $primary_key = 'KategoriID';
    private $table_name  = 'tblMstKategori';
    private $pos_laundry = 'tbl_mst_pos_laundry';

    function __construct()
    {
        parent::__construct();
    }

    function addPosLaundry($data)
    {
        // print_r($data);
        // die;
        // if (!$this->db->insert('tbl_mst_pos_laundry', $data)) {
        //     print_r($this->db->error());
        // }
        $this->db->insert($this->pos_laundry, $data);
    }

    function updatePosLaundry($data, $detail_id)
    {
        $this->db->where('detail_id', $detail_id);
        $this->db->update($this->pos_laundry, $data);
    }

    function getPosLaundry()
    {
        $this->db->where('inactive', '0');
        return $this->db->get($this->pos_laundry)->result();
    }

    function getPosLaundryBy($id_select)
    {
        $this->db->where('detail_id', $id_select);
        return $this->db->get($this->pos_laundry)->result();
        // return $this->db->query("SELECT * FROM tbl_mst_pos_laundry where detail_id = '$id_select'")->result();
    }


    function select()
    {
        return $this->db->get($this->table_name)->result();
    }

    function save($data)
    {
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
}
